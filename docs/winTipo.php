<?php
require_once "menuTools.php"; 
class winTipo{
	private $limit=50;
	private $window;
		
	private function TButtonSel(){
	  $obj = new TButton(array(
		  text=>"Selecionar",
			margin=>'2 0 0 2',
			width=>85,
			iconCls=>'bselect',
			iconAlign=>'left',
			handler=>"
				if(typeof(otp_ret)!='undefined')
			    winTipo.close();
				else
				  Ext.Msg.alert('ATENÇÃO','Selecione um tipo de cobrança.');
			"
		));
		return $obj;
	}

	private function TButtonBack(){
	  $obj = new TButton(array(
		  text=>"Voltar",
			margin=>'2 0 0 2',
			width=>65,
			iconCls=>'bback',
			iconAlign=>'left',
			handler=>"
				otp_ret = {
					cod:\"\",
					descr:\"\"
				};
			  winTipo.close();
			"
		));
		return $obj;
	}
	
	private function TForm(){		
			$otp_codigo = new TText(array(
			  name=>'otp_codigo',
				width=>150,
				margin=>'7 0 0 5',
				fieldLabel=>'Código',
				labelWidth=>40
			));
			
			$otp_descr = new TText(array(
			  name=>'otp_descr',
				width=>600,
				margin=>'7 0 0 5',
				fieldLabel=>'Descrição',
				labelWidth=>55
			));
			
			$container = new TContainer(array(
				layout=>'hbox',
				width=>'100%',
			));
			$container->items->add('otp_codigo',$otp_codigo);
			$container->items->add('otp_descr',$otp_descr);
			
			$form = new TForm(array(
				frame=>true,
				width=>'100%',
				height=>70,
				layout=>'vbox',
				eventName=>'otp_salvar',
				items=>($container)
			));
						
		return $form;
	}
	
