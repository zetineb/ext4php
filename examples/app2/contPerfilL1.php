<?php
class contFormL1 {
	public $contFormL1;
	
	private function TCodigo(){	
    $obj = new TText(array(
		  name=>'per_codigo',
			fieldLabel=>'Code',
			labelWidth=>80,
			labelAlign=>'top',
			width=>80,
			value=>'',
			margin=>'0 0 5 0',
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}	
	
	private function TDataNasc(){
	  $obj = new TDate(array(
		  name=>'per_dtnasc',
			fieldLabel=>'Birth Date',
			labelWidth=>100,
			labelAlign=>'top',
			width=>96,
			allowBlank=>false,
			value=>'',
			margin=>'0 0 5 7',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_cpf').focus();
		");
		return $obj;
	}
	
	private function TCpf(){
	  $obj = new TText(array(
		  name=>'per_cpf',
			fieldLabel=>'CPF',
			labelWidth=>100,
			labelAlign=>'top',
			width=>100,
			value=>'',
			maxLength=>14,
			maskRe=>'/[0-9]/',
			margin=>'0 0 5 7',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
			if(eventObj.getKey()==13){
			    Ext.getCmp('per_rg').focus();
			}else{		
				if(eventObj.getKey()!=8){
					var _str = Ext.getCmp('per_cpf').getValue();
					if(_str.length==3)
						_str = _str.substr(0,3)+'.'+_str.substr(3,1);
					if(_str.length==7)
						_str = _str.substr(0,7)+'.'+_str.substr(7,1);
					if(_str.length==11)
						_str = _str.substr(0,11)+'-'+_str.substr(11,1);
					Ext.getCmp('per_cpf').setValue(_str);
				}
			}
		");
		return $obj;
	}
	
	private function TRg(){
	  $obj = new TText(array(
		  name=>'per_rg',
			fieldLabel=>'RG',
			labelWidth=>120,
			labelAlign=>'top',
			width=>120,
			value=>'',
			maxLength=>16,
			maskRe=>'/[0-9]/',
			margin=>'0 0 5 7',
			enableKeyEvents=>true,
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_ufrg').focus();
		");
		return $obj;
	}
	
	private function TUfrg(){
	  $obj = new TText(array(
		  name=>'per_ufrg',
			fieldLabel=>'State/RG',
			labelWidth=>40,
			labelAlign=>'top',
			width=>40,
			value=>'',
			maxLength=>2,
			maskRe=>'/[a-zA-Z]/',
			margin=>'0 0 5 7',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_estcivil').focus();
		");
		return $obj;
	}
	
	private function TEstCivil(){
	  $obj = new TCombobox(array(
			name=>'per_estcivil',
			fieldLabel=>'Civil Status',
			labelWidth=>100,
			labelAlign=>'top',
			width=>100,
			margin=>'0 0 5 7',
			maskRe=>'/[""]/',
			displayField=>'nome',
			valueField=>'nome',
			fields=>array('nome'),
			data=>array(
				array('SINGLE'),
				array('MARRIED'),
				array('DIVORCED'),
				array('WIDOW'),
				array('SEPARATED')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_graduacao').focus();
		");
		return $obj;
	}
	
	private function TGraduacao(){
	  $obj = new TCombobox(array(
			name=>'per_graduacao',
			fieldLabel=>'Graduation',
			labelWidth=>150,
			labelAlign=>'top',
			width=>150,
			margin=>'0 0 5 7',
			maskRe=>'/[""]/',
			displayField=>'nome',
			valueField=>'nome',
			fields=>array('nome'),
			data=>array(
				array('ELEMENTARY SCHOOL'),
				array('HIGH SCHOOL'),
				array('UNDERGRADUATE PROGRAMS'),
				array('MASTER DEGREE STUDIES'),
				array('PROFESSIONAL SCHOOL'),
				array('DOCTORAL STUDIES'),
				array('POSDOCTORAL STUDY AND RESEARCH'),
				array('NOTHING'),
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_btPesq').focus();
		");
		return $obj;
	}
	
	public function __construct(){
	  $this->contFormL1=new TContainer(array(
		  layout=>'hbox',
			width=>800,
			height=>45,
		));
		$this->contFormL1->items->add('per_codigo',$this->TCodigo());
		$this->contFormL1->items->add('per_dtnasc',$this->TDataNasc());
		$this->contFormL1->items->add('per_cpf',$this->TCpf());
		$this->contFormL1->items->add('per_rg',$this->TRg());
		$this->contFormL1->items->add('per_ufrg',$this->TUfrg());
		$this->contFormL1->items->add('per_estcivil',$this->TEstCivil());
		$this->contFormL1->items->add('per_graduacao',$this->TGraduacao());
		return $this->contFormL1;
	}
	
	public function getContFormL1(){
	  return $this->contFormL1;
	}
}
?>