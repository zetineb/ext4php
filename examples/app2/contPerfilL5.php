<?php
class contFormL5 {
	public $contFormL5;
	
	private function TDataCad(){
	  $obj = new TDate(array(
		  name=>'per_dataCad',
			fieldLabel=>'Register Date',
			labelWidth=>100,
			labelAlign=>'top',
			value=>date('d/m/Y'),
			width=>96,
			readOnly=>true,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_codBanco').focus();
		");
		return $obj;
	}
	
	private function TEntCodigo(){	
    $obj = new TText(array(
		  name=>'per_entCodigo',
			fieldLabel=>'Entity Code',
			labelWidth=>85,
			labelAlign=>'top',
			width=>85,
			value=>'',
			margin=>'0 0 0 7',
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}
	
	private function TEntidade(){
	  $obj = new TText(array(
		  name=>'per_entidade',
			fieldLabel=>'Entity',
			labelWidth=>560,
			labelAlign=>'top',
			width=>560,
			value=>'',
			margin=>'0 0 5 7',
			readOnly=>true,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_codBanco').focus();
		");
		return $obj;
	}
	
	public function __construct(){
	  $this->contFormL5=new TContainer(array(
		  layout=>'hbox',
			width=>800,
			height=>45
		));
		$this->contFormL5->items->add('per_dataCad',$this->TDataCad());
		$this->contFormL5->items->add('per_entCodigo',$this->TEntCodigo());
		$this->contFormL5->items->add('per_entidade',$this->TEntidade());
		return $this->contFormL5;
	}
	
	public function getcontFormL5(){
	  return $this->contFormL5;
	}
}
?>