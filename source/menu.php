<?php
	class TCustomMenu extends TComponent{
		public $baseCls=null;
		public $cls=null;
		public $disabled=null;
		public $handler=null;
		public $hidden=null;
		public $href=null;
		public $hrefTarget=null;
		public $html=null;
		public $icon=null;
		public $iconCls=null;
		public $margin=null;
		public $menu;
		public $padding=null;
		public $plain=null;
		public $style=null;
		public $text='';	
		
		public function __construct($param=array()){
			$this->menu=new TListCustomMenu();
			$this->menu->setOwner($this);
			//
			parent::__construct($param);
		}
		
		public function __destruct(){
			unset($this->menu);
			parent::__destruct();
		}
	}
	
	class TMenuItem extends TCustomMenu{
		public $xtype='menuitem';
	}

	class TMenuCheckItem extends TCustomMenu{
		public $xtype='menucheckitem';
	}

	class TMenuSeparator extends TCustomMenu{
		public $xtype='menuseparator';
	}
?>