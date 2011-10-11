<?php
require_once "menuWindow.php"; 
require_once "menuTools.php"; 

class winHabilidade { 
	private $form;
	private $container; 			
	private $paging;		
	private $grid;		
	public $window;
		
	public function btPesq(){
		$obj=new TButton(array(
			name=>'end_btPesq',
			iconCls=>'baddsel',
			iconAlign=>'left',
			margin=>'10 0 0 1',
			scale=>'small',
			text=>'Adicionar',
			width=>80
		));	
		$obj->listeners->add("click","
		  winHabilidadeSel.onExit=function(_r){
				var _data=[];
				Ext.getCmp('gridHabilidade').getStore().each(function(_res){
				  var _dataGrid=[];
					for(var _p in _res.data){
					  _dataGrid.push(_res.data[_p]);
					}
					_data.push(_dataGrid);
				});
				if(_r.codSel!=''){
					_data2 = [_r.codSel,_r.descrSel];
					_data.push(_data2);
				}
			  Ext.getCmp('gridHabilidade').getStore().loadData(_data);
			};
		  winHabilidadeSel.show();
		");
		return $obj;
	}	

	private function btSalvar(){
		$obj=new TButton(array(
			iconCls=>'bsave',
			iconAlign=>'left',
			scale=>'small',
			text=>'Save',
			width=>65,
			handler=>"
				var _data=[];
				Ext.getCmp('gridHabilidade').getStore().each(function(_res){
				  var _dataGrid=[];
					for(var _p in _res.data){
					  _dataGrid.push(_res.data[_p]);
					}
					_data.push(_dataGrid);
				});			
				_APP.send({event:\"hab_salvar\",data:Ext.encode(_data),handler:function(_r){
				  Ext.Msg.alert('ATTENTION','Record saved successfully!');
				}});	
			"
		));	
		return $obj;
	}	
	
	private function TBtDel(){
		$obj=new TButton(array(
		  icon=>'images/buttons/delete.png',
			width=>22,
		  handler=>"
				var _data=[];
				Ext.getCmp('gridHabilidade').getStore().each(function(_res){
				  var _dataGrid=[];
					for(var _p in _res.data){
					  _dataGrid.push(_res.data[_p]);
					}
					_data.push(_dataGrid);
				});
				_data.splice(rowIndex,1);
			  Ext.getCmp('gridHabilidade').getStore().loadData(_data);		
			"
		));
		return $obj;
	}
	
  private function TCol1(){
		$obj=new TColumnAction(array(
		  width=>20
		));
		$obj->items->add('bdel',$this->TBtDel());
		return $obj;
	}
	
	private function TCol2(){
		$obj = new TColumn(array(
			header=>'Code',
			dataIndex=>'abi_codigo',
			width=>50
		));
		return $obj;
	}
	
	private function TCol3(){
		$obj = new TColumn(array(
			header=>'Description',
			dataIndex=>'abi_descr',
			width=>700,
			flex=>1
		));
		return $obj;
	}	
	
	public function __construct(){
		
		$toolsWindow = new menuTools();
		
		$this->paging=new TPaging('gridHabilidade','abi_operation',array( 
			columns=>array($this->TCol2(),$this->TCol3(),$this->TCol1()),
			height=>370,
			width=>'100%',
			autoLoad=>false,
			
			eventName=>'hab_getGrid',
			queryMode=>TQueryModeType::$remote
		));
		$this->paging->displayMsg='Page';
		$this->paging->first->iconCls='bpgfirst';
		$this->paging->prev->iconCls='bpgprev';
		$this->paging->next->iconCls='bpgnext';
		$this->paging->last->iconCls='bpglast';		
		$this->grid=$this->paging->getGrid();		
		
		$this->cont=new TContainer(array(				
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>450
		));		
		$this->cont->items->add($this->paging->gridId,$this->grid);
		
		$this->window=new TWindow(array(
			layout=>'fit',
			title=>'Skills',
			width=>800,
			height=>450,
			resizable=>false,
			items=>array($this->cont),
			tools=>array($toolsWindow->btPrint())				
		));
		$btWindow = new menuWindow($this->window,'hab');			
		$this->window->bbar->add('wha_btFill',new TToolbarFill());		
		$this->window->bbar->add('wha_btSalvar',$this->btSalvar());			
		$this->window->bbar->add('wha_btPesq',$this->btPesq());			
		$this->window->onBeforeShow(array("
			setTimeout(function () {
				for(var _i=0;_i<_windows.length;_i++){
				var _win = _windows[_i].toString();
				if(_win.toString()!='winHabilidade')				
					var _o=eval(Ext.getCmp(_win));
					if(typeof(_o)!='undefined')
					  _o.close();
			  }
			},300);		
		"));
		$this->window->onAfterRender(array("
			Ext.EventManager.addListener(winHabilidade.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC) winHabilidade.close();
			});
		  ","
			_APP.send({event:\"hab_getGridCount\",handler:function(_r){
				abi_operation = new Ext.data.Operation({
					start : 0,  //registro inicial
					page  : 1,	//pág. inicial
					count : _r, //passar o count para atualizar a paginacao
					limit :50,  //número de registros por página
					sorters: [  // ordenação da pesquisa																			
					],
					filters: [  // filtros da pesquisa											
					]
				});	
				Ext.getCmp('gridHabilidade').getStore().load(abi_operation);	//atualizar grid
				Ext.getCmp('gridHabilidade_display').setText('<b>Page: 1 - '+Math.ceil(abi_operation.count/abi_operation.limit)+'</b>'); // atualizar texto da páginação				
			}});
			"
		));
	}
	
	public function getWindow(){
		return $this->window;
	}
}

class hab_getGridCount extends TEvent{
  public function execute(){
		$store = json_decode($_SESSION['store']);
	  $sql = mysql_query("select count(perfil) as count from perfil_habilidades where perfil='$store->perfil'");
		echo $sql['count'];
	}
}

class hab_getGrid extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$sql = mysql_query("select b.codigo,b.descricao from perfil_habilidades as a left join habilidade as b on (b.codigo=a.habilidades) where a.perfil='$store->perfil'");
		$arrayResult=array();
		while($res = mysql_fetch_array($sql)){
		  $arrayRes['abi_codigo']=$res['codigo'];
		  $arrayRes['abi_descr']=$res['descricao'];
			array_push($arrayResult,$arrayRes);
		}
		echo '{records:'.json_encode($arrayResult).'}';
	}
}

class hab_salvar extends TEvent{
	public function execute(){
	  $store = json_decode($_SESSION['store']);
		$data = json_decode($this->data);
		$sql = mysql_query("delete from perfil_habilidades where perfil='$store->perfil'");
		for($i=0;$i<count($data);$i++){
			$cod = $data[$i][0];
			$sql = mysql_query("replace into perfil_habilidades values ('$store->perfil','$cod')");	
		}
	  echo $data;
	}
}

class hab_apagar extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$sql = mysql_query("delete from perfil_habilidades where perfil='$store->perfil' and habilidades='$this->data'");
		echo "{success:true,msg:'Record deleted successfully!'}";
	}
}
?>