	private function TGrid(){
			$btnEdit=new TButton(array(
				icon=>'images/buttons/edit.png',
				tooltip=>'Editar Registro',
				width=>22,
				handler=>"
				var form = Ext.getCmp('otp_form').getForm();
				form.load({url:window.location,params:{event:'otp_carregar',data:Ext.getCmp('otp_grid').getStore().getAt(rowIndex).data.otp_codigo},waitMsg: 'Loading'});									   				
				"
			));
		
			$btnDel=new TButton(array(
				icon=>'images/buttons/delete.png',
				tooltip=>'Excluír Registro',
				width=>22,
				handler=>"Ext.Msg.confirm('ATENÇÃO','Você deseja realmente excluir '+Ext.getCmp('otp_grid').getStore().getAt(rowIndex).data.otp_descr+'?',function(btn,txt){
					if(btn=='yes'){
						_APP.send({event:\"otp_apagar\",data:Ext.getCmp('otp_grid').getStore().getAt(rowIndex).data.otp_codigo,handler:function(_r){
							_APP.send({event:\"otp_getGridCount\",handler:function(_r){
								Ext.Msg.alert('Success','Registro excluído com sucesso!');
								otp_operation = new Ext.data.Operation({
									start : 0,  
									page  : 1,	
									count : _r, 
									limit :50,  
									sorters: [  																
									],
									filters: [ 										
									]
								});	
								Ext.getCmp('otp_grid').getStore().load(otp_operation);	
								Ext.getCmp('otp_grid_display').setText(gridText(_r,otp_operation.count,otp_operation.limit));								
								if(_store.winTipoSel==1){
									Ext.getCmp('otp_coledit').setVisible(false);
									Ext.getCmp('otp_coldel').setVisible(false);
								}	
							}});					
						}});							
					}
				});"
			));
	
			$col1 = new TColumn(array(
				header=>'Código',
				dataIndex=>'otp_codigo',
				width=>60
			));
			
			$col2=new TColumn(array(
				header=>'Tipo',
				dataIndex=>'otp_descr',
				width=>600,
				flex=>1
			));
			
			$col3=new TColumnAction(array(
			  width=>20
			));
			
			$col3->items->add('bedit',$btnEdit);
			
			$col4=new TColumnAction(array(
			  width=>20,
			  hidden=>false
			));
			
			$col4->items->add('bdel',$btnDel);
		
			$paging=new TPaging('otp_grid','otp_operation',array( 
				height=>300,
				width=>790,
				autoLoad=>true,
				eventName=>'otp_getGrid',
				queryMode=>TQueryModeType::$remote
			));
			
			$paging->displayMsg='Página'; 
			$paging->first->iconCls='bpgfirst';
			$paging->first->text='Primeira';
			$paging->prev->iconCls='bpgprev';
			$paging->prev->text='Anterior';
			$paging->next->iconCls='bpgnext';
			$paging->next->text='Próxima';
			$paging->last->iconCls='bpglast';	
			$paging->last->text='Última';
			$grid=$paging->getGrid();
			$grid->columns->add('otp_col1',$col1);
			$grid->columns->add('otp_col2',$col2);
			$grid->columns->add('otp_coledit',$col3);
			$grid->columns->add('otp_coldel',$col4);
			
			$grid->onItemClick("
				otp_ret = {
					cod:Ext.getCmp('otp_grid').getStore().getAt(index).data.otp_codigo,
					descr:Ext.getCmp('otp_grid').getStore().getAt(index).data.otp_descr
				};
				"
			);
			$grid->onItemDblClick("
				otp_ret = {
					cod:Ext.getCmp('otp_grid').getStore().getAt(index).data.otp_codigo,
					descr:Ext.getCmp('otp_grid').getStore().getAt(index).data.otp_descr
				};
				winTipo.close();
				"
			);
		
		return $grid;
	}
	
	private function TPesquisar(){
			$label = new TLabel(array(
				text=>'Tipo',
				padding=>'10 10 10 10'
			));
			
			$tipoPesquisa = new TText(array(
				width=>650,
				name=>'otp_pesquisar',
				padding=>'7 10 10 0'
			));
			
			$btnBuscar = new TButton(array(
				text=>"Filtrar",
				margin=>'4 10 10 5',
				width=>65,
				iconCls=>'bfilter',
				iconAlign=>'left',
				handler=>"
				_APP.send({event:\"otp_getGridCount\",handler:function(_r){
					otp_operation = new Ext.data.Operation({
						start : 0, 
						page  : 1,	
						count : _r, 
						limit : ".$this->limit.",  
						sorters: [
							new Ext.util.Sorter({
									property : 'otp_descr',
									direction: 'ASC'
							})							
						],
						filters: [  
							new Ext.util.Filter({
								property: 'otp_descr',
								value   : Ext.getCmp('otp_pesquisar').getValue()									
							})
						]
					});	
					Ext.getCmp('otp_grid').getStore().load(otp_operation);	
					Ext.getCmp('otp_grid_display').setText(gridText(_r,otp_operation.count,otp_operation.limit));
					if(_store.winTipoSel==1){
						Ext.getCmp('otp_coledit').setVisible(false);
						Ext.getCmp('otp_coldel').setVisible(false);
					}						
				}});"					
			));
			
			$container = new TContainer(array(
				layout=>'hbox',
				width=>800,
				height=>35
			));
			
			$container->items->add('',$label);
			$container->items->add('otp_pesquisar',$tipoPesquisa);
			$container->items->add('otp_btn_buscar',$btnBuscar);
			
		return $container;
	}
	
	private function TContainer(){
			$container = new TContainer(array(
				padding=>'10 10 10 10',
				layout=>'vbox',
				height=>350
			));
			$container->items->add('otp_formPesq',$this->TPesquisar());
			$container->items->add('otp_grid',$this->TGrid());
			$container->items->add('otp_form',$this->TForm());
		return $container;
	}
	
	private function TWindow(){
		$btnNovo=new TButton(array(
			iconCls=>'badd',
			iconAlign=>'left',
			scale=>'small',
			text=>'Novo',
			width=>60,
			handler=>"
				Ext.getCmp('otp_codigo').setValue('');
				Ext.getCmp('otp_descr').setValue('');
				Ext.getCmp('otp_codigo').focus();
			"
		));	
		
		$btnSalvar=new TButton(array(
			iconCls=>'bsave',
			iconAlign=>'left',
			scale=>'small',
			text=>'Salvar',
			width=>65,
			handler=>"
				if(Ext.getCmp('otp_codigo').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Digite o código do tipo.');
				}else if(Ext.getCmp('otp_descr').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Digite a descrição do tipo.');
				}else{
					var form = Ext.getCmp('otp_form').getForm();
					if (form.isValid()){
						form.submit({
							success: function(form, action) {
								Ext.Msg.alert('Success', action.result.msg);
								_APP.send({event:\"otp_getGridCount\",handler:function(_r){
									otp_operation = new Ext.data.Operation({
										start : 0,  
										page  : 1,	
										count : _r, 
										limit : ".$this->limit.",  
										sorters: [  																
										],
										filters: [ 										
										]
									});	
									Ext.getCmp('otp_grid').getStore().load(otp_operation);	
									Ext.getCmp('otp_grid_display').setText(gridText(_r,otp_operation.count,otp_operation.limit));
									Ext.getCmp('otp_codigo').setValue('');
									Ext.getCmp('otp_descr').setValue('');		
									if(_store.winTipoSel==1){
										Ext.getCmp('otp_coledit').setVisible(false);
										Ext.getCmp('otp_coldel').setVisible(false);
									}										
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
				
		$this->window = new TWindow(array(
			layout=>'fit',
			title=>'Cadastro de Tipo',
			width=>800,
			height=>450,
			items=>array($this->TContainer())
		));
		
		$this->window->bbar->add('otp_Fill',new TToolbarFill());
		$this->window->bbar->add('otp_btnNovo',$btnNovo);
		$this->window->bbar->add('otp_btnSalvar',$btnSalvar);
		$this->window->bbar->add('otp_btnVoltar',$this->TButtonBack());
		$this->window->bbar->add('otp_btnSelecionar',$this->TButtonSel());
		
		$this->window->onBeforeHide(array("
			if(_store.winTipoSel==1){
				Ext.getCmp('otp_coledit').setVisible(true);
				Ext.getCmp('otp_coldel').setVisible(true);
				_store.winTipoSel=0;
				this.onExit(otp_ret);
			}			
		"));
		
		$this->window->onBeforeShow(array("
			if(_store.winTipoSel==0){
				setTimeout(function () {
					for(var _i=0;_i<_windows.length;_i++){
					var _win = _windows[_i].toString();
					if(_win.toString()!='winTipo')				
						var _o=eval(Ext.getCmp(_win));
						if(typeof(_o)!='undefined')
							_o.close();
					}
				},300);				
				Ext.getCmp('otp_grid').suspendEvents(true);
				Ext.getCmp('otp_btnNovo').show(true);
				Ext.getCmp('otp_btnSalvar').show(true);
				Ext.getCmp('otp_btnVoltar').hide(true);
				Ext.getCmp('otp_btnSelecionar').hide(true);								
				Ext.getCmp('otp_form').setVisible(true);
				Ext.getCmp('otp_form').setWidth(800);
				Ext.getCmp('otp_form').setHeight(100);
			}else{
				Ext.getCmp('otp_grid').resumeEvents();
				Ext.getCmp('otp_btnNovo').hide(true);
				Ext.getCmp('otp_btnSalvar').hide(true);
				Ext.getCmp('otp_btnVoltar').show(true);
				Ext.getCmp('otp_btnSelecionar').show(true);
				Ext.getCmp('otp_form').setVisible(false);
				setTimeout(function () {
					Ext.getCmp('otp_coledit').setVisible(false);
					Ext.getCmp('otp_coldel').setVisible(false);
				},300);	
			}			
		"));
		
		$this->window->onAfterRender(array("
			Ext.EventManager.addListener(winTipo.getEl().id,'keypress',function(eventObj){
					if (eventObj.getKey()==eventObj.ESC){
						otp_ret = {
							cod:\"\",
							descr:\"\"
						};
						winTipo.close();
					}
				});	
			","
			_APP.send({event:\"otp_getGridCount\",handler:function(_r){
				otp_operation = new Ext.data.Operation({
					start : 0, 
					page  : 1,	
					count : _r, 
					limit : ".$this->limit.",  
					sorters: [ 																	
					],
					filters: [  										
					]
				});	
				Ext.getCmp('otp_grid').getStore().load(otp_operation);	
				Ext.getCmp('otp_grid_display').setText(gridText(_r,otp_operation.count,otp_operation.limit));
			}});
			"
		));
	}
	
	public function __construct(){
		$this->TWindow();
	}
		
	public function getWindow(){
		return $this->window;
	}
}

class otp_getGridCount extends TEvent{
	public function execute(){
		$filter = json_decode($this->filter);
		if($this->filter!=""){
			$descr = '%'.$filter[0]->value.'%';
		}else{
			$descr='%';
		}
		$dataPacket=new TDataPacket();
		$dataPacket->setToken(TParams::$token_sge);
		$dataPacket->setUrl(TParams::$url);
		$dataPacket->add('{"cod":"test000570","params":[{"name":"otp_descr","value":"'.$descr.'","type":"string"}]}');
		$ret = $dataPacket->open();
		$rowdata = $dataPacket->getRowdata();
		echo $rowdata[0]->count;
	}
}

class otp_getGrid extends TEvent{
  public function execute(){
		$dataPacket=new TDataPacket();
		if($this->filter!=""){
			$filter = json_decode($this->filter);
			$descr = '%'.$filter[0]->value.'%';
		}else{
			$descr='%';
		}
		$dataPacket->setToken(TParams::$token_sge);
		$dataPacket->setUrl(TParams::$url);
		$dataPacket->add('{"cod":"test000571","params":[{"name":"otp_descr","value":"'.$descr.'","type":"string"},{"name":"start","value":'.$this->start.',"type":"integer"},{"name":"count","value":'.$this->limit.',"type":"integer"}]}');
		$ret = $dataPacket->open();
		$rowdata = $dataPacket->getRowdata();		
		$arrayResult=array();
		for($i=0;$i<count($rowdata);$i++){
			$arrayRes['otp_codigo']=$rowdata[$i]->otp_codigo;
			$arrayRes['otp_descr']=$rowdata[$i]->otp_descr;
			array_push($arrayResult,$arrayRes);
		}
		echo '{"records":'.json_encode($arrayResult).'}';	
	}
}

class otp_salvar extends TEvent{
  public function execute(){
		if(isset($_REQUEST['otp_codigo'])) $codigo=$_REQUEST['otp_codigo']; else $codigo=0;
		if(isset($_REQUEST['otp_descr'])) $descr=$_REQUEST['otp_descr']; else $descr='';	
		$descr=strtoupper($descr);
		$dataPacket=new TDataPacket();
		$dataPacket->setToken(TParams::$token_sge);
		$dataPacket->setUrl(TParams::$url);
		$dataPacket->add('{"cod":"test000572","params":[{"name":"otp_codigo","value":'.$codigo.',"type":"integer"},{"name":"otp_descr","value":"'.$descr.'","type":"string"}]}');
		$ret = $dataPacket->execute();		
		echo '{success:true,msg:"Registro inserido com sucesso!"}';	
	}
}

class otp_carregar extends TEvent{
  public function execute(){
		if(isset($this->data)) $codigo=$this->data; else $codigo=0;
		$dataPacket=new TDataPacket();
		$dataPacket->setToken(TParams::$token_sge);
		$dataPacket->setUrl("http://127.00.1/cgi-bin/hdbc.cgi/empresas.template");
		$dataPacket->add('{"cod":"test000573","params":[{"name":"otp_codigo","value":'.$codigo.',"type":"integer"}]}');
		$ret = $dataPacket->open();
		$rowdata = $dataPacket->getRowdata();		
		echo '{success:true,data:{
			otp_codigo:"'.$rowdata[0]->otp_codigo.'",
			otp_descr:"'.$rowdata[0]->otp_descr.'"
		}}';
	}
}

class otp_apagar extends TEvent{
  public function execute(){
		if(isset($this->data)) $codigo=$this->data; else $codigo=0;
		$dataPacket=new TDataPacket();
		$dataPacket->setToken(TParams::$token_sge);
		$dataPacket->setUrl(TParams::$url);
		$dataPacket->add('{"cod":"test000574","params":[{"name":"otp_codigo","value":'.$codigo.',"type":"integer"}]}');
		$ret = $dataPacket->execute();	
		echo '{success:true}';
	}
}

?>