<?php

class classTPaging extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Paging Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }
	
	public function paging(){
		$paging=new TPaging('paging','operation',array(
			height=>217,
			width=>490,
			padding=>"10 10 10 10",
			autoLoad=>false,
			eventName=>'getPagingResult',
			queryMode=>TQueryModeType::$remote
		));
		$paging->displayMsg='Page'; 
		$paging->first->iconCls='bpgfirst';
		$paging->first->text='First';
		$paging->prev->iconCls='bpgprev';
		$paging->prev->text='Previous';
		$paging->next->iconCls='bpgnext';
		$paging->next->text='Next';
		$paging->last->iconCls='bpglast';
		$paging->last->text='Last';			
		return $paging;
	}
	
    public function TPagingObj(){
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
		
		$grid=$this->paging()->getGrid();
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
      $obj->items->add('paging',$this->TPagingObj());
	  return $obj;
	}
	    
    public function execute(){
	   return $this->TTabObj($this->TContainerObj(),'paging');
    }
}

class getPagingCount extends TEvent{
	public function execute(){
		echo "16";
	}
}

class getPagingResult extends TEvent{
	public function execute(){
		$array=array(
			array("code"=>"1","descr"=>"John"),
			array("code"=>"2","descr"=>"Joseph"),
			array("code"=>"3","descr"=>"Alice"),
			array("code"=>"4","descr"=>"Mariay"),
			array("code"=>"5","descr"=>"Brad"),
			array("code"=>"6","descr"=>"Washington"),
			array("code"=>"7","descr"=>"Angelina"),
			array("code"=>"8","descr"=>"Jennifer"),
			array("code"=>"9","descr"=>"Emma"),
			array("code"=>"10","descr"=>"Evan"),
			array("code"=>"11","descr"=>"Sarah"),
			array("code"=>"12","descr"=>"Julia"),
			array("code"=>"13","descr"=>"Samuel"),
			array("code"=>"14","descr"=>"Will"),
			array("code"=>"15","descr"=>"Johnny"),
			array("code"=>"16","descr"=>"George")
		);
		$arrayResult=array();
		
		if(($this->start+$this->limit)>count($array)){
			$endArray = count($array);
		}else{
			$endArray = $this->start+$this->limit;
		}
		
		for($i=$this->start;$i<$endArray;$i++){
			array_push($arrayResult,$array[$i]);
		}	
		echo json_encode($arrayResult);
	}
}
?>
