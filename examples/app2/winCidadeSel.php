<?php
require_once "menuTools.php"; // ferramentas das janelas
class winCidadeSel {
 	private $form; 
	private $paging;
	private $grid;
	private $container; 
	public $cidade; 

	/*  Formulario Pesquisa  */			
	private function TPesquisa(){
	  $obj=new TText(array(
		  name=>'cid_pesquisar',
			fieldLabel=>'City',
			labelWidth=>630,
			labelAlign=>'top',
			width=>630,
			margin=>'0 0 5 0',
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
			  Ext.getCmp('cid_uf').focus();
		");
		return $obj;
	}
	
	private function TUf(){
	  $obj = new TCombobox(array(
			name=>'cid_uf',
			fieldLabel=>'STATE',
			labelWidth=>50,
			labelAlign=>'top',
			width=>50,
			margin=>'0 0 5 7',
			displayField=>'nome',
			valueField=>'nome',
			fields=>array('id','nome'),
			eventName=>'cid_carregarUf',
			autoLoad=>true,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
			if(eventObj.getKey()==13)
			  Ext.getCmp('cid_btPesq').focus();
		");
		$obj->queryMode=TQueryModeType::$remote;
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
				var form = Ext.getCmp('formCidPesq').getForm();
				if (form.isValid()) {
						form.submit({
								success: function(form, action) {
										cid_operation = new Ext.data.Operation({
											start : 0,  //registro inicial
											page  : 1,	//pág. inicial
											count : action.result.count,  //passar o count para atualizar a paginacao
											limit :50,  //número de registros por página
											sorters: [  // ordenação da pesquisa							
												new Ext.util.Sorter({
														property: 'uf',
														direction: 'ASC'
												}),
												new Ext.util.Sorter({
														property : 'cidade',
														direction: 'ASC'
												})												
											],
											filters: [  // filtros da pesquisa
												new Ext.util.Filter({
														property: 'uf',
														value   : Ext.getCmp('cid_uf').getValue()											
												}),
												new Ext.util.Filter({
														property: 'cidade',
														value   : Ext.getCmp('cid_pesquisar').getValue()
												})												
											]
										});	
										Ext.getCmp('gridCidPesq').getStore().load(cid_operation);	//atualizar grid
										Ext.getCmp('gridCidPesq_display').setText('<b>Page: 1 - '+Math.ceil(cid_operation.count/cid_operation.limit)+'</b>'); // atualizar texto da páginação
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
		$obj->items->add('cid_pesquisar',$this->TPesquisa());
		$obj->items->add('cid_uf',$this->TUf());
		$obj->items->add('cid_btPesq',$this->TButtonPesq());
		return $obj;	
	}

	private function TCol1(){
	  $obj = new TColumn(array(
		  header=>'City',
			dataIndex=>'cidade',
			width=>600,
			flex=>1
		));
		return $obj;
	}
	
	private function TCol2(){
	  $obj = new TColumn(array(
		  header=>'STATE',
			dataIndex=>'uf',
			width=>90
		));
		return $obj;
	}
	
	private function TCol3(){
	  $obj = new TColumn(array(
		  header=>'Cód. IBGE',
			dataIndex=>'cod',
			width=>80
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
				if(typeof(cid_ret)!='undefined')
			    winCidadeSel.close();
				else
				  Ext.Msg.alert('ATTENTION','Selecione uma cidade.');
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
				cid_ret = {
					cidSel:\"\",
					ufSel:\"\"
				};
			  winCidadeSel.close();
			"
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
			eventName=>'cid_getGridCountSel',
			items=>($this->TContL1())
		));
		
		$this->paging=new TPaging('gridCidPesq','cid_operation',array( //conteúdo da grid
			columns=>array($this->TCol1(),$this->TCol2(),$this->TCol3()),
			height=>300,
			width=>'100%',
			//title=>'Cidades',
			autoLoad=>false,
			eventName=>'cid_getGridSel',
			queryMode=>TQueryModeType::$remote
	  ));
		$this->paging->displayMsg='Page'; //em branco para não exibir páginação
		$this->paging->first->iconCls='bpgfirst';
		$this->paging->prev->iconCls='bpgprev';
		$this->paging->next->iconCls='bpgnext';
		$this->paging->last->iconCls='bpglast';		
		$this->grid=$this->paging->getGrid();
		$this->grid->onItemClick("
			cid_ret = {
			  cidSel:Ext.getCmp('gridCidPesq').getStore().getAt(index).data.cidade,
				ufSel:Ext.getCmp('gridCidPesq').getStore().getAt(index).data.uf
			};
			"
		);
		$this->grid->onItemDblClick("
			cid_ret = {
			  cidSel:Ext.getCmp('gridCidPesq').getStore().getAt(index).data.cidade,
				ufSel:Ext.getCmp('gridCidPesq').getStore().getAt(index).data.uf
			};
			winCidadeSel.close();
			"
		);
		
	  $this->cont=new TContainer(array(
			title=>'Fieldset',
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>350,		
		));	
		$this->cont->items->add('formCidPesq',$this->form);
		$this->cont->items->add($this->paging->gridId,$this->grid);
		
		$this->window=new TWindow(array(
			layout=>'fit',
			title=>'Select a City',
			width=>800,
			height=>420,
			items=>array($this->cont),
			tools=>array($toolsWindow->btPrint()),
			bbar=>array(new TToolbarFill(),$this->TButtonBack(),$this->TButtonSel())
		));
		$this->window->onBeforeHide(array("this.onExit(cid_ret);"));
		$this->window->onAfterRender(array("Ext.getCmp('cid_pesquisar').focus();
		","
			Ext.EventManager.addListener(winCidadeSel.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC){
					cid_ret = {
						cidSel:\"\",
						ufSel:\"\"
					};
					winCidadeSel.close();
				}
			});		
		"));
	}
	
	public function getWindow(){
	  return $this->window;
	}	
}

class cid_carregarUf extends TEvent{
  public function execute(){
	  $i=0;
		$arrayResult=array();
		$sql = mysql_query("select distinct uf from cidade_uf order by uf asc");
		while($res = mysql_fetch_array($sql)){
		  $arrayRes['id']=$i;
			$arrayRes['nome']=strtoupper($res['uf']);
			array_push($arrayResult,$arrayRes);
		  $i++;
		}
		if(count($arrayResult)>0){
			echo '{"totalCount":'.count($arrayResult).',"records":'.json_encode($arrayResult).'}';
		}else{
			echo "{success:false,msg:'There was an error loading the list of states.'}";
		}		
	}
}

class cid_getGridCountSel extends TEvent{
	public function execute(){
		$filter = json_decode($this->filter);
		$where="where ";
		if(isset($_REQUEST['cid_uf'])) $uf = $_REQUEST['cid_uf']; else $uf='';
		if(isset($_REQUEST['cid_pesquisar'])) $cid = $_REQUEST['cid_pesquisar']; else $cid='';
		if($cid!=""){
		  $where.="cidade like '".$cid."%'";
		}
		if($uf!=""){
			if($where!="where "){
			  $where.=" and ";
			}
		  $where.="uf='".$uf."' ";			
		}		
		if($where=="where "){
		  $where="";
		}
		
		$sqlCount = mysql_fetch_array(mysql_query("select count(*) as count from cidade_uf $where"));
		$count = $sqlCount['count'];	
		echo '{success:true,count:"'.$count.'"}';
	}
}

class cid_getGridSel extends TEvent{
  public function execute(){
		$filter = json_decode($this->filter);
		$where="where ";
		$cid = $filter[1]->value;
		if($cid!=""){
		  $where.="cidade like '".$cid."%'";
		}
		$uf = $filter[0]->value;
		if($uf!=""){
			if($where!="where "){
			  $where.=" and ";
			}
		  $where.="uf='".$uf."' ";			
		}		
		if($where=="where "){
		  $where="";
		}
		
		$arrayResult=array();			
		$sql=mysql_query("select cidade,uf,codigo_ibge from cidade_uf $where limit $this->start,$this->limit");
		while($res = mysql_fetch_array($sql)){
			$arrayRes['cidade']=$res['cidade'];
			$arrayRes['uf']=$res['uf'];
			$arrayRes['cod']=$res['codigo_ibge'];
			array_push($arrayResult,$arrayRes);
		}
		echo '{"records":'.json_encode($arrayResult).'}';
	}
}

?>