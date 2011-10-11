<?php
class contFormL2 {
	public $contFormL2;
	
	private function TCidNatal(){	
    $obj = new TText(array(
		  name=>'per_cidNatal',
			fieldLabel=>'Birth City',
			labelWidth=>492,
			labelAlign=>'top',
			width=>492,
			value=>'',
			margin=>'0 0 5 0',
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}	
	
	private function btPesq(){
		$obj=new TButton(array(
			name=>'per_btPesq',
			iconCls=>'bsearch',
			iconAlign=>'left',
			margin=>'10 0 0 1',
			scale=>'small',
			text=>'Search',
			width=>85
		));	
		$obj->listeners->add("click","
		  winCidadeSel.onExit=function(_r){
			  Ext.getCmp('per_cidNatal').setValue(_r.cidSel+'/'+_r.ufSel);
				Ext.getCmp('per_sexo').focus();
			};
		  winCidadeSel.show();
		");
		return $obj;
	}
	
	private function TSexo(){
	  $obj = new TCombobox(array(
			name=>'per_sexo',
			fieldLabel=>'Sex',
			labelWidth=>100,
			labelAlign=>'top',
			width=>100,
			margin=>'0 0 0 5',
			displayField=>'nome',
			maskRe=>'/[""]/',
			valueField=>'nome',
			fields=>array('nome'),
			data=>array(
				array('MALE'),
				array('FEMALE'),
				array('BOTH')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_fumante').focus();
		");
		return $obj;
	}
	
	private function TFumante(){
	  $obj = new TCombobox(array(
			name=>'per_fumante',
			fieldLabel=>'Smoker',
			labelWidth=>70,
			labelAlign=>'top',
			width=>70,
			margin=>'0 0 0 5',
			maskRe=>'/[""]/',
			displayField=>'nome',
			valueField=>'id',
			fields=>array('id','nome'),
			data=>array(
				array(0,'NO'),
				array(1,'YES')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_necess').focus();
		");
		return $obj;
	}
	
	public function __construct(){
	  $this->contFormL2=new TContainer(array(
		  layout=>'hbox',
			width=>800,
			height=>45
		));
		$this->contFormL2->items->add('per_cidNatal',$this->TCidNatal());
		$this->contFormL2->items->add('per_btPesq',$this->btPesq());
		$this->contFormL2->items->add('per_sexo',$this->TSexo());
		$this->contFormL2->items->add('per_fumante',$this->TFumante());
		return $this->contFormL2;
	}
	
	public function getContFormL2(){
	  return $this->contFormL2;
	}
}
?>