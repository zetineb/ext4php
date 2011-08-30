<?php
	abstract class TEvent{
		protected $sender;
		protected $data;
		protected $page;
		protected $start;
		protected $limit;
		protected $sort;
		protected $filter;
		
		abstract public function execute();
		//
		public function setSender($value){
			$this->sender=$value;
		}
		public function setData($value){
			$this->data=$value;
		}
		public function setPage($value){
			$this->page=$value;
		}
		public function setStart($value){
			$this->start=$value;
		}
		public function setLimit($value){
			$this->limit=$value;
		}
		public function setSort($value){
			$this->sort=$value;
		}
		public function setFilter($value){
			$this->filter=$value;
		}
	}

	class TTools{
		public $type;
		public $qtip=null;
		public $hidden=null;
		public $handler='';
		
		public function __construct(){
			$this->type=TToolsType::$refresh;
		}
	}
	//
	//
	class TListeners{
		private function getString($value){
			$str='';
			if (is_array($value)){
				for($i=0;$i<count($value);$i++){
					$str.=$value[$i];
					$str.=chr(13).chr(10);
				}
			}
			else
				$str=$value;
				
			return $str;
		}
		//
		public function onActivate($value){
			$this->listeners->add('activate',$this->getString($value));
		}

		public function onAdd($value){
			$this->listeners->add('add',$this->getString($value));
		}
		
		public function onAdded($value){
			$this->listeners->add('added',$this->getString($value));
		}
		
		public function onAfterLayout($value){
			$this->listeners->add('afterlayout',$this->getString($value));
		}

		public function onAfterRender($value){
			$this->listeners->add('afterrender',$this->getString($value));
		}
		
		public function onBeforeActivate($value){
			$this->listeners->add('beforeactivate',$this->getString($value));
		}
		
		public function onBeforeAdd($value){
			$this->listeners->add('beforeadd',$this->getString($value));
		}

		public function onBeforeCardSwitch($value){
			$this->listeners->add('beforecardswitch',$this->getString($value));
		}

		public function onBeforeCollapse($value){
			$this->listeners->add('beforecollapse',$this->getString($value));
		}

		public function onBeforeDeactivate($value){
			$this->listeners->add('beforedeactivate',$this->getString($value));
		}

		public function onBeforeDestroy($value){
			$this->listeners->add('beforedestroy',$this->getString($value));
		}

		public function onBeforeExpand($value){
			$this->listeners->add('beforeexpand',$this->getString($value));
		}

		public function onBeforeHide($value){
			$this->listeners->add('beforehide',$this->getString($value));
		}

		public function onBeforePush($value){
			$this->listeners->add('beforepush',$this->getString($value));
		}

		public function onBeforeRemove($value){
			$this->listeners->add('beforeremove',$this->getString($value));
		}

		public function onBeforeRender($value){
			$this->listeners->add('beforerender',$this->getString($value));
		}

		public function onBeforeShow($value){
			$this->listeners->add('beforeshow',$this->getString($value));
		}

		public function onChange($value){
			$this->listeners->add('change',$this->getString($value));
		}

		public function onCheckChange($value){
			$this->listeners->add('checkchange',$this->getString($value));
		}

		public function onClick($value){
			$this->listeners->add('click',$this->getString($value));
		}

		public function onCardSwitch($value){
			$this->listeners->add('cardswitch',$this->getString($value));
		}

		public function onCollapse($value){
			$this->listeners->add('collapse',$this->getString($value));
		}

		public function onDeactivate($value){
			$this->listeners->add('deactivate',$this->getString($value));
		}

		public function onDestroy($value){
			$this->listeners->add('destroy',$this->getString($value));
		}

		public function onDisable($value){
			$this->listeners->add('disable',$this->getString($value));
		}

		public function onEditModeChange($value){
			$this->listeners->add('editmodechange',$this->getString($value));
		}

		public function onEnable($value){
			$this->listeners->add('enable',$this->getString($value));
		}

		public function onExpand($value){
			$this->listeners->add('expand',$this->getString($value));
		}

		public function onFocus($value){
			$this->listeners->add('focus',$this->getString($value));
		}

		public function onHide($value){
			$this->listeners->add('hide',$this->getString($value));
		}

		public function onInitialize($value){
			$this->listeners->add('initialize',$this->getString($value));
		}

		public function onMaximize($value){
			$this->listeners->add('maximize',$this->getString($value));
		}

		public function onMinimize($value){
			$this->listeners->add('minimize',$this->getString($value));
		}

		public function onMove($value){
			$this->listeners->add('move',$this->getString($value));
		}

		public function onPush($value){
			$this->listeners->add('push',$this->getString($value));
		}

		public function onRemove($value){
			$this->listeners->add('remove',$this->getString($value));
		}

		public function onRemoved($value){
			$this->listeners->add('removed',$this->getString($value));
		}

		public function onRender($value){
			$this->listeners->add('render',$this->getString($value));
		}

		public function onResize($value){
			$this->listeners->add('resize',$this->getString($value));
		}

		public function onSelect($value){
			$this->listeners->add('select',$this->getString($value));
		}

		public function onShow($value){
			$this->listeners->add('show',$this->getString($value));
		}

		public function onSync($value){
			$this->listeners->add('sync',$this->getString($value));
		}

		public function onValidityChange($value){
			$this->listeners->add('validitychange',$this->getString($value));
		}
	}
	
	class TComponent extends TListeners{
		protected $owner=null;
		public $width=null;
		public $height=null;
		public $listeners;
		
		public function __construct(){
			$this->listeners=new TListListener();
		}
		
		public function __destruct(){
			unset($this->listeners);
		}
		
		public function setOwner($owner){
			$this->owner=$owner;
		}
		public function getOwner(){
			return $this->owner;
		}
	}
?>