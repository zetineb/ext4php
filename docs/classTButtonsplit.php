<?php
class classTSplitButton extends TTabDefault implements iObject{
    public function labelTitle(){
       $obj = new TLabel(array(
    	    text=>"Split Button Demo",
            name=>"label_name",
            padding=>"10 10 10 10",
            style=>"font-size:25px"
		));
	  return $obj;
    }

    public function menuButton1(){
      $obj=new TMenuItem(array(
            text=>"Button 1"
      ));
      $obj->onClick("Ext.Msg.alert('Alert','Is button one.');");
      return $obj;
    }
    
    public function menuButton2(){
       $obj = new TMenuItem(array(
    	    text=>"Button 2"
       ));
       $obj->onClick("Ext.Msg.alert('Alert','Is button two.');");
       return $obj;
    }

    public function TButtonObj(){
       $obj = new TButtonSplit(array(
    	    text=>"Button Split",
			padding=>"10 10 10 10",
			margin=>"5 5 5 5",
			width=>120,
			iconCls=>"btools",
			iconAlign=>"left",
			handler=>"Ext.Msg.alert('Alert','Is button split.');"
		));
		$obj->menu->add('button1',$this->menuButton1());
		$obj->menu->add('button2',$this->menuButton2());
	   return $obj;
    }
    
    public function TContainerObj(){
      $obj = new TContainer(array(
             layout=>'vbox',
             width=>'100%',
             height=>'100%'
	  ));
	  $obj->items->add('label_title',$this->labelTitle());
      $obj->items->add('buttonsplit',$this->TButtonObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'buttonsplit');
    }
}
?>
