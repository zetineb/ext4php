<?php
class classToolsWindow{
    private $window;
    
    public function getTools($type){	
       $tool=new TTools();
	   $tool->type=$type;
	   $tool->qtip=strtoupper($type);
	   $tool->handler='Ext.Msg.alert("INFO","'.$type.'");';
	   return $tool;
    }
    
    public function __construct(){
       $this->window = new TWindow(array(
            layout=>'fit',
		    title=>'Tools Window',
		    width=>600,
		    height=>300,
		    tools=>array(
				$this->getTools('close'),
				$this->getTools('minimize'),
				$this->getTools('maximize'),
				$this->getTools('toogle'),
				$this->getTools('restore'),
				$this->getTools('gear'),
				$this->getTools('pin'),
				$this->getTools('unpin'),
				$this->getTools('right'),
				$this->getTools('left'),
				$this->getTools('up'),
				$this->getTools('down'),
				$this->getTools('refresh'),
				$this->getTools('minus'),
				$this->getTools('plus'),
				$this->getTools('help'),
				$this->getTools('search'),
				$this->getTools('save'),
				$this->getTools('print')
			)
	   ));
    }
    
    public function getWindow(){
       return $this->window;
    }
}
?>