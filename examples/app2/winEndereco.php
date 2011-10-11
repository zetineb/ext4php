<?php
require_once "menuWindow.php"; 
require_once "menuTools.php"; 

class winEndereco { 
	private $form;
	private $container; 			
	private $paging;		
	private $grid;		
	public $window;
	
	private function TCodigo(){
		$obj = new TText(array(
			name=>'end_codigo',
			fieldLabel=>'Code',
			value=>'',
			labelWidth=>75,
			labelAlign=>'top',				
			margin=>'0 0 0 0',				
			width=>75,
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('end_tipo_logradouro').focus();
		");
		return $obj;
	}

	private function TLogradouroCombo(){			
		$obj = new TCombobox(array(
			name=>'end_tipo_logradouro',
			fieldLabel=>'Address Type',
			labelWidth=>100,
			labelAlign=>'top',
			width=>100,			
			margin=>'0 0 0 5',
			displayField=>'nome',
			valueField=>'nome',
			maskRe=>'/[""]/',
			fields=>array('nome'),
			data=>array(
				array('AVENUE'),
				array('ROAD'),
				array('SQUARE'),
				array('HIGHWAY'),
				array('STREET'),
				array('PLATTER')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('end_logradouro').focus();
		");
		return $obj;
	}
	
	private function TLogradouro(){
		$obj = new TText(array(
			name=>'end_logradouro',
			fieldLabel=>'Address',
			value=>'',
			labelWidth=>305,
			labelAlign=>'top',
			margin=>'0 0 0 5',				
			width=>305,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('end_numero').focus();
		");
		return $obj;
	}
	
	private function TNumero(){
		$obj = new TText(array(
			name=>'end_numero',
			fieldLabel=>'Number',
			value=>'',
			labelWidth=>80,
			labelAlign=>'top',
			maskRe=>'/[0-9]/',
			margin=>'0 0 0 5',				
			width=>80,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('end_complemento').focus();
		");
		return $obj;
	}
	
	private function TComplemento(){
		$obj = new TText(array(
			name=>'end_complemento',
			fieldLabel=>'Complement',
			value=>'',
			labelWidth=>175,
			labelAlign=>'top',
			margin=>'0 0 0 5',				
			width=>175,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('end_bairro').focus();
		");
		return $obj;
	}
	
	private function TBairro(){
		$obj = new TText(array(
			name=>'end_bairro',
			fieldLabel=>'District',
			value=>'',
			labelWidth=>143,
			labelAlign=>'top',
			margin=>'0 0 0 0',				
			width=>143,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('end_btPesq').focus();
		");
		return $obj;
	}
	
	private function TCidade(){
		$obj = new TText(array(
			name=>'end_cidade',
			fieldLabel=>'City',
			value=>'',
			labelWidth=>260,
			labelAlign=>'top',
			margin=>'0 0 0 5',				
			width=>260,
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('end_btPesq').focus();
		");
		return $obj;
	}
	
	private function TUF(){
		$obj = new TText(array(
			name=>'end_uf',
			fieldLabel=>'State',
			value=>'',
			labelWidth=>45,
			labelAlign=>'top',
			margin=>'0 0 0 5',				
			width=>45,
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('end_btPesq').focus();
		");
		return $obj;
	}
	
	private function btPesq(){
		$obj=new TButton(array(
			name=>'end_btPesq',
			iconCls=>'bsearch',
			iconAlign=>'left',
			margin=>'10 0 0 1',
			scale=>'small',
			text=>'Search',
			width=>85
		));	
		$obj->listeners->add("click","
		  winCidadeSel.onExit=function(_r){
			  Ext.getCmp('end_cidade').setValue(_r.cidSel);
				Ext.getCmp('end_uf').setValue(_r.ufSel);
				Ext.getCmp('end_cep').focus();
			};
		  winCidadeSel.show();
		");
		return $obj;
	}	
	
	private function TCep(){
		$obj = new TText(array(
			name=>'end_cep',
			fieldLabel=>'Zip Code',
			value=>'',
			labelWidth=>100,
			labelAlign=>'top',
			margin=>'0 0 0 5',				
			width=>100,
			maxLength=>9,
			maskRe=>'/[0-9]/',
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13){
			Ext.getCmp('end_caixa_postal').focus();
		}else{		
			if(eventObj.getKey()!=8){
				var _str = Ext.getCmp('end_cep').getValue();
				if(_str.length==5)
					_str = _str.substr(0,5)+'-'+_str.substr(5,1);
				Ext.getCmp('end_cep').setValue(_str);
			}
		}
		");
		return $obj;
	}
	
	private function TPostal(){
		$obj = new TText(array(
			name=>'end_caixa_postal',
			fieldLabel=>'Post Office Box',
			value=>'',
			labelWidth=>100,
			labelAlign=>'top',
			margin=>'0 0 0 5',				
			width=>100,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('end_tipo').focus();
		");
		return $obj;
	}
	
	private function TTipo(){
		$obj = new TCombobox(array(
			name=>'end_tipo',
			fieldLabel=>'Type',
			value=>'',
			labelWidth=>150,
			labelAlign=>'top',
			width=>150,				
			margin=>'0 0 0 0',
			displayField=>'nome',
			valueField=>'nome',
			maskRe=>'/[""]/',
			fields=>array('nome'),
			data=>array(
				array('RESIDENTIAL'),
				array('COMMERCIAL')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
			Ext.getCmp('end_status').focus();
		");
		return $obj;
	}
	
	private function TStatus(){
		$obj = new TCombobox(array(
			name=>'end_status',
			fieldLabel=>'Status',
			labelWidth=>150,
			labelAlign=>'top',
			width=>150,				
			maskRe=>'/[""]/',
			margin=>'0 0 0 5',
			displayField=>'nome',
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
			Ext.getCmp('btSalvar').focus();
		");
		return $obj;
	}	
	
	private function TContL1(){
		$obj = new TContainer(array(				
			layout=>'hbox',
			height=>45
		));			
		$obj->items->add('end_codigo',$this->TCodigo());
		$obj->items->add('end_tipo_logradouro',$this->TLogradouroCombo());
		$obj->items->add('end_logradouro',$this->TLogradouro());
		$obj->items->add('end_numero',$this->TNumero());
		$obj->items->add('end_complemento',$this->TComplemento());
		return $obj;
	}

	private function TContL2(){
		$obj = new TContainer(array(
			layout=>'hbox',
			height=>45
		));
		$obj->items->add('end_bairro',$this->TBairro());
		$obj->items->add('end_cidade',$this->TCidade());
		$obj->items->add('end_uf',$this->TUF());
		$obj->items->add('end_btPesq',$this->btPesq());
		$obj->items->add('end_cep',$this->TCep());
		$obj->items->add('end_caixa_postal',$this->TPostal());
		return $obj;
	}
		
	private function TContL3(){
		$obj = new TContainer(array(
			layout=>'hbox',
			height=>45
		));
		$obj->items->add('end_tipo',$this->TTipo());
		$obj->items->add('end_status',$this->TStatus());		
		return $obj;
	}

	private function TBtEdit(){
		$obj=new TButton(array(
		  icon=>'images/buttons/edit.png',
			width=>22,
		  handler=>"
				var form = Ext.getCmp('end_form').getForm();
				form.load({url:window.location,params:{event:'end_carregar',codigo:Ext.getCmp('gridEndereco').getStore().getAt(rowIndex).data.end_codigo},waitMsg: 'Loading'});									   
			"
		));
		return $obj;
	}
	
	private function TBtDel(){
		$obj=new TButton(array(
		  icon=>'images/buttons/delete.png',
			width=>22,
		  handler=>"
				_APP.send({event:\"end_apagar\",data:Ext.getCmp('gridEndereco').getStore().getAt(rowIndex).data.end_codigo,handler:function(_r){
					Ext.Msg.alert('ATTENTION','Record deleted successfully!');
					_APP.send({event:\"end_getGridCount\",handler:function(_r){
						end_operation = new Ext.data.Operation({
							start : 0,  //registro inicial
							page  : 1,	//pág. inicial
							count : _r, //passar o count para atualizar a paginacao
							limit : 50,  //número de registros por página
							sorters: [  // ordenação da pesquisa																			
							],
							filters: [  // filtros da pesquisa											
							]
						});	
						Ext.getCmp('gridEndereco').getStore().load(end_operation);	//atualizar grid
						Ext.getCmp('gridEndereco_display').setText('<b>Page: 1 - '+Math.ceil(end_operation.count/end_operation.limit)+'</b>'); // atualizar texto da páginação				
					}});					
				}});				
			"
		));
		return $obj;
	}
		
	private function TCol1(){
		$obj = new TColumn(array(
			header=>'Address',
			dataIndex=>'end_logradouro',
			width=>440,
			flex=>1
		));
		return $obj;
	}
	
	private function TCol2(){
		$obj = new TColumn(array(
			header=>'Number',
			dataIndex=>'end_numero',
			width=>100
		));
		return $obj;
	}
	
	private function TCol3(){
		$obj = new TColumn(array(
			header=>'District',
			dataIndex=>'end_bairro',
			width=>130
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
			header=>'Code',
			dataIndex=>'end_codigo',
			width=>60
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
				Ext.getCmp('end_codigo').setValue('');
				Ext.getCmp('end_tipo_logradouro').setValue('');
				Ext.getCmp('end_logradouro').setValue('');
				Ext.getCmp('end_numero').setValue('');
				Ext.getCmp('end_complemento').setValue('');
				Ext.getCmp('end_bairro').setValue('');
				Ext.getCmp('end_cidade').setValue('');
				Ext.getCmp('end_uf').setValue('');
				Ext.getCmp('end_cep').setValue('');
				Ext.getCmp('end_caixa_postal').setValue('');
				Ext.getCmp('end_tipo').setValue('');
				Ext.getCmp('end_status').setValue('');
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
			  if(Ext.getCmp('end_tipo_logradouro').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Select address type');
				}else if(Ext.getCmp('end_logradouro').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Write address');
				}else if(Ext.getCmp('end_cidade').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Select city');
				}else if(Ext.getCmp('end_tipo').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Select type');
				}else{
					var form = Ext.getCmp('end_form').getForm();
					if (form.isValid()){
						form.submit({
							success: function(form, action) {
								Ext.Msg.alert('Success', action.result.msg);
								_APP.send({event:\"end_getGridCount\",handler:function(_r){
									end_operation = new Ext.data.Operation({
										start : 0,  //registro inicial
										page  : 1,	//pág. inicial
										count : _r, //passar o count para atualizar a paginacao
										limit :50,  //número de registros por página
										sorters: [  // ordenação da pesquisa																			
										],
										filters: [  // filtros da pesquisa											
										]
									});	
									Ext.getCmp('gridEndereco').getStore().load(end_operation);	//atualizar grid
									Ext.getCmp('gridEndereco_display').setText('<b>Page: 1 - '+Math.ceil(end_operation.count/end_operation.limit)+'</b>'); // atualizar texto da páginação				
									Ext.getCmp('end_codigo').setValue('');
									Ext.getCmp('end_tipo_logradouro').setValue('');
									Ext.getCmp('end_logradouro').setValue('');
									Ext.getCmp('end_numero').setValue('');
									Ext.getCmp('end_complemento').setValue('');
									Ext.getCmp('end_bairro').setValue('');
									Ext.getCmp('end_cidade').setValue('');
									Ext.getCmp('end_uf').setValue('');
									Ext.getCmp('end_cep').setValue('');
									Ext.getCmp('end_caixa_postal').setValue('');
									Ext.getCmp('end_tipo').setValue('');
									Ext.getCmp('end_status').setValue('');							
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
				Ext.getCmp('end_codigo').setValue('');
				Ext.getCmp('end_tipo_logradouro').setValue('');
				Ext.getCmp('end_logradouro').setValue('');
				Ext.getCmp('end_numero').setValue('');
				Ext.getCmp('end_complemento').setValue('');
				Ext.getCmp('end_bairro').setValue('');
				Ext.getCmp('end_cidade').setValue('');
				Ext.getCmp('end_uf').setValue('');
				Ext.getCmp('end_cep').setValue('');
				Ext.getCmp('end_caixa_postal').setValue('');
				Ext.getCmp('end_tipo').setValue('');
				Ext.getCmp('end_status').setValue('');
				_APP.send({event:\"end_getGridCount\",handler:function(_r){
					end_operation = new Ext.data.Operation({
						start : 0,  //registro inicial
						page  : 1,	//pág. inicial
						count : _r, //passar o count para atualizar a paginacao
						limit :50,  //número de registros por página
						sorters: [  // ordenação da pesquisa																			
						],
						filters: [  // filtros da pesquisa											
						]
					});	
					Ext.getCmp('gridEndereco').getStore().load(end_operation);	//atualizar grid
					Ext.getCmp('gridEndereco_display').setText('<b>Page: 1 - '+Math.ceil(end_operation.count/end_operation.limit)+'</b>'); // atualizar texto da páginação				
				}});	
			"
		));	
		return $obj;
	}	
	
	public function __construct(){
		$toolsWindow = new menuTools();
		
		$this->form=new TForm(array(
			frame=>true,
			width=>'100%',
			height=>150,
			eventName=>'end_salvar',
			autoLoad=>true,
			items=>array($this->TContL1(),$this->TContL2(),$this->TContL3())				
		));
		
		$this->paging=new TPaging('gridEndereco','end_operation',array( 
			columns=>array($this->TCol6(),$this->TCol1(),$this->TCol2(),$this->TCol3(),$this->TCol4(),$this->TCol5()),
			height=>217,
			width=>'100%',
			autoLoad=>false,
			eventName=>'end_getGrid',
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
		$this->cont->items->add('end_form',$this->form);
		
		$this->window=new TWindow(array(
			layout=>'fit',
			title=>'Address',
			width=>800,
			height=>450,
			resizable=>false,
			items=>array($this->cont),
			tools=>array($toolsWindow->btPrint())				
		));
		$btWindow = new menuWindow($this->window,'end');		
		$this->window->bbar->add('we_btFill',new TToolbarFill());		
		$this->window->bbar->add('we_btNovo',$this->btNovo());		
		$this->window->bbar->add('we_btSalvar',$this->btSalvar());		
		$this->window->bbar->add('we_btCancel',$this->btCancel());
		$this->window->onBeforeShow(array("
			setTimeout(function () {
				for(var _i=0;_i<_windows.length;_i++){
				var _win = _windows[_i].toString();
				if(_win.toString()!='winEndereco')				
					var _o=eval(Ext.getCmp(_win));
					if(typeof(_o)!='undefined')
					  _o.close();
			  }
			},300);	
		"));		
		$this->window->onAfterRender(array("
			Ext.EventManager.addListener(winEndereco.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC) winEndereco.close();
			});
		  ","
			_APP.send({event:\"end_getGridCount\",handler:function(_r){
				end_operation = new Ext.data.Operation({
					start : 0,  //registro inicial
					page  : 1,	//pág. inicial
					count : _r, //passar o count para atualizar a paginacao
					limit :50,  //número de registros por página
					sorters: [  // ordenação da pesquisa																			
					],
					filters: [  // filtros da pesquisa											
					]
				});	
				Ext.getCmp('gridEndereco').getStore().load(end_operation);	//atualizar grid
				Ext.getCmp('gridEndereco_display').setText('<b>Page: 1 - '+Math.ceil(end_operation.count/end_operation.limit)+'</b>'); // atualizar texto da páginação				
			}});
			"
		));
	}
	
	public function getWindow(){
		return $this->window;
	}
}

class end_getGridCount extends TEvent{
	public function execute(){
	  $store = json_decode($_SESSION['store']);
		$sqlCount = mysql_fetch_array(mysql_query("select count(a.codigo) as count,a.bairro,a.logradouro,a.numero,b.enderecos from endereco as a left join perfil_enderecos as b on (a.codigo=b.enderecos) where b.perfil='$store->perfil'"));
		$count = $sqlCount['count'];	
		echo $count;
	}
}
	
class end_getGrid extends TEvent{
	public function execute(){
	  $store = json_decode($_SESSION['store']);
		$arrayResult=array();
	  $sql = mysql_query("select a.codigo,a.bairro,a.logradouro,a.numero,b.enderecos from endereco as a left join perfil_enderecos as b on (a.codigo=b.enderecos) where b.perfil='$store->perfil'");
		while($res = mysql_fetch_array($sql)){
			$arrayRes['end_codigo']=$res['codigo'];
			$arrayRes['end_logradouro']=$res['logradouro'];
			$arrayRes['end_numero']=$res['numero'];
			$arrayRes['end_bairro']=$res['bairro'];
			array_push($arrayResult,$arrayRes);
		}
		echo '{"records":'.json_encode($arrayResult).'}';		
	}
}

class end_carregar extends TEvent{
	public function execute(){
		$codigo = $_REQUEST['codigo'];
	  $sql = mysql_query("select * from endereco where codigo='$codigo'");
		$res = mysql_fetch_array($sql);
		echo '{success:true,data:{
			end_codigo:"'.$res['codigo'].'",
			end_tipo_logradouro:"'.$res['tipo_logradouro'].'",
			end_logradouro:"'.$res['logradouro'].'",
			end_numero:"'.$res['numero'].'",
			end_complemento:"'.$res['complemento'].'",
			end_bairro:"'.$res['bairro'].'",
			end_cidade:"'.$res['cidade'].'",
			end_uf:"'.$res['uf'].'",
			end_cep:"'.$res['cep'].'",
			end_caixa_postal:"'.$res['caixa_postal'].'",
			end_tipo:"'.$res['tipo'].'",
			end_status:"'.$res['status'].'"
		}}';	
	}
}

class end_salvar extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$end_codigo=$_REQUEST['end_codigo'];
		$end_tipo_logradouro=$_REQUEST['end_tipo_logradouro'];
		$end_logradouro=strtoupper($_REQUEST['end_logradouro']);
		$end_numero=$_REQUEST['end_numero'];
		$end_complemento=strtoupper($_REQUEST['end_complemento']);
		$end_bairro=strtoupper($_REQUEST['end_bairro']);
		$end_cidade=$_REQUEST['end_cidade'];
		$end_uf=$_REQUEST['end_uf'];
		$end_cep=$_REQUEST['end_cep'];
		$end_caixa_postal=$_REQUEST['end_caixa_postal'];
		$end_tipo=$_REQUEST['end_tipo'];
		$end_status=$_REQUEST['end_status'];
		$verifica = mysql_num_rows(mysql_query("select codigo from endereco where codigo='$end_codigo'"));
		$codIbge=mysql_fetch_array(mysql_query("select codigo_ibge from cidade_uf where cidade='$end_cidade'"));
		$codIbge=$codIbge['codigo_ibge'];
		$sql = mysql_query("replace into endereco (codigo,bairro,caixa_postal,cep,cidade,complemento,logradouro,numero,status,tipo,tipo_logradouro,uf,version,cidade_uf) values ('$end_codigo','$end_bairro','$end_caixa_postal','$end_cep','$end_cidade','$end_complemento','$end_logradouro','$end_numero','$end_status','$end_tipo','$end_tipo_logradouro','$end_uf',0,'$codIbge')");  	 	 	 	 	 		 	 	 	 	 
		if($end_codigo==""){
		  $sqlEndCod=mysql_fetch_array(mysql_query("select codigo from endereco order by codigo desc limit 1"));
			$end_codigo=$sqlEndCod['codigo'];
		}
		$sql = mysql_query("replace into perfil_enderecos (perfil,enderecos) values ('$store->perfil','$end_codigo')");  	 	 	 	 	 		 	 	 	 	 
		if($verifica>0){
		  echo "{success:true,msg:'Record updated successfully!'}";
		}else{
		  echo "{success:true,msg:'Record registered successfully!'}";
		}
	}
}

class end_apagar extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$sql = mysql_query("delete from perfil_enderecos where perfil='$store->perfil' and enderecos='$this->data'");
		echo "{success:true,msg:'Record deleted successfully!'}";
	}
}
?>