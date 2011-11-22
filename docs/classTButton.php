<?php
class classTButton extends TTabDefault implements iObject{
    public function labelTitle(){
       $obj = new TLabel(array(
    	    text=>"Button Demo",
            name=>"label_name",
            padding=>"10 10 10 10",
            style=>"font-size:25px"
		));
	  return $obj;
    }

    public function TButtonObj(){
       $obj = new TButton(array(
    	    text=>"Button",
			padding=>"10 10 10 10",
			margin=>"5 5 5 5",
			width=>85,
			iconCls=>"btools",
			iconAlign=>"left",
			handler=>"Ext.Msg.alert('Alert','Is button.');"
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
      $obj->items->add('button',$this->TButtonObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'button');
    }
}
?>
