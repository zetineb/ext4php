<?php
require_once "menuWindow.php"; 
require_once "menuTools.php"; 

class winInformatica { 
	private $form;
	private $container; 		
	private $contL1;
	private $contL2;				
	public $window;
	
	private function TPCodigo(){
		$obj = new THidden(array(
			name=>'inf_pcodigo',
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}
	
	private function TCodigo(){
		$obj = new THidden(array(
			name=>'inf_codigo',
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}
	
	private function TIdioma(){
		$obj = new TText(array(
			name=>'inf_descr',
			fieldLabel=>'Knowledge',
			labelWidth=>510,
			labelAlign=>'top',				
			margin=>'0 0 0 5',				
			width=>510,
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}
	
	public function btPesq(){
		$obj=new TButton(array(
			name=>'inf_btPesq',
			iconCls=>'bsearch',
			iconAlign=>'left',
			margin=>'10 0 0 1',
			scale=>'small',
			text=>'Search',
			width=>85
		));	
		$obj->listeners->add("click","
		  winInforSel.onExit=function(_r){
			  Ext.getCmp('inf_codigo').setValue(_r.codSel);
				Ext.getCmp('inf_descr').setValue(_r.descrSel);
				Ext.getCmp('inf_nivel').focus();
			};
		  winInforSel.show();
		");
		return $obj;
	}		
	
	private function TNivel(){
		$obj = new TCombobox(array(
			name=>'inf_nivel',
			fieldLabel=>'Level',
			labelWidth=>150,
			labelAlign=>'top',
			width=>150,				
			margin=>'0 0 0 5',
			maskRe=>'/[""]/',
			displayField=>'nome',
			valueField=>'nome',
			fields=>array('nome'),
			data=>array(
				array('BASIC'),
				array('INTERMEDIATE'),
				array('ADVANCED'),
				array('PROFICIENT')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('inf_status').focus();
		");
		return $obj;
	}
	
  private function TBtEdit(){
		$obj=new TButton(array(
		  icon=>'images/buttons/edit.png',
			width=>22,
		  handler=>"
				var form = Ext.getCmp('formInformatica').getForm();
				form.load({url:window.location,params:{event:'inf_carregar',codigo:Ext.getCmp('gridInformatica').getStore().getAt(rowIndex).data.inf_pcodigo},waitMsg: 'Loading'});									   
			"
		));
		return $obj;
	}
	
	private function TBtDel(){
		$obj=new TButton(array(
		  icon=>'images/buttons/delete.png',
			width=>22,
		  handler=>"
				_APP.send({event:\"inf_apagar\",data:Ext.getCmp('gridInformatica').getStore().getAt(rowIndex).data.inf_pcodigo,handler:function(_r){
					Ext.Msg.alert('ATTENTION','The record was deleted successfully!');
					_APP.send({event:\"inf_getGridCount\",handler:function(_r){
						inf_operation = new Ext.data.Operation({
							start : 0,
							page  : 1,
							count : _r,
							limit : 50,
							sorters: [													
							],
							filters: [
							]
						});	
						Ext.getCmp('gridInformatica').getStore().load(inf_operation);
						Ext.getCmp('gridInformatica_display').setText('<b>Page: 1 - '+Math.ceil(inf_operation.count/inf_operation.limit)+'</b>');
					}});					
				}});				
			"
		));
		return $obj;
	}	
	
	private function TCol1(){
		$obj = new TColumn(array(
			header=>'Code',
			dataIndex=>'inf_pcodigo',
			width=>60
		));
		return $obj;
  }
	
	private function TCol2(){
		$obj = new TColumn(array(
			header=>'Knowledge',
			dataIndex=>'inf_descr',
			width=>130
		));
		return $obj;
	}	
	
	private function TCol3(){
		$obj = new TColumn(array(
			header=>'Level',
			dataIndex=>'inf_nivel',
			width=>540,
			flex=>1
		));
		return $obj;
	}
	
  private function TCol4(){
		$obj=new TColumnAction(array(
		  width=>20
		));
		$obj->items->add('bedit',$this->TBtEdit());
		return $obj;
	}

  private function TCol5(){
		$obj=new TColumnAction(array(
		  width=>20
		));
		$obj->items->add('bdel',$this->TBtDel());
		return $obj;
	}	
	
	private function TCol6(){
		$obj = new TColumn(array(
			dataIndex=>'inf_codigo',
			hidden=>true
		));
		return $obj;
	}
	
	private function btNovo(){
		$obj=new TButton(array(
			iconCls=>'badd',
			iconAlign=>'left',
			scale=>'small',
			text=>'New',
			width=>60,
			handler=>"
				Ext.getCmp('inf_pcodigo').setValue('');
				Ext.getCmp('inf_codigo').setValue('');
				Ext.getCmp('inf_descr').setValue('');
				Ext.getCmp('inf_nivel').setValue('');	
			"		
		));	
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
				var form = Ext.getCmp('formInformatica').getForm();
				if (form.isValid()){
					form.submit({
						success: function(form, action) {
							Ext.Msg.alert('Success', action.result.msg);
							_APP.send({event:\"inf_getGridCount\",handler:function(_r){
								inf_operation = new Ext.data.Operation({
									start : 0,
									page  : 1,
									count : _r,
									limit :50,
									sorters: [			
									],
									filters: [					
									]
								});	
								Ext.getCmp('gridInformatica').getStore().load(inf_operation);	
								Ext.getCmp('gridInformatica_display').setText('<b>Page: 1 - '+Math.ceil(inf_operation.count/inf_operation.limit)+'</b>');
								Ext.getCmp('inf_pcodigo').setValue('');
								Ext.getCmp('inf_codigo').setValue('');
								Ext.getCmp('inf_descr').setValue('');
								Ext.getCmp('inf_nivel').setValue('');							
							}});							
						},
						failure: function(form, action) {
							Ext.Msg.alert('Failed', action.result.msg);
						}
					});
				}
			"
		));	
		return $obj;
	}

	private function btCancel(){
		$obj=new TButton(array(
			iconCls=>'bcancel',
			iconAlign=>'left',
			scale=>'small',
			text=>'Cancel',
			width=>80,
			handler=>"
				Ext.getCmp('inf_pcodigo').setValue('');
				Ext.getCmp('inf_codigo').setValue('');
				Ext.getCmp('inf_descr').setValue('');
				Ext.getCmp('inf_nivel').setValue('');	
				_APP.send({event:\"inf_getGridCount\",handler:function(_r){
					inf_operation = new Ext.data.Operation({
						start : 0,
						page  : 1,
						count : _r,
						limit :50,
						sorters: [ 							
						],
						filters: [
						]
					});	
					Ext.getCmp('gridInformatica').getStore().load(inf_operation);
					Ext.getCmp('gridInformatica_display').setText('<b>Page: 1 - '+Math.ceil(inf_operation.count/inf_operation.limit)+'</b>');
				}});	
			"
		));	
		return $obj;
	}	
	
  public function __construct(){
		
		$toolsWindow = new menuTools();
		
		$this->contL1 = new TContainer(array(				
			layout=>'hbox',
			height=>45
		));			
		$this->contL1->items->add('inf_pcodigo',$this->TPCodigo());
		$this->contL1->items->add('inf_codigo',$this->TCodigo());
		$this->contL1->items->add('inf_descr',$this->TIdioma());
		$this->contL1->items->add('inf_btPesq',$this->btPesq());
		$this->contL1->items->add('inf_nivel',$this->TNivel());
				
		$this->paging=new TPaging('gridInformatica','inf_operation',array( 
			height=>190,
			enableColumnHide=>true,
			width=>'100%',
			autoLoad=>false,
			eventName=>'inf_getGrid',
			columns=>array($this->TCol1(),$this->TCol2(),$this->TCol3(),$this->TCol4(),$this->TCol5(),$this->TCol6()),
			queryMode=>TQueryModeType::$remote
		));
		$this->paging->displayMsg='Page';
		$this->paging->first->iconCls='bpgfirst';
		$this->paging->prev->iconCls='bpgprev';
		$this->paging->next->iconCls='bpgnext';
		$this->paging->last->iconCls='bpglast';		
		$this->grid=$this->paging->getGrid();
		
		$this->form=new TForm(array(
			frame=>true,
			width=>'100%',
			height=>400,
			eventName=>'inf_salvar',
			autoLoad=>true,
			items=>array($this->contL1)				
		));
		
		$this->cont=new TContainer(array(				
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>400
		));		
		$this->cont->items->add($this->paging->gridId,$this->grid);
		$this->cont->items->add('formInformatica',$this->form);
		
		
		$this->window=new TWindow(array(
			layout=>'fit',
			title=>'Computation',
			width=>800,
			height=>450,
			resizable=>false,
			items=>array($this->cont),
			tools=>array($toolsWindow->btPrint())				
		));	
		$btWindow = new menuWindow($this->window,'inf');
		$this->window->bbar->add('winf_btFill',new TToolbarFill());		
		$this->window->bbar->add('winf_btNovo',$this->btNovo());		
		$this->window->bbar->add('winf_btSalvar',$this->btSalvar());		
		$this->window->bbar->add('winf_btCancel',$this->btCancel());	
		$this->window->onBeforeShow(array("
			setTimeout(function () {
				for(var _i=0;_i<_windows.length;_i++){
				var _win = _windows[_i].toString();
				if(_win.toString()!='winInformatica')				
					var _o=eval(Ext.getCmp(_win));
					if(typeof(_o)!='undefined')
					  _o.close();
			  }
			},300);	
		"
		));		
		$this->window->onAfterRender(array("
			Ext.EventManager.addListener(winInformatica.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC) winInformatica.close();
			});
		","
			_APP.send({event:\"inf_getGridCount\",handler:function(_r){
				inf_operation = new Ext.data.Operation({
					start : 0,
					page  : 1,
					count : _r,
					limit :50,
					sorters: [						
					],
					filters: [					
					]
				});	
				Ext.getCmp('gridInformatica').getStore().load(inf_operation);
				Ext.getCmp('gridInformatica_display').setText('<b>Page: 1 - '+Math.ceil(inf_operation.count/inf_operation.limit)+'</b>');
			}});
			"));
	}
	
	public function getWindow(){
		return $this->window;
	}
}

class inf_getGridCount extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
	  $sql = mysql_fetch_array(mysql_query("select count(perfil) as count from perfil_informatica where perfil='$store->perfil'"));
		echo $sql['count'];		
	}
}

class inf_getGrid extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
	  $sql = mysql_query("select a.codigo as pcodigo,a.nivel,b.codigo,b.descricao from perfil_informatica as a left join informatica as b on (a.informatica=b.codigo) where perfil='$store->perfil'");
		$arrayResult=array();
		while($res = mysql_fetch_array($sql)){
		  $arrayRes['inf_pcodigo']=$res['pcodigo'];
		  $arrayRes['inf_codigo']=$res['codigo'];
		  $arrayRes['inf_descr']=$res['descricao'];
		  $arrayRes['inf_nivel']=$res['nivel'];
			array_push($arrayResult,$arrayRes);
		}
		echo '{records:'.json_encode($arrayResult).'}';
	}
}

