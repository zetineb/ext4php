<?php
require_once "menuWindow.php"; 
require_once "menuTools.php"; 

class winFone { 
	private $form;
	private $container; 		
	private $contL1;
	private $contL2;				
	public $window;
	
	private function TCodigo(){
		$obj = new TText(array(
			name=>'fon_codigo',
			fieldLabel=>'Code',
			value=>'',
			labelWidth=>60,
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
			Ext.getCmp('fon_ddd').focus();
		");
		return $obj;
	}
	
	private function TDdd(){
		$obj = new TText(array(
			name=>'fon_ddd',
			fieldLabel=>'DDD',
			value=>'',
			labelWidth=>40,
			labelAlign=>'top',		
			maskRe=>'/[0-9]/',			
			margin=>'0 0 0 5',
			width=>40,
			maxLength=>2,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('fon_numero').focus();
		");
		return $obj;
	}

	private function TFone(){
		$obj = new TText(array(
			name=>'fon_numero',
			value=>'',
			fieldLabel=>'Phone',
			labelWidth=>130,
			labelAlign=>'top',				
			margin=>'0 0 0 5',			
			maskRe=>'/[0-9]/',			
			width=>130,
			maxLength=>9,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13){
			Ext.getCmp('fon_tipo').focus();
		}else{		
				if(eventObj.getKey()!=8){
					var _str = Ext.getCmp('fon_numero').getValue();
					if(_str.length==4)
						_str = _str.substr(0,4)+'-'+_str.substr(4,1);
					Ext.getCmp('fon_numero').setValue(_str);
				}
			}
		");
		return $obj;
	}
	
	private function TTipo(){
		$obj = new TCombobox(array(
			name=>'fon_tipo',
			fieldLabel=>'Type',
			labelWidth=>150,
			labelAlign=>'top',
			width=>150,			
			value=>'',
			margin=>'0 0 0 5',
			displayField=>'nome',
			maskRe=>'/[""]/',
			valueField=>'nome',
			fields=>array('nome'),
			data=>array(
				array('RESIDENTIAL'),
				array('COMMERCIAL'),
				array('MOBILE'),
				array('MESSAGE')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('fon_status').focus();
		");
		return $obj;
	}
	
	private function TStatus(){
		$obj = new TCombobox(array(
			name=>'fon_status',
			fieldLabel=>'Status',
			labelWidth=>150,
			labelAlign=>'top',
			width=>150,		
			value=>'',			
			margin=>'0 0 0 5',
			displayField=>'nome',
			maskRe=>'/[""]/',
			valueField=>'nome',
			fields=>array('nome'),
			data=>array(
				array('ACTIVE'),
				array('INACTIVE')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('fon_obs').focus();
		");
		return $obj;
	}	
	
	private function TObs(){
		$obj = new TTextArea(array(
			name=>'fon_obs',
			fieldLabel=>'Note',
			value=>'',
			labelWidth=>777,
			labelAlign=>'top',				
			margin=>'0 0 0 0',				
			width=>777,
			height=>80,
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}
	
  private function TBtEdit(){
		$obj=new TButton(array(
		  icon=>'images/buttons/edit.png',
			width=>22,
		  handler=>"
				var form = Ext.getCmp('formFone').getForm();
				form.load({url:window.location,params:{event:'fon_carregar',codigo:Ext.getCmp('gridFone').getStore().getAt(rowIndex).data.fon_codigo},waitMsg: 'Loading'});									   
			"
		));
		return $obj;
	}
	
	private function TBtDel(){
		$obj=new TButton(array(
		  icon=>'images/buttons/delete.png',
			width=>22,
		  handler=>"
				_APP.send({event:\"fon_apagar\",data:Ext.getCmp('gridFone').getStore().getAt(rowIndex).data.fon_codigo,handler:function(_r){
					Ext.Msg.alert('ATTENTION','Record deleted successfully!');
					_APP.send({event:\"fon_getGridCount\",handler:function(_r){
						fon_operation = new Ext.data.Operation({
							start : 0,
							page  : 1,
							count : _r,
							limit : 50,
							sorters: [													
							],
							filters: [
							]
						});	
						Ext.getCmp('gridFone').getStore().load(fon_operation);
						Ext.getCmp('gridFone_display').setText('<b>Page: 1 - '+Math.ceil(fon_operation.count/fon_operation.limit)+'</b>');
					}});					
				}});				
			"
		));
		return $obj;
	}	
	
	private function TCol1(){
		$obj = new TColumn(array(
			header=>'Code',
			dataIndex=>'fon_codigo',
			width=>60
		));
		return $obj;
  }

	private function TCol2(){
		$obj = new TColumn(array(
			header=>'Phone',
			dataIndex=>'fon_numero',
			width=>100
		));
		return $obj;
	}
	
	private function TCol3(){
		$obj = new TColumn(array(
			header=>'Type',
			dataIndex=>'fon_tipo',
			width=>130
		));
		return $obj;
	}	
	
	private function TCol4(){
		$obj = new TColumn(array(
			header=>'Note',
			dataIndex=>'fon_obs',
			width=>400,
			flex=>1
		));
		return $obj;
	}
	
  private function TCol5(){
		$obj = new TColumn(array(
			header=>'DDD',
			dataIndex=>'fon_ddd',
			width=>40
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
				Ext.getCmp('fon_codigo').setValue('');
				Ext.getCmp('fon_ddd').setValue('');
				Ext.getCmp('fon_numero').setValue('');
				Ext.getCmp('fon_tipo').setValue('');
				Ext.getCmp('fon_status').setValue('');
				Ext.getCmp('fon_obs').setValue('');
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
			  if(Ext.getCmp('fon_ddd').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Write DDD');
				}else if(Ext.getCmp('fon_numero').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Write number');
				}else if(Ext.getCmp('fon_tipo').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Select type');
				}else if(Ext.getCmp('fon_status').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Select status');
				}else{			
					var form = Ext.getCmp('formFone').getForm();
					if (form.isValid()){
						form.submit({
							success: function(form, action) {
								Ext.Msg.alert('Success', action.result.msg);
								_APP.send({event:\"fon_getGridCount\",handler:function(_r){
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
									Ext.getCmp('gridFone').getStore().load(fon_operation);	
									Ext.getCmp('gridFone_display').setText('<b>Page: 1 - '+Math.ceil(fon_operation.count/fon_operation.limit)+'</b>');
									Ext.getCmp('fon_codigo').setValue('');
									Ext.getCmp('fon_ddd').setValue('');
									Ext.getCmp('fon_numero').setValue('');
									Ext.getCmp('fon_tipo').setValue('');
									Ext.getCmp('fon_status').setValue('');
									Ext.getCmp('fon_obs').setValue('');								
								}});							
							},
							failure: function(form, action) {
								Ext.Msg.alert('Failed', action.result.msg);
							}
						});
					}
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
				Ext.getCmp('fon_codigo').setValue('');
				Ext.getCmp('fon_ddd').setValue('');
				Ext.getCmp('fon_numero').setValue('');
				Ext.getCmp('fon_tipo').setValue('');
				Ext.getCmp('fon_status').setValue('');
				Ext.getCmp('fon_obs').setValue('');
				_APP.send({event:\"fon_getGridCount\",handler:function(_r){
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
					Ext.getCmp('gridFone').getStore().load(fon_operation);
					Ext.getCmp('gridFone_display').setText('<b>Page: 1 - '+Math.ceil(fon_operation.count/fon_operation.limit)+'</b>');
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
		$this->contL1->items->add('fon_codigo',$this->TCodigo());
		$this->contL1->items->add('fon_ddd',$this->TDdd());
		$this->contL1->items->add('fon_numero',$this->TFone());
		$this->contL1->items->add('fon_tipo',$this->TTipo());
		$this->contL1->items->add('fon_status',$this->TStatus());
		
		$this->contL2 = new TContainer(array(
			layout=>'hbox',
			height=>80
		));
		$this->contL2->items->add('fon_obs',$this->TObs());
		
		$this->paging=new TPaging('gridFone','fon_operation',array( 
			height=>190,
			width=>'100%',
			autoLoad=>false,
			eventName=>'fon_getGrid',
			columns=>array($this->TCol1(),$this->TCol5(),$this->TCol2(),$this->TCol3(),$this->TCol4(),$this->TCol6(),$this->TCol7()),
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
			eventName=>'fon_salvar',
			autoLoad=>true,
			items=>array($this->contL1,$this->contL2)				
		));
		
		$this->cont=new TContainer(array(				
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>400
		));		
		$this->cont->items->add($this->paging->gridId,$this->grid);
		$this->cont->items->add('formFone',$this->form);
		
		
		$this->window=new TWindow(array(
			layout=>'fit',
			title=>'Phones',
			width=>800,
			height=>450,
			resizable=>false,
			items=>array($this->cont),
			tools=>array($toolsWindow->btPrint())				
		));	
		$btWindow = new menuWindow($this->window,'fon');
		$this->window->bbar->add('wfon_btFill',new TToolbarFill());		
		$this->window->bbar->add('wfon_btNovo',$this->btNovo());		
		$this->window->bbar->add('wfon_btSalvar',$this->btSalvar());		
		$this->window->bbar->add('wfon_btCancel',$this->btCancel());			
		$this->window->onBeforeShow(array("
			setTimeout(function () {
				for(var _i=0;_i<_windows.length;_i++){
				var _win = _windows[_i].toString();
				if(_win.toString()!='winFone')				
					var _o=eval(Ext.getCmp(_win));
					if(typeof(_o)!='undefined')
					  _o.close();
			  }
			},300);	
		"));		
		$this->window->onAfterRender(array("
			Ext.EventManager.addListener(winFone.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC) winFone.close();
			});
		","
			_APP.send({event:\"fon_getGridCount\",handler:function(_r){
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
				Ext.getCmp('gridFone').getStore().load(fon_operation);
				Ext.getCmp('gridFone_display').setText('<b>Page: 1 - '+Math.ceil(fon_operation.count/fon_operation.limit)+'</b>');
			}});
			"
		));
	}
	
	public function getWindow(){
		return $this->window;
	}
}

class fon_getGridCount extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
	  $sql = mysql_fetch_array(mysql_query("select count(fones) as count from perfil_fones where perfil='$store->perfil'"));
		echo $sql['count'];		
	}
}

class fon_getGrid extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
	  $sql = mysql_query("select a.fones,a.perfil, b.* from perfil_fones as a left join fone as b on (a.fones=b.codigo) where a.perfil='$store->perfil'");
		$arrayResult=array();
		while($res = mysql_fetch_array($sql)){
		  $arrayRes['fon_codigo']=$res['codigo'];
		  $arrayRes['fon_ddd']=$res['ddd'];
		  $arrayRes['fon_numero']=$res['numero'];
		  $arrayRes['fon_tipo']=$res['tipo'];
		  $arrayRes['fon_obs']=$res['obs'];
			array_push($arrayResult,$arrayRes);
		}
		echo '{records:'.json_encode($arrayResult).'}';
	}
}

class fon_carregar extends TEvent{
	public function execute(){
		$codigo = $_REQUEST['codigo'];
	  $sql = mysql_query("select * from fone where codigo='$codigo'");
		$res = mysql_fetch_array($sql);
		echo '{success:true,data:{
			fon_codigo:"'.$res['codigo'].'",
			fon_ddd:"'.$res['ddd'].'",
			fon_numero:"'.$res['numero'].'",
			fon_tipo:"'.$res['tipo'].'",
			fon_obs:"'.removeWhiteLine($res['obs']).'",
			fon_status:"'.$res['status'].'"
		}}';	
	}
}

class fon_salvar extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$fon_codigo=$_REQUEST['fon_codigo'];
		$fon_ddd=$_REQUEST['fon_ddd'];
		$fon_numero=$_REQUEST['fon_numero'];
		$fon_tipo=$_REQUEST['fon_tipo'];
		$fon_obs=strtoupper($_REQUEST['fon_obs']);
		$fon_status=$_REQUEST['fon_status'];
		$verifica = mysql_num_rows(mysql_query("select codigo from fone where codigo='$fon_codigo'"));
		$sql = mysql_query("replace into fone (codigo,ddd,numero,obs,status,tipo) values ('$fon_codigo','$fon_ddd','$fon_numero','$fon_obs','$fon_status','$fon_tipo')");  	 	 	 	 	 		 	 	 	 	 
		if($fon_codigo==""){
		  $sqlFonCod=mysql_fetch_array(mysql_query("select codigo from fone order by codigo desc limit 1"));
			$fon_codigo=$sqlFonCod['codigo'];
		}
		$sql = mysql_query("replace into perfil_fones (perfil,fones) values ('$store->perfil','$fon_codigo')");  	 	 	 	 	 		 	 	 	 	 
		if($verifica>0){
		  echo "{success:true,msg:'Record updated successfully!'}";
		}else{
		  echo "{success:true,msg:'Record registered successfully!'}";
		}
	}
}

class fon_apagar extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$sql = mysql_query("delete from perfil_fones where perfil='$store->perfil' and fones='$this->data'");
		echo "{success:true,msg:'Record deleted successfully!'}";
	}
}
?>