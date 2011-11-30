<?php
class classTHidden extends TTabDefault implements iObject{
    public function labelTitle(){
       $obj = new TLabel(array(
    	    text=>"Hidden Demo",
            name=>"label_name",
            padding=>"10 10 10 10",
            style=>"font-size:25px"
		));
	  return $obj;
    }

    public function TLabelObj(){
       $obj = new TLabel(array(
    	    text=>"The object does not have Hidden preview, this object is used to send a hidden value for the form.",
            name=>"label_name",
            padding=>"10 10 10 10"
		));
	  return $obj;
    }
    
    public function THiddenObj(){
       $obj = new THidden(array(
            name=>"hidden_name",
            value=>10
		));
	  return $obj;
    }
    
    public function TContainerObj(){
      $obj = new TContainer(array(
             layout=>'vbox',
             height=>'100%',
             width=>'100%'
	  ));
	  $obj->items->add('label_title',$this->labelTitle());
      $obj->items->add('label',$this->TLabelObj());
      $obj->items->add('hidden',$this->THiddenObj());
	  return $obj;
	}

    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'hidden');
    }
}
?>
