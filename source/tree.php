<?php
	class TTreeNode extends TComponent{
		public $expanded=false;
		public $text=null;
		public $iconCls=null;
		public $children;
		
		public function __construct($param=array()){
			$this->children=new TListTreeNode();
			//
			parent::__construct($param);
		}
		public function __destruct(){
			unset($this->children);
			//
			parent::__destruct();
		}
	}

	class TTree extends TComponent{
		public $xtype='treepanel';
		public $autoLoad=true;
		public $root='records';
		public $totalProperty='totalCount';
		public $eventName=null;
		public $queryMode='local';
		//
		public $activeItem=null;
		public $animCollapse=null;
		public $animate=null;
		public $autoScroll=null;
		public $autoShow=null;
		public $baseCls=null;
		public $bbar;
		public $bodyBorder=null;
		public $bodyCls=null;
		public $bodyPadding=null;
		public $bodyStyle=null;
		public $border=null;
		public $buttonAlign=null;
		public $buttons;
		public $closable=null;
//		public $closeAction=null;
		public $cls=null;
		public $collapseDirection=null;
		public $collapseFirst=null;
		public $collapseMode=null;
		public $collapsed=null;
		public $collapsible=null;
		public $columns;
		public $defaults=null;
		public $deferRowRender=null;
		public $disabled=null;
		public $displayField=null;
		public $enableColumnHide=null;
		public $enableColumnMove=null;
		public $enableColumnResize=null;
		public $enableLocking=null;
		public $fbar;
		public $floatable=null;
		public $floating=null;
		public $focusOnToFront=null;
		public $folderSort=null;
		public $forceFit=null;
		public $frame=null;
		public $frameHeader=null;
		public $headerPosition=null;
		public $hidden=null;
		public $hideCollapseTool=null;
		public $hideHeaders=null;
		public $hideMode=null;
		public $html=null;
		public $iconCls=null;
		public $itemId=null;
		public $layout=null;
		public $lbar;
		public $lines=null;
		public $maintainFlex=null;
		public $maxHeight=null;
		public $maxWidth=null;
		public $minButtonWidth=null;
		public $minHeight=null;
		public $minWidth=null;
		public $multiSelect=null;
		public $overCls=null;
		public $overlapHeader=null;
		public $padding=null;
		public $preventHeader=null;
		public $rbar;
		public $region=null;
		public $resizable=null;
		public $rootVisible=null;
		public $split=null;
		public $saveDelay=null;
		public $scroll=null;
		public $scrollDelta=null;
		public $shadow=null;
		public $simpleSelect=null;
		public $singleExpand=null;
		public $sortableColumns=null;
		public $style=null;
		public $tbar;
		public $title=null;
		public $titleCollapse=null;
		public $toFrontOnShow=null;
		public $tools;
		public $tpl=null;
		public $useArrows=null;
		//
		public $margin='0 0 0 0';
		public $rootNode=null;			//TTreeNode
		public $fields;
		public $data;
		
		public function __construct($param=array()){
			$this->columns=new TListColumns();
			$this->columns->setOwner($this);
			$this->fields=new TListString();
			$this->data=new TListString();
			//
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
			unset($this->columns);
			unset($this->fields);
			unset($this->data);
			//
			unset($this->buttons);
			unset($this->bbar);
			unset($this->fbar);
			unset($this->lbar);
			unset($this->rbar);
			unset($this->tbar);
			unset($this->tools);
			//
			parent::__destruct();
		}
	}
?>