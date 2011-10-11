<?php
require_once "menuWindow.php"; //botoes internos da janelas
require_once "menuTools.php"; // ferramentas das janelas
require_once "contInstL1.php"; //linha1 do formulario

class winInstituicao {
 	private $form; 
 	private $grid; 
 	private $paging; 
	private $container; 
	public $window; 
	
	private function TCol1(){
		$obj = new TColumn(array(
			header=>'Code',
			dataIndex=>'ins_codigo',
			width=>100
		));
		return $obj;
	}
	
	private function TCol2(){
		$obj = new TColumn(array(
			header=>'Company Name',
			dataIndex=>'ins_razao',
			width=>670,
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
				if(typeof(ins_ret)!='undefined')
			    winInstituicao.close();
				else
				  Ext.Msg.alert('ATTENTION','Selecione uma instituicao.');
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
				ins_ret = {
					codSel:\"\",
					razaoSel:\"\"
				};
			  winInstituicao.close();
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
			"
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
			"
		));	
		return $obj;
	}	
	
	public function __construct(){
	  
	  $toolsWindow = new menuTools();	
	  $contInstL1=new contInstL1();

		$this->paging=new TPaging('gridInstituicao','ins_operation',array( 
			columns=>array($this->TCol1(),$this->TCol2()),
			height=>360,
			width=>'100%',
			autoLoad=>false,
			eventName=>'ins_getGrid',
			queryMode=>TQueryModeType::$remote
		));
		$this->paging->displayMsg='Page';
		$this->paging->first->iconCls='bpgfirst';
		$this->paging->prev->iconCls='bpgprev';
		$this->paging->next->iconCls='bpgnext';
		$this->paging->last->iconCls='bpglast';		
		$this->grid=$this->paging->getGrid();	
		$this->grid->onItemClick("
			ins_ret = {
			  codSel:Ext.getCmp('gridInstituicao').getStore().getAt(index).data.ins_codigo,
				razaoSel:Ext.getCmp('gridInstituicao').getStore().getAt(index).data.ins_razao
			};
			"
		);
		$this->grid->onItemDblClick("
			ins_ret = {
			  codSel:Ext.getCmp('gridInstituicao').getStore().getAt(index).data.ins_codigo,
				razaoSel:Ext.getCmp('gridInstituicao').getStore().getAt(index).data.ins_razao
			};
			winInstituicao.close();
			"
		);	
	
	  $this->form=new TForm(array(
			frame=>true,
			width=>'100%',
			height=>300,
			layout=>'vbox',
			eventName=>'ins_salvar',
			items=>array($contInstL1->getcontInstL1())
		));
		
	  $this->cont=new TContainer(array(
			title=>'Fieldset',
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>360,		
		));	
		//$this->cont->items->add('formInstituicao',$this->form);
		$this->cont->items->add($this->paging->gridId,$this->grid);
		
		$this->window=new TWindow(array(
			layout=>'fit',
			title=>'Institution',
			width=>800,
			height=>450,
			items=>array($this->cont),
			tools=>array($toolsWindow->btPrint())
		));
		$btWindow = new menuWindow($this->window,'int');	
		$this->window->bbar->add('wi_btFill',new TToolbarFill());		
		/*apenas para admin
		$this->window->bbar->add('wi_btNovo',$this->btNovo());		
		$this->window->bbar->add('wi_btSalvar',$this->btSalvar());		
		$this->window->bbar->add('wi_btCancel',$this->btCancel());
		*/
		$this->window->bbar->add('wi_btBack',$this->TButtonBack());
		$this->window->bbar->add('wi_btSel',$this->TButtonSel());
		$this->window->onBeforeHide(array("this.onExit(ins_ret);"));
		$this->window->onAfterRender(array("
			Ext.EventManager.addListener(winInstituicao.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC){
					ins_ret = {
						codSel:\"\",
						razaoSel:\"\"
					};
					winInstituicao.close();				
				}
			});
		","
 			_APP.send({event:\"ins_getGridCount\",handler:function(_r){
				ins_operation = new Ext.data.Operation({
					start : 0,
					page  : 1,
					count : _r,
					limit :50,
					sorters: [																		
					],
					filters: [ 								
					]
				});	
				Ext.getCmp('gridInstituicao').getStore().load(ins_operation);
				Ext.getCmp('gridInstituicao_display').setText('<b>Page: 1 - '+Math.ceil(ins_operation.count/ins_operation.limit)+'</b>');
			}});
		"));
	}
	
	public function getWindow(){
	  return $this->window;
	}	
}

class ins_getGridCount extends TEvent{
	public function execute(){
	  $store = json_decode($_SESSION['store']);
		$sqlCount = mysql_fetch_array(mysql_query("select count(codigo) as count from instituicao where entidade='$store->entidade'"));
		echo $sqlCount['count'];
	}
}
	
class ins_getGrid extends TEvent{
	public function execute(){
	  $store = json_decode($_SESSION['store']);
		$arrayResult=array();
	  $sql = mysql_query("select codigo,razao_social from instituicao where entidade='$store->entidade'");
		while($res = mysql_fetch_array($sql)){
			$arrayRes['ins_codigo']=$res['codigo'];
			$arrayRes['ins_razao']=$res['razao_social'];
			array_push($arrayResult,$arrayRes);
		}
		echo '{"records":'.json_encode($arrayResult).'}';		
	}
}
?>