class inf_carregar extends TEvent{
	public function execute(){
		$codigo = $_REQUEST['codigo'];
	  $sql = mysql_query("select a.codigo as pcodigo,a.nivel,b.codigo,b.descricao from perfil_informatica as a left join informatica as b on (a.informatica=b.codigo) where a.codigo='$codigo'");
		$res = mysql_fetch_array($sql);
		echo '{success:true,data:{
			inf_pcodigo:"'.$res['pcodigo'].'",
			inf_codigo:"'.$res['codigo'].'",
			inf_descr:"'.$res['descricao'].'",
			inf_nivel:"'.$res['nivel'].'"
		}}';	
	}
}

class inf_salvar extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$inf_pcodigo=$_REQUEST['inf_pcodigo'];
		$inf_codigo=$_REQUEST['inf_codigo'];
		$inf_descr=strtoupper($_REQUEST['inf_descr']);
		$inf_nivel=$_REQUEST['inf_nivel'];
		$verifica = mysql_num_rows(mysql_query("select informatica from perfil_informatica where informatica='$inf_codigo' and perfil='$store->perfil'"));
		if($inf_pcodigo==""){
			//verifica se existe a descricao cadastrada
			$vrfDescr=mysql_query("select a.codigo from perfil_informatica as a left join informatica as b on (a.informatica=b.codigo) where a.perfil='$store->perfil' and b.descricao='$inf_descr'"); 
		  if(mysql_num_rows($vrfDescr)>0){
				$vrfDescr=mysql_fetch_array($vrfDescr);
			  $inf_pcodigo=$vrfDescr['codigo'];
			}else{//se nao pega o ultimo registro
				$sqlCod=mysql_fetch_array(mysql_query("select codigo from perfil_informatica order by codigo desc limit 1"));
				$inf_pcodigo=$sqlCod['codigo']+1;
			}
		}
		$sql = mysql_query("replace into perfil_informatica (codigo,nivel,informatica,perfil) values ('$inf_pcodigo','$inf_nivel','$inf_codigo','$store->perfil')");  	 	 	 	 	 		 	 	 	 	 
		if($verifica>0){
		  echo "{success:true,msg:'Record updated successfully!'}";
		}else{
		  echo "{success:true,msg:'Record registered successfully!'}";
		}
	}
}

class inf_apagar extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$sql = mysql_query("delete from perfil_informatica where perfil='$store->perfil' and codigo='$this->data'");
		echo "{success:true,msg:'Record deleted successfully!'}";
	}
}
?>