<?php
class classTFieldset extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Fieldset Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }
    
    public function inputFieldset($text,$name){
        $obj = new TText(array(
             fieldLabel=>$text,
             labelWidth=>100,
             name=>$name,
             padding=>"10 10 10 10",
             width=>350
        ));
	    return $obj;
    }

    public function TFieldsetObj(){
       $obj = new TFieldset(array(
            columnWidth=>0.5,
            title=>"Title Fieldset",
            collapsible=>true,
            margin=>"5 10 10 5",
            padding=>"10 10 10 10",
            layout=>"vbox",
            width=>300,
            height=>180
       ));
       $obj->items->add('label1',$this->inputFieldset('Input 1','label1'));
       $obj->items->add('label2',$this->inputFieldset('Input 2','label2'));
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
      $obj->items->add('fieldset',$this->TFieldsetObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'fieldset');
    }
}
?>
