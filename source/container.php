<?php
	class TContainer extends TComponent{
		public $xtype='container';
		public $autoScroll=null;
		public $baseCls=null;
		public $border=null;
		public $cls=null;
		public $defaults=null;
		public $frame=null;
		public $layout=null;		
		public $items;
		
		public function __construct(){
			parent::__construct();
			$this->items=new TListItems();
			$this->items->setOwner($this);
		}
		
		public function __destruct(){
			unset($this->items);
			parent::__destruct();
		}
	}
?>