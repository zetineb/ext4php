<?php
class classTCheckBoxGroup extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"CheckBox Group Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }
    
    public function TCheckBox1(){
       $obj = new TCheckbox(array(
		    boxLabel=>'Checkbox 1',
		    name=>'checkbox1',
		    inputValue=>1
       ));
	  return $obj;
    }
    
    public function TCheckBox2(){
       $obj = new TCheckbox(array(
		    boxLabel=>'Checkbox 2',
		    name=>'checkbox2',
		    inputValue=>2
       ));
	  return $obj;
    }
    
    public function TCheckBox3(){
       $obj = new TCheckbox(array(
		    boxLabel=>'Checkbox 3',
		    name=>'checkbox3',
		    inputValue=>3,
		    checked=>true
       ));
	  return $obj;
    }

    public function TCheckBoxGroupObj(){
       $obj = new TCheckboxGroup(array(
            fieldLabel=>'Checkbox Group',
		    columns=>2,
            vertical=>true,
            width=>300,
            height=>300,
            margin=>'6 6 6 6'
       ));
       $obj->items->add('checkbox1',$this->TCheckBox1());
       $obj->items->add('checkbox2',$this->TCheckBox2());
       $obj->items->add('checkbox3',$this->TCheckBox3());
	   return $obj;
    }
    
    public function TContainerObj(){
       $obj = new TContainer(array(
             layout=>'vbox',
             width=>'100%',
             height=>'100%'
	   ));
       $obj->items->add('label_title',$this->labelTitle());
       $obj->items->add('checkboxgroup',$this->TCheckBoxGroupObj());
	   return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'checkboxgroup');
    }
}
?>
