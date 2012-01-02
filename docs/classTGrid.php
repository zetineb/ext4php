<?php

class classTGrid extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Grid Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }
	
    public function TGridObj(){
		$col1 = new TColumn(array(
			header=>'Code',
			dataIndex=>'code',
			width=>60
		));
		
		$col2 = new TColumn(array(
			header=>'Name',
			dataIndex=>'descr',
			width=>430,
			flex=>1
		));	
		
		$grid=new TGrid(array(
			width=>400,
			height=>250,
			padding=>10
		));
			
		$grid->fields->add(0,'code');
		$grid->fields->add(1,'descr');

		$grid->data->add(0,array("1","John"));
		$grid->data->add(1,array("2","Joseph"));
		$grid->data->add(2,array("3","Alice"));
		$grid->data->add(3,array("4","Mariay"));
		$grid->data->add(4,array("2","Joseph"));
		$grid->data->add(5,array("5","Brad"));
		$grid->data->add(6,array("6","Washington"));
		$grid->data->add(7,array("7","Angelina"));
		$grid->data->add(8,array("8","Jennifer"));
		$grid->data->add(9,array("9","Emma"));
		$grid->data->add(10,array("10","Evan"));
		$grid->data->add(11,array("11","Sarah"));
		$grid->data->add(12,array("12","Julia"));
		$grid->data->add(13,array("13","Samuel"));
		$grid->data->add(14,array("14","Will"));
		$grid->data->add(15,array("15","Johnny"));
		$grid->data->add(16,array("16","George"));
		
		$grid->columns->add('col1',$col1);
		$grid->columns->add('col2',$col2);	
		
	    return $grid;
    }
    
	public function TContainerObj(){
      $obj = new TContainer(array(
             layout=>'vbox',
             width=>'100%',
             height=>'100%'
	  ));
	  $obj->items->add('label_title',$this->labelTitle());
      $obj->items->add('grid',$this->TGridObj());
	  return $obj;
	}
	    
    public function execute(){
	   return $this->TTabObj($this->TContainerObj(),'grid');
    }
}
?>
