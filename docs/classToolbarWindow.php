<?php
class classToolbarWindow{
    private $window;

    public function __construct(){
       $buttonClose = new TButton(array(
    	    text=>"Close",
    	    iconCls=>"bclose",
			iconAlign=>"left",
			handler=>"Ext.Msg.alert('INFO','Close');"
		));

		$buttonNew = new TButton(array(
    	    text=>"New",
    	    iconCls=>"badd",
			iconAlign=>"left",
            handler=>"Ext.Msg.alert('INFO','New');"
		));

		$buttonSave = new TButton(array(
    	    text=>"Save",
            iconCls=>"bsave",
			iconAlign=>"left",
            handler=>"Ext.Msg.alert('INFO','Save');"
		));

       $this->window = new TWindow(array(
            layout=>'fit',
		    title=>'Toolbar Window',
		    width=>600,
		    height=>300
	   ));
	   
	   $this->window->bbar->add('bnew',$buttonNew);
   	   $this->window->bbar->add('bsave',$buttonSave);
   	   $this->window->bbar->add('bclose',$buttonClose);
    }
    
    public function getWindow(){
       return $this->window;
    }
}
?>
