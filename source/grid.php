<?php
	class TCustomColumn extends TComponent{
		public $header=null;
		public $text=null;
		public $dataIndex=null;
		public $flex=null;
		public $renderer=null;
		public $sortable=false;
		public $hideable=null;
		public $menuDisabled=null;
		public $draggable=null;
		public $groupable=null;
	}
	
	class TColumnAction extends TCustomColumn{
		public $xtype='actioncolumn';
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
	
	class TColumnBoolean extends TCustomColumn{
		public $xtype='booleancolumn';
		public $trueText='Yes';
		public $falseText='No';
	}
	
	class TColumn extends TCustomColumn{
		public $xtype='gridcolumn';
	}
	
	class TColumnDate extends TCustomColumn{
		public $xtype='datecolumn';
		public $format='';
	}
	
	class TColumnNumber extends TCustomColumn{
		public $xtype='numbercolumn';
		public $format='';
	}
	
	class TColumnTemplate extends TCustomColumn{
		public $xtype='templatecolumn';
		public $tpl='';
	}
	//
	//
	class TGrid extends TComponent{
		public $xtype='gridpanel';
		public $autoLoad=true;
		public $root='records';
		public $totalProperty='totalCount';
		public $eventName=null;
		public $queryMode='local';
		
		public $baseCls=null;
		public $bbar;
		public $border=null;
		public $buttonAlign=null;
		public $buttons;
		public $closable=null;
		public $cls=null;
		public $collapsed=null;
		public $collapsible=null;
		public $columnLines=null;
		public $disabled=null;
		public $enableColumnHide=null;
		public $enableColumnMove=null;
		public $enableColumnResize=null;
		public $fbar;
		public $forceFit=null;
		public $frame=null;
		public $hidden=null;
		public $lbar;
		public $maxHeight=null;
		public $maxWidth=null;
		public $minHeight=null;
		public $minWidth=null;
		public $multiSelect=null;
		public $padding=null;
		public $rbar;
		public $scroll=null;
		public $sortableColumns=null;
		public $style=null;
		public $tbar;
		public $tools;
		public $tpl=null;
		
		public $title=null;
		public $margin='0 0 0 0';
		public $columns;
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
			parent::__destruct();
		}
	}
?>