<?php
class classTTextArea extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"TextArea Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }

    public function TTextAreaObj(){
       $obj = new TTextArea(array(
    	    emptyText=>"it is a textarea",
            name=>"txtarea_name",
            padding=>"10 10 10 10",
			width=>500,
			height=>200,
			fieldLabel=>"TextArea",
			labelWidth=>60
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
      $obj->items->add('textarea',$this->TTextAreaObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'textarea');
    }
}
?>
