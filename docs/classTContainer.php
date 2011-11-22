<?php
class classTContainer extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Container Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }

    public function TContainerObjDemo(){
      $obj = new TContainer(array(
             layout=>"vbox",
             width=>300,
             height=>200,
             cls=>"borderDefaultContainer"
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
      $obj->items->add('container',$this->TContainerObjDemo());
	  return $obj;
	}
	
	public function execute(){
        return $this->TTabObj($this->TContainerObj(),'container');
	}
}
?>
