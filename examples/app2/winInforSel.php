<?php
require_once "menuTools.php"; 

class winInforSel { 
	private $form;
	private $formPesq;
	private $container; 		
	private $paging;
	private $grid;
	private $contL1;				
	public $window;
	
	private function TPesquisa(){
	  $obj=new TText(array(
		  name=>'con_pesquisar',
			fieldLabel=>'Search',
			labelWidth=>60,
			width=>640,
			margin=>'0 0 5 0',
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
			  Ext.getCmp('con_bpesquisas').focus();
		");
		return $obj;
	}
	
	private function TButtonPesq(){
	  $obj=new TButton(array(
		  text=>"Filter",		
			margin=>'0 0 0 7',
			width=>60,
			iconCls=>'bfilter',
			iconAlign=>'left',
			handler=>"
				var form = Ext.getCmp('formConhePesq').getForm();			
				if (form.isValid()) {
					form.submit({
						success: function(form, action) {
							con_operation = new Ext.data.Operation({
								start : 0,  //registro inicial
								page  : 1,	//pág. inicial
								count : action.result.count,  //passar o count para atualizar a paginacao
								limit :50,  //número de registros por página
								sorters: [  // ordenação da pesquisa
									new Ext.util.Sorter({
											property : 'descricao',
											direction: 'ASC'
									})												
								],
								filters: [  // filtros da pesquisa
									new Ext.util.Filter({
											property: 'descricao',
											value   : Ext.getCmp('con_pesquisar').getValue()
									})												
								]
							});	
							Ext.getCmp('gridConhe').getStore().load(con_operation);	//atualizar grid
							Ext.getCmp('gridConhe_display').setText('<b>Page: 1 - '+Math.ceil(con_operation.count/con_operation.limit)+'</b>'); // atualizar texto da páginação
						}
					});
				}
			"					
		));
		return $obj;
	}
	
	private function TCodigo(){
		$obj = new TText(array(
			name=>'con_codigo',
			fieldLabel=>'Code',
			value=>'',
			labelWidth=>60,
			readOnly=>true,
			labelAlign=>'top',				
			margin=>'0 0 0 0',
			width=>60,
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('con_descr').focus();
		");
		return $obj;
	}
	
	private function TDescr(){
		$obj = new TText(array(
			name=>'con_descr',
			fieldLabel=>'Description',
			value=>'',
			labelWidth=>360,
			labelAlign=>'top',				
			margin=>'0 0 0 5',
			width=>695,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('wcon_btSalvar').focus();
		");
		return $obj;
	}
	
  private function TBtEdit(){
		$obj=new TButton(array(
		  icon=>'images/buttons/edit.png',
			width=>22,
		  handler=>"
			var form = Ext.getCmp('formConhe').getForm();
				form.load({url:window.location,params:{event:'inf_carregarSelConhe',codigo:Ext.getCmp('gridConhe').getStore().getAt(rowIndex).data.con_codigo},waitMsg: 'Loading'});									   
			"
		));
		return $obj;
	}
	
	private function TButtonSel(){
	  $obj = new TButton(array(
		  text=>"Select",
			margin=>'2 0 0 2',
			width=>85,
			iconCls=>'bselect',
			iconAlign=>'left',
			handler=>"
				if(typeof(con_ret)!='undefined')
			    winInforSel.close();
				else
				  Ext.Msg.alert('ATTENTION','Selecione um Knowledge.');
			"
		));
		return $obj;
	}

	private function TButtonBack(){
	  $obj = new TButton(array(
		  text=>"Back",
			margin=>'2 0 0 2',
			width=>65,
			iconCls=>'bback',
			iconAlign=>'left',
			handler=>"
				con_ret = {
					codSel:\"\",
					descrSel:\"\"
				};
			  winInforSel.close();
			"
		));
		return $obj;
	}
	
	private function TBtDel(){
		$obj=new TButton(array(
			icon=>'images/buttons/delete.png',
			width=>22,
			handler=>"_APP.send({event:\"inf_apagarSel\",data:Ext.getCmp('gridConhe').getStore().getAt(rowIndex).data.con_codigo,handler:function(_r){
					Ext.Msg.alert('ATTENTION','The record was deleted successfully!');
					_APP.send({event:\"inf_getGridCountSel\",handler:function(_r){
						con_operation = new Ext.data.Operation({
							start : 0,
							page  : 1,
							count : _r,
							limit : 50,
							sorters: [													
							],
							filters: [
							]
						});	
						Ext.getCmp('gridConhe').getStore().load(con_operation);
						Ext.getCmp('gridConhe_display').setText('<b>Page: 1 - '+Math.ceil(con_operation.count/con_operation.limit)+'</b>');
					}});					
				}});"
		));
		return $obj;
	}	
	
	private function TCol1(){
		$obj = new TColumn(array(
			header=>'Code',
			dataIndex=>'con_codigo',
			width=>60
		));
		return $obj;
  }

	private function TCol2(){
		$obj = new TColumn(array(
			header=>'Description',
			dataIndex=>'con_descr',
			width=>710,
			flex=>1
		));
		return $obj;
	}	
	
	private function TCol6(){
		$obj=new TColumnAction(array(
		  width=>20
		));
		$obj->items->add('bedit',$this->TBtEdit());
		return $obj;
	}

	private function TCol7(){
		$obj=new TColumnAction(array(
		  width=>20
		));
		$obj->items->add('bdel',$this->TBtDel());
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
				Ext.getCmp('con_codigo').setValue('');
				Ext.getCmp('con_descr').setValue('');
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
			width=>70,
			handler=>"
			if (Ext.getCmp('con_descr').getValue() == ''){
				Ext.Msg.alert('Atenção','Campo Description está vazio');
				Ext.getCmp('con_descr').focus();
			}else {
				var form = Ext.getCmp('formConhe').getForm();
				if (form.isValid()){
					form.submit({
						success: function(form, action) {
							Ext.Msg.alert('Success', action.result.msg);
							_APP.send({event:\"inf_getGridCountSel\",handler:function(_r){
								con_operation = new Ext.data.Operation({
									start : 0,
									page  : 1,
									count : _r,
									limit :50,
									sorters: [			
									],
									filters: [					
									]
								});	
								Ext.getCmp('gridConhe').getStore().load(con_operation);	
								Ext.getCmp('gridConhe_display').setText('<b>Page: 1 - '+Math.ceil(con_operation.count/con_operation.limit)+'</b>');
								Ext.getCmp('con_codigo').setValue('');
								Ext.getCmp('con_descr').setValue('');								
							}});							
						},
						failure: function(form, action) {
							Ext.Msg.alert('Failed', action.result.msg);
						}
					});
				}
			}"
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
				Ext.getCmp('con_codigo').setValue('');
				Ext.getCmp('con_descr').setValue('');
				_APP.send({event:\"inf_getGridCountSel\",handler:function(_r){
					fon_operation = new Ext.data.Operation({
						start : 0,
						page  : 1,
						count : _r,
						limit :50,
						sorters: [ 							
						],
						filters: [
						]
					});	
					Ext.getCmp('gridConhe').getStore().load(fon_operation);
					Ext.getCmp('gridConhe_display').setText('<b>Page: 1 - '+Math.ceil(con_operation.count/con_operation.limit)+'</b>');
				}});	"
		));	
		return $obj;
	}	
	
  public function __construct(){
		
		$toolsWindow = new menuTools();
		
		$this->contL1 = new TContainer(array(				
			layout=>'hbox',
			height=>45
		));				
		$this->contL1->items->add('con_codigo',$this->TCodigo());
		$this->contL1->items->add('con_descr',$this->TDescr());
		
		$this->contL2 = new TContainer(array(				
			layout=>'hbox',
			height=>30
		));	
		$this->contL2->items->add('con_pesquisar',$this->TPesquisa());
		$this->contL2->items->add('con_bpesquisas',$this->TButtonPesq());
		
		$this->paging=new TPaging('gridConhe','con_operation',array( 
			height=>350,
			width=>'100%',
			autoLoad=>false,
			eventName=>'inf_getGridSel',
			columns=>array($this->TCol1(),$this->TCol2()/* somente para admin,$this->TCol6(),$this->TCol7()*/),
			queryMode=>TQueryModeType::$remote
		));
		$this->paging->displayMsg='Page';
		$this->paging->first->iconCls='bpgfirst';
		$this->paging->prev->iconCls='bpgprev';
		$this->paging->next->iconCls='bpgnext';
		$this->paging->last->iconCls='bpglast';		
		$this->grid=$this->paging->getGrid();
		$this->grid->onItemClick("
			con_ret = {
			  codSel:Ext.getCmp('gridConhe').getStore().getAt(index).data.con_codigo,
				descrSel:Ext.getCmp('gridConhe').getStore().getAt(index).data.con_descr
			};
			"
		);
		$this->grid->onItemDblClick("
			con_ret = {
			  codSel:Ext.getCmp('gridConhe').getStore().getAt(index).data.con_codigo,
				descrSel:Ext.getCmp('gridConhe').getStore().getAt(index).data.con_descr
			};
			winInforSel.close();
			"
		);
		
		$this->form=new TForm(array(
			frame=>true,
			width=>'100%',
			height=>400,
			eventName=>'inf_salvarSel',
			//autoLoad=>true,
			items=>array($this->contL1)				
		));
		
		$this->formPesq=new TForm(array(
			frame=>true,
			width=>'100%',
			height=>35,
			eventName=>'inf_getGridCountSel',
			//autoLoad=>true,
			items=>array($this->contL2)				
		));
		
		$this->cont=new TContainer(array(				
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>450
		));		
		$this->cont->items->add('formConhePesq',$this->formPesq);
		$this->cont->items->add($this->paging->gridId,$this->grid);
		/* somente para admin
		$this->cont->items->add('formConhe',$this->form);
		*/
		
		$this->window=new TWindow(array(
			layout=>'fit',
			title=>'Select a Knowledge',
			width=>800,
			height=>450,
			resizable=>false,
			items=>array($this->cont),
			tools=>array($toolsWindow->btPrint())				
		));	
		$this->window->bbar->add('wcon_btFill',new TToolbarFill());	
		/* somente para admin
		$this->window->bbar->add('wcon_btNovo',$this->btNovo());	
		$this->window->bbar->add('wcon_btSalvar',$this->btSalvar());		
		$this->window->bbar->add('wcon_btCancel',$this->btCancel());
		*/
		$this->window->bbar->add('wcon_btback',$this->TButtonBack());
		$this->window->bbar->add('wcon_btselect',$this->TButtonSel());
		$this->window->onBeforeHide(array("this.onExit(con_ret);"));		
		$this->window->onAfterRender(array("
			Ext.EventManager.addListener(winInforSel.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC){
					con_ret = {
						codSel:\"\",
						descrSel:\"\"
					};
					winInforSel.close();				
				}
			});
		","
			_APP.send({event:\"inf_getGridCountSel\",handler:function(_r){
			var result = Ext.decode(_r);
				con_operation = new Ext.data.Operation({
					start : 0,
					page  : 1,
					count : result.count,
					limit :50,
					sorters: [						
					],
					filters: [					
					]
				});	
				Ext.getCmp('gridConhe').getStore().load(con_operation);
				Ext.getCmp('gridConhe_display').setText('<b>Page: 1 - '+Math.ceil(con_operation.count/con_operation.limit)+'</b>');
				
			}});
		"));
	}
	
	public function getWindow(){
		return $this->window;
	}
}

