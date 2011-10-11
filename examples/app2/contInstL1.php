<?php
class contInstL1 {
	public $contInstL1;
	
	private function TDataCad(){
	  $obj = new TDate(array(
		  name=>'ins_dtnasc',
			fieldLabel=>'Registration Date',
			labelWidth=>100,
			labelAlign=>'top',
			width=>96,
			margin=>'0 0 5 0',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('ins_razao_social').focus();
		");
		return $obj;
	}

	private function TCodigo(){	
    $obj = new TText(array(
		  name=>'ins_codigo',
			fieldLabel=>'Code',
			labelWidth=>80,
			labelAlign=>'top',
			width=>80,
			value=>'',
			margin=>'0 0 5 7',
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}	
	
	private function TRazaoSocial(){
	  $obj = new TText(array(
		  name=>'ins_razao_social',
			fieldLabel=>'Company Name',
			labelWidth=>300,
			labelAlign=>'top',
			width=>300,
			value=>'',
			maxLength=>14,
			margin=>'0 0 5 7',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('ins_fantasia').focus();
		");
		return $obj;
	}
	
	private function TFantasia(){
	  $obj = new TText(array(
		  name=>'ins_fantasia',
			fieldLabel=>'Trade Name',
			labelWidth=>260,
			labelAlign=>'top',
			width=>260,
			value=>'',
			maxLength=>16,
			margin=>'0 0 5 7',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('ins_cnpj').focus();
		");
		return $obj;
	}
	
	public function __construct(){
	  $this->contInstL1=new TContainer(array(
		  layout=>'hbox',
			width=>800,
			height=>45,
		));
		$this->contInstL1->items->add('ins_dtcad',$this->TDataCad());
		$this->contInstL1->items->add('ins_codigo',$this->TCodigo());
		$this->contInstL1->items->add('ins_razaosocial',$this->TRazaoSocial());
		$this->contInstL1->items->add('ins_fantasia',$this->TFantasia());
		return $this->contInstL1;
	}
	
	public function getContInstL1(){
	  return $this->contInstL1;
	}
}
?>