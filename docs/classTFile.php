<?php
class classTFile extends TTabDefault implements iObject{
    public function labelTitle(){
       $obj = new TLabel(array(
    	    text=>"File Demo",
            name=>"label_name",
            padding=>"10 10 10 10",
            style=>"font-size:25px"
		));
	  return $obj;
    }

    public function TFileObj(){
       $obj = new TFile(array(
            name=>"file_name",
            fieldLabel=>"Photo",
            labelWidth=>50,
            padding=>"10 10 10 10",
            width=>300,
            msgTarget=>"side",
            allowBlank=>false,
            buttonText=>"Select Photo..."
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
      $obj->items->add('file',$this->TFileObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'file');
    }
}
?>
