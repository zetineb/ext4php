<?php
class classTDate extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Date Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }

    public function TDateObj(){
       $obj = new TDate(array(
    	    format=>"d/m/Y",
            name=>"date_name",
            padding=>"10 10 10 10",
			width=>100,
            minValue=>date("1984-01-01"),
            maxValue=>date("Y-m-d"),
            value=>date("Y-m-d")
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
      $obj->items->add('date',$this->TDateObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'date');
    }
}
?>
