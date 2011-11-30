<?php
class classTTabPanel extends TTabDefault implements iObject{
     public function labelTitle(){
        $obj = new TLabel(array(
           text=>"TabPanel Demo",
           name=>"label_name",
           padding=>"10 10 10 10",
           style=>"font-size:25px"
        ));
	    return $obj;
     }
     
     public function inputField($text,$name){
        $obj = new TText(array(
             fieldLabel=>$text,
             labelWidth=>100,
             name=>$name,
             padding=>"10 10 10 10",
             width=>350
        ));
	    return $obj;
     }
        
     public function TTabDemo(){
        $tab1=new TTab(array(
            title=>'Tab One'
        ));
	    $tab1->items->add('tabone',$this->inputField('Name','name'));
	    
	    $tab2=new TTab(array(
            title=>'Tab Two'
        ));
        $tab2->items->add('tabtwo',$this->inputField('Phone','phone'));
        
	    $tab3=new TTab(array(
            title=>'Tab Three'
        ));
        $tab3->items->add('tabthree',$this->inputField('Email','email'));
        
	    $tab4=new TTab(array(
            title=>'Tab Four'
        ));
        $tab4->items->add('tabfour',$this->inputField('Subject','subject'));
        
	    $tabpanel=new TTabPanel(array(
                margin=>'5 5 5 5'
        ));
	    $tabpanel->items->add('tabonepanel',$tab1);
	    $tabpanel->items->add('tabtwopanel',$tab2);
	    $tabpanel->items->add('tabthreepanel',$tab3);
	    $tabpanel->items->add('tabfourpanel',$tab4);
	    return $tabpanel;
    }
    
    public function TContainerObj(){
       $obj = new TContainer(array(
             layout=>'vbox',
             width=>'100%',
             height=>'100%'
	   ));
       $obj->items->add('label_title',$this->labelTitle());
       $obj->items->add('tabpanel',$this->TTabDemo());
	   return $obj;
	}

    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'tabpanel');
    }
}
?>