class inf_getGridCountSel extends TEvent{
	public function execute(){	
		if($this->filter!=''){ 
			$filter = json_decode($this->filter);
			$pesq = $filter[0]->value;			
		}else{ 
			$pesq=''; 
		}
		$where="where ";
		if($pesq!=""){
		  $where.="descricao like '%".$pesq."%'";
		}
		if($where=="where "){
		  $where="";
		}
		$sql = mysql_fetch_array(mysql_query("select count(codigo) as count from informatica $where"));
			echo "{success:true,count:".$sql['count']."}";		
	}
}

class inf_getGridSel extends TEvent{
	public function execute(){
		if($this->filter!=''){ 
			$filter = json_decode($this->filter);
			$pesq = $filter[0]->value;			
		}else{ 
			$pesq=''; 
		}
		$where="where ";
		if($pesq!=""){
		  $where.="descricao like '%".$pesq."%'";
		}else {
			$where="";
		}
		$sql = mysql_query("select * from informatica $where limit $this->start,$this->limit");
		$arrayResult=array();
		while($res = mysql_fetch_array($sql)){
		  $arrayRes['con_codigo']=$res['codigo'];
		  $arrayRes['con_descr']=$res['descricao'];
			array_push($arrayResult,$arrayRes);
		}
		echo '{records:'.json_encode($arrayResult).'}';
	}
}

