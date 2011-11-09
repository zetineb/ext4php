<?php
	class TTab extends TComponent{
		public $xtype='tab';
		public $autoScroll=null;
		public $baseCls=null;
		public $border=null;
		public $closable=null;
		public $closeText=null;
		public $cls=null;
		public $defaults=null;
		public $disabled=null;
		public $frame=null;
		public $hidden=null;
		public $html=null;
		public $icon=null;
		public $iconAlign=null;
		public $iconCls=null;
		public $layout=null;
		public $margin=null;
		public $maxHeight=null;
		public $maxWidth=null;
		public $minHeight=null;
		public $minWidth=null;
		public $padding=null;
		public $pressed=null;
		public $region=null;
		public $split=null;
		public $style=null;
		public $tabIndex=null;
		public $text=null;
		public $title=null;
		public $tooltip=null;
		public $type=null;
		//
		public $items;
		
		public function __construct($param=array()){
			$this->items=new TListItems();
			$this->items->setOwner($this);
			//
			parent::__construct($param);
		}
		
		public function __destruct(){
			unset($this->items);
			parent::__destruct();
		}
	}
	
	class TTabPanel extends TComponent{
		public $xtype='tabpanel';
		public $activeItem=0;
		public $baseCls=null;
		public $bbar=null;
		public $bodyBorder=null;
		public $bodyCls=null;
		public $bodyPadding=null;
		public $bodyStyle=null;
		public $border=null; 
		public $buttons; 
		public $buttonAlign=null; 
		public $closable=null;
		public $cls=null;
		public $collapsed=null;
		public $collapsible=null;		
		public $defaults=null;
		public $disabled=null;
		public $fbar=null;
		public $frame=null;
		public $frameHeader=null;
		public $headerPosition=null;
		public $hidden=null;
		public $html=null;
		public $layout='vbox';
		public $lbar;
		public $margin=null;
		public $maxHeight=null;
		public $maxWidth=null;
		public $minHeight=null;
		public $minTabWidth=null;
		public $minWidth=null;
		public $padding=null;
		public $rbar;
		public $resizable=null;
		public $style=null;
		public $tabBar=null;
		public $tabPosition=null;
		public $tbar=null;
		public $title=null;
		public $titleCollapse=null;
		public $tools;
		//
		public $items;
		
		public function __construct($param=array()){
			$this->items=new TListTabs();
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
			$this->tabBar=new TListItems();
			$this->tabBar->setOwner($this);
			$this->tbar=new TListItems();
			$this->tbar->setOwner($this);
			$this->tools=new TListTools();
			//
			parent::__construct($param);
		}
		
		public function __destruct(){
			parent::__destruct();
			unset($this->items);
			unset($this->buttons);
			unset($this->bbar);
			unset($this->fbar);
			unset($this->lbar);
			unset($this->rbar);
			unset($this->tabBar);
			unset($this->tbar);
			unset($this->tools);
		}
	}
?>