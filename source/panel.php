<?php
	class TPanel extends TComponent{
		public $xtype='panel';
		public $eventName=null;
		//
		public $activeItem=null;
		public $autoScroll=null;
		public $baseCls=null;
		public $bbar;
		public $bodyBorder=null;
		public $bodyCls=null;
		public $bodyPadding=null;
		public $bodyStyle=null;
		public $border=null; 
		public $buttons=null; 
		public $buttonAlign=null; 
		public $closable=null;
		public $cls=null;
		public $collapsed=null;
		public $collapsible=null;
		public $defaults=null;
		public $disabled=null;
		public $fbar;
		public $frameHeader=null;
		public $frame=null;
		public $headerPosition=null;
		public $hidden=null;
		public $html=null;
		public $layout=null;
		public $lbar;
		public $margin=null;
		public $maxHeight=null;
		public $maxWidth=null;
		public $minHeight=null;
		public $minWidth=null;
		public $padding=null;
		public $rbar;
		public $region=null;
		public $resizable=null;
		public $style=null;
		public $tbar=null;
		public $title=null;
		public $titleCollapse=null;
		public $tools;
		//
		public $items;
		
		public function __construct($param=array()){
			$this->items=new TListItems();
			$this->items->setOwner($this);
			$this->buttons=new TListItems();
			$this->buttons->setOwner($this);
			$this->bbar=new TListItems();
			$this->bbar->setOwner($this);
			$this->fbar=new TListItems();
			$this->fbar->setOwner($this);
			$this->lbar=new TListItems();
			$this->lbar->setOwner($this);
			$this->rbar=new TListItems();
			$this->rbar->setOwner($this);
			$this->tbar=new TListItems();
			$this->tbar->setOwner($this);
			$this->tools=new TListTools();
			//
			parent::__construct($param);
		}
		
		public function __destruct(){
			unset($this->items);
			unset($this->buttons);
			unset($this->bbar);
			unset($this->fbar);
			unset($this->lbar);
			unset($this->rbar);
			unset($this->tbar);
			unset($this->tools);
			parent::__destruct();
		}
	}
?>