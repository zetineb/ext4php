<?php
	class TCustomButton extends TComponent{
		public $allowDepress=null;
		public $autoWidth=null;
		public $baseCls=null;
		public $cls=null;
		public $disabled=null;
		public $enableToggle=null;
		public $handler=null;
		public $hidden=null;
		public $html=null;
		public $icon=null;
		public $iconAlign=null;
		public $iconCls=null;
		public $margin=null;
		public $maxHeight=null;
		public $maxWidth=null;
		public $menu;
		public $menuAlign=null;
		public $minHeight=null;
		public $minWidth=null;
		public $padding=null;
		public $pressed=null;
		public $scale=null;
		public $style=null;
		public $tabIndex=null;
		public $text='';
		public $tooltip=null;
		public $type=null;
		
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
	
	class TButton extends TCustomButton{
		public $xtype='button';
	}

	class TButtonCycle extends TCustomButton{
		public $xtype='cycle';
	}
	
	class TButtonSplit extends TCustomButton{
		public $xtype='splitbutton';
	}
?>