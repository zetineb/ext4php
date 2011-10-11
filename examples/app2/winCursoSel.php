<?php
require_once "menuTools.php"; // ferramentas das janelas
class winCursoSel {
 	private $form; 
	private $paging;
	private $grid;
	private $container; 
	public $cidade; 
	
	private function TPesquisa(){
	  $obj=new TText(array(
		  name=>'cus_descr',
			fieldLabel=>'Description',
			labelWidth=>620,
			labelAlign=>'top',
			width=>620,
			margin=>'0 5 0 0',
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
			  Ext.getCmp('cus_codigo').focus();
		");
		return $obj;
	}
	
	private function TPCodigo(){
	  $obj=new TText(array(
		  name=>'cus_codigo',
			fieldLabel=>'Code',
			labelWidth=>60,
			labelAlign=>'top',
			width=>60,
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
			  Ext.getCmp('cus_cod').focus();
		");
		return $obj;
	}
	
	private function TButtonPesq(){
	  $obj=new TButton(array(
		  text=>"Filter",
			margin=>'10 0 0 7',
			width=>65,
			iconCls=>'bfilter',
			iconAlign=>'left',
			handler=>"
				var form = Ext.getCmp('formCusPesq').getForm();
				if (form.isValid()) {
					form.submit({
						success: function(form, action) {
							cus_operation = new Ext.data.Operation({
								start : 0,
								page  : 1,
								count : action.result.count,
								limit :50,
								sorters: [
										new Ext.util.Sorter({
										property: 'descricao',
										direction: 'ASC'
									}),
										new Ext.util.Sorter({
										property : 'codigo',
										direction: 'ASC'
									})												
								],
								filters: [  
										new Ext.util.Filter({
										property: 'descricao',
										value   : Ext.getCmp('cus_descr').getValue()											
									}),
										new Ext.util.Filter({
										property: 'codigo',
										value   : Ext.getCmp('cus_codigo').getValue()
									})												
								]
							});	
							Ext.getCmp('gridCusPesq').getStore().load(cus_operation);	//atualizar grid
							Ext.getCmp('gridCusPesq_display').setText('<b>Page: 1 - '+Math.ceil(cus_operation.count/cus_operation.limit)+'</b>'); // atualizar texto da páginação
						}
					});
				}
			"					
		));
		return $obj;
	}	
	
	public function TContL1(){
	  $obj=new TContainer(array(
		  layout=>'hbox',
			width=>800,
			height=>45,
		));
		$obj->items->add('cus_descr',$this->TPesquisa());
		$obj->items->add('cus_codigo',$this->TPCodigo());
		$obj->items->add('cus_btPesq',$this->TButtonPesq());
		return $obj;	
	}
	
	private function TCol1(){
	  $obj = new TColumn(array(
		  header=>'Code',
			dataIndex=>'cus_codigo',
			width=>60
		));
		return $obj;
	}
	
	private function TCol2(){
	  $obj = new TColumn(array(
		  header=>'Description',
			dataIndex=>'cus_descr',
			width=>710,
			flex=>1
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
				if(typeof(cus_ret)!='undefined')
			    winCursoSel.close();
				else
				  Ext.Msg.alert('ATTENTION','Selecione um curso.');
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
				cus_ret = {
					codSel:\"\",
					descrSel:\"\"
				};
			  winCursoSel.close();
			"
		));
		return $obj;
	}	
	
	private function TContBt(){
	  $obj = new TContainer(array(
			title=>'Fieldset',
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>25,
			items=>array($this->TButtonSel())			
		));
		return $obj;
	}
	
	public function __construct(){
	  $toolsWindow = new menuTools();
	  $this->form=new TForm(array(
			frame=>true,
			width=>'100%',
			height=>55,
			layout=>'vbox',
			eventName=>'cus_getGridCount',
			items=>($this->TContL1())
		));
		
		$this->paging=new TPaging('gridCusPesq','cus_operation',array( //conteúdo da grid
			columns=>array($this->TCol1(),$this->TCol2()),
			height=>330,
			width=>'100%',
			autoLoad=>false,
			eventName=>'cus_getGrid',
			queryMode=>TQueryModeType::$remote
	  ));
		$this->paging->displayMsg='Page'; //em branco para não exibir páginação
		$this->paging->first->iconCls='bpgfirst';
		$this->paging->prev->iconCls='bpgprev';
		$this->paging->next->iconCls='bpgnext';
		$this->paging->last->iconCls='bpglast';		
		$this->grid=$this->paging->getGrid();
		$this->grid->onItemClick("
			cus_ret = {
			  codSel:Ext.getCmp('gridCusPesq').getStore().getAt(index).data.cus_codigo,
				descrSel:Ext.getCmp('gridCusPesq').getStore().getAt(index).data.cus_descr
			};
			"
		);
		$this->grid->onItemDblClick("
			cus_ret = {
				codSel:Ext.getCmp('gridCusPesq').getStore().getAt(index).data.cus_codigo,
				descrSel:Ext.getCmp('gridCusPesq').getStore().getAt(index).data.cus_descr
			};
			winCursoSel.close();
			"
		);
		
	  $this->cont=new TContainer(array(
			title=>'Fieldset',
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>350,		
		));	
		$this->cont->items->add('formCusPesq',$this->form);
		$this->cont->items->add($this->paging->gridId,$this->grid);
		
		$this->cidade=new TWindow(array(
			layout=>'fit',
			title=>'Select a Graduation',
			width=>800,
			height=>450,
			items=>array($this->cont),
			tools=>array($toolsWindow->btPrint()),
			bbar=>array(new TToolbarFill(),$this->TButtonBack(),$this->TButtonSel())
		));
		$this->cidade->onBeforeHide(array("this.onExit(cus_ret);"));
		$this->cidade->onAfterRender(array("Ext.getCmp('cus_descr').focus();
		","
			Ext.EventManager.addListener(winCursoSel.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC){
					cus_ret = {
						codSel:\"\",
						descrSel:\"\"
					};
					winCursoSel.close();
				}
			});			
		"));
	}
	
	public function getWindow(){
	  return $this->cidade;
	}	
}

class cus_getGridCount extends TEvent{
	public function execute(){
		$filter = json_decode($this->filter);
		$where="where ";
		$descr = $_REQUEST['cus_descr'];
		if($descr!=""){
		  $where.="descricao like '%".$descr."%'";
		}
		$cod = $_REQUEST['cus_codigo'];
		if($cod!=""){
			if($where!="where "){
			  $where.=" and ";
			}
		  $where.="codigo='".$cod."' ";			
		}		
		if($where=="where "){
		  $where="";
		}
		$sqlCount = mysql_fetch_array(mysql_query("select count(*) as count from formacao $where"));
		$count = $sqlCount['count'];	
		echo '{success:true,count:"'.$count.'"}';
	}
}

class cus_getGrid extends TEvent{
  public function execute(){
		$filter = json_decode($this->filter);
		$descr = $filter[0]->value;
		$cod = $filter[1]->value;		
		$where="where ";
		if($descr!=""){
		  $where.="descricao like '%".$descr."%'";
		}
		if($cod!=""){
			if($where!="where "){
			  $where.=" and ";
			}
		  $where.="codigo='".$cod."' ";			
		}				
		if($where=="where "){
		  $where="";
		}	
		$arrayResult=array();			
		$sql=mysql_query("select descricao,codigo from formacao $where limit $this->start,$this->limit");	
		while($res = mysql_fetch_array($sql)){
		  $arrayRes['cus_codigo']=$res['codigo'];
			$arrayRes['cus_descr']=$res['descricao'];
			array_push($arrayResult,$arrayRes);
		}
		echo '{"records":'.json_encode($arrayResult).'}';
	}
}

?>