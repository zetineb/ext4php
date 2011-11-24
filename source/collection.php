<?php
	class TCollection{
		protected $owner=null;
		protected $container=array();
		protected $pointer=-1;
		protected $name='Collection';
		
		public function add($name,$value){
			array_push($this->container,array($name,$value));
		}
		public function count(){
			return count($this->container);
		}
		public function name(){
			if (!$this->count()) throw new Exception($this->name.' is empty');
			return $this->container[$this->pointer][0];
		}
		public function value(){
			if (!$this->count()) throw new Exception($this->name.' is empty');
			return $this->container[$this->pointer][1];
		}
		public function next(){
			if ($this->pointer<($this->count()-1)){
				$this->pointer++;
				return true;
			}
			else{
				$this->reset();	//Start again iterator
				return false;
			}
		}
		public function reset(){
			$this->pointer=-1;
		}
		public function iterator(){
			return $this->pointer;
		}
		public function setOwner($owner){
			$this->owner=$owner;
		}
		public function getOwner(){
			return $this->owner;
		}
	}

	class TListString extends TCollection{
		public function __construct(){
			$this->name='String List';
		}	
	}

	class TListListener extends TCollection{
		public function __construct(){
			$this->name='ExtJS Listener';
		}	
	}
	
	class TListEvent extends TCollection{
		public function __construct(){
			$this->name='Event';
		}
		public function add($name,$value){
			if (get_parent_class($value)!='TEvent') throw new Exception($this->name.' "'.$name.'" is not TEvent');
			parent::add($name,$value);
		}
	}
	
	class TListHeader extends TCollection{
		public function __construct(){
			$this->name='HTML Header';
		}	
	}
	
	class TListWindow extends TCollection{
		public function __construct(){
			$this->name='Window';
		}
		public function add($name,$value){
			if (get_class($value)!='TWindow') throw new Exception($this->name.' "'.$name.'" is not TWindow');
			parent::add($name,$value);
		}
	}
	
	class TListItems extends TCollection{
		public function __construct(){
			$this->name='Items';
		}
		public function add($name,$value){
			$value->setOwner($this->owner);
			if (get_parent_class($value)!='TComponent'&&
				get_parent_class($value)!='TCustomToolbar'&&
				get_parent_class($value)!='TCustomButton'&&
				get_parent_class($value)!='TCustomComponent') throw new Exception($this->name.' "'.$name.'" is not TComponent');
			parent::add($name,$value);
		}
	}

	class TListTools extends TCollection{
		public function __construct(){
			$this->name='Tools';
		}
		public function add($name,$value){
			if (get_class($value)!='TTools') throw new Exception($this->name.' "'.$name.'" is not TTools');
			parent::add($name,$value);
		}
	}

	class TListTabs extends TCollection{
		public function __construct(){
			$this->name='Tabs';
		}
		public function add($name,$value){
			$value->setOwner($this->owner);
			if (get_class($value)!='TTab') throw new Exception($this->name.' "'.$name.'" is not TTab');
			parent::add($name,$value);
		}
	}

	class TListCustomMenu extends TCollection{
		public function __construct(){
			$this->name='Custom Menu';
		}
		public function add($name,$value){
			$value->setOwner($this->owner);
			if (get_parent_class($value)!='TCustomMenu') throw new Exception($this->name.' "'.$name.'" is not TCustomMenu');
			parent::add($name,$value);
		}
	}
	
	class TListColumns extends TCollection{
		public function __construct(){
			$this->name='Columns';
		}
		public function add($name,$value){
			if (get_parent_class($value)!='TCustomColumn') throw new Exception($this->name.' "'.$name.'" is not TCustomColumn');
			parent::add($name,$value);
		}
	}
	
	class TListCheckbox extends TCollection{
		public function __construct(){
			$this->name='TCheckbox';
		}
		public function add($name,$value){
			$value->setOwner($this->owner);
			if (get_class($value)!='TCheckbox') throw new Exception($this->name.' "'.$name.'" is not TCheckbox');
			parent::add($name,$value);
		}
	}
	
	class TListRadio extends TCollection{
		public function __construct(){
			$this->name='TRadio';
		}
		public function add($name,$value){
			$value->setOwner($this->owner);
			if (get_class($value)!='TRadio') throw new Exception($this->name.' "'.$name.'" is not TRadio');
			parent::add($name,$value);
		}
	}

	class TListTreeNode extends TCollection{
		public function __construct(){
			$this->name='TreeNode';
		}
		public function add($name,$value){
			if (get_class($value)!='TTreeNode') throw new Exception($this->name.' "'.$name.'" is not TTreeNode');
			parent::add($name,$value);
		}
	}
?>