<?php
	class TView extends TComponent{
		public $xtype='dataview';
		public $autoLoad=true;
		public $root='records';
		public $totalProperty='totalCount';
		public $eventName=null;
		public $queryMode='local';
		//
		public $baseCls=null;
		public $blockRefresh=null;
		public $border=null;
		public $cls=null;
		public $disableSelection=null;
		public $disabled=null;
		public $hidden=null;
		public $html=null;
		public $loadingText=null;
		public $margin=null;
		public $multiSelect=null;
		public $padding=null;
		public $style=null;
		
		public $emptyText=null;
		public $tpl=null;
		public $itemSelector=null;
		//
		public $fields;
		public $data;
		
		public function __construct(){
			parent::__construct();
			$this->fields=new TListString();
			$this->data=new TListString();
		}
		
		public function  __destruct(){
			unset($this->fields);
			unset($this->data);
			parent::__destruct();
		}
	}
?>
