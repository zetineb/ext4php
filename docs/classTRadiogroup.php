<?php
class classTRadioGroup extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Radio Group Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }
    
    public function TRadio1(){
       $obj = new TRadio(array(
		    boxLabel=>"Radio 1",
		    name=>"radio",
		    inputValue=>1
       ));
	   return $obj;
    }
    
    public function TRadio2(){
       $obj = new TRadio(array(
		    boxLabel=>"Radio 2",
		    name=>"radio",
		    inputValue=>2,
		    checked=>true
       ));
	   return $obj;
    }
    
    public function TRadio3(){
       $obj = new TRadio(array(
		    boxLabel=>"Radio 3",
		    name=>"radio",
		    inputValue=>3
       ));
	   return $obj;
    }

    public function TRadioGroupObj(){
       $obj = new TRadioGroup(array(
            fieldLabel=>"Radio Group",
		    columns=>2,
            vertical=>true,
            width=>300,
            height=>300,
            margin=>"6 6 6 6"
       ));
       $obj->items->add("radio1",$this->TRadio1());
       $obj->items->add("radio2",$this->TRadio2());
       $obj->items->add("radio3",$this->TRadio3());
	   return $obj;
    }
    
    public function TContainerObj(){
       $obj = new TContainer(array(
             layout=>'vbox',
             width=>'100%',
             height=>'100%'
	   ));
       $obj->items->add('label_title',$this->labelTitle());
       $obj->items->add('radiogroup',$this->TRadioGroupObj());
	   return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'radiogroup');
    }
}
?>
