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
		
		public function __construct($param=array()){
			$this->listeners=new TListListener();
			//
			$keys=array_keys($param);
			for($i=0;$i<count($keys);$i++){
				$v=$param[$keys[$i]];
				if (!strcasecmp($keys[$i],activeItem)) $this->activeItem=$v;
				elseif (!strcasecmp($keys[$i],activeError)) $this->activeError=$v;
				elseif (!strcasecmp($keys[$i],allowBlank)) $this->allowBlank=$v;
				elseif (!strcasecmp($keys[$i],allowDecimals)) $this->allowDecimals=$v;
				elseif (!strcasecmp($keys[$i],allowDepress)) $this->allowDepress=$v;
				elseif (!strcasecmp($keys[$i],altFormats)) $this->altFormats=$v;
				elseif (!strcasecmp($keys[$i],anchor)) $this->anchor=$v;
				elseif (!strcasecmp($keys[$i],autoLoad)) $this->autoLoad=$v;
				elseif (!strcasecmp($keys[$i],autoSelect)) $this->autoSelect=$v;
				elseif (!strcasecmp($keys[$i],autoScroll)) $this->autoScroll=$v;
				elseif (!strcasecmp($keys[$i],autoWidth)) $this->autoWidth=$v;
				elseif (!strcasecmp($keys[$i],baseCls)) $this->baseCls=$v;
				elseif (!strcasecmp($keys[$i],bbar)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->bbar->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->bbar->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],blankText)) $this->blankText=$v;
				elseif (!strcasecmp($keys[$i],blockRefresh)) $this->blockRefresh=$v;
				elseif (!strcasecmp($keys[$i],bodyBorder)) $this->bodyBorder=$v;
				elseif (!strcasecmp($keys[$i],bodyCls)) $this->bodyCls=$v;
				elseif (!strcasecmp($keys[$i],bodyPadding)) $this->bodyPadding=$v;
				elseif (!strcasecmp($keys[$i],bodyStyle)) $this->bodyStyle=$v;
				elseif (!strcasecmp($keys[$i],border)) $this->border=$v;
				elseif (!strcasecmp($keys[$i],boxLabel)) $this->boxLabel=$v;
				elseif (!strcasecmp($keys[$i],boxLabelAlign)) $this->boxLabelAlign=$v;
				elseif (!strcasecmp($keys[$i],buttons)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->buttons->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->buttons->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],buttonAlign)) $this->buttonAlign=$v;
				elseif (!strcasecmp($keys[$i],buttonText)) $this->buttonText=$v;
				elseif (!strcasecmp($keys[$i],checked)) $this->checked=$v;
				elseif (!strcasecmp($keys[$i],clearCls)) $this->clearCls=$v;
				elseif (!strcasecmp($keys[$i],closable)) $this->closable=$v;
				elseif (!strcasecmp($keys[$i],closeText)) $this->closeText=$v;
				elseif (!strcasecmp($keys[$i],cls)) $this->cls=$v;
				elseif (!strcasecmp($keys[$i],collapsed)) $this->collapsed=$v;
				elseif (!strcasecmp($keys[$i],collapsible)) $this->collapsible=$v;
				elseif (!strcasecmp($keys[$i],columnLines)) $this->columnLines=$v;
				elseif (!strcasecmp($keys[$i],columns)&&get_class($this)=='TGrid'){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->columns->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->columns->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],columns)) $this->columns=$v;
				elseif (!strcasecmp($keys[$i],columnWidth)) $this->columnWidth=$v;
				elseif (!strcasecmp($keys[$i],createLinkText)) $this->createLinkText=$v;
				elseif (!strcasecmp($keys[$i],data)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->data->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->data->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],dataIndex)) $this->dataIndex=$v;
				elseif (!strcasecmp($keys[$i],decimalPrecision)) $this->decimalPrecision=$v;
				elseif (!strcasecmp($keys[$i],decimalSeparator)) $this->decimalSeparator=$v;
				elseif (!strcasecmp($keys[$i],defaults)) $this->defaults=$v;
				elseif (!strcasecmp($keys[$i],defaultLinkValue)) $this->defaultLinkValue=$v;
				elseif (!strcasecmp($keys[$i],defaultType)) $this->defaultType=$v;
				elseif (!strcasecmp($keys[$i],defaultValue)) $this->defaultValue=$v;
				elseif (!strcasecmp($keys[$i],disabled)) $this->disabled=$v;
				elseif (!strcasecmp($keys[$i],disabledDates)) $this->disabledDates=$v;
				elseif (!strcasecmp($keys[$i],disabledDatesText)) $this->disabledDatesText=$v;
				elseif (!strcasecmp($keys[$i],disabledDays)) $this->disabledDays=$v;
				elseif (!strcasecmp($keys[$i],disabledDaysText)) $this->disabledDaysText=$v;
				elseif (!strcasecmp($keys[$i],disableSelection)) $this->disableSelection=$v;
				elseif (!strcasecmp($keys[$i],displayField)) $this->displayField=$v;
				elseif (!strcasecmp($keys[$i],draggable)) $this->draggable=$v;
				elseif (!strcasecmp($keys[$i],enableKeyEvents)) $this->enableKeyEvents=$v;
				elseif (!strcasecmp($keys[$i],editable)) $this->editable=$v;
				elseif (!strcasecmp($keys[$i],emptyText)) $this->emptyText=$v;
				elseif (!strcasecmp($keys[$i],enableAlignments)) $this->enableAlignments=$v;
				elseif (!strcasecmp($keys[$i],enableColors)) $this->enableColors=$v;
				elseif (!strcasecmp($keys[$i],enableColumnHide)) $this->enableColumnHide=$v;
				elseif (!strcasecmp($keys[$i],enableColumnMove)) $this->enableColumnMove=$v;
				elseif (!strcasecmp($keys[$i],enableColumnResize)) $this->enableColumnResize=$v;
				elseif (!strcasecmp($keys[$i],enableFont)) $this->enableFont=$v;
				elseif (!strcasecmp($keys[$i],enableFontSize)) $this->enableFontSize=$v;
				elseif (!strcasecmp($keys[$i],enableFormat)) $this->enableFormat=$v;
				elseif (!strcasecmp($keys[$i],enableLinks)) $this->enableLinks=$v;
				elseif (!strcasecmp($keys[$i],enableLists)) $this->enableLists=$v;
				elseif (!strcasecmp($keys[$i],enableToggle)) $this->enableToggle=$v;
				elseif (!strcasecmp($keys[$i],enableSourceEdit)) $this->enableSourceEdit=$v;
				elseif (!strcasecmp($keys[$i],eventName)) $this->eventName=$v;
				elseif (!strcasecmp($keys[$i],falseText)) $this->falseText=$v;
				elseif (!strcasecmp($keys[$i],fbar)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->fbar->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->fbar->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],fields)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->fields->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->fields->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],fieldLabel)) $this->fieldLabel=$v;
				elseif (!strcasecmp($keys[$i],flex)) $this->flex=$v;
				elseif (!strcasecmp($keys[$i],fontFamilies)) $this->fontFamilies=$v;
				elseif (!strcasecmp($keys[$i],forceFit)) $this->forceFit=$v;
				elseif (!strcasecmp($keys[$i],forceSelection)) $this->forceSelection=$v;
				elseif (!strcasecmp($keys[$i],format)) $this->format=$v;
				elseif (!strcasecmp($keys[$i],frameHeader)) $this->frameHeader=$v;
				elseif (!strcasecmp($keys[$i],frame)) $this->frame=$v;
				elseif (!strcasecmp($keys[$i],groupable)) $this->groupable=$v;
				elseif (!strcasecmp($keys[$i],handler)) $this->handler=$v;
				elseif (!strcasecmp($keys[$i],header)) $this->header=$v;
				elseif (!strcasecmp($keys[$i],headerPosition)) $this->headerPosition=$v;
				elseif (!strcasecmp($keys[$i],height)) $this->height=$v;
				elseif (!strcasecmp($keys[$i],hidden)) $this->hidden=$v;
				elseif (!strcasecmp($keys[$i],hideable)) $this->hideable=$v;
				elseif (!strcasecmp($keys[$i],html)) $this->html=$v;
				elseif (!strcasecmp($keys[$i],icon)) $this->icon=$v;
				elseif (!strcasecmp($keys[$i],iconAlign)) $this->iconAlign=$v;
				elseif (!strcasecmp($keys[$i],iconCls)) $this->iconCls=$v;
				elseif (!strcasecmp($keys[$i],increment)) $this->increment=$v;
				elseif (!strcasecmp($keys[$i],inputValue)) $this->inputValue=$v;
				elseif (!strcasecmp($keys[$i],items)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->items->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->items->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],itemSelector)) $this->itemSelector=$v;
				elseif (!strcasecmp($keys[$i],invalidText)) $this->invalidText=$v;
				elseif (!strcasecmp($keys[$i],keyNavEnabled)) $this->keyNavEnabled=$v;
				elseif (!strcasecmp($keys[$i],labelAlign)) $this->labelAlign=$v;
				elseif (!strcasecmp($keys[$i],labelPad)) $this->labelPad=$v;
				elseif (!strcasecmp($keys[$i],labelSeparator)) $this->labelSeparator=$v;
				elseif (!strcasecmp($keys[$i],labelWidth)) $this->labelWidth=$v;
				elseif (!strcasecmp($keys[$i],layout)) $this->layout=$v;
				elseif (!strcasecmp($keys[$i],lbar)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->lbar->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->lbar->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],loadingText)) $this->loadingText=$v;
				elseif (!strcasecmp($keys[$i],margin)) $this->margin=$v;
				elseif (!strcasecmp($keys[$i],maskRe)) $this->maskRe=$v;
				elseif (!strcasecmp($keys[$i],maxHeight)) $this->maxHeight=$v;
				elseif (!strcasecmp($keys[$i],maxWidth)) $this->maxWidth=$v;
				elseif (!strcasecmp($keys[$i],maximizable)) $this->maximizable=$v;
				elseif (!strcasecmp($keys[$i],maximized)) $this->maximized=$v;
				elseif (!strcasecmp($keys[$i],maxLength)) $this->maxLength=$v;
				elseif (!strcasecmp($keys[$i],maxLengthText)) $this->maxLengthText=$v;
				elseif (!strcasecmp($keys[$i],maxText)) $this->maxText=$v;
				elseif (!strcasecmp($keys[$i],maxValue)) $this->maxValue=$v;
				elseif (!strcasecmp($keys[$i],menu)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->menu->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->menu->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],menuDisabled)) $this->menuDisabled=$v;
				elseif (!strcasecmp($keys[$i],minHeight)) $this->minHeight=$v;
				elseif (!strcasecmp($keys[$i],minWidth)) $this->minWidth=$v;
				elseif (!strcasecmp($keys[$i],minimizable)) $this->minimizable=$v;
				elseif (!strcasecmp($keys[$i],minLength)) $this->minLength=$v;
				elseif (!strcasecmp($keys[$i],minLengthText)) $this->minLengthText=$v;
				elseif (!strcasecmp($keys[$i],minText)) $this->minText=$v;
				elseif (!strcasecmp($keys[$i],minValue)) $this->minValue=$v;
				elseif (!strcasecmp($keys[$i],multiSelect)) $this->multiSelect=$v;
				elseif (!strcasecmp($keys[$i],modal)) $this->modal=$v;
				elseif (!strcasecmp($keys[$i],msgTarget)) $this->msgTarget=$v;
				elseif (!strcasecmp($keys[$i],name)) $this->name=$v;
				elseif (!strcasecmp($keys[$i],nanText)) $this->nanText=$v;
				elseif (!strcasecmp($keys[$i],negativeText)) $this->negativeText=$v;
				elseif (!strcasecmp($keys[$i],overCls)) $this->overCls=$v;
				elseif (!strcasecmp($keys[$i],padding)) $this->padding=$v;
				elseif (!strcasecmp($keys[$i],plain)) $this->plain=$v;
				elseif (!strcasecmp($keys[$i],pressed)) $this->pressed=$v;
				elseif (!strcasecmp($keys[$i],queryMode)) $this->queryMode=$v;
				elseif (!strcasecmp($keys[$i],queryParam)) $this->queryParam=$v;
				elseif (!strcasecmp($keys[$i],rbar)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->rbar->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->rbar->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],readOnly)) $this->readOnly=$v;
				elseif (!strcasecmp($keys[$i],renderer)) $this->renderer=$v;
				elseif (!strcasecmp($keys[$i],resizable)) $this->resizable=$v;
				elseif (!strcasecmp($keys[$i],root)) $this->root=$v;
				elseif (!strcasecmp($keys[$i],scale)) $this->scale=$v;
				elseif (!strcasecmp($keys[$i],scroll)) $this->scroll=$v;
				elseif (!strcasecmp($keys[$i],selectOnFocus)) $this->selectOnFocus=$v;
				elseif (!strcasecmp($keys[$i],selectOnTab)) $this->selectOnTab=$v;
				elseif (!strcasecmp($keys[$i],showToday)) $this->showToday=$v;
				elseif (!strcasecmp($keys[$i],sortable)) $this->sortable=$v;
				elseif (!strcasecmp($keys[$i],sortableColumns)) $this->sortableColumns=$v;
				elseif (!strcasecmp($keys[$i],spinDownEnabled)) $this->spinDownEnabled=$v;
				elseif (!strcasecmp($keys[$i],spinUpEnabled)) $this->spinUpEnabled=$v;
				elseif (!strcasecmp($keys[$i],startDay)) $this->startDay=$v;
				elseif (!strcasecmp($keys[$i],step)) $this->step=$v;
				elseif (!strcasecmp($keys[$i],style)) $this->style=$v;
				elseif (!strcasecmp($keys[$i],tbar)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->tbar->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->tbar->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],tabIndex)) $this->tabIndex=$v;
				elseif (!strcasecmp($keys[$i],text)) $this->text=$v;
				elseif (!strcasecmp($keys[$i],title)) $this->title=$v;
				elseif (!strcasecmp($keys[$i],titleCollapse)) $this->titleCollapse=$v;
				elseif (!strcasecmp($keys[$i],tools)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->tools->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->tools->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],tooltip)) $this->tooltip=$v;
				elseif (!strcasecmp($keys[$i],totalProperty)) $this->totalProperty=$v;
				elseif (!strcasecmp($keys[$i],tpl)) $this->tpl=$v;
				elseif (!strcasecmp($keys[$i],triggerAction)) $this->triggerAction=$v;
				elseif (!strcasecmp($keys[$i],trueText)) $this->trueText=$v;
				elseif (!strcasecmp($keys[$i],type)) $this->type=$v;
				elseif (!strcasecmp($keys[$i],typeAhead)) $this->typeAhead=$v;
				elseif (!strcasecmp($keys[$i],validateOnBlur)) $this->validateOnBlur=$v;
				elseif (!strcasecmp($keys[$i],validateOnChange)) $this->validateOnChange=$v;
				elseif (!strcasecmp($keys[$i],validator)) $this->validator=$v;
				elseif (!strcasecmp($keys[$i],valueField)) $this->valueField=$v;
				elseif (!strcasecmp($keys[$i],valueNotFoundText)) $this->valueNotFoundText=$v;
				elseif (!strcasecmp($keys[$i],value)) $this->value=$v;
				elseif (!strcasecmp($keys[$i],vertical)) $this->vertical=$v;
				elseif (!strcasecmp($keys[$i],width)) $this->width=$v;
				elseif (!strcasecmp($keys[$i],x)) $this->x=$v;
				elseif (!strcasecmp($keys[$i],y)) $this->y=$v;
			}
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