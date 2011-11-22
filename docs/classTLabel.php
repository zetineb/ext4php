<?php
class classTLabel extends TTabDefault implements iObject{
    public function labelTitle(){
       $obj = new TLabel(array(
    	    text=>"Label Demo",
            name=>"label_name",
            padding=>"10 10 10 10",
            style=>"font-size:25px"
		));
	  return $obj;
    }

    public function TLabelObj(){
       $obj = new TLabel(array(
    	    text=>"Label",
            name=>"label_name",
            padding=>"10 10 10 10"
		));
	  return $obj;
    }
    
    public function TContainerObj(){
      $obj = new TContainer(array(
             layout=>'vbox',
             margin=>'2 0 10 2',
             height=>'100%',
             width=>'100%'
	  ));
	  $obj->items->add('label_title',$this->labelTitle());
      $obj->items->add('label',$this->TLabelObj());
	  return $obj;
	}

    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'label');
    }
}
?>
