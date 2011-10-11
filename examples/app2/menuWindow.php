<?php
class menuWindow {
  private $bt1MenuWin;
  private $bt2MenuWin;
  private $bt3MenuWin;
  private $bt4MenuWin;
  private $bt5MenuWin;
  private $bt6MenuWin;
  private $bt7MenuWin;
  private $bt8MenuWin;

  private function bt1MenuWin(){
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
	
	private function bt2MenuWin(){
		$obj=new TButton(array(
			iconCls=>'buser',
			iconAlign=>'left',
			scale=>'small',
			text=>'Profile',
			width=>60
		));	
		$obj->listeners->add('click','winPerfil.show();');
		return $obj;
	}
	
	private function bt3MenuWin(){
		$obj=new TButton(array(
			iconCls=>'baddress',
			iconAlign=>'left',
			scale=>'small',
			text=>'Address',
			width=>80
		));	
		$obj->listeners->add('click','winEndereco.show();');
		return $obj;
	}
	
	private function bt4MenuWin(){
		$obj=new TButton(array(
			iconCls=>'bphone',
			iconAlign=>'left',
			scale=>'small',
			text=>'Phones',
			width=>70
		));	
		$obj->listeners->add('click','winFone.show();');
		return $obj;
	}
	
	private function bt5MenuWin(){
		$obj=new TButton(array(
			iconCls=>'bgrade',
			iconAlign=>'left',
			scale=>'small',
			text=>'Graduation',
			width=>90
		));	
		$obj->listeners->add('click','winFormacao.show();');
		return $obj;
	}
	
	
	private function bt6MenuWin(){
		$obj=new TButton(array(
			iconCls=>'bability',
			iconAlign=>'left',
			scale=>'small',
			text=>'Skills',
			width=>60
		));	
		$obj->listeners->add('click','winHabilidade.show();');
		return $obj;
	}	

	private function bt7MenuWin(){
		$obj=new TButton(array(
			iconCls=>'bspeech',
			iconAlign=>'left',
			scale=>'small',
			text=>'Language',
			width=>80
		));	
		$obj->listeners->add('click','winIdiomas.show();');
		return $obj;
	}	
	
	private function bt8MenuWin(){
		$obj=new TButton(array(
			iconCls=>'bmonitor',
			iconAlign=>'left',
			scale=>'small',
			text=>'Computation',
			width=>90
		));	
		$obj->listeners->add('click','winInformatica.show();');
		return $obj;
	}
	
	private function bt9MenuWin(){
		$obj=new TButton(array(
			iconCls=>'bprofhist',
			iconAlign=>'left',
			scale=>'small',
			text=>'Professional History',
			width=>130
		));	
		$obj->listeners->add('click','winHistorico.show();');
		return $obj;
	}	
	
	public function __construct($window,$ns){	
    $this->window=$window;
		$this->window->tbar->add($ns.'_bt1MenuWin',$this->bt1MenuWin());
		$this->window->tbar->add($ns.'_bt2MenuWin',$this->bt2MenuWin());
		$this->window->tbar->add($ns.'_bt3MenuWin',$this->bt3MenuWin());
		$this->window->tbar->add($ns.'_bt4MenuWin',$this->bt4MenuWin());		
		$this->window->tbar->add($ns.'_bt5MenuWin',$this->bt5MenuWin());				
		$this->window->tbar->add($ns.'_bt6MenuWin',$this->bt6MenuWin());				
		$this->window->tbar->add($ns.'_bt7MenuWin',$this->bt7MenuWin());				
		$this->window->tbar->add($ns.'_bt8MenuWin',$this->bt8MenuWin());	
		$this->window->tbar->add($ns.'_bt9MenuWin',$this->bt9MenuWin());	
		return $this->window;
	}
}
?>