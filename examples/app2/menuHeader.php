<?php
class menuHeader{
	public $menuHeader;
		
	private function BtMenu1(){
		$obj=new TButton(array(
			iconCls=>'bprocess',
			iconAlign=>'left',
			scale=>'small',
			text=>'Account',
			width=>80
		));	
		$obj->listeners->add('click','winDadosConta.show();');
		return $obj;
	}
	
	private function BtMenu2(){
		$obj=new TButton(array(
			iconCls=>'buser',
			iconAlign=>'left',
			scale=>'small',
			text=>'Profile',
			margin=>'0 0 0 85',
			width=>60
		));	
		$obj->listeners->add('click','winPerfil.show();');
		return $obj;
	}
	
	private function BtMenu3(){
		$obj=new TButton(array(
			iconCls=>'baddress',
			iconAlign=>'left',
			scale=>'small',
			text=>'Address',
			margin=>'0 0 0 150',
			width=>80
		));	
		$obj->listeners->add('click','winEndereco.show();');
		return $obj;
	}
	
	private function BtMenu4(){
		$obj=new TButton(array(
			iconCls=>'bphone',
			iconAlign=>'left',
			scale=>'small',
			text=>'Phones',
			margin=>'0 0 0 235',
			width=>70
		));	
		$obj->listeners->add('click','winFone.show();');
		return $obj;
	} 
	
  private function BtMenu5(){
		$obj=new TButton(array(
			iconCls=>'bgrade',
			iconAlign=>'left',
			scale=>'small',
			text=>'Graduation',
			margin=>'0 0 0 310',
			width=>90
		));	
		$obj->listeners->add('click','winFormacao.show();');
		return $obj;
	}		
	
	public function BtMenu6(){
		$obj=new TButton(array(
			iconCls=>'bability',
			iconAlign=>'left',
			scale=>'small',
			text=>'Skills',		
			margin=>'0 0 0 405',
			width=>60
		));	
		$obj->listeners->add('click','winHabilidade.show();');
		return $obj;
	}		
	
	private function BtMenu7(){
		$obj=new TButton(array(
			iconCls=>'bspeech',
			iconAlign=>'left',
			scale=>'small',
			text=>'Language',
			margin=>'0 0 0 470',
			width=>80
		));	
		$obj->listeners->add('click','winIdiomas.show();');
		return $obj;
	}
	
	private function BtMenu8(){
		$obj=new TButton(array(
			iconCls=>'bmonitor',
			iconAlign=>'left',
			scale=>'small',
			text=>'Computation',
			margin=>'0 0 0 555',
			width=>90
		));	
		$obj->listeners->add('click','winInformatica.show();');
		return $obj;
	}	
	
	private function BtMenu9(){
		$obj=new TButton(array(
			iconCls=>'bprofhist',
			iconAlign=>'left',
			scale=>'small',
			text=>'Professional History',
			margin=>'0 0 0 650',
			width=>130
		));	
		$obj->listeners->add('click','winHistorico.show();');
		return $obj;
	}
	
	private function BtMenu10(){
		$obj=new TButton(array(
			iconCls=>'blogout',
			iconAlign=>'left',
			scale=>'small',
			text=>'Exit',
			margin=>'0 0 0 785',
			width=>50
		));	
		$obj->listeners->add('click','
		  location.href="index.php?logout=1";			
		');
		return $obj;
	}	
	
	public function __construct(){
		$this->menuHeader=new TContainer(array(
			layout=>'absolute',
			baseCls=>'xtaskbar',
			width=>'100%',
			height=>23
		));	
		$this->menuHeader->items->add('mh_btMenu1',$this->BtMenu1());
		$this->menuHeader->items->add('mh_btMenu2',$this->BtMenu2());
		$this->menuHeader->items->add('mh_btMenu3',$this->BtMenu3());
		$this->menuHeader->items->add('mh_btMenu4',$this->BtMenu4());
		$this->menuHeader->items->add('mh_btMenu5',$this->BtMenu5());
		$this->menuHeader->items->add('mh_btMenu6',$this->BtMenu6());
		$this->menuHeader->items->add('mh_btMenu7',$this->BtMenu7());
		$this->menuHeader->items->add('mh_btMenu8',$this->BtMenu8());
		$this->menuHeader->items->add('mh_btMenu9',$this->BtMenu9());
		$this->menuHeader->items->add('mh_btMenu10',$this->BtMenu10());
	}
	
	public function getMenuHeader(){
	  return $this->menuHeader;
	}
	
}
?>