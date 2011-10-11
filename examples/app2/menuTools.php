<?php
class menuTools{
	public $toolPrint;
	public $toolBarPage;
	
	public function btPrint(){
		$this->toolPrint=new TTools();
		$this->toolPrint->type=TToolsType::$print;
		$this->toolPrint->handler='Ext.Msg.alert("INFO","Tool print");';	
		return $this->toolPrint;
	}
	
	public function barPage(){
	  $this->toolBarPage=new TContainer(array(
		  layout=>'hbox',
			width=>'100%',
			height=>30,
			cls=>'background-color:#000'
		));
		return $this->toolbarPage;
	}
}
?>