<?php
class classTHtmlEditor extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"HtmlEditor Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }

    public function THtmlEditorObj(){
       $obj = new THtmlEditor(array(
            name=>"txtarea_name",
            padding=>"10 10 10 10",
			width=>500,
			height=>200
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
      $obj->items->add('htmleditor',$this->THtmlEditorObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'htmleditor');
    }
}
?>
