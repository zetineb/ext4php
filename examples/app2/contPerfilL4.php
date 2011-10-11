<?php
class contFormL4 {
	public $contFormL4;
	
	private function TDispo(){
	  $obj = new TCombobox(array(
			name=>'per_dispo',
			fieldLabel=>'Available To',
			labelWidth=>150,
			labelAlign=>'top',
			width=>150,
			maskRe=>'/[""]/',
			displayField=>'nome',
			valueField=>'nome',
			fields=>array('nome'),
			data=>array(
				array('LOCKED'),
				array('CLT'),
				array('STAGE'),
				array('CLT/STAGE'),
				array('PJ')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_motivo').focus();
		");
		return $obj;
	}
	
	private function TMotivo(){
	  $obj = new TText(array(
		  name=>'per_motivo',
			fieldLabel=>'Reason',
			labelWidth=>605,
			labelAlign=>'top',
			width=>605,
			value=>'',
			margin=>'0 0 5 7',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_dataCad').focus();
		");
		return $obj;
	}
	
	public function __construct(){
	  $this->contFormL4=new TContainer(array(
		  layout=>'hbox',
			width=>800,
			height=>45
		));
		$this->contFormL4->items->add('per_dispo',$this->TDispo());
		$this->contFormL4->items->add('per_motivo',$this->TMotivo());
		return $this->contFormL4;
	}
	
	public function getContFormL4(){
	  return $this->contFormL4;
	}
}
?>