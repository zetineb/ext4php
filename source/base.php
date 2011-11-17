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

		public function onBlur($value){
			$this->listeners->add('blur',$this->getString($value));
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

		public function onItemClick($value){
			$this->listeners->add('itemclick',$this->getString($value));
		}

		public function onItemDblClick($value){
			$this->listeners->add('itemdblclick',$this->getString($value));
		}

		public function onKeyDown($value){
			$this->listeners->add('keydown',$this->getString($value));
		}
		
		public function onKeyPress($value){
			$this->listeners->add('keypress',$this->getString($value));
		}

		public function onKeyUp($value){
			$this->listeners->add('keyup',$this->getString($value));
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
		
		public function onRowClick($value){
			$this->listeners->add('itemclick',$this->getString($value));
		}

		public function onRowDblClick($value){
			$this->listeners->add('itemdblclick',$this->getString($value));
		}
		
		public function onSelect($value){
			$this->listeners->add('select',$this->getString($value));
		}

		public function onShow($value){
			$this->listeners->add('show',$this->getString($value));
		}

		public function onSpecialKey($value){
			$this->listeners->add('specialkey',$this->getString($value));
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
				elseif (!strcasecmp($keys[$i],angleField)) $this->angleField=$v;
				elseif (!strcasecmp($keys[$i],anchor)) $this->anchor=$v;
				elseif (!strcasecmp($keys[$i],animate)) $this->animate=$v;
				elseif (!strcasecmp($keys[$i],autoCancel)) $this->autoCancel=$v;
				elseif (!strcasecmp($keys[$i],animCollapse)) $this->animCollapse=$v;
				elseif (!strcasecmp($keys[$i],autoLoad)) $this->autoLoad=$v;
				elseif (!strcasecmp($keys[$i],autoSelect)) $this->autoSelect=$v;
				elseif (!strcasecmp($keys[$i],autoScroll)) $this->autoScroll=$v;
				elseif (!strcasecmp($keys[$i],autoShow)) $this->autoShow=$v;
				elseif (!strcasecmp($keys[$i],autoSize)) $this->autoSize=$v;
				elseif (!strcasecmp($keys[$i],autoWidth)) $this->autoWidth=$v;
				elseif (!strcasecmp($keys[$i],axes)) $this->axes=$v;
				elseif (!strcasecmp($keys[$i],axis)) $this->axis=$v;
				elseif (!strcasecmp($keys[$i],background)) $this->background=$v;
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
				elseif (!strcasecmp($keys[$i],boxFill)) $this->boxFill=$v;
				elseif (!strcasecmp($keys[$i],boxLabel)) $this->boxLabel=$v;
				elseif (!strcasecmp($keys[$i],boxLabelAlign)) $this->boxLabelAlign=$v;
				elseif (!strcasecmp($keys[$i],boxStroke)) $this->boxStroke=$v;
				elseif (!strcasecmp($keys[$i],boxStrokeWidth)) $this->boxStrokeWidth=$v;
				elseif (!strcasecmp($keys[$i],boxZIndex)) $this->boxZIndex=$v;
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
				elseif (!strcasecmp($keys[$i],children)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->children->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->children->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],clearCls)) $this->clearCls=$v;
				elseif (!strcasecmp($keys[$i],clicksToEdit)) $this->clicksToEdit=$v;
				elseif (!strcasecmp($keys[$i],clicksToMoveEditor)) $this->clicksToMoveEditor=$v;
				elseif (!strcasecmp($keys[$i],closable)) $this->closable=$v;
				elseif (!strcasecmp($keys[$i],closeText)) $this->closeText=$v;
				elseif (!strcasecmp($keys[$i],cls)) $this->cls=$v;
				elseif (!strcasecmp($keys[$i],collapseDirection)) $this->collapseDirection=$v;
				elseif (!strcasecmp($keys[$i],collapsed)) $this->collapsed=$v;
				elseif (!strcasecmp($keys[$i],collapseFirst)) $this->collapseFirst=$v;
				elseif (!strcasecmp($keys[$i],collapseMode)) $this->collapseMode=$v;
				elseif (!strcasecmp($keys[$i],collapsible)) $this->collapsible=$v;
				elseif (!strcasecmp($keys[$i],color)) $this->color=$v;
				elseif (!strcasecmp($keys[$i],colorSet)) $this->colorSet=$v;
				elseif (!strcasecmp($keys[$i],contrast)) $this->contrast=$v;
				elseif (!strcasecmp($keys[$i],column)) $this->column=$v;
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
				elseif (!strcasecmp($keys[$i],dashSize)) $this->dashSize=$v;
				elseif (!strcasecmp($keys[$i],adjustMinimumByMajorUnit)) $this->adjustMinimumByMajorUnit=$v;
				elseif (!strcasecmp($keys[$i],data)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->data->add('data'.rand(),$v[$j]);
						}
					}
					else{
						$this->data->add('data'.rand(),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],dataIndex)) $this->dataIndex=$v;
				elseif (!strcasecmp($keys[$i],decimalPrecision)) $this->decimalPrecision=$v;
				elseif (!strcasecmp($keys[$i],decimalSeparator)) $this->decimalSeparator=$v;
				elseif (!strcasecmp($keys[$i],defaults)) $this->defaults=$v;
				elseif (!strcasecmp($keys[$i],defaultLinkValue)) $this->defaultLinkValue=$v;
				elseif (!strcasecmp($keys[$i],defaultType)) $this->defaultType=$v;
				elseif (!strcasecmp($keys[$i],defaultValue)) $this->defaultValue=$v;
				elseif (!strcasecmp($keys[$i],deferRowRender)) $this->deferRowRender=$v;
				elseif (!strcasecmp($keys[$i],depthToIndent)) $this->depthToIndent=$v;
				elseif (!strcasecmp($keys[$i],disabled)) $this->disabled=$v;
				elseif (!strcasecmp($keys[$i],disabledDates)) $this->disabledDates=$v;
				elseif (!strcasecmp($keys[$i],disabledDatesText)) $this->disabledDatesText=$v;
				elseif (!strcasecmp($keys[$i],disabledDays)) $this->disabledDays=$v;
				elseif (!strcasecmp($keys[$i],disabledDaysText)) $this->disabledDaysText=$v;
				elseif (!strcasecmp($keys[$i],disableSelection)) $this->disableSelection=$v;
				elseif (!strcasecmp($keys[$i],display)) $this->display=$v;
				elseif (!strcasecmp($keys[$i],displayField)) $this->displayField=$v;
				elseif (!strcasecmp($keys[$i],displayMsg)) $this->displayMsg=$v;
				elseif (!strcasecmp($keys[$i],donut)) $this->donut=$v;
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
				elseif (!strcasecmp($keys[$i],enableGroupingMenu)) $this->enableGroupingMenu=$v;
				elseif (!strcasecmp($keys[$i],enableNoGroups)) $this->enableNoGroups=$v;
				elseif (!strcasecmp($keys[$i],errorSummary)) $this->errorSummary=$v;
				elseif (!strcasecmp($keys[$i],expanded)) $this->expanded=$v;
				elseif (!strcasecmp($keys[$i],groupByText)) $this->groupByText=$v;
				elseif (!strcasecmp($keys[$i],groupField)) $this->groupField=$v;
				elseif (!strcasecmp($keys[$i],groupHeaderTpl)) $this->groupHeaderTpl=$v;
				elseif (!strcasecmp($keys[$i],hideGroupedHeader)) $this->hideGroupedHeader=$v;
				elseif (!strcasecmp($keys[$i],enableLinks)) $this->enableLinks=$v;
				elseif (!strcasecmp($keys[$i],enableLists)) $this->enableLists=$v;
				elseif (!strcasecmp($keys[$i],enableLocking)) $this->enableLocking=$v;
				elseif (!strcasecmp($keys[$i],enableToggle)) $this->enableToggle=$v;
				elseif (!strcasecmp($keys[$i],enableSourceEdit)) $this->enableSourceEdit=$v;
				elseif (!strcasecmp($keys[$i],eventName)) $this->eventName=$v;
				elseif (!strcasecmp($keys[$i],ext)) $this->ext=$v;
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
				elseif (!strcasecmp($keys[$i],features)) $this->features=$v;
				elseif (!strcasecmp($keys[$i],field)) $this->field=$v;
				elseif (!strcasecmp($keys[$i],fields)){
					if (get_class($this)=='TChartAxis'){
						$this->fields=$v;
					}
					else{
						if (is_array($v)){
							for($j=0;$j<count($v);$j++){
								$this->fields->add('fields'.rand(),$v[$j]);
							}
						}
						else{
							$this->fields->add('fields'.rand(),$v);
						}
					}
				}
				elseif (!strcasecmp($keys[$i],fieldLabel)) $this->fieldLabel=$v;
				elseif (!strcasecmp($keys[$i],fill)) $this->fill=$v;
				elseif (!strcasecmp($keys[$i],fillOpacity)) $this->fillOpacity=$v;
				elseif (!strcasecmp($keys[$i],flex)) $this->flex=$v;
				elseif (!strcasecmp($keys[$i],floatable)) $this->floatable=$v;
				elseif (!strcasecmp($keys[$i],floating)) $this->floating=$v;
				elseif (!strcasecmp($keys[$i],focusOnToFront)) $this->focusOnToFront=$v;
				elseif (!strcasecmp($keys[$i],folderSort)) $this->folderSort=$v;
				elseif (!strcasecmp($keys[$i],font)) $this->font=$v;
				elseif (!strcasecmp($keys[$i],fontFamilies)) $this->fontFamilies=$v;
				elseif (!strcasecmp($keys[$i],forceFit)) $this->forceFit=$v;
				elseif (!strcasecmp($keys[$i],forceSelection)) $this->forceSelection=$v;
				elseif (!strcasecmp($keys[$i],format)) $this->format=$v;
				elseif (!strcasecmp($keys[$i],frameHeader)) $this->frameHeader=$v;
				elseif (!strcasecmp($keys[$i],frame)) $this->frame=$v;
				elseif (!strcasecmp($keys[$i],ftype)) $this->ftype=$v;
				elseif (!strcasecmp($keys[$i],gradients)) $this->gradients=$v;
				elseif (!strcasecmp($keys[$i],grid)) $this->grid=$v;
				elseif (!strcasecmp($keys[$i],groupable)) $this->groupable=$v;
				elseif (!strcasecmp($keys[$i],groupGutter)) $this->groupGutter=$v;
				elseif (!strcasecmp($keys[$i],gutter)) $this->gutter=$v;
				elseif (!strcasecmp($keys[$i],handler)) $this->handler=$v;
				elseif (!strcasecmp($keys[$i],headers)){
					if (is_array($v)){
						for($j=0;$j<count($v);$j++){
							$this->headers->add(spl_object_hash($v[$j]),$v[$j]);
						}
					}
					else{
						$this->headers->add(spl_object_hash($v),$v);
					}
				}
				elseif (!strcasecmp($keys[$i],header)) $this->header=$v;
				elseif (!strcasecmp($keys[$i],headerPosition)) $this->headerPosition=$v;
				elseif (!strcasecmp($keys[$i],height)) $this->height=$v;
				elseif (!strcasecmp($keys[$i],hidden)) $this->hidden=$v;
				elseif (!strcasecmp($keys[$i],hideCollapseTool)) $this->hideCollapseTool=$v;
				elseif (!strcasecmp($keys[$i],hideable)) $this->hideable=$v;
				elseif (!strcasecmp($keys[$i],hideHeaders)) $this->hideHeaders=$v;
				elseif (!strcasecmp($keys[$i],hideMode)) $this->hideMode=$v;
				elseif (!strcasecmp($keys[$i],highlight)) $this->highlight=$v;
				elseif (!strcasecmp($keys[$i],highlightDuration)) $this->highlightDuration=$v;
				elseif (!strcasecmp($keys[$i],html)) $this->html=$v;
				elseif (!strcasecmp($keys[$i],icon)) $this->icon=$v;
				elseif (!strcasecmp($keys[$i],iconAlign)) $this->iconAlign=$v;
				elseif (!strcasecmp($keys[$i],iconCls)) $this->iconCls=$v;
				elseif (!strcasecmp($keys[$i],increment)) $this->increment=$v;
				elseif (!strcasecmp($keys[$i],inputType)) $this->inputType=$v;
				elseif (!strcasecmp($keys[$i],insetPadding)) $this->insetPadding=$v;
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
				elseif (!strcasecmp($keys[$i],itemId)) $this->itemId=$v;
				elseif (!strcasecmp($keys[$i],itemSelector)) $this->itemSelector=$v;
				elseif (!strcasecmp($keys[$i],itemSpacing)) $this->itemSpacing=$v;
				elseif (!strcasecmp($keys[$i],invalidText)) $this->invalidText=$v;
				elseif (!strcasecmp($keys[$i],keyNavEnabled)) $this->keyNavEnabled=$v;
				elseif (!strcasecmp($keys[$i],label)) $this->label=$v;
				elseif (!strcasecmp($keys[$i],labelAlign)) $this->labelAlign=$v;
				elseif (!strcasecmp($keys[$i],labelFont)) $this->labelFont=$v;
				elseif (!strcasecmp($keys[$i],labelPad)) $this->labelPad=$v;
				elseif (!strcasecmp($keys[$i],labelSeparator)) $this->labelSeparator=$v;
				elseif (!strcasecmp($keys[$i],labelWidth)) $this->labelWidth=$v;
				elseif (!strcasecmp($keys[$i],language)) $this->language=$v;
				elseif (!strcasecmp($keys[$i],layout)) $this->layout=$v;
				elseif (!strcasecmp($keys[$i],legend)) $this->legend=$v;
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
				elseif (!strcasecmp($keys[$i],length)) $this->length=$v;
				elseif (!strcasecmp($keys[$i],lengthField)) $this->lengthField=$v;
				elseif (!strcasecmp($keys[$i],lines)) $this->lines=$v;
				elseif (!strcasecmp($keys[$i],markerConfig)) $this->markerConfig=$v;
				elseif (!strcasecmp($keys[$i],loadingText)) $this->loadingText=$v;
				elseif (!strcasecmp($keys[$i],maintainFlex)) $this->maintainFlex=$v;
				elseif (!strcasecmp($keys[$i],majorTickSteps)) $this->majorTickSteps=$v;
				elseif (!strcasecmp($keys[$i],minorTickSteps)) $this->minorTickSteps=$v;
				elseif (!strcasecmp($keys[$i],margin)) $this->margin=$v;
				elseif (!strcasecmp($keys[$i],maximum)) $this->maximum=$v;
				elseif (!strcasecmp($keys[$i],minimum)) $this->minimum=$v;
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
				elseif (!strcasecmp($keys[$i],minButtonWidth)) $this->minButtonWidth=$v;
				elseif (!strcasecmp($keys[$i],minHeight)) $this->minHeight=$v;
				elseif (!strcasecmp($keys[$i],minMargin)) $this->minMargin=$v;
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
				elseif (!strcasecmp($keys[$i],rootNode)) $this->rootNode=$v;
				elseif (!strcasecmp($keys[$i],orientation)) $this->orientation=$v;
				elseif (!strcasecmp($keys[$i],overCls)) $this->overCls=$v;
				elseif (!strcasecmp($keys[$i],overlapHeader)) $this->overlapHeader=$v;
				elseif (!strcasecmp($keys[$i],padding)) $this->padding=$v;
				elseif (!strcasecmp($keys[$i],plain)) $this->plain=$v;
				elseif (!strcasecmp($keys[$i],plugins)) $this->plugins=$v;
				elseif (!strcasecmp($keys[$i],position)) $this->position=$v;
				elseif (!strcasecmp($keys[$i],pressed)) $this->pressed=$v;
				elseif (!strcasecmp($keys[$i],preventHeader)) $this->preventHeader=$v;
				elseif (!strcasecmp($keys[$i],ptype)) $this->ptype=$v;
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
				elseif (!strcasecmp($keys[$i],region)) $this->region=$v;
				elseif (!strcasecmp($keys[$i],renderer)) $this->renderer=$v;
				elseif (!strcasecmp($keys[$i],resizable)) $this->resizable=$v;
				elseif (!strcasecmp($keys[$i],roundToDecimal)) $this->roundToDecimal=$v;
				elseif (!strcasecmp($keys[$i],root)) $this->root=$v;
				elseif (!strcasecmp($keys[$i],rootVisible)) $this->rootVisible=$v;
				elseif (!strcasecmp($keys[$i],rotate)) $this->rotate=$v;
				elseif (!strcasecmp($keys[$i],saveDelay)) $this->saveDelay=$v;
				elseif (!strcasecmp($keys[$i],scale)) $this->scale=$v;
				elseif (!strcasecmp($keys[$i],scroll)) $this->scroll=$v;
				elseif (!strcasecmp($keys[$i],scrollDelta)) $this->scrollDelta=$v;
				elseif (!strcasecmp($keys[$i],selectOnFocus)) $this->selectOnFocus=$v;
				elseif (!strcasecmp($keys[$i],selectOnTab)) $this->selectOnTab=$v;
				elseif (!strcasecmp($keys[$i],selectionTolerance)) $this->selectionTolerance=$v;
				elseif (!strcasecmp($keys[$i],series)) $this->series=$v;
				elseif (!strcasecmp($keys[$i],shadow)) $this->shadow=$v;
				elseif (!strcasecmp($keys[$i],showGroupsText)) $this->showGroupsText=$v;
				elseif (!strcasecmp($keys[$i],showInLegend)) $this->showInLegend=$v;
				elseif (!strcasecmp($keys[$i],showMarkers)) $this->showMarkers=$v;
				elseif (!strcasecmp($keys[$i],showToday)) $this->showToday=$v;
				elseif (!strcasecmp($keys[$i],simpleSelect)) $this->simpleSelect=$v;
				elseif (!strcasecmp($keys[$i],singleExpand)) $this->singleExpand=$v;
				elseif (!strcasecmp($keys[$i],sortable)) $this->sortable=$v;
				elseif (!strcasecmp($keys[$i],sortableColumns)) $this->sortableColumns=$v;
				elseif (!strcasecmp($keys[$i],spinDownEnabled)) $this->spinDownEnabled=$v;
				elseif (!strcasecmp($keys[$i],spinUpEnabled)) $this->spinUpEnabled=$v;
				elseif (!strcasecmp($keys[$i],split)) $this->split=$v;
				elseif (!strcasecmp($keys[$i],smooth)) $this->smooth=$v;
				elseif (!strcasecmp($keys[$i],startCollapsed)) $this->startCollapsed=$v;
				elseif (!strcasecmp($keys[$i],startDay)) $this->startDay=$v;
				elseif (!strcasecmp($keys[$i],stacked)) $this->stacked=$v;
				elseif (!strcasecmp($keys[$i],step)) $this->step=$v;
				elseif (!strcasecmp($keys[$i],steps)) $this->steps=$v;
				elseif (!strcasecmp($keys[$i],style)) $this->style=$v;
				elseif (!strcasecmp($keys[$i],summaryType)) $this->summaryType=$v;
				elseif (!strcasecmp($keys[$i],summaryRenderer)) $this->summaryRenderer=$v;
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
				elseif (!strcasecmp($keys[$i],textAnchor)) $this->textAnchor=$v;
				elseif (!strcasecmp($keys[$i],theme)) $this->theme=$v;
				elseif (!strcasecmp($keys[$i],tips)) $this->tips=$v;
				elseif (!strcasecmp($keys[$i],title)) $this->title=$v;
				elseif (!strcasecmp($keys[$i],titleCollapse)) $this->titleCollapse=$v;
				elseif (!strcasecmp($keys[$i],toFrontOnShow)) $this->toFrontOnShow=$v;
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
				elseif (!strcasecmp($keys[$i],trackMouse)) $this->trackMouse=$v;
				elseif (!strcasecmp($keys[$i],triggerAction)) $this->triggerAction=$v;
				elseif (!strcasecmp($keys[$i],trueText)) $this->trueText=$v;
				elseif (!strcasecmp($keys[$i],type)) $this->type=$v;
				elseif (!strcasecmp($keys[$i],typeAhead)) $this->typeAhead=$v;
				elseif (!strcasecmp($keys[$i],useArrows)) $this->useArrows=$v;
				elseif (!strcasecmp($keys[$i],validateOnBlur)) $this->validateOnBlur=$v;
				elseif (!strcasecmp($keys[$i],validateOnChange)) $this->validateOnChange=$v;
				elseif (!strcasecmp($keys[$i],validator)) $this->validator=$v;
				elseif (!strcasecmp($keys[$i],valueField)) $this->valueField=$v;
				elseif (!strcasecmp($keys[$i],valueNotFoundText)) $this->valueNotFoundText=$v;
				elseif (!strcasecmp($keys[$i],value)) $this->value=$v;
				elseif (!strcasecmp($keys[$i],vertical)) $this->vertical=$v;
				elseif (!strcasecmp($keys[$i],viewBox)) $this->viewBox=$v;
				elseif (!strcasecmp($keys[$i],viewConfig)) $this->viewConfig=$v;
				elseif (!strcasecmp($keys[$i],visible)) $this->visible=$v;
				elseif (!strcasecmp($keys[$i],width)) $this->width=$v;
				elseif (!strcasecmp($keys[$i],x)) $this->x=$v;
				elseif (!strcasecmp($keys[$i],xField)) $this->xField=$v;
				elseif (!strcasecmp($keys[$i],xPadding)) $this->xPadding=$v;
				elseif (!strcasecmp($keys[$i],y)) $this->y=$v;
				elseif (!strcasecmp($keys[$i],yField)) $this->yField=$v;
				elseif (!strcasecmp($keys[$i],yPadding)) $this->yPadding=$v;
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
		//
		//
		public function activeItem($v){
			$this->activeItem=$v;
			return ($this);
		}
		public function activeError($v){ 
			$this->activeError=$v;
			return ($this);
		}
		public function allowBlank($v){ 
			$this->allowBlank=$v;
			return ($this);
		}
		public function allowDecimals($v){ 
			$this->allowDecimals=$v;
			return ($this);
		}
		public function allowDepress($v){ 
			$this->allowDepress=$v;
			return ($this);
		}
		public function altFormats($v){ 
			$this->altFormats=$v;
			return ($this);
		}
		public function angleField($v){ 
			$this->angleField=$v;
			return ($this);
		}
		public function anchor($v){ 
			$this->anchor=$v;
			return ($this);
		}
		public function animate($v){ 
			$this->animate=$v;
			return ($this);
		}
		public function autoCancel($v){ 
			$this->autoCancel=$v;
			return ($this);
		}
		public function animCollapse($v){ 
			$this->animCollapse=$v;
			return ($this);
		}
		public function autoLoad($v){ 
			$this->autoLoad=$v;
			return ($this);
		}
		public function autoSelect($v){ 
			$this->autoSelect=$v;
			return ($this);
		}
		public function autoScroll($v){ 
			$this->autoScroll=$v;
			return ($this);
		}
		public function autoShow($v){ 
			$this->autoShow=$v;
			return ($this);
		}
		public function autoSize($v){ 
			$this->autoSize=$v;
			return ($this);
		}
		public function autoWidth($v){ 
			$this->autoWidth=$v;
			return ($this);
		}
		public function axes($v){ 
			$this->axes=$v;
			return ($this);
		}
		public function axis($v){ 
			$this->axis=$v;
			return ($this);
		}
		public function background($v){ 
			$this->background=$v;
			return ($this);
		}
		public function baseCls($v){ 
			$this->baseCls=$v;
			return ($this);
		}
		public function bbar($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->bbar->add(spl_object_hash($v[$j]),$v[$j]);
				}
			}
			else{
				$this->bbar->add(spl_object_hash($v),$v);
			}
			return ($this);
		}
		public function blankText($v){ 
			$this->blankText=$v;
			return ($this);
		}
		public function blockRefresh($v){ 
			$this->blockRefresh=$v;
			return ($this);
		}
		public function bodyBorder($v){ 
			$this->bodyBorder=$v;
			return ($this);
		}
		public function bodyCls($v){ 
			$this->bodyCls=$v;
			return ($this);
		}
		public function bodyPadding($v){ 
			$this->bodyPadding=$v;
			return ($this);
		}
		public function bodyStyle($v){ 
			$this->bodyStyle=$v;
			return ($this);
		}
		public function border($v){ 
			$this->border=$v;
			return ($this);
		}
		public function boxFill($v){ 
			$this->boxFill=$v;
			return ($this);
		}
		public function boxLabel($v){ 
			$this->boxLabel=$v;
			return ($this);
		}
		public function boxLabelAlign($v){ 
			$this->boxLabelAlign=$v;
			return ($this);
		}
		public function boxStroke($v){ 
			$this->boxStroke=$v;
			return ($this);
		}
		public function boxStrokeWidth($v){ 
			$this->boxStrokeWidth=$v;
			return ($this);
		}
		public function boxZIndex($v){ 
			$this->boxZIndex=$v;
			return ($this);
		}
		public function buttons($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->buttons->add(spl_object_hash($v[$j]),$v[$j]);
				}
			}
			else{
				$this->buttons->add(spl_object_hash($v),$v);
			}
			return ($this);
		}
		public function buttonAlign($v){ 
			$this->buttonAlign=$v;
			return ($this);
		}
		public function buttonText($v){ 
			$this->buttonText=$v;
			return ($this);
		}
		public function checked($v){ 
			$this->checked=$v;
			return ($this);
		}
		public function children($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->children->add(spl_object_hash($v[$j]),$v[$j]);
				}
			}
			else{
				$this->children->add(spl_object_hash($v),$v);
			}
			return ($this);
		}
		public function clearCls($v){ 
			$this->clearCls=$v;
			return ($this);
		}
		public function clicksToEdit($v){ 
			$this->clicksToEdit=$v;
			return ($this);
		}
		public function clicksToMoveEditor($v){ 
			$this->clicksToMoveEditor=$v;
			return ($this);
		}
		public function closable($v){ 
			$this->closable=$v;
			return ($this);
		}
		public function closeText($v){ 
			$this->closeText=$v;
			return ($this);
		}
		public function cls($v){ 
			$this->cls=$v;
			return ($this);
		}
		public function collapseDirection($v){ 
			$this->collapseDirection=$v;
			return ($this);
		}
		public function collapsed($v){ 
			$this->collapsed=$v;
			return ($this);
		}
		public function collapseFirst($v){ 
			$this->collapseFirst=$v;
			return ($this);
		}
		public function collapseMode($v){ 
			$this->collapseMode=$v;
			return ($this);
		}
		public function collapsible($v){ 
			$this->collapsible=$v;
			return ($this);
		}
		public function color($v){ 
			$this->color=$v;
			return ($this);
		}
		public function colorSet($v){ 
			$this->colorSet=$v;
			return ($this);
		}
		public function contrast($v){ 
			$this->contrast=$v;
			return ($this);
		}
		public function column($v){ 
			$this->column=$v;
			return ($this);
		}
		public function columnLines($v){ 
			$this->columnLines=$v;
			return ($this);
		}
		public function columns($v){
			if (get_class($this)=='TGrid'){
				if (is_array($v)){
					for($j=0;$j<count($v);$j++){
						$this->columns->add(spl_object_hash($v[$j]),$v[$j]);
					}
				}
				else{
					$this->columns->add(spl_object_hash($v),$v);
				}
			}
			else{
				$this->columns=$v;
			}
			return ($this);
		}
		public function columnWidth($v){ 
			$this->columnWidth=$v;
			return ($this);
		}
		public function createLinkText($v){ 
			$this->createLinkText=$v;
			return ($this);
		}
		public function adjustMinimumByMajorUnit($v){ 
			$this->adjustMinimumByMajorUnit=$v;
			return ($this);
		}
		public function dashSize($v){ 
			$this->dashSize=$v;
			return ($this);
		}
		public function data($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->data->add('data'.rand(),$v[$j]);
				}
			}
			else{
				$this->data->add('data'.rand(),$v);
			}
			return ($this);
		}
		public function dataIndex($v){ 
			$this->dataIndex=$v;
			return ($this);
		}
		public function decimalPrecision($v){ 
			$this->decimalPrecision=$v;
			return ($this);
		}
		public function decimalSeparator($v){ 
			$this->decimalSeparator=$v;
			return ($this);
		}
		public function defaults($v){ 
			$this->defaults=$v;
			return ($this);
		}
		public function defaultLinkValue($v){ 
			$this->defaultLinkValue=$v;
			return ($this);
		}
		public function defaultType($v){ 
			$this->defaultType=$v;
			return ($this);
		}
		public function defaultValue($v){ 
			$this->defaultValue=$v;
			return ($this);
		}
		public function deferRowRender($v){ 
			$this->deferRowRender=$v;
			return ($this);
		}
		public function depthToIndent($v){ 
			$this->depthToIndent=$v;
			return ($this);
		}
		public function disabled($v){ 
			$this->disabled=$v;
			return ($this);
		}
		public function disabledDates($v){ 
			$this->disabledDates=$v;
			return ($this);
		}
		public function disabledDatesText($v){ 
			$this->disabledDatesText=$v;
			return ($this);
		}
		public function disabledDays($v){ 
			$this->disabledDays=$v;
			return ($this);
		}
		public function disabledDaysText($v){ 
			$this->disabledDaysText=$v;
			return ($this);
		}
		public function disableSelection($v){ 
			$this->disableSelection=$v;
			return ($this);
		}
		public function displayField($v){ 
			$this->displayField=$v;
			return ($this);
		}
		public function display($v){ 
			$this->display=$v;
			return ($this);
		}
		public function displayMsg($v){ 
			$this->displayMsg=$v;
			return ($this);
		}
		public function donut($v){ 
			$this->donut=$v;
			return ($this);
		}
		public function draggable($v){ 
			$this->draggable=$v;
			return ($this);
		}
		public function enableKeyEvents($v){ 
			$this->enableKeyEvents=$v;
			return ($this);
		}
		public function editable($v){ 
			$this->editable=$v;
			return ($this);
		}
		public function emptyText($v){ 
			$this->emptyText=$v;
			return ($this);
		}
		public function enableAlignments($v){ 
			$this->enableAlignments=$v;
			return ($this);
		}
		public function enableColors($v){ 
			$this->enableColors=$v;
			return ($this);
		}
		public function enableColumnHide($v){ 
			$this->enableColumnHide=$v;
			return ($this);
		}
		public function enableColumnMove($v){ 
			$this->enableColumnMove=$v;
			return ($this);
		}
		public function enableColumnResize($v){ 
			$this->enableColumnResize=$v;
			return ($this);
		}
		public function enableFont($v){ 
			$this->enableFont=$v;
			return ($this);
		}
		public function enableFontSize($v){ 
			$this->enableFontSize=$v;
			return ($this);
		}
		public function enableFormat($v){ 
			$this->enableFormat=$v;
			return ($this);
		}
		public function enableGroupingMenu($v){ 
			$this->enableGroupingMenu=$v;
			return ($this);
		}
		public function enableNoGroups($v){ 
			$this->enableNoGroups=$v;
			return ($this);
		}
		public function errorSummary($v){ 
			$this->errorSummary=$v;
			return ($this);
		}
		public function expanded($v){ 
			$this->expanded=$v;
			return ($this);
		}
		public function groupByText($v){ 
			$this->groupByText=$v;
			return ($this);
		}
		public function groupField($v){ 
			$this->groupField=$v;
			return ($this);
		}
		public function groupHeaderTpl($v){ 
			$this->groupHeaderTpl=$v;
			return ($this);
		}
		public function hideGroupedHeader($v){ 
			$this->hideGroupedHeader=$v;
			return ($this);
		}
		public function enableLinks($v){ 
			$this->enableLinks=$v;
			return ($this);
		}
		public function enableLists($v){ 
			$this->enableLists=$v;
			return ($this);
		}
		public function enableLocking($v){ 
			$this->enableLocking=$v;
			return ($this);
		}
		public function enableToggle($v){ 
			$this->enableToggle=$v;
			return ($this);
		}
		public function enableSourceEdit($v){ 
			$this->enableSourceEdit=$v;
			return ($this);
		}
		public function eventName($v){ 
			$this->eventName=$v;
			return ($this);
		}
		public function ext($v){ 
			$this->ext=$v;
			return ($this);
		}
		public function falseText($v){ 
			$this->falseText=$v;
			return ($this);
		}
		public function fbar($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->fbar->add(spl_object_hash($v[$j]),$v[$j]);
				}
			}
			else{
				$this->fbar->add(spl_object_hash($v),$v);
			}
			return ($this);
		}
		public function features($v){ 
			$this->features=$v;
			return ($this);
		}
		public function field($v){ 
			$this->field=$v;
			return ($this);
		}
		public function fields($v){
			if (get_class($this)=='TChartAxis'){
				$this->fields=$v;
			}
			else{
				if (is_array($v)){
					for($j=0;$j<count($v);$j++){
						$this->fields->add('fields'.rand(),$v[$j]);
					}
				}
				else{
					$this->fields->add('fields'.rand(),$v);
				}
			}
			return ($this);
		}
		public function fieldLabel($v){ 
			$this->fieldLabel=$v;
			return ($this);
		}
		public function fill($v){ 
			$this->fill=$v;
			return ($this);
		}
		public function fillOpacity($v){ 
			$this->fillOpacity=$v;
			return ($this);
		}
		public function flex($v){ 
			$this->flex=$v;
			return ($this);
		}
		public function floatable($v){ 
			$this->floatable=$v;
			return ($this);
		}
		public function floating($v){ 
			$this->floating=$v;
			return ($this);
		}
		public function focusOnToFront($v){ 
			$this->focusOnToFront=$v;
			return ($this);
		}
		public function folderSort($v){ 
			$this->folderSort=$v;
			return ($this);
		}
		public function fontFamilies($v){ 
			$this->fontFamilies=$v;
			return ($this);
		}
		public function font($v){ 
			$this->font=$v;
			return ($this);
		}
		public function forceFit($v){ 
			$this->forceFit=$v;
			return ($this);
		}
		public function forceSelection($v){ 
			$this->forceSelection=$v;
			return ($this);
		}
		public function format($v){ 
			$this->format=$v;
			return ($this);
		}
		public function frameHeader($v){ 
			$this->frameHeader=$v;
			return ($this);
		}
		public function gradients($v){ 
			$this->gradients=$v;
			return ($this);
		}
		public function grid($v){ 
			$this->grid=$v;
			return ($this);
		}
		public function frame($v){ 
			$this->frame=$v;
			return ($this);
		}
		public function ftype($v){ 
			$this->ftype=$v;
			return ($this);
		}
		public function groupable($v){ 
			$this->groupable=$v;
			return ($this);
		}
		public function groupGutter($v){ 
			$this->groupGutter=$v;
			return ($this);
		}
		public function gutter($v){ 
			$this->gutter=$v;
			return ($this);
		}
		public function handler($v){ 
			$this->handler=$v;
			return ($this);
		}
		public function headers($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->headers->add('headers'.rand(),$v[$j]);
				}
			}
			else{
				$this->headers->add('headers'.rand(),$v);
			}
			return ($this);
		}
		public function header($v){ 
			$this->header=$v;
			return ($this);
		}
		public function headerPosition($v){ 
			$this->headerPosition=$v;
			return ($this);
		}
		public function height($v){ 
			$this->height=$v;
			return ($this);
		}
		public function hidden($v){ 
			$this->hidden=$v;
			return ($this);
		}
		public function hideCollapseTool($v){ 
			$this->hideCollapseTool=$v;
			return ($this);
		}
		public function hideable($v){ 
			$this->hideable=$v;
			return ($this);
		}
		public function hideHeaders($v){ 
			$this->hideHeaders=$v;
			return ($this);
		}
		public function hideMode($v){ 
			$this->hideMode=$v;
			return ($this);
		}
		public function highlight($v){ 
			$this->highlight=$v;
			return ($this);
		}
		public function highlightDuration($v){ 
			$this->highlightDuration=$v;
			return ($this);
		}
		public function html($v){ 
			$this->html=$v;
			return ($this);
		}
		public function icon($v){ 
			$this->icon=$v;
			return ($this);
		}
		public function iconAlign($v){ 
			$this->iconAlign=$v;
			return ($this);
		}
		public function iconCls($v){ 
			$this->iconCls=$v;
			return ($this);
		}
		public function increment($v){ 
			$this->increment=$v;
			return ($this);
		}
		public function inputType($v){ 
			$this->inputType=$v;
			return ($this);
		}
		public function insetPadding($v){ 
			$this->insetPadding=$v;
			return ($this);
		}
		public function inputValue($v){ 
			$this->inputValue=$v;
			return ($this);
		}
		public function items($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->items->add(spl_object_hash($v[$j]),$v[$j]);
				}
			}
			else{
				$this->items->add(spl_object_hash($v),$v);
			}
			return ($this);
		}
		public function itemId($v){ 
			$this->itemId=$v;
			return ($this);
		}
		public function itemSelector($v){ 
			$this->itemSelector=$v;
			return ($this);
		}
		public function itemSpacing($v){ 
			$this->itemSpacing=$v;
			return ($this);
		}
		public function invalidText($v){ 
			$this->invalidText=$v;
			return ($this);
		}
		public function keyNavEnabled($v){ 
			$this->keyNavEnabled=$v;
			return ($this);
		}
		public function label($v){ 
			$this->label=$v;
			return ($this);
		}
		public function labelAlign($v){ 
			$this->labelAlign=$v;
			return ($this);
		}
		public function labelFont($v){ 
			$this->labelFont=$v;
			return ($this);
		}
		public function labelPad($v){ 
			$this->labelPad=$v;
			return ($this);
		}
		public function labelSeparator($v){ 
			$this->labelSeparator=$v;
			return ($this);
		}
		public function labelWidth($v){ 
			$this->labelWidth=$v;
			return ($this);
		}
		public function language($v){ 
			$this->language=$v;
			return ($this);
		}
		public function layout($v){ 
			$this->layout=$v;
			return ($this);
		}
		public function legend($v){ 
			$this->legend=$v;
			return ($this);
		}
		public function lbar($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->lbar->add(spl_object_hash($v[$j]),$v[$j]);
				}
			}
			else{
				$this->lbar->add(spl_object_hash($v),$v);
			}
			return ($this);
		}
		public function length($v){ 
			$this->length=$v;
			return ($this);
		}
		public function lengthField($v){ 
			$this->lengthField=$v;
			return ($this);
		}
		public function lines($v){ 
			$this->lines=$v;
			return ($this);
		}
		public function markerConfig($v){ 
			$this->markerConfig=$v;
			return ($this);
		}
		public function loadingText($v){ 
			$this->loadingText=$v;
			return ($this);
		}
		public function maintainFlex($v){ 
			$this->maintainFlex=$v;
			return ($this);
		}
		public function majorTickSteps($v){ 
			$this->majorTickSteps=$v;
			return ($this);
		}
		public function minorTickSteps($v){ 
			$this->minorTickSteps=$v;
			return ($this);
		}
		public function margin($v){ 
			$this->margin=$v;
			return ($this);
		}
		public function maximum($v){ 
			$this->maximum=$v;
			return ($this);
		}
		public function minimum($v){ 
			$this->minimum=$v;
			return ($this);
		}
		public function maskRe($v){ 
			$this->maskRe=$v;
			return ($this);
		}
		public function maxHeight($v){ 
			$this->maxHeight=$v;
			return ($this);
		}
		public function maxWidth($v){ 
			$this->maxWidth=$v;
			return ($this);
		}
		public function maximizable($v){ 
			$this->maximizable=$v;
			return ($this);
		}
		public function maximized($v){ 
			$this->maximized=$v;
			return ($this);
		}
		public function maxLength($v){ 
			$this->maxLength=$v;
			return ($this);
		}
		public function maxLengthText($v){ 
			$this->maxLengthText=$v;
			return ($this);
		}
		public function maxText($v){ 
			$this->maxText=$v;
			return ($this);
		}
		public function maxValue($v){ 
			$this->maxValue=$v;
			return ($this);
		}
		public function menu($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->menu->add(spl_object_hash($v[$j]),$v[$j]);
				}
			}
			else{
				$this->menu->add(spl_object_hash($v),$v);
			}
			return ($this);
		}
		public function menuDisabled($v){ 
			$this->menuDisabled=$v;
			return ($this);
		}
		public function minButtonWidth($v){ 
			$this->minButtonWidth=$v;
			return ($this);
		}
		public function minHeight($v){ 
			$this->minHeight=$v;
			return ($this);
		}
		public function minWidth($v){ 
			$this->minWidth=$v;
			return ($this);
		}
		public function minMargin($v){ 
			$this->minMargin=$v;
			return ($this);
		}
		public function minimizable($v){ 
			$this->minimizable=$v;
			return ($this);
		}
		public function minLength($v){ 
			$this->minLength=$v;
			return ($this);
		}
		public function minLengthText($v){ 
			$this->minLengthText=$v;
			return ($this);
		}
		public function minText($v){ 
			$this->minText=$v;
			return ($this);
		}
		public function minValue($v){ 
			$this->minValue=$v;
			return ($this);
		}
		public function multiSelect($v){ 
			$this->multiSelect=$v;
			return ($this);
		}
		public function modal($v){ 
			$this->modal=$v;
			return ($this);
		}
		public function msgTarget($v){ 
			$this->msgTarget=$v;
			return ($this);
		}
		public function name($v){ 
			$this->name=$v;
			return ($this);
		}
		public function nanText($v){ 
			$this->nanText=$v;
			return ($this);
		}
		public function negativeText($v){ 
			$this->negativeText=$v;
			return ($this);
		}
		public function rootNode($v){ 
			$this->rootNode=$v;
			return ($this);
		}
		public function orientation($v){ 
			$this->orientation=$v;
			return ($this);
		}
		public function overCls($v){ 
			$this->overCls=$v;
			return ($this);
		}
		public function overlapHeader($v){ 
			$this->overlapHeader=$v;
			return ($this);
		}
		public function padding($v){ 
			$this->padding=$v;
			return ($this);
		}
		public function plain($v){ 
			$this->plain=$v;
			return ($this);
		}
		public function plugins($v){ 
			$this->plugins=$v;
			return ($this);
		}
		public function position($v){ 
			$this->position=$v;
			return ($this);
		}
		public function pressed($v){ 
			$this->pressed=$v;
			return ($this);
		}
		public function preventHeader($v){ 
			$this->preventHeader=$v;
			return ($this);
		}
		public function ptype($v){ 
			$this->ptype=$v;
			return ($this);
		}
		public function queryMode($v){ 
			$this->queryMode=$v;
			return ($this);
		}
		public function queryParam($v){ 
			$this->queryParam=$v;
			return ($this);
		}
		public function rbar($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->rbar->add(spl_object_hash($v[$j]),$v[$j]);
				}
			}
			else{
				$this->rbar->add(spl_object_hash($v),$v);
			}
			return ($this);
		}
		public function readOnly($v){ 
			$this->readOnly=$v;
			return ($this);
		}
		public function region($v){ 
			$this->region=$v;
			return ($this);
		}
		public function renderer($v){ 
			$this->renderer=$v;
			return ($this);
		}
		public function resizable($v){ 
			$this->resizable=$v;
			return ($this);
		}
		public function roundToDecimal($v){ 
			$this->roundToDecimal=$v;
			return ($this);
		}
		public function root($v){ 
			$this->root=$v;
			return ($this);
		}
		public function rootVisible($v){ 
			$this->rootVisible=$v;
			return ($this);
		}
		public function rotate($v){ 
			$this->rotate=$v;
			return ($this);
		}
		public function saveDelay($v){ 
			$this->saveDelay=$v;
			return ($this);
		}
		public function scale($v){ 
			$this->scale=$v;
			return ($this);
		}
		public function scroll($v){ 
			$this->scroll=$v;
			return ($this);
		}
		public function scrollDelta($v){ 
			$this->scrollDelta=$v;
			return ($this);
		}
		public function selectOnFocus($v){ 
			$this->selectOnFocus=$v;
			return ($this);
		}
		public function selectOnTab($v){ 
			$this->selectOnTab=$v;
			return ($this);
		}
		public function selectionTolerance($v){ 
			$this->selectionTolerance=$v;
			return ($this);
		}
		public function series($v){ 
			$this->series=$v;
			return ($this);
		}
		public function shadow($v){ 
			$this->shadow=$v;
			return ($this);
		}
		public function showGroupsText($v){ 
			$this->showGroupsText=$v;
			return ($this);
		}
		public function showInLegend($v){ 
			$this->showInLegend=$v;
			return ($this);
		}
		public function showMarkers($v){ 
			$this->showMarkers=$v;
			return ($this);
		}
		public function showToday($v){ 
			$this->showToday=$v;
			return ($this);
		}
		public function simpleSelect($v){ 
			$this->simpleSelect=$v;
			return ($this);
		}
		public function singleExpand($v){ 
			$this->singleExpand=$v;
			return ($this);
		}
		public function sortable($v){ 
			$this->sortable=$v;
			return ($this);
		}
		public function sortableColumns($v){ 
			$this->sortableColumns=$v;
			return ($this);
		}
		public function spinDownEnabled($v){ 
			$this->spinDownEnabled=$v;
			return ($this);
		}
		public function spinUpEnabled($v){ 
			$this->spinUpEnabled=$v;
			return ($this);
		}
		public function split($v){ 
			$this->split=$v;
			return ($this);
		}
		public function smooth($v){ 
			$this->smooth=$v;
			return ($this);
		}
		public function startCollapsed($v){ 
			$this->startCollapsed=$v;
			return ($this);
		}
		public function startDay($v){ 
			$this->startDay=$v;
			return ($this);
		}
		public function stacked($v){ 
			$this->stacked=$v;
			return ($this);
		}
		public function step($v){ 
			$this->step=$v;
			return ($this);
		}
		public function steps($v){ 
			$this->steps=$v;
			return ($this);
		}
		public function style($v){ 
			$this->style=$v;
			return ($this);
		}
		public function summaryType($v){ 
			$this->summaryType=$v;
			return ($this);
		}
		public function summaryRenderer($v){ 
			$this->summaryRenderer=$v;
			return ($this);
		}
		public function tbar($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->tbar->add(spl_object_hash($v[$j]),$v[$j]);
				}
			}
			else{
				$this->tbar->add(spl_object_hash($v),$v);
			}
			return ($this);
		}
		public function tabIndex($v){ 
			$this->tabIndex=$v;
			return ($this);
		}
		public function text($v){ 
			$this->text=$v;
			return ($this);
		}
		public function title($v){ 
			$this->title=$v;
			return ($this);
		}
		public function textAnchor($v){ 
			$this->textAnchor=$v;
			return ($this);
		}
		public function theme($v){ 
			$this->theme=$v;
			return ($this);
		}
		public function tips($v){ 
			$this->tips=$v;
			return ($this);
		}
		public function titleCollapse($v){ 
			$this->titleCollapse=$v;
			return ($this);
		}
		public function toFrontOnShow($v){ 
			$this->toFrontOnShow=$v;
			return ($this);
		}
		public function tools($v){
			if (is_array($v)){
				for($j=0;$j<count($v);$j++){
					$this->tools->add(spl_object_hash($v[$j]),$v[$j]);
				}
			}
			else{
				$this->tools->add(spl_object_hash($v),$v);
			}
			return ($this);
		}
		public function tooltip($v){ 
			$this->tooltip=$v;
			return ($this);
		}
		public function totalProperty($v){ 
			$this->totalProperty=$v;
			return ($this);
		}
		public function tpl($v){ 
			$this->tpl=$v;
			return ($this);
		}
		public function trackMouse($v){ 
			$this->trackMouse=$v;
			return ($this);
		}
		public function triggerAction($v){ 
			$this->triggerAction=$v;
			return ($this);
		}
		public function trueText($v){ 
			$this->trueText=$v;
			return ($this);
		}
		public function type($v){ 
			$this->type=$v;
			return ($this);
		}
		public function typeAhead($v){ 
			$this->typeAhead=$v;
			return ($this);
		}
		public function useArrows($v){ 
			$this->useArrows=$v;
			return ($this);
		}
		public function validateOnBlur($v){ 
			$this->validateOnBlur=$v;
			return ($this);
		}
		public function validateOnChange($v){ 
			$this->validateOnChange=$v;
			return ($this);
		}
		public function validator($v){ 
			$this->validator=$v;
			return ($this);
		}
		public function valueField($v){ 
			$this->valueField=$v;
			return ($this);
		}
		public function valueNotFoundText($v){ 
			$this->valueNotFoundText=$v;
			return ($this);
		}
		public function value($v){ 
			$this->value=$v;
			return ($this);
		}
		public function vertical($v){ 
			$this->vertical=$v;
			return ($this);
		}
		public function viewBox($v){ 
			$this->viewBox=$v;
			return ($this);
		}
		public function viewConfig($v){ 
			$this->viewConfig=$v;
			return ($this);
		}
		public function visible($v){ 
			$this->visible=$v;
			return ($this);
		}
		public function width($v){ 
			$this->width=$v;
			return ($this);
		}
		public function x($v){ 
			$this->x=$v;
			return ($this);
		}
		public function xField($v){ 
			$this->xField=$v;
			return ($this);
		}
		public function xPadding($v){ 
			$this->xPadding=$v;
			return ($this);
		}
		public function y($v){ 
			$this->y=$v;
			return ($this);
		}
		public function yField($v){ 
			$this->yField=$v;
			return ($this);
		}
		public function yPadding($v){ 
			$this->yPadding=$v;
			return ($this);
		}
	}
?>