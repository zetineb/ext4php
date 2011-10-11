<?php
	require_once "menuWindow.php"; 
	require_once "menuTools.php"; 

	class winHistorico { 
		private $form;
		private $container; 				
		private $paging;
		private $grid;
		public $window;
		
		private function TCodigo(){
			$obj = new TText(array(
				name=>'his_codigo',
				fieldLabel=>'Code',
				value=>'',
				labelWidth=>80,
				labelAlign=>'top',				
				margin=>'0 0 0 0',
				width=>80,
				readOnly=>true,
				validateOnBlur=>false,
				validateOnChange=>false,
				enableKeyEvents=>true
			));
			$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
				Ext.getCmp('his_mesinicial').focus();
			");
			return $obj;
		}

		private function TMesInicial(){
			$obj = new TText(array(
				name=>'his_mesinicial',
				value=>'',
				fieldLabel=>'Month',
				labelWidth=>30,
				labelAlign=>'top',				
				margin=>'0 0 0 5',	
				maskRe=>'/[0-9]/',
				width=>30,
				maxLength=>2,
				validateOnBlur=>false,
				validateOnChange=>false,
				enableKeyEvents=>true
			));
			$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
				Ext.getCmp('his_anoinicial').focus();
			");
			return $obj;
		}
		
		private function TAnoInicial(){
			$obj = new TText(array(
				name=>'his_anoinicial',
				value=>'',
				fieldLabel=>'Start Year',
				labelWidth=>80,
				maskRe=>'/[0-9]/',
				labelAlign=>'top',				
				margin=>'0 0 0 5',				
				width=>80,
				minLength=>4,
				maxLength=>4,
				validateOnBlur=>false,
				validateOnChange=>false,
				enableKeyEvents=>true
			));
			$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
				Ext.getCmp('his_mesfinal').focus();
			");
			return $obj;
		}
		
		private function TMesFinal(){
			$obj = new TText(array(
				name=>'his_mesfinal',
				value=>'',
				fieldLabel=>'Month',
				maskRe=>'/[0-9]/',
				labelWidth=>30,
				labelAlign=>'top',				
				margin=>'0 0 0 5',				
				width=>30,
				maxLength=>2,				
				validateOnBlur=>false,
				validateOnChange=>false,
				enableKeyEvents=>true
			));
			$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
				Ext.getCmp('his_anofinal').focus();
			");
			return $obj;
		}
		
		private function TAnoFinal(){
			$obj = new TText(array(
				name=>'his_anofinal',
				value=>'',
				fieldLabel=>'Last Year',
				maskRe=>'/[0-9]/',
				labelWidth=>80,
				labelAlign=>'top',				
				margin=>'0 0 0 5',				
				width=>80,
				minLength=>4,
				maxLength=>4,
				validateOnBlur=>false,
				validateOnChange=>false,
				enableKeyEvents=>true
			));
			$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
				Ext.getCmp('his_cargo').focus();
			");
			return $obj;
		}

		private function TCargo(){
			$obj = new TText(array(
				name=>'his_cargo',
				value=>'',
				fieldLabel=>'Function',
				labelWidth=>210,
				labelAlign=>'top',				
				margin=>'0 0 0 5',				
				width=>210,
				validateOnBlur=>false,
				validateOnChange=>false,
				enableKeyEvents=>true
			));
			$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
				Ext.getCmp('his_empresa').focus();
			");
			return $obj;
		}
		
		private function TEmpresa(){
			$obj = new TText(array(
				name=>'his_empresa',
				value=>'',
				fieldLabel=>'Company',
				labelWidth=>207,
				labelAlign=>'top',				
				margin=>'0 0 0 5',				
				width=>207,
				validateOnBlur=>false,
				validateOnChange=>false,
				enableKeyEvents=>true
			));
			$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
				Ext.getCmp('his_obs').focus();
			");
			return $obj;
		}
		
		private function TObs(){
			$obj = new TTextArea(array(
				name=>'his_obs',
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
			$obj = new TButton(array(
				icon=>'images/buttons/edit.png',
				width=>22,
				handler=>"
					var form = Ext.getCmp('his_form').getForm();
					form.load({url:window.location,params:{event:'his_carregar',codigo:Ext.getCmp('gridHistorico').getStore().getAt(rowIndex).data.his_codigo},waitMsg: 'Loading'});
				"
			));
			return $obj;
		}
		
		private function TBtDel(){
			$obj = new TButton(array(
				icon=>'images/buttons/delete.png',
				width=>22,
				handler=>"
					_APP.send({event:\"his_apagar\",data:Ext.getCmp('gridHistorico').getStore().getAt(rowIndex).data.his_codigo,handler:function(_r){
						Ext.Msg.alert('ATTENTION','Record deleted successfully!');
						_APP.send({event:\"his_getGridCount\",handler:function(_r){
							his_operation = new Ext.data.Operation({
								start : 0,  //registro inicial
								page  : 1,	//pág. inicial
								count : _r, //passar o count para atualizar a paginacao
								limit : 50,  //número de registros por página
								sorters: [  // ordenação da pesquisa																			
								],
								filters: [  // filtros da pesquisa											
								]
							});	
							Ext.getCmp('gridHistorico').getStore().load(his_operation);	//atualizar grid
							Ext.getCmp('gridHistorico_display').setText('<b>Page: 1 - '+Math.ceil(his_operation.count/his_operation.limit)+'</b>'); // atualizar texto da páginação				
						}});					
					}});
				"
			));
			return $obj;
		}
		
		private function btNovo(){
			$obj = new TButton(array(
				iconCls=>'badd',
				iconAlign=>'left',
				scale=>'small',
				text=>'New',
				width=>60,
				handler=>"
					Ext.getCmp('his_codigo').setValue('');
					Ext.getCmp('his_mesinicial').setValue('');
					Ext.getCmp('his_anoinicial').setValue('');
					Ext.getCmp('his_mesfinal').setValue('');
					Ext.getCmp('his_anofinal').setValue('');
					Ext.getCmp('his_cargo').setValue('');
					Ext.getCmp('his_empresa').setValue('');
					Ext.getCmp('his_obs').setValue('');					
				"
			));
			return $obj;
		}
		
		private function btSalvar(){
			$obj = new TButton(array(
				iconCls=>'bsave',
				iconAlign=>'left',
				scale=>'small',
				text=>'Save',
				width=>65,
				handler=>"	
					if(Ext.getCmp('his_mesinicial').getValue()==''){
						Ext.Msg.alert('ATTENTION', 'Select last month');
					}else if(Ext.getCmp('his_anoinicial').getValue()==''){
						Ext.Msg.alert('ATTENTION', 'Select start year');
					}else if(Ext.getCmp('his_mesfinal').getValue()==''){
						Ext.Msg.alert('ATTENTION', 'Select last month');
					}else if(Ext.getCmp('his_anofinal').getValue()==''){
						Ext.Msg.alert('ATTENTION', 'Select last year');
					}else if(Ext.getCmp('his_cargo').getValue()==''){
						Ext.Msg.alert('ATTENTION', 'Select function');
					}else if(Ext.getCmp('his_empresa').getValue()==''){
						Ext.Msg.alert('ATTENTION', 'Select Company');
					}else{					
						var form = Ext.getCmp('his_form').getForm();					
						if (form.isValid()){					
							form.submit({						
								success: function(form, action) {
									Ext.Msg.alert('Success', action.result.msg);
									_APP.send({event:\"his_getGridCount\",handler:function(_r){
										his_operation = new Ext.data.Operation({
											start : 0,  //registro inicial
											page  : 1,	//pág. inicial
											count : _r, //passar o count para atualizar a paginacao
											limit :50,  //número de registros por página
											sorters: [  // ordenação da pesquisa																			
											],
											filters: [  // filtros da pesquisa											
											]
										});	
										Ext.getCmp('gridHistorico').getStore().load(his_operation);	//atualizar grid
										Ext.getCmp('gridHistorico_display').setText('<b>Page: 1 - '+Math.ceil(his_operation.count/his_operation.limit)+'</b>'); // atualizar texto da páginação				
										Ext.getCmp('his_codigo').setValue('');
										Ext.getCmp('his_mesinicial').setValue('');
										Ext.getCmp('his_anoinicial').setValue('');
										Ext.getCmp('his_mesfinal').setValue('');
										Ext.getCmp('his_anofinal').setValue('');
										Ext.getCmp('his_cargo').setValue('');
										Ext.getCmp('his_empresa').setValue('');
										Ext.getCmp('his_obs').setValue('');									
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
		
		private function btCancelar(){
			$obj = new TButton(array(
				iconCls=>'bcancel',
				iconAlign=>'left',
				scale=>'small',
				text=>'Cancel',
				width=>65,
				handler=>"
					Ext.getCmp('his_codigo').setValue('');
					Ext.getCmp('his_mesinicial').setValue('');
					Ext.getCmp('his_anoinicial').setValue('');
					Ext.getCmp('his_mesfinal').setValue('');
					Ext.getCmp('his_anofinal').setValue('');
					Ext.getCmp('his_cargo').setValue('');
					Ext.getCmp('his_empresa').setValue('');
					Ext.getCmp('his_obs').setValue('');
					_APP.send({event:\"his_getGridCount\",handler:function(_r){
						his_operation = new Ext.data.Operation({
							start : 0,  //registro inicial
							page  : 1,	//pág. inicial
							count : _r, //passar o count para atualizar a paginacao
							limit :50,  //número de registros por página
							sorters: [  // ordenação da pesquisa																			
							],
							filters: [  // filtros da pesquisa											
							]
						});	
						Ext.getCmp('gridHistorico').getStore().load(his_operation);	//atualizar grid
						Ext.getCmp('gridHistorico_display').setText('<b>Page: 1 - '+Math.ceil(his_operation.count/his_operation.limit)+'</b>'); // atualizar texto da páginação				
					}});
				"
			));
			return $obj;
		}
		
		private function TCol1(){
			$obj = new TColumn(array(
				header=>'Company',
				dataIndex=>'his_empresa',
				width=>200,
				flex=>1
			));
			return $obj;
		}
		
		private function TCol2(){
			$obj = new TColumn(array(
				header=>'Function',
				dataIndex=>'his_cargo',
				width=>195				
			));
			return $obj;
		}
		
		private function TCol3(){
			$obj = new TColumn(array(
				header=>'Start',
				dataIndex=>'his_mesinicial',
				width=>60
			));
			return $obj;
		}
		
		private function TCol4(){
			$obj = new TColumn(array(
				header=>'Year',
				dataIndex=>'his_anoinicial',
				width=>70
			));
			return $obj;
		}
		
		private function TCol5(){
			$obj = new TColumn(array(
				header=>'Last',
				dataIndex=>'his_mesfinal',
				width=>60
			));
			return $obj;
		}
		
		private function TCol6(){
			$obj = new TColumn(array(
				header=>'Year',
				dataIndex=>'his_anofinal',
				width=>70
			));
			return $obj;
		}
		
		private function TCol7(){
			$obj = new TColumn(array(
				header=>'Code',
				dataIndex=>'his_codigo',
				width=>76
			));
			return $obj;
		}
		
		private function TCol8(){
			$obj = new TColumnAction(array(
				width=>20
			));
			$obj->items->add('bedit',$this->TBtEdit());
			return $obj;
		}
		
		private function TCol9(){
			$obj = new TColumnAction(array(
				width=>20
			));
			$obj->items->add('bdel',$this->TBtDel());
			return $obj;
		}
		
		public function __construct(){
			
			$toolsWindow = new menuTools();
			
			// HBOX	L1
			$this->contL1 = new TContainer(array(				
				layout=>'hbox',
				height=>45
			));			
			$this->contL1->items->add('his_codigo',$this->TCodigo());
			$this->contL1->items->add('his_mesinicial',$this->TMesInicial());
			$this->contL1->items->add('his_anoinicial',$this->TAnoInicial());
			$this->contL1->items->add('his_mesfinal',$this->TMesFinal());
			$this->contL1->items->add('his_anofinal',$this->TAnoFinal());
			$this->contL1->items->add('his_cargo',$this->TCargo());
			$this->contL1->items->add('his_empresa',$this->TEmpresa());
			
			
			// HBOX L2			
			$this->contL2 = new TContainer(array(
				layout=>'hbox',
				height=>80
			));
			$this->contL2->items->add('his_obs',$this->TObs());
						
			$this->form=new TForm(array(
				frame=>true,
				width=>'100%',
				height=>400,
				eventName=>'his_salvar',
				autoLoad=>true,
				items=>array($this->contL1,$this->contL2)				
			));
			
			$this->paging=new TPaging('gridHistorico','his_operation',array( 
				columns=>array($this->TCol7(),$this->TCol1(),$this->TCol2(),$this->TCol3(),$this->TCol4(),$this->TCol5(),$this->TCol6(),$this->TCol8(),$this->TCol9()),
				height=>217,
				width=>'100%',				
				autoLoad=>false,
				eventName=>'his_getGrid',
				queryMode=>TQueryModeType::$remote
			));
			$this->paging->displayMsg='Page';
			$this->paging->first->iconCls='bpgfirst';
			$this->paging->prev->iconCls='bpgprev';
			$this->paging->next->iconCls='bpgnext';
			$this->paging->last->iconCls='bpglast';		
			$this->grid=$this->paging->getGrid();		
			
			// VBOX	
			$this->cont=new TContainer(array(				
				padding=>'10 10 10 10',
				layout=>'vbox',
				height=>400
			));		
			$this->cont->items->add($this->paging->gridId,$this->grid);
			$this->cont->items->add('his_form',$this->form);
			
			$this->window=new TWindow(array(
				layout=>'fit',
				title=>'Professional History',
				width=>800,
				height=>450,
				resizable=>false,
				items=>array($this->cont),
				tools=>array($toolsWindow->btPrint())
			));
			$btWindow = new menuWindow($this->window,'his');
			$this->window->bbar->add('btFill',new TToolbarFill());
			$this->window->bbar->add('btNovo',$this->btNovo());
			$this->window->bbar->add('btSalvar',$this->btSalvar());
			$this->window->bbar->add('btCancelar',$this->btCancelar());
			$this->window->onBeforeShow(array("
			setTimeout(function () {
				for(var _i=0;_i<_windows.length;_i++){
				var _win = _windows[_i].toString();
				if(_win.toString()!='winHistorico')				
					var _o=eval(Ext.getCmp(_win));
					if(typeof(_o)!='undefined')
					  _o.close();
			  }
			},300);		
			"));			
			$this->window->onAfterRender(array("
					Ext.EventManager.addListener(winHistorico.getEl().id,'keypress',function(eventObj){
						if (eventObj.getKey()==eventObj.ESC) winHistorico.close();
					});
			  ","
					_APP.send({event:\"his_getGridCount\",handler:function(_r){
						his_operation = new Ext.data.Operation({
							start : 0,  //registro inicial
							page  : 1,	//pág. inicial
							count : _r, //passar o count para atualizar a paginacao
							limit :50,  //número de registros por página
							sorters: [  // ordenação da pesquisa																			
							],
							filters: [  // filtros da pesquisa											
							]
						});	
						Ext.getCmp('gridHistorico').getStore().load(his_operation);	//atualizar grid
						Ext.getCmp('gridHistorico_display').setText('<b>Page: 1 - '+Math.ceil(his_operation.count/his_operation.limit)+'</b>'); // atualizar texto da páginação				
					}});
				"
			));
		}
		
		public function getWindow(){
		  return $this->window;
		}
	}
	
	class his_getGridCount extends TEvent{
		public function execute(){
			$store = json_decode($_SESSION['store']);
			$sqlCount = mysql_fetch_array(mysql_query("select count(historicos) as count from perfil_historicos where perfil='$store->perfil'"));			
			echo $sqlCount['count'];
		}
	}
	
	class his_getGrid extends TEvent{
		public function execute(){
			$store = json_decode($_SESSION['store']);
			$arrayResult=array();			
			$sql = mysql_query("select b.* from perfil_historicos as a left join historico_profissional as b on (a.historicos=b.codigo) where a.perfil='$store->perfil'");
			while($res = mysql_fetch_array($sql)){
				$arrayRes['his_codigo']=$res['codigo'];
				$arrayRes['his_mesinicial']=$res['mes_inicial'];
				$arrayRes['his_anoinicial']=$res['ano_inicial'];
				$arrayRes['his_mesfinal']=$res['mes_final'];
				$arrayRes['his_anofinal']=$res['ano_final'];
				$arrayRes['his_cargo']=utf8_encode($res['cargo']);
				$arrayRes['his_empresa']=utf8_encode($res['empresa']);				
				array_push($arrayResult,$arrayRes);
			}
			echo '{"records":'.json_encode($arrayResult).'}';
		}
	}
	
	class his_carregar extends TEvent{
		public function execute(){			
			$codigo = $_REQUEST['codigo'];
			$sql = mysql_query("select * from historico_profissional where codigo='$codigo'");
			$res = mysql_fetch_array($sql);	
			$a = preg_split('#[\n\r]#',$res['descricao']);
			$a = implode($a);
			echo '{success:true,data:{
				his_codigo:"'.$res['codigo'].'",
				his_mesinicial:"'.$res['mes_inicial'].'",
				his_anoinicial:"'.$res['ano_inicial'].'",
				his_mesfinal:"'.$res['mes_final'].'",
				his_anofinal:"'.$res['ano_final'].'",
				his_cargo:"'.utf8_encode($res['cargo']).'",
				his_empresa:"'.utf8_encode($res['empresa']).'",
				his_obs:"'.utf8_encode($a).'"				
			}}';
		}
	}
	
	class his_salvar extends TEvent{
		public function execute(){
			$store = json_decode($_SESSION['store']);
			$his_codigo=$_REQUEST['his_codigo'];
			$his_mesinicial=$_REQUEST['his_mesinicial'];
			$his_anoinicial=$_REQUEST['his_anoinicial'];
			$his_mesfinal=$_REQUEST['his_mesfinal'];
			$his_anofinal=$_REQUEST['his_anofinal'];
			$his_cargo=strtoupper($_REQUEST['his_cargo']);
			$his_empresa=strtoupper($_REQUEST['his_empresa']);
			$his_obs=strtoupper($_REQUEST['his_obs']);
			$verifica = mysql_num_rows(mysql_query("select perfil from perfil_historicos where historicos='$his_codigo'"));
			$sql = mysql_query("replace into historico_profissional (codigo, ano_final, ano_inicial, cargo, descricao, empresa, mes_final, mes_inicial) values ('$his_codigo', '$his_anofinal', '$his_anoinicial', '$his_cargo', '$his_obs', '$his_empresa', '$his_mesfinal', '$his_mesinicial')");
			if ($his_codigo==""){
				$sqlHisCod = mysql_fetch_array(mysql_query("select codigo from historico_profissional order by codigo desc limit 1"));
				$his_codigo = $sqlHisCod['codigo'];				
			}
			$sql = mysql_query("replace into perfil_historicos (perfil, historicos) values ('$store->perfil', '$his_codigo')");
			if($verifica>0){
				echo "{success:true,msg:'Record updated successfully!'}";
			}else{
				echo "{success:true,msg:'Record registered successfully!'}";
			}
		}
	}
	
	class his_apagar extends TEvent{
		public function execute(){
			$store = json_decode($_SESSION['store']);
			$codigo = $_REQUEST['data'];
			$sql = mysql_query("delete from perfil_historicos where historicos='$codigo'");
			echo "{success:true,msg:'Record deleted successfully!'}";
		}
	}
?>