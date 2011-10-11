<?php
	require_once "menuTools.php"; 

	class winIdiomasSel { 
		private $form;
		private $formPesq;		
		private $container; 				
		private $paging;
		private $grid;
		public $window;
		
		private function TPesquisa(){
			$obj = new TText(array(
				name=>'idi_pesquisar',
				fieldLabel=>'Description',
				labelWidth=>60,				
				width=>700,
				margin=>'0 0 5 0',
				validateOnBlur=>false,
				validateOnChange=>false,
				enableKeyEvents=>true
			));
			$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
				Ext.getCmp('idi_btPesquisar').focus();
			");
			return $obj;
		}
		
		private function btPesquisar(){
			$obj = new TButton(array(
				text=>"Filter",
				margin=>'0 0 0 5',
				width=>65,
				iconCls=>'bfilter',
				iconAlign=>'left',
				handler=>"
					var form = Ext.getCmp('idi_formPesq').getForm();
					if (form.isValid()) {
						form.submit({
							success: function(form, action) {
								idi_operation = new Ext.data.Operation({
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
											value   : Ext.getCmp('idi_pesquisar').getValue()
										})												
									]
								});	
								Ext.getCmp('gridIdiomas').getStore().load(idi_operation);	//atualizar grid
								Ext.getCmp('gridIdiomas_display').setText('<b>Page: 1 - '+Math.ceil(idi_operation.count/idi_operation.limit)+'</b>'); // atualizar texto da páginação
							}
						});
					}
				"
			));
			return $obj;
		}
		
		private function TContL1(){
			$obj = new TContainer(array(
				layout=>'hbox',
				width=>800,
				height=>45
			));
			$obj->items->add('idi_pesquisar',$this->TPesquisa());
			$obj->items->add('idi_btPesquisar',$this->btPesquisar());
			return $obj;
		}

		private function TBtEdit(){
			$obj = new TButton(array(
				icon=>'images/buttons/edit.png',
				width=>22,
				handler=>"
					var form = Ext.getCmp('idi_form').getForm();
					form.load({url:window.location,params:{event:'idi_carregarSel',codigo:Ext.getCmp('gridIdiomas').getStore().getAt(rowIndex).data.idi_codigoSel},waitMsg: 'Loading'});
				"
			));
			return $obj;
		}
		
		private function TBtDel(){
			$obj = new TButton(array(
				icon=>'images/buttons/delete.png',
				width=>22,
				handler=>"
					_APP.send({event:\"idi_apagarSel\",data:Ext.getCmp('gridIdiomas').getStore().getAt(rowIndex).data.idi_codigoSel,handler:function(_r){
						Ext.Msg.alert('ATTENTION','Record deleted successfully!');
						_APP.send({event:\"idi_getGridCountSel\",handler:function(_r){
							var ret = Ext.decode(_r);							
							idi_operation = new Ext.data.Operation({
								start : 0,  //registro inicial
								page  : 1,	//pág. inicial
								count : ret.count, //passar o count para atualizar a paginacao
								limit : 50,  //número de registros por página
								sorters: [  // ordenação da pesquisa																			
								],
								filters: [  // filtros da pesquisa											
								]
							});	
							Ext.getCmp('gridIdiomas').getStore().load(idi_operation);	//atualizar grid
							Ext.getCmp('gridIdiomas_display').setText('<b>Page: 1 - '+Math.ceil(idi_operation.count/idi_operation.limit)+'</b>'); // atualizar texto da páginação				
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
					Ext.getCmp('idi_codigoSel').setValue('');
					Ext.getCmp('idi_descricao').setValue('');
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
				width=>70,
				handler=>"
					var form = Ext.getCmp('idi_form').getForm();					
					if (form.isValid()){					
						form.submit({						
							success: function(form, action) {
								Ext.Msg.alert('Success', action.result.msg);
								_APP.send({event:\"idi_getGridCountSel\",handler:function(_r){
									var ret = Ext.decode(_r);
									idi_operation = new Ext.data.Operation({
										start : 0,  //registro inicial
										page  : 1,	//pág. inicial
										count : ret.count, //passar o count para atualizar a paginacao
										limit :50,  //número de registros por página
										sorters: [  // ordenação da pesquisa																			
										],
										filters: [  // filtros da pesquisa											
										]
									});	
									Ext.getCmp('gridIdiomas').getStore().load(idi_operation);	//atualizar grid
									Ext.getCmp('gridIdiomas_display').setText('<b>Page: 1 - '+Math.ceil(idi_operation.count/idi_operation.limit)+'</b>'); // atualizar texto da páginação				
									Ext.getCmp('idi_codigoSel').setValue('');									
									Ext.getCmp('idi_descricao').setValue('');									
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
		
		private function btCancelar(){
			$obj = new TButton(array(
				iconCls=>'bcancel',
				iconAlign=>'left',
				scale=>'small',
				text=>'Cancel',
				width=>70,
				handler=>"
					Ext.getCmp('idi_codigoSel').setValue('');
					Ext.getCmp('idi_descricao').setValue('');					
					_APP.send({event:\"idi_getGridCountSel\",handler:function(_r){
						var ret = Ext.decode(_r);
						idi_operation = new Ext.data.Operation({
							start : 0,  //registro inicial
							page  : 1,	//pág. inicial
							count : ret.count, //passar o count para atualizar a paginacao
							limit :50,  //número de registros por página
							sorters: [  // ordenação da pesquisa																			
							],
							filters: [  // filtros da pesquisa											
							]
						});	
						Ext.getCmp('gridIdiomas').getStore().load(idi_operation);	//atualizar grid
						Ext.getCmp('gridIdiomas_display').setText('<b>Page: 1 - '+Math.ceil(idi_operation.count/idi_operation.limit)+'</b>'); // atualizar texto da páginação				
					}});
				"
			));
			return $obj;
		}
		
		private function btSelecionar(){
			$obj = new TButton(array(
				iconCls=>'bselect',
				iconAlign=>'left',
				scale=>'small',
				text=>'Select',
				width=>80,
				handler=>"
					if(typeof(idi_ret)!='undefined')
					winIdiomasSel.close();
					else
						Ext.Msg.alert('ATTENTION','Select one language.');
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
					idi_ret = {
						codSel:\"\",
						descrSel:\"\"
					};
					winIdiomasSel.close();
				"
			));
			return $obj;
		}		
		
		private function TCol1(){
			$obj = new TColumn(array(
				header=>'Code',
				dataIndex=>'idi_codigoSel',
				width=>100
			));
			return $obj;
		}
		
		private function TCol2(){
			$obj = new TColumn(array(
				header=>'Description',
				dataIndex=>'idi_descricao',
				width=>670,
				flex=>1
			));
			return $obj;
		}
		
		private function TCol3(){
			$obj = new TColumnAction(array(
				width=>20
			));
			$obj->items->add('bedit',$this->TBtEdit());
			return $obj;
		}
		
		private function TCol4(){
			$obj = new TColumnAction(array(
				width=>20
			));
			$obj->items->add('bdel',$this->TBtDel());
			return $obj;
		}
		
		private function TCodigo(){
			$obj = new TText(array(
				name=>'idi_codigoSel',
				fieldLabel=>'Code',
				value=>'',
				labelWidth=>100,
				labelAlign=>'top',				
				margin=>'0 0 0 0',
				width=>100,
				readOnly=>true,
				validateOnBlur=>false,
				validateOnChange=>false,
				enableKeyEvents=>true
			));
			$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
				Ext.getCmp('idi_descricao').focus();
			");
			return $obj;
		}
		
		private function TDescricao(){
			$obj = new TText(array(
				name=>'idi_descricao',
				fieldLabel=>'Description',
				value=>'',
				labelWidth=>665,
				labelAlign=>'top',				
				margin=>'0 0 0 5',
				width=>665,				
				validateOnBlur=>false,
				validateOnChange=>false,
				enableKeyEvents=>true
			));
			$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
				Ext.getCmp('').focus();
			");
			return $obj;
		}
		
		private function TContL2(){
			$obj = new TContainer(array(
				layout=>'hbox',
				width=>800,
				height=>45
			));			
			$obj->items->add('idi_codigoSel',$this->TCodigo());
			$obj->items->add('idi_descricao',$this->TDescricao());
			return $obj;
		}
		
		public function __construct(){
			
			$toolsWindow = new menuTools();
			
			$this->formPesq=new TForm(array(
				frame=>true,
				width=>'100%',
				height=>35,				
				eventName=>'idi_getGridCountSel',
				autoLoad=>true,
				items=>($this->TcontL1())				
			));			
			
			
			$this->form=new TForm(array(
				frame=>true,
				width=>'100%',
				height=>55,
				eventName=>'idi_salvarSel',
				autoLoad=>true,
				items=>($this->TcontL2())
			));
			
			
			$this->paging=new TPaging('gridIdiomas','idi_operation',array( 
				columns=>array($this->TCol1(),$this->TCol2(),/*somente para administrador$this->TCol3(),$this->TCol4()*/),
				height=>350,
				width=>'100%',				
				autoLoad=>false,
				eventName=>'idi_getGridSel',
				queryMode=>TQueryModeType::$remote
			));
			$this->paging->displayMsg='Page';
			$this->paging->first->iconCls='bpgfirst';
			$this->paging->prev->iconCls='bpgprev';
			$this->paging->next->iconCls='bpgnext';
			$this->paging->last->iconCls='bpglast';		
			$this->grid=$this->paging->getGrid();
			$this->grid->onItemClick("
					idi_ret = {
						codSel:Ext.getCmp('gridIdiomas').getStore().getAt(index).data.idi_codigoSel,
						descrSel:Ext.getCmp('gridIdiomas').getStore().getAt(index).data.idi_descricao
					};
				"
			);
			$this->grid->onItemDblClick("
					cid_ret = {
						codSel:Ext.getCmp('gridIdiomas').getStore().getAt(index).data.idi_codigoSel,
						descrSel:Ext.getCmp('gridIdiomas').getStore().getAt(index).data.idi_descricao
					};
					winIdiomasSel.close();
				"
			);
		
			$this->cont=new TContainer(array(
				padding=>'10 10 10 10',
				layout=>'vbox',
				height=>400
			));
			$this->cont->items->add('idi_formPesq',$this->formPesq);
			$this->cont->items->add($this->paging->gridId,$this->grid);
			/*somente para administrador
			$this->cont->items->add('idi_form',$this->form);
			*/
			
			$this->window=new TWindow(array(
				layout=>'fit',
				title=>'Select a Language',
				width=>800,
				height=>450,
				resizable=>false,
				items=>array($this->cont),
				tools=>array($toolsWindow->btPrint())
			));
			$this->window->bbar->add('btFill',new TToolbarFill());
			/*somente para administrador
			$this->window->bbar->add('btNovo',$this->btNovo());
			$this->window->bbar->add('btSalvar',$this->btSalvar());
			$this->window->bbar->add('btCancelar',$this->btCancelar());
			*/
			$this->window->bbar->add('btback',$this->TButtonBack());
			$this->window->bbar->add('btSelecionar',$this->btSelecionar());
			$this->window->onBeforeHide(array("this.onExit(idi_ret);"));		
			$this->window->onAfterRender(array("
					Ext.EventManager.addListener(winIdiomasSel.getEl().id,'keypress',function(eventObj){
						if (eventObj.getKey()==eventObj.ESC){
							idi_ret = {
								codSel:\"\",
								descrSel:\"\"
							};
							winIdiomasSel.close();						
						}
					});
				","
					_APP.send({event:\"idi_getGridCountSel\",handler:function(_r){
						var ret = Ext.decode(_r);
						idi_operation = new Ext.data.Operation({
							start : 0,  //registro inicial
							page  : 1,	//pág. inicial
							count : ret.count, //passar o count para atualizar a paginacao
							limit :50,  //número de registros por página
							sorters: [  // ordenação da pesquisa																			
							],
							filters: [  // filtros da pesquisa											
							]
						});	
						Ext.getCmp('gridIdiomas').getStore().load(idi_operation);	//atualizar grid
						Ext.getCmp('gridIdiomas_display').setText('<b>Page: 1 - '+Math.ceil(idi_operation.count/idi_operation.limit)+'</b>'); // atualizar texto da páginação				
					}});
				"			
			));		
		} 
		
		public function getWindow(){
		  return $this->window;
		}
	}
	
	class idi_getGridCountSel extends TEvent{
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
			$sql = mysql_fetch_array(mysql_query("select count(codigo) as count from idioma $where"));
			echo "{success:true,count:".$sql['count']."}";		
		}
	}
	
	class idi_getGridSel extends TEvent{
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
			$arrayResult=array();									
			$sql = mysql_query("select * from idioma $where limit $this->start,$this->limit");
			while($res = mysql_fetch_array($sql)){
				$arrayRes['idi_codigoSel']=$res['codigo'];
				$arrayRes['idi_descricao']=$res['descricao'];
				array_push($arrayResult,$arrayRes);
			}
			echo '{"records":'.json_encode($arrayResult).'}';
		}
	}
	
	class idi_carregarSel extends TEvent{
		public function execute(){			
		  if(isset($_REQUEST['codigo'])) $codigo = $_REQUEST['codigo']; else $codigo=0;			
			$sql = mysql_query("select * from idioma where codigo='$codigo'");
			$res = mysql_fetch_array($sql);				
			echo '{success:true,data:{
				idi_codigoSel:"'.$res['codigo'].'",
				idi_descricao:"'.$res['descricao'].'"					
			}}';
		}
	}
	
	class idi_salvarSel extends TEvent{
		public function execute(){
			$store = json_decode($_SESSION['store']);
			if(isset($_REQUEST['idi_codigoSel'])) $idi_codigoSel = $_REQUEST['idi_codigoSel']; else $idi_codigoSel;
			if(isset($_REQUEST['idi_descricao'])) $idi_descricao = $_REQUEST['idi_descricao']; else $idi_descricao;		
			if ($idi_codigoSel == ''){
				$sql = mysql_query("insert into idioma values ('','$idi_descricao',0)");
			}else {
				$sql = mysql_query("update idioma set descricao='$idi_descricao' where codigo='$idi_codigoSel'");
			}
			$verifica = mysql_num_rows(mysql_query("select codigo from idioma where codigo='$idi_codigoSel'"));	 	 		 	 	 	 	 
			if($verifica>0){
			  echo "{success:true,msg:'Record updated successfully!'}";
			}else{
			  echo "{success:true,msg:'Record registered successfully!'}";
			}
		}
	}
	
	class idi_apagarSel extends TEvent{
		public function execute(){
			$sql = mysql_query("delete from idioma where codigo='$this->data'");
			echo "{success:true,msg:'Record deleted successfully!'}";
		}
	}
?>