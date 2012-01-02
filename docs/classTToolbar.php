<?php
class classTToolbar extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Toolbar Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }
	
	public function TToolbarObj(){
		$buttonTools=new TButton(array(
			 iconCls=>'btools',
			 iconAlign=>'left',
			 scale=>'small',
			 text=>'Tools'
		));
		$buttonClose=new TButton(array(
			 iconCls=>'bclose',
			 iconAlign=>'left',
			 scale=>'small',
			 text=>'Close'
		));
		$obj = new TPanel(array(
             layout=>"vbox",
             title=>"Panel",
             width=>500,
             height=>200,
             margin=>'5 5 5 5'
		));
		$obj->bbar->add('buttonTools',$buttonTools);
		$obj->bbar->add('separator',new TToolbarSeparator());
		$obj->bbar->add('text1',$this->createToolbarText('<b>Text Html One</b>'));
		$obj->bbar->add('spacer',new TToolbarSpacer());
		$obj->bbar->add('text2',$this->createToolbarText('<i>Text Html Two</i>'));
		$obj->bbar->add('fill',new TToolbarFill());
		$obj->bbar->add('buttonClose',$buttonClose);
		return $obj;
	}

    public function createToolbarText($text){
       $obj = new TToolbarText(array(
			html=>$text
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
      $obj->items->add('toolbar',$this->TToolbarObj());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'toolbar');
    }
}
?>
