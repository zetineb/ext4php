<?php
class classTWindow extends TTabDefault implements iObject{
    public function labelTitle(){
       $obj = new TLabel(array(
    	    text=>"Window Demo",
            name=>"label_name",
            padding=>"10 10 10 10",
            style=>"font-size:25px"
		));
	  return $obj;
    }
    
    public function labelDynamic($text){
       $label = new TLabel(array(
    	    text=>$text,
            margin=>"10 10 2 5"
       ));
       return $label;
    }

    public function TContainerMain(){
       $buttonSimpleWindow = new TButton(array(
    	    text=>"Simple Window",
			margin=>"0 5 5 5",
			width=>100,
			iconAlign=>"left",
			handler=>"simpleWindow.show();"
		));
		
		$buttonToolsWindow = new TButton(array(
    	    text=>"Tools Window",
			margin=>"0 5 5 5",
			width=>100,
			iconAlign=>"left",
			handler=>"toolsWindow.show();"
		));
		
		$buttonToolbarWindow = new TButton(array(
    	    text=>"Toolbar Window",
			margin=>"0 5 5 5",
			width=>100,
			iconAlign=>"left",
			handler=>"toolbarWindow.show();"
		));
		
		$container = new TContainer(array(
             layout=>'vbox',
             width=>500,
             height=>300
	    ));
	    
	    $container->items->add('label1',$this->labelDynamic('Click the button below to open a simple window'));
   	    $container->items->add('bSimpleWindow',$buttonSimpleWindow);
   	    $container->items->add('label2',$this->labelDynamic('Click the button below to open a tools window'));
   	    $container->items->add('bToolsWindow',$buttonToolsWindow);
   	    $container->items->add('label3',$this->labelDynamic('Click the button below to open a toolbar window'));
   	    $container->items->add('bToolbarWindow',$buttonToolbarWindow);
		
	  return $container;
    }
    
    public function TContainerObj(){
      $obj = new TContainer(array(
             layout=>'vbox',
             margin=>'2 0 10 2',
             width=>'100%',
             height=>'100%'
	  ));
	  $obj->items->add('label_title',$this->labelTitle());
      $obj->items->add('container_main',$this->TContainerMain());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'window');
    }
}
?>
