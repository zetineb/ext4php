<?php
class classTTime extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Time Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }

    public function TTimeObj(){
       $obj = new TTime(array(
            name=>"time_name",
            padding=>"10 10 10 10",
			width=>150,
			fieldLabel=>"Time",
			increment=>1,
			labelWidth=>50,
            minValue=>"00:00 AM",
			maxValue=>"23:59 PM",
			format=>"H:i",
			value=>date("H:i")
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
      $obj->items->add('time',$this->TTimeObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'time');
    }
}
?>
