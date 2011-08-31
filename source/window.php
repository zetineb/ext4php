<?php
	class TWindow extends TComponent{		
		public $xtype='window';
		public $activeItem=0;
		public $baseCls=null;
		public $bbar;
		public $bodyBorder=null;
		public $bodyCls=null;
		public $bodyPadding=null;
		public $bodyStyle=null;
		public $border=null; 
		public $buttons; 
		public $buttonAlign=null; 
		public $closable=null;
		public $closeAction='hide';
		public $cls=null;
		public $collapsed=null;
		public $collapsible=null;
		public $defaults=null;
		public $disabled=null;
		public $fbar;
		public $frameHeader=null;
		public $frame=null;
		public $headerPosition=null;
		//public $height=300;	
		public $hidden=null;
		public $html=null;
		public $layout='fit'; 
		public $lbar;
		public $margin=null;
		public $maxHeight=null;
		public $maxWidth=null;
		public $maximizable=null;
		public $maximized=null;
		public $minHeight=null;
		public $minWidth=null;
		public $minimizable=null;
		public $modal=true;
		public $overCls=null;
		public $padding=null;
		public $plain=null;
		public $rbar;
		public $resizable=null;
		public $style=null;
		public $tbar=null;
		public $title=''; 
		public $titleCollapse=null;
		public $tools;
		//public $width=400; 
		public $x=null;
		public $y=null;
		//
		//public $listeners;
		public $items;
		
		public function __construct($param=array()){
			//$this->listeners=new TListListener();
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
			parent::__construct($param);	//Must be here
		}
		
		public function __destruct(){
			//unset($this->listeners);
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