<?php
class classTRadio extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"RadioButton Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }

    public function TRadioObj(){
       $obj = new TRadio(array(
		    boxLabel=>"Radiobutton",
		    name=>"radio_name",
            padding=>"10 10 10 10",
		    inputValue=>1
       ));
	  return $obj;
    }
    
    public function TContainerObj(){
      $obj = new TContainer(array(
             layout=>'vbox',
             margin=>'2 0 10 2',
             width=>'100%',
             height=>'100%'
	  ));
	  $obj->items->add('label_title',$this->labelTitle());
      $obj->items->add('radio',$this->TRadioObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'radio');
    }
}
?>
