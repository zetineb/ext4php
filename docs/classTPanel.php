<?php
class classTPanel extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Panel Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }

    public function TPanelObj(){
      $obj = new TPanel(array(
             layout=>"vbox",
             title=>"Panel",
             width=>300,
             height=>200,
             margin=>'5 5 5 5'
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
      $obj->items->add('panel',$this->TPanelObj());
	  return $obj;
	}
	
	public function execute(){
        return $this->TTabObj($this->TContainerObj(),'panel');
	}
}
?>
