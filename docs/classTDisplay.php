<?php
class classTDisplay extends TTabDefault implements iObject{
    public function labelTitle(){
       $obj = new TLabel(array(
    	    text=>"Display Demo",
            name=>"label_name",
            padding=>"10 10 10 10",
            style=>"font-size:25px"
		));
	  return $obj;
    }

    public function TDisplayObj(){
       $obj = new TDisplay(array(
            name=>"display_name",
            padding=>"10 10 10 10",
            width=>250,
			fieldLabel=>"Display",
			labelWidth=>40,
			value=>11
		));
	  return $obj;
    }
    
    public function TContainerObj(){
      $obj = new TContainer(array(
             layout=>'vbox',
             width=>'100%',
             height=>'100%'
	  ));
	  $obj->items->add('label_title',$this->labelTitle());
      $obj->items->add('display',$this->TDisplayObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'display');
    }
}
?>
