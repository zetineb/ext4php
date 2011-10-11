<?php
class contFormL3 {
	public $contFormL3;
	
	private function TNecess(){
	  $obj = new TCombobox(array(
			name=>'per_necess',
			fieldLabel=>'Special Needs',
			labelWidth=>150,
			labelAlign=>'top',
			width=>150,
			displayField=>'nome',
			maskRe=>'/[""]/',
			valueField=>'nome',
			fields=>array('nome'),
			data=>array(
				array('YES'),
				array('NO')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_necessDescr').focus();
		");
		return $obj;
	}
	
	private function TNecessDescr(){
	  $obj = new TText(array(
		  name=>'per_necessDescr',
			fieldLabel=>'Describe',
			labelWidth=>605,
			value=>'',
			labelAlign=>'top',
			width=>605,
			margin=>'0 0 5 7',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13){
			  Ext.getCmp('per_dispo').focus();
				eventObj.preventDefault();
			}
		");
		return $obj;
	}
	
	public function __construct(){
	  $this->contFormL3=new TContainer(array(
		  layout=>'hbox',
			width=>800,
			height=>45
		));
		$this->contFormL3->items->add('per_necess',$this->TNecess());
		$this->contFormL3->items->add('per_necessDescr',$this->TNecessDescr());
		return $this->contFormL3;
	}
	
	public function getContFormL3(){
	  return $this->contFormL3;
	}
}
?>