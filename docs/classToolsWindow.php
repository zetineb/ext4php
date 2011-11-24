<?php
class classToolsWindow{
    private $window;
    
    public function getTools(){
       $tool=new TTools();
	   $tool->type=TToolsType::$print;
	   $tool->handler='Ext.Msg.alert("INFO","Print");';
	   return $tool;
    }
    
    public function __construct(){
       $this->window = new TWindow(array(
            layout=>'fit',
		    title=>'Tools Window',
		    width=>600,
		    height=>300,
		    tools=>$this->getTools()
	   ));
    }
    
    public function getWindow(){
       return $this->window;
    }
}
?>
