<?php
class ComboboxRemote extends TEvent{
	public function execute(){
		$states = array(array(
				'abbr'=>'AL',
				'name'=>'Alabama',
				'pop'=>1000,
				'dtf'=>'2011/04/22'
			), array(
				'abbr'=>'AK',
				'name'=>'Alaska',
				'pop'=>2000,
				'dtf'=>'2011/05/11'
			), array(
				'abbr'=>'AZ',
				'name'=>'Arizona',
				'pop'=>3000,
				'dtf'=>'2011/06/13'
			)
		);
		echo '{"totalCount":3,"records":'.json_encode($states).'}';
	}
}

class classTComboBox extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Combobox Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }
    public function TComboBoxLocal(){
       $obj = new TCombobox(array(
			name=>'combolocal_name',
			fieldLabel=>'ComboBox (local)',
			labelWidth=>100,
			width=>300,
			padding=>'10 10 10 10',
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true,
			maskRe=>'/[""]/',
			displayField=>'name',
			valueField=>'id',
			fields=>array('id','name'),
			data=>array(
				array('1,2,3,4,5','ALL'),
				array(1,'NUMBER ONE'),
				array(2,'NUMBER TWO'),
				array(3,'NUMBER THREE'),
				array(4,'NUMBER FOUR'),
				array(5,'NUMBER FIVE')
			)
		));
	  return $obj;
    }
    
    public function TComboBoxRemote(){
        $obj = new TCombobox(array(
            fieldLabel=>"ComboBox (remote)",
            labelWidth=>300,
            width=>500,
			padding=>'10 10 10 10',
		    displayField=>"name",
		    valueField=>"abbr",
		    fields=>array("abbr","name"),
		    eventName=>"comboboxRemote",
	        queryMode=>TQueryModeType::$remote
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
      $obj->items->add('comboboxLocal',$this->TComboBoxLocal());
      $obj->items->add('comboboxRemote',$this->TComboBoxRemote());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'combobox');
    }
}
?>
