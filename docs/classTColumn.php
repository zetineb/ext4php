<?php
class classTCheckBox extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"CheckBox Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }

    public function TCheckBoxObj(){
       $obj = new TCheckbox(array(
		    boxLabel=>'Checkbox',
		    name=>'checkbox_name',
            padding=>"10 10 10 10",
		    inputValue=>1
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
      $obj->items->add('checkboxgroup',$this->TCheckBoxObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'checkboxgroup');
    }
}
?>