class inf_carregarSel extends TEvent{
	public function execute(){
		if(isset($_REQUEST['codigo'])) $codigo = $_REQUEST['codigo']; else $codigo=0;		
	  $sql = mysql_query("select * from informatica where codigo='$codigo'");
		$res = mysql_fetch_array($sql);
		echo '{success:true,data:{
			con_codigo:"'.$res['codigo'].'",
			con_descr:"'.$res['descricao'].'"
		}}';	
	}
}

class inf_salvarSel extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
			if(isset($_REQUEST['con_codigo'])) $con_codigo = $_REQUEST['con_codigo']; else $con_codigo;
			if(isset($_REQUEST['con_descr'])) $con_descr = $_REQUEST['con_descr']; else $con_descr;		
		if ($con_codigo == ''){
			$sql = mysql_query("insert into informatica values ('','$con_descr',0)");
		}else {
			$sql = mysql_query("update informatica set descricao='$con_descr' where codigo='$con_codigo'");
		}
		$verifica = mysql_num_rows(mysql_query("select codigo from informatica where codigo='$con_codigo'"));	 	 		 	 	 	 	 
		if($verifica>0){
		  echo "{success:true,msg:'Record updated successfully!'}";
		}else{
		  echo "{success:true,msg:'Record registered successfully!'}";
		}
	}
}

class inf_apagarSel extends TEvent{
	public function execute(){
		$sql = mysql_query("delete from informatica where codigo='$this->data'");
		echo "{success:true,msg:'Record deleted successfully!'}";
	}
}
?>