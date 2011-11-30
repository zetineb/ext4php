<?php
class classTNumber extends TTabDefault implements iObject{
    public function labelTitle(){
       $obj = new TLabel(array(
    	    text=>"Number Demo",
            name=>"label_name",
            padding=>"10 10 10 10",
            style=>"font-size:25px"
		));
	  return $obj;
    }

    public function TNumberObj(){
       $obj = new TNumber(array(
            name=>"number_name",
            padding=>"10 10 10 10",
			width=>150,
			fieldLabel=>"Number",
			labelWidth=>50,
			value=>0
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
      $obj->items->add('number',$this->TNumberObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'number');
    }
}
?>
