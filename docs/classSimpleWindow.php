<?php
class classSimpleWindow{
    private $window;
    
    public function __construct(){
       $this->window = new TWindow(array(
            layout=>'fit',
		    title=>'Simple Window',
		    width=>600,
		    height=>300
	   ));
    }
    
    public function getWindow(){
       return $this->window;
    }
}
?>
