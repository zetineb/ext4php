<?php
require_once "menuWindow.php"; //botoes internos da janelas
require_once "menuTools.php"; // ferramentas das janelas

class winFormacao { 
	private $form;
	private $container; 
	private $grid; 
	private $paging; 
	public $window;
	
	private function TCodigo(){
		$obj = new TText(array(
			name=>'for_codinst',
			fieldLabel=>'Education Inst.',
			labelAlign=>'top',
			labelWidth=>100,
			margin=>'0 0 0 3',
			readOnly=>true,
			width=>100,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		 if(eventObj.getKey()==13)
						 Ext.getCmp('for_descrcurso').focus();
		");
		return $obj;
	}
	
	private function TDescr(){
		$obj = new TText(array(
			name=>'for_descrinst',
			fieldLabel=>'',
			labelWidth=>190,
			labelAlign=>'top',
			margin=>'9 0 0 3',
			width=>190,
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		 if(eventObj.getKey()==13)
						 Ext.getCmp('for_codinst').focus();
		");
		return $obj;
	}
	
	public function btPesqIns(){
		$obj=new TButton(array(
			name=>'for_btPesqIns',
			iconCls=>'bsearch',
			iconAlign=>'left',
			margin=>'9 0 0 1',
			labelWidth=>85,
			labelAlign=>'top',
			scale=>'small',
			text=>'Search',
			width=>85
		));	
		$obj->listeners->add("click","
			winInstituicao.onExit=function(_r){
				Ext.getCmp('for_codinst').setValue(_r.codSel);
				Ext.getCmp('for_descrinst').setValue(_r.razaoSel);
			};
			winInstituicao.show();
		");
		return $obj;
	}
	
	private function TCurso(){
		$obj = new TText(array(
			name=>'for_codigo',
			fieldLabel=>'Graduation ',
			labelAlign=>'top',
			labelWidth=>80,
			margin=>'0 0 0 3',
			readOnly=>true,
			width=>80,
			height=>40,
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}
	
	private function TdescrCurso(){
		$obj = new TText(array(
			name=>'for_descrcurso',
			fieldLabel=>'',
			labelAlign=>'top',
			labelWidth=>200,
			margin=>'9 0 0 3',
			readOnly=>true,
			width=>200,
			height=>22,
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}
	
	public function btPesqCur(){
		$obj=new TButton(array(
			name=>'for_btPesqCur',
			iconCls=>'bsearch',
			iconAlign=>'left',
			margin=>'9 0 0 1',
			labelWidth=>100,
			labelAlign=>'top',
			scale=>'small',
			text=>'Search',
			width=>85
		));	
		$obj->listeners->add("click","
			winCursoSel.onExit=function(_r){
				Ext.getCmp('for_codigo').setValue(_r.codSel);
				Ext.getCmp('for_descrcurso').setValue(_r.descrSel);
			};
			winCursoSel.show();
		");
		return $obj;
	}
	
	private function TTurno(){
		$obj = new TCombobox(array(
			name=>'for_turno',
			fieldLabel=>'Turn ',
			labelWidth=>100,
			labelAlign=>'top',
			width=>100,
			margin=>'0 0 0 3',		
			displayField=>'nome',
			maskRe=>'/[""]/',
			valueField=>'nome',
			fields=>array('nome'),
			data=>array(
				array('Nightly'),
				array('Morning'),
				array('Integral'),
				array('Vespertine')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		if(eventObj.getKey()==13)
		Ext.getCmp('for_periodo').focus();
		");
		return $obj;
	}
	
	private function TPeriodo(){
		$obj = new TCombobox(array(
			name=>'for_periodo',
			fieldLabel=>'Period ',
			labelWidth=>200,
			labelAlign=>'top',
			width=>200,
			margin=>'0 0 0 3',			
			displayField=>'nome',
			maskRe=>'/[""]/',
			valueField=>'nome',
			fields=>array('nome'),
			data=>array(
				array('1º year / 1ºHalf'),
				array('1º year / 2ºHalf'),
			array('2º year / 3ºHalf'),
			array('2º year / 4ºHalf'),
			array('3º year / 5ºHalf'),
			array('3º year / 6ºHalf'),
			array('4º year / 7ºHalf'),
			array('4º year / 8ºHalf'),
			array('5º year / 9ºHalf'),
			array('5º year / 10ºHalf'),
			array('6º year / 11ºHalf'),
			array('6º year / 12ºHalf'),
			array('Undefined')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
				Ext.getCmp('for_ano').focus();
		");
		return $obj;
	}
	
	private function TAno(){
		$obj = new TText(array(
			name=>'for_ano',
			fieldLabel=>'Completion Year',
			labelAlign=>'top',
			labelWidth=>100,
			margin=>'0 0 0 3',
			width=>100,
			maskRe=>'/[0-9]/',
			maxLength=>4,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('for_status').focus();
		");
		return $obj;
	}
	
	private function TStatus(){
		$obj = new TCombobox(array(
			name=>'for_status',
			fieldLabel=>'Status ',
			labelWidth=>100,
			labelAlign=>'top',
			width=>100,
			margin=>'0 0 0 3',	
			displayField=>'nome',
			valueField=>'nome',
			maskRe=>'/[""]/',
			fields=>array('nome'),
			data=>array(
				array('ACTIVE'),
				array('INACTIVE')
			),
			enableKeyEvents=>true
		));
		return $obj;
	}

  private function TBtEdit(){
		$obj=new TButton(array(
		  icon=>'images/buttons/edit.png',
			width=>22,
		  handler=>"
				var form = Ext.getCmp('formFormacao').getForm();
				form.load({url:window.location,params:{event:'for_carregar',codFormacao:Ext.getCmp('gridFormacao').getStore().getAt(rowIndex).data.for_codFormacao,for_instituicao:Ext.getCmp('gridFormacao').getStore().getAt(rowIndex).data.for_instituicao},waitMsg: 'Loading'});									   
			"
		));
		return $obj;
	}
	
	private function TBtDel(){
		$obj=new TButton(array(
		  icon=>'images/buttons/delete.png',
			width=>22,
		  handler=>"
				_APP.send({event:\"for_apagar\",data:Ext.getCmp('gridFormacao').getStore().getAt(rowIndex).data.for_instituicao,handler:function(_r){
					Ext.Msg.alert('ATTENTION','Record deleted successfully!');
					_APP.send({event:\"end_getGridCount\",handler:function(_r){
						for_operation = new Ext.data.Operation({
							start : 0, 
							page  : 1,
							count : _r,
							limit : 50, 
							sorters: [													
							],
							filters: [  
							]
						});	
						Ext.getCmp('gridFormacao').getStore().load(for_operation);	
						Ext.getCmp('gridFormacao_display').setText('<b>Page: 1 - '+Math.ceil(for_operation.count/for_operation.limit)+'</b>'); 
					}});					
				}});				
			"
		));
		return $obj;
	}		
	
	private function TCol1(){
		$obj = new TColumn(array(
			header=>'Graduation',
			dataIndex=>'for_descrinstFormacao',
			width=>225
		));
		return $obj;
	}
	
	private function TCol2(){
		$obj = new TColumn(array(
			header=>'Institution',
			dataIndex=>'for_instituicao',
			width=>310,
			flex=>1
		));
		return $obj;
	}
	
	private function TCol3(){
		$obj = new TColumn(array(
			header=>'Completion in',
			dataIndex=>'for_conclusao',
			width=>75
		));
		return $obj;
	}	

	private function TCol4(){
		$obj = new TColumn(array(
			header=>'Status',
			dataIndex=>'for_status',
			width=>70
		));
		return $obj;
	}	
	
	private function TCol5(){
		$obj = new TColumn(array(
			header=>'Code',
			dataIndex=>'for_codFormacao',
			width=>50
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
				Ext.getCmp('for_codigo').setValue('');
				Ext.getCmp('for_descrcurso').setValue('');
				Ext.getCmp('for_codinst').setValue('');
				Ext.getCmp('for_descrinst').setValue('');
				Ext.getCmp('for_turno').setValue('');
				Ext.getCmp('for_periodo').setValue('');
				Ext.getCmp('for_ano').setValue('');
				Ext.getCmp('for_status').setValue('');
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
				if(Ext.getCmp('for_codigo').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Select institution');
				}else if(Ext.getCmp('for_codinst').getValue()==''){
				  Ext.Msg.alert('Atenção', 'Select grade');
				}else{
					var form = Ext.getCmp('formFormacao').getForm();
					if (form.isValid()){
						form.submit({
							success: function(form, action) {
								Ext.Msg.alert('Success', action.result.msg);
								_APP.send({event:\"for_getGridCount\",handler:function(_r){
									for_operation = new Ext.data.Operation({
										start : 0,  //registro inicial
										page  : 1,	//pág. inicial
										count : _r, //passar o count para atualizar a paginacao
										limit :50,  //número de registros por página
										sorters: [  // ordenação da pesquisa																			
										],
										filters: [  // filtros da pesquisa											
										]
									});	
									Ext.getCmp('gridFormacao').getStore().load(for_operation);	//atualizar grid
									Ext.getCmp('gridFormacao_display').setText('<b>Page: 1 - '+Math.ceil(for_operation.count/for_operation.limit)+'</b>'); // atualizar texto da páginação									
								}});	
								Ext.getCmp('for_codigo').setValue('');
								Ext.getCmp('for_descrcurso').setValue('');
								Ext.getCmp('for_codinst').setValue('');
								Ext.getCmp('for_descrinst').setValue('');
								Ext.getCmp('for_turno').setValue('');
								Ext.getCmp('for_periodo').setValue('');
								Ext.getCmp('for_ano').setValue('');
								Ext.getCmp('for_status').setValue('');								
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
				_APP.send({event:\"for_getGridCount\",handler:function(_r){
				alert(_r);
				  
					for_operation = new Ext.data.Operation({
						start : 0,  //registro inicial
						page  : 1,	//pág. inicial
						count : _r, //passar o count para atualizar a paginacao
						limit : 50,  //número de registros por página
						sorters: [  // ordenação da pesquisa																			
						],
						filters: [  // filtros da pesquisa											
						]
					});	
					Ext.getCmp('gridFormacao').getStore().load(for_operation);	//atualizar grid
					Ext.getCmp('gridFormacao_display').setText('<b>Page: 1 - '+Math.ceil(for_operation.count/for_operation.limit)+'</b>'); // atualizar texto da páginação									
				
				}});				
			"
		));	
		return $obj;
	}	
	
	public function __construct(){
		
		$toolsWindow = new menuTools();
		
		$this->conth1=new TContainer(array(
			title=>'Fieldset',
			margin=>'5 5 0 5',
			layout=>'hbox',
			height=>50,
			width=>800
		));	
		
		$this->conth1->items->add('for_codinst',$this->TCodigo());
		$this->conth1->items->add('for_descrinst',$this->TDescr());
		$this->conth1->items->add('for_btPesqIns',$this->btPesqIns());
		$this->conth1->items->add('for_codigo',$this->TCurso());
		$this->conth1->items->add('for_descrcurso',$this->TdescrCurso());
		$this->conth1->items->add('for_btPesqCur',$this->btPesqCur());

		$this->conth2=new TContainer(array(
			title=>'Fieldset',
			margin=>'0 5 5 5',
			layout=>'hbox',
			height=>130,
			width=>800
		));	
		
		$this->conth2->items->add('for_turno',$this->TTurno());
		$this->conth2->items->add('for_periodo',$this->TPeriodo());
		$this->conth2->items->add('for_ano',$this->TAno());
		$this->conth2->items->add('for_status',$this->TStatus());
		
		$this->paging=new TPaging('gridFormacao','for_operation',array( 
			columns=>array($this->TCol5(),$this->TCol1(),$this->TCol2(),$this->TCol3(),$this->TCol4(),$this->TCol6(),$this->TCol7()),
			height=>217,
			width=>790,
			autoLoad=>false,
			
			eventName=>'for_getGrid',
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
			height=>450,
			eventName=>'for_salvar',
			autoLoad=>false
		));
		$this->form->items->add('for_formC1',$this->conth1);
		$this->form->items->add('for_formC2',$this->conth2);
		
		$this->cont=new TContainer(array(
			title=>'Fieldset',
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>450,
			width=>800
		));	
		$this->cont->items->add($this->paging->gridId,$this->grid);
		$this->cont->items->add('formFormacao',$this->form);
		
		$this->window=new TWindow(array(
			layout=>'fit',
			title=>'Graduation',
			width=>800,
			height=>450,
			resizable=>false,
			items=>array($this->cont)
		));	
	
		$btWindow = new menuWindow($this->window,'for');	
		$this->window->bbar->add('wfor_btFill',new TToolbarFill());		
		$this->window->bbar->add('wfor_btNovo',$this->btNovo());		
		$this->window->bbar->add('wfor_btSalvar',$this->btSalvar());		
		$this->window->bbar->add('wfor_btCancel',$this->btCancel());			
		$this->window->onBeforeShow(array("
			setTimeout(function () {
				for(var _i=0;_i<_windows.length;_i++){
				var _win = _windows[_i].toString();
				if(_win.toString()!='winFormacao')				
					var _o=eval(Ext.getCmp(_win));
					if(typeof(_o)!='undefined')
					  _o.close();
			  }
			},300);			
		"));		
		$this->window->onAfterRender(array("
			Ext.EventManager.addListener(winFormacao.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC) winFormacao.close();
			});
		  ","			
			_APP.send({event:\"for_getGridCount\",handler:function(_r){
				for_operation = new Ext.data.Operation({
					start : 0,
					page  : 1,
					count : _r,
					limit :50,
					sorters: [ 							
					],
					filters: [
					]
				});	
				Ext.getCmp('gridFormacao').getStore().load(for_operation);	
				Ext.getCmp('gridFormacao_display').setText('<b>Page: 1 - '+Math.ceil(for_operation.count/for_operation.limit)+'</b>'); 
			}});					
			"
		));
	}
	
	public function getWindow(){
	  return $this->window;
	}
}

class for_getGridCount extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
	  $sql = mysql_fetch_array(mysql_query("select count(*) as count from perfil_formacoes where perfil='$store->perfil'"));
		echo $sql['count'];		
	}
}

class for_getGrid extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$arrayResult=array();
	  $sql = mysql_query("select a.descricao as formacao,b.formacoes,b.status,b.ano_conclusao,c.razao_social from formacao as a left join perfil_formacoes as b on (a.codigo=b.formacoes) left join instituicao as c on (c.codigo=b.instituicao) where b.perfil='$store->perfil'");
		while($res = mysql_fetch_array($sql)){
		  $arrayRes['for_codFormacao']=$res['formacoes'];
		  $arrayRes['for_descrinstFormacao']=$res['formacao'];
		  $arrayRes['for_instituicao']=$res['razao_social'];
		  $arrayRes['for_conclusao']=$res['ano_conclusao'];
		  $arrayRes['for_status']=$res['status'];
			array_push($arrayResult,$arrayRes);
		}
		echo '{records:'.json_encode($arrayResult).'}';
	}
}

class for_carregar extends TEvent{
	public function execute(){
	  $store = json_decode($_SESSION['store']);
		$for_codFormacao = $_REQUEST['codFormacao'];
		$for_instituicao = $_REQUEST['for_instituicao'];
		$sqlInst = mysql_fetch_array(mysql_query("select codigo from instituicao where razao_social='$for_instituicao'"));
		$sql = mysql_query("select a.descricao as formacao,b.*,c.razao_social from formacao as a left join perfil_formacoes as b on (a.codigo=b.formacoes) left join instituicao as c on (c.codigo=b.instituicao) where b.perfil='$store->perfil' and b.formacoes='$for_codFormacao' and b.instituicao='$sqlInst[codigo]'");
		$res = mysql_fetch_array($sql);
		echo '{success:true,data:{
			for_codigo:"'.$res['formacoes'].'",
			for_descrcurso:"'.$res['formacao'].'",
			for_codinst:"'.$res['instituicao'].'",
			for_descrinst:"'.$res['razao_social'].'",
			for_turno:"'.utf8_decode($res['turno']).'",
			for_periodo:"'.utf8_decode($res['periodo']).'",
			for_ano:"'.$res['ano_conclusao'].'",
			for_status:"'.$res['status'].'"
		}}';	
	}
}

class for_salvar extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$for_formacao=$_REQUEST['for_codigo'];
		$for_instituicao=$_REQUEST['for_codinst'];
		$for_periodo=utf8_encode($_REQUEST['for_periodo']);
		$for_ano=$_REQUEST['for_ano'];
		$for_turno=utf8_encode($_REQUEST['for_turno']);
		$for_status=$_REQUEST['for_status'];
		$verifica = mysql_num_rows(mysql_query("select perfil from perfil_formacoes where perfil='$store->perfil' and instituicao='$for_instituicao'"));
		if($verifica==0){
			$sql = mysql_query("insert into perfil_formacoes (perfil,formacoes,instituicao,periodo,turno,status,ano_conclusao) values ('$store->perfil','$for_formacao','$for_instituicao','$for_periodo','$for_turno','$for_status','$for_ano')");			
			echo "{success:true,msg:'Record registered successfully!'}";
		}else{
		  $sql = mysql_query("update perfil_formacoes set formacoes='$for_formacao',periodo='$for_periodo',turno='$for_turno',status='$for_status',ano_conclusao='$for_ano' where perfil='$store->perfil' and instituicao='$for_instituicao'");	
			echo "{success:true,msg:'Record updated successfully!'}";
		}			
	}
}

class for_apagar extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$raz = $_REQUEST['data'];
		$sqlInst = mysql_fetch_array(mysql_query("select codigo from instituicao where razao_social='$raz'"));
		$sql = mysql_query("delete from perfil_formacoes where perfil='$store->perfil' and instituicao='$sqlInst[codigo]'");	
		echo "{success:true,msg:'Record deleted successfully!'}";
	}
}
?>