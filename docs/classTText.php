<?php
class classTText extends TTabDefault implements iObject{
    public function labelTitle(){
       $obj = new TLabel(array(
    	    text=>"Text Demo",
            name=>"label_name",
            padding=>"10 10 10 10",
            style=>"font-size:25px"
		));
	  return $obj;
    }

    public function TTextObj(){
       $obj = new TText(array(
    	    emptyText=>"My name is John",
            name=>"text_name",
            padding=>"10 10 10 10",
			width=>250,
			fieldLabel=>"Text",
			labelWidth=>40
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
      $obj->items->add('text',$this->TTextObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'text');
    }
}
?>
