<?php
	include("language.php");
	include("const.php");
	include("extevents.php");
	include("statics.php");
	include("collection.php");
	include("base.php");
	include("window.php");
	include("container.php");
	include("panel.php");
	include("tabpanel.php");
	include("form.php");
	include("menu.php");
	include("button.php");
	include("toolbar.php");
	include("grid.php");
	include("view.php");
	include("chart.php");
	include("tree.php");
	include("paging.php");

	//
	//ATENTION: Any new properties must be mapped in the base.php and const.php
	//
	class TApplication extends TComponent{
		private $boolean=array(true=>"true",false=>"false");
		//
		private $onWindowBeforeUnloadValue=null;
		private $onWindowBeforeUnloadMsg=null;
		private $onWindowResizeValue=null;
		private $onDocumentReadyValue=null;
		//
		public $package=array();
		//
		public $xtype='viewport';
		public $language;
		public $ext;
		public $headers;	//HTML header
		public $events;		//PHP events, not agile syntax
		//
		//public $listeners;	//ExtJS listeners
		public $windows;		//Not agile syntax
		public $items;
		public $activeItem=0;
		public $baseCls=null;
		public $border=null;
		public $cls='';
		public $defaults=null;
		public $frame=null;
		public $html=null;
		public $layout='absolute';
		public $margin=null;
		public $overCls=null;
		public $padding=null;
		public $style=null;

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
		
		private function writeLn($text){
			echo $text;
			echo chr(13).chr(10);
		}
		
		private function mkHeader(){
			$this->writeLn('<head>');
			$this->writeLn('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />');
			$this->writeLn('<link rel="stylesheet" type="text/css" href="/'.$this->ext.'/resources/css/ext-all.css"/>');
			$this->writeLn('<script type="text/javascript" src="/'.$this->ext.'/bootstrap.js"></script>');
			$this->writeLn('<script type="text/javascript" src="/'.$this->ext.'/locale/'.$this->language.'"></script>');
			while ($this->headers->next()){
				$this->writeLn($this->headers->value());
			}
			$this->writeLn('</head>');
		}

		private function mkContainer($obj){
			if (!is_null($obj->autoScroll))
				$this->writeLn('autoScroll:'.$this->boolean[$obj->autoScroll].',');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->defaults)){
				if (stristr($obj->defaults,"{"))  //Only object
					$this->writeLn('defaults:'.$obj->defaults.',');
			}
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->frame))
				$this->writeLn('frame:'.$this->boolean[$obj->frame].',');
			if (!is_null($obj->layout)){
				if (stristr($obj->layout,"{"))
					$this->writeLn('layout:'.$obj->layout.',');
				else
					$this->writeLn('layout:"'.$obj->layout.'",');
			}
			if (!is_null($obj->region))
				$this->writeLn('region:"'.$obj->region.'",');
			$this->writeLn('items:[');
			$this->mkItems($obj->items);
			$this->writeLn(']');
		}
		
		private function mkTools($tools){
			while ($tools->next()){
				if ($tools->iterator()>0) $this->writeLn(',');
				$this->writeLn('{');
				$this->writeLn('type:"'.$tools->value()->type.'",');
				if (!is_null($tools->value()->qtip))
					$this->writeLn('qtip:"'.$tools->value()->qtip.'",');
				if (!is_null($tools->value()->hidden))
					$this->writeLn('hidden:"'.$tools->value()->hidden.'",');
				$this->writeLn('handler:function(event,toolEl,panel){');
				$this->writeLn($this->getString($tools->value()->handler));
				$this->writeLn('}');
				$this->writeLn('}');
			}
		}
		
		private function mkPanel($obj){
			if (!is_null($obj->eventName)){
				$_hidden=new THidden();
				$_hidden->name='event';
				$_hidden->value=$obj->eventName;
				$obj->items->add('__field'.($obj->items->count()+1),$_hidden);
			}
			//
			if (!is_null($obj->activeItem))
				$this->writeLn('activeItem:'.$obj->activeItem.',');
			if (!is_null($obj->autoScroll))
				$this->writeLn('autoScroll:'.$this->boolean[$obj->autoScroll].',');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if ($obj->bbar->count()){
				$this->writeLn('bbar:[');
				$this->mkItems($obj->bbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->bodyBorder))
				$this->writeLn('bodyBorder:'.$obj->bodyBorder.',');
			if (!is_null($obj->bodyCls))
					$this->writeLn('bodyCls:"'.$obj->bodyCls.'",');
			if (!is_null($obj->bodyPadding))
					$this->writeLn('bodyPadding:"'.$obj->bodyPadding.'",');
			if (!is_null($obj->bodyStyle))
					$this->writeLn('bodyStyle:"'.$obj->bodyStyle.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if ($obj->buttons->count()){
				$this->writeLn('buttons:[');
				$this->mkItems($obj->buttons);
				$this->writeLn('],');
			}
			if (!is_null($obj->buttonAlign))
					$this->writeLn('buttonAlign:"'.$obj->buttonAlign.'",');
			if (!is_null($obj->closable))
				$this->writeLn('closable:'.$this->boolean[$obj->closable].',');
			if (!is_null($obj->cls))
					$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->collapsed))
				$this->writeLn('collapsed:'.$this->boolean[$obj->collapsed].',');
			if (!is_null($obj->collapsible))
				$this->writeLn('collapsible:'.$this->boolean[$obj->collapsible].',');
			if (!is_null($obj->defaults)){
				if (stristr($obj->defaults,"{"))  //Only object
					$this->writeLn('defaults:'.$obj->defaults.',');
			}
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if ($obj->fbar->count()){
				$this->writeLn('fbar:[');
				$this->mkItems($obj->fbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->frameHeader))
				$this->writeLn('frameHeader:'.$this->boolean[$obj->frameHeader].',');
			if (!is_null($obj->frame))
				$this->writeLn('frame:'.$this->boolean[$obj->frame].',');
			if (!is_null($obj->headerPosition))
					$this->writeLn('headerPosition:"'.$obj->headerPosition.'",');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
					$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->layout)){
				if (stristr($obj->layout,"{"))
					$this->writeLn('layout:'.$obj->layout.',');
				else
					$this->writeLn('layout:"'.$obj->layout.'",');
			}
			if ($obj->lbar->count()){
				$this->writeLn('lbar:[');
				$this->mkItems($obj->lbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->margin))
					$this->writeLn('margin:"'.$obj->margin.'",');
			if (!is_null($obj->maxHeight))
				$this->writeLn('maxHeight:'.$obj->maxHeight.',');
			if (!is_null($obj->maxWidth))
				$this->writeLn('maxWidth:'.$obj->maxWidth.',');
			if (!is_null($obj->minHeight))
				$this->writeLn('minHeight:'.$obj->minHeight.',');
			if (!is_null($obj->minWidth))
				$this->writeLn('minWidth:'.$obj->minWidth.',');
			if (!is_null($obj->padding))
					$this->writeLn('padding:"'.$obj->padding.'",');
			if ($obj->rbar->count()){
				$this->writeLn('rbar:[');
				$this->mkItems($obj->rbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->region))
					$this->writeLn('region:"'.$obj->region.'",');
			if (!is_null($obj->resizable))
				$this->writeLn('resizable:'.$this->boolean[$obj->resizable].',');
			if (!is_null($obj->style))
					$this->writeLn('style:"'.$obj->style.'",');
			if ($obj->tbar->count()){
				$this->writeLn('tbar:[');
				$this->mkItems($obj->tbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->title))
				$this->writeLn('title:"'.$obj->title.'",');
			if (!is_null($obj->titleCollapse))
				$this->writeLn('titleCollapse:'.$this->boolean[$obj->titleCollapse].',');
			if ($obj->tools->count()){
				$this->writeLn('tools:[');
				$this->mkTools($obj->tools);
				$this->writeLn('],');
			}
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			if ($obj->xtype=='form'&&!is_null($obj->eventName))
				$this->writeLn('url:window.location,');
			//
			$this->writeLn('items:[');
			$this->mkItems($obj->items);
			$this->writeLn(']');
		}

		private function mkTab($obj){
			if (!is_null($obj->autoScroll))
				$this->writeLn('autoScroll:'.$this->boolean[$obj->autoScroll].',');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}

			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->closable))
				$this->writeLn('closable:'.$this->boolean[$obj->closable].',');
			if (!is_null($obj->closeText))
				$this->writeLn('closeText:"'.$obj->closeText.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->defaults)){
				if (stristr($obj->defaults,"{"))  //Only object
					$this->writeLn('defaults:'.$obj->defaults.',');
			}
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->frame))
				$this->writeLn('frame:'.$this->boolean[$obj->frame].',');
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->icon))
				$this->writeLn('icon:"'.$obj->icon.'",');
			if (!is_null($obj->iconAlign))
				$this->writeLn('iconAlign:"'.$obj->iconAlign.'",');
			if (!is_null($obj->iconCls))
				$this->writeLn('iconCls:"'.$obj->iconCls.'",');
			if (!is_null($obj->layout)){
				if (stristr($obj->layout,"{"))
					$this->writeLn('layout:'.$obj->layout.',');
				else
					$this->writeLn('layout:"'.$obj->layout.'",');
			}
			if (!is_null($obj->margin))
				$this->writeLn('margin:"'.$obj->margin.'",');
			if (!is_null($obj->maxWidth))
				$this->writeLn('maxWidth:'.$obj->maxWidth.',');
			if (!is_null($obj->maxHeight))
				$this->writeLn('maxHeight:'.$obj->maxHeight.',');
			if (!is_null($obj->minHeight))
				$this->writeLn('minHeight:'.$obj->minHeight.',');
			if (!is_null($obj->minWidth))
				$this->writeLn('minWidth:'.$obj->minWidth.',');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->pressed))
				$this->writeLn('pressed:'.$this->boolean[$obj->pressed].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->tabIndex))
				$this->writeLn('tabIndex:'.$obj->tabIndex.',');
			if (!is_null($obj->text))
				$this->writeLn('text:"'.$obj->text.'",');
			if (!is_null($obj->title))
				$this->writeLn('title:"'.$obj->title.'",');
			if (!is_null($obj->tooltip))
				$this->writeLn('tooltip:"'.$obj->tooltip.'",');
			if (!is_null($obj->type))
				$this->writeLn('type:"'.$obj->type.'",');
			$this->writeLn('items:[');
			$this->mkItems($obj->items);
			$this->writeLn(']');
		}

		private function mkTabPanel($obj){
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
				
			if (!is_null($obj->activeItem))
				$this->writeLn('activeItem:'.$obj->activeItem.',');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if ($obj->bbar->count()){
				$this->writeLn('bbar:[');
				$this->mkItems($obj->bbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->bodyBorder))
				$this->writeLn('bodyBorder:'.$obj->bodyBorder.',');
			if (!is_null($obj->bodyCls))
				$this->writeLn('bodyCls:"'.$obj->bodyCls.'",');
			if (!is_null($obj->bodyPadding))
				$this->writeLn('bodyPadding:"'.$obj->bodyPadding.'",');
			if (!is_null($obj->bodyStyle))
				$this->writeLn('bodyStyle:"'.$obj->bodyStyle.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if ($obj->buttons->count()){
				$this->writeLn('buttons:[');
				$this->mkItems($obj->buttons);
				$this->writeLn('],');
			}
			if (!is_null($obj->buttonAlign))
				$this->writeLn('buttonAlign:"'.$obj->buttonAlign.'",');
			if (!is_null($obj->closable))
				$this->writeLn('closable:'.$this->boolean[$obj->closable].',');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->collapsed))
				$this->writeLn('collapsed:'.$this->boolean[$obj->collapsed].',');
			if (!is_null($obj->collapsible))
				$this->writeLn('collapsible:'.$this->boolean[$obj->collapsible].',');
			if (!is_null($obj->defaults)){
				if (stristr($obj->defaults,"{"))  //Only object
					$this->writeLn('defaults:'.$obj->defaults.',');
			}
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if ($obj->fbar->count()){
				$this->writeLn('fbar:[');
				$this->mkItems($obj->fbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->frame))
				$this->writeLn('frame:'.$this->boolean[$obj->frame].',');
			if (!is_null($obj->frameHeader))
				$this->writeLn('frameHeader:'.$this->boolean[$obj->frameHeader].',');
			if (!is_null($obj->headerPosition))
					$this->writeLn('headerPosition:"'.$obj->headerPosition.'",');
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
					$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->layout)){
				if (stristr($obj->layout,"{"))
					$this->writeLn('layout:'.$obj->layout.',');
				else
					$this->writeLn('layout:"'.$obj->layout.'",');
			}
			if ($obj->lbar->count()){
				$this->writeLn('lbar:[');
				$this->mkItems($obj->lbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->margin))
				$this->writeLn('margin:"'.$obj->margin.'",');
			if (!is_null($obj->maxWidth))
				$this->writeLn('maxWidth:'.$obj->maxWidth.',');
			if (!is_null($obj->maxHeight))
				$this->writeLn('maxHeight:'.$obj->maxHeight.',');
			if (!is_null($obj->minHeight))
				$this->writeLn('minHeight:'.$obj->minHeight.',');
			if (!is_null($obj->minTabWidth))
				$this->writeLn('minTabWidth:'.$obj->minTabWidth.',');
			if (!is_null($obj->minWidth))
				$this->writeLn('minWidth:'.$obj->minWidth.',');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if ($obj->rbar->count()){
				$this->writeLn('rbar:[');
				$this->mkItems($obj->rbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->resizable))
				$this->writeLn('resizable:'.$this->boolean[$obj->resizable].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if ($obj->tabBar->count()){
				$this->writeLn('tabBar:[');
				$this->mkItems($obj->tabBar);
				$this->writeLn('],');
			}
			if (!is_null($obj->tabPosition))
				$this->writeLn('tabPosition:"'.$obj->tabPosition.'",');
			if ($obj->tbar->count()){
				$this->writeLn('tbar:[');
				$this->mkItems($obj->tbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->title))
				$this->writeLn('title:"'.$obj->title.'",');
			if (!is_null($obj->titleCollapse))
				$this->writeLn('titleCollapse:'.$this->boolean[$obj->titleCollapse].',');
			if ($obj->tools->count()){
				$this->writeLn('tools:[');
				$this->mkTools($obj->tools);
				$this->writeLn('],');
			}
			$this->writeLn('items:[');
			$this->mkItems($obj->items);
			$this->writeLn(']');
		}

		private function mkLabel($obj){
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->margin))
				$this->writeLn('margin:"'.$obj->margin.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			if (is_null($obj->text))
				$this->writeLn('text:""');
			else
				$this->writeLn('text:"'.$obj->text.'"');
		}
		
		private function mkCheckboxField($obj){
			if (!is_null($obj->activeError))
				$this->writeLn('activeError:"'.$obj->activeError.'",');
			if (!is_null($obj->anchor))
				$this->writeLn('anchor:"'.$obj->anchor.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->boxLabel))
				$this->writeLn('boxLabel:"'.$obj->boxLabel.'",');
			if (!is_null($obj->boxLabelAlign))
				$this->writeLn('boxLabelAlign:"'.$obj->boxLabelAlign.'",');
			if (!is_null($obj->checked))
				$this->writeLn('checked:'.$this->boolean[$obj->checked].',');
			if (!is_null($obj->clearCls))
				$this->writeLn('clearCls:"'.$obj->clearCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->enableKeyEvents))
				$this->writeLn('enableKeyEvents:'.$this->boolean[$obj->enableKeyEvents].',');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'",');
			if (!is_null($obj->handler)){
				$this->writeLn('handler:function(){');
				$this->writeLn($this->getString($obj->handler));
				$this->writeLn('},');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->inputValue))
				$this->writeLn('inputValue:"'.$obj->inputValue.'",');
			if (!is_null($obj->labelAlign))
				$this->writeLn('labelAlign:"'.$obj->labelAlign.'",');
			if (!is_null($obj->labelPad))
				$this->writeLn('labelPad:'.$obj->labelPad.',');
			if (!is_null($obj->labelSeparator))
				$this->writeLn('labelSeparator:"'.$obj->labelSeparator.'",');
			if (!is_null($obj->labelWidth))
				$this->writeLn('labelWidth:'.$obj->labelWidth.',');
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->readOnly))
				$this->writeLn('readOnly:'.$this->boolean[$obj->readOnly].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->tabIndex))
				$this->writeLn('tabIndex:'.$obj->tabIndex.',');
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->value))
				$this->writeLn('value:'.$this->boolean[$obj->value].',');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			//
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}
		
		private function mkCombobox($obj){
			if (!is_null($obj->activeError))
				$this->writeLn('activeError:"'.$obj->activeError.'",');
			if (!is_null($obj->allowBlank))
				$this->writeLn('allowBlank:"'.$this->boolean[$obj->allowBlank].'",');
			if (!is_null($obj->anchor))
				$this->writeLn('anchor:"'.$obj->anchor.'",');
			if (!is_null($obj->autoSelect))
				$this->writeLn('autoSelect:'.$this->boolean[$obj->autoSelect].',');
			if (!is_null($obj->blankText))
				$this->writeLn('blankText:"'.$obj->blankText.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->clearCls))
				$this->writeLn('clearCls:"'.$obj->clearCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->displayField))
				$this->writeLn('displayField:"'.$obj->displayField.'",');
			if (!is_null($obj->editable))
				$this->writeLn('editable:'.$this->boolean[$obj->editable].',');
			if (!is_null($obj->emptyText))
				$this->writeLn('emptyText:"'.$obj->emptyText.'",');
			if (!is_null($obj->enableKeyEvents))
				$this->writeLn('enableKeyEvents:'.$this->boolean[$obj->enableKeyEvents].',');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'",');
			if (!is_null($obj->forceSelection))
				$this->writeLn('forceSelection:'.$this->boolean[$obj->forceSelection].',');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->invalidText))
				$this->writeLn('invalidText:"'.$obj->invalidText.'",');
			if (!is_null($obj->labelAlign))
				$this->writeLn('labelAlign:"'.$obj->labelAlign.'",');
			if (!is_null($obj->labelPad))
				$this->writeLn('labelPad:'.$obj->labelPad.',');
			if (!is_null($obj->labelSeparator))
				$this->writeLn('labelSeparator:"'.$obj->labelSeparator.'",');
			if (!is_null($obj->labelWidth))
				$this->writeLn('labelWidth:'.$obj->labelWidth.',');
			if (!is_null($obj->margin))
				$this->writeLn('margin:"'.$obj->margin.'",');
			if (!is_null($obj->maskRe))
				$this->writeLn('maskRe:'.$obj->maskRe.',');
			if (!is_null($obj->maxLength))
				$this->writeLn('maxLength:'.$obj->maxLength.',');
			if (!is_null($obj->maxLengthText))
				$this->writeLn('maxLengthText:"'.$obj->maxLengthText.'",');
			if (!is_null($obj->minLength))
				$this->writeLn('minLength:'.$obj->minLength.',');
			if (!is_null($obj->minLengthText))
				$this->writeLn('minLengthText:"'.$obj->minLengthText.'",');
			if (!is_null($obj->multiSelect))
				$this->writeLn('multiSelect:'.$this->boolean[$obj->multiSelect].',');
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->queryParam))
				$this->writeLn('queryParam:"'.$obj->queryParam.'",');
			if (!is_null($obj->readOnly))
				$this->writeLn('readOnly:'.$this->boolean[$obj->readOnly].',');
			$fields='[';
			while ($obj->fields->next()){
				if ($obj->fields->iterator()>0) $fields.=',';
				$fields.='"'.$obj->fields->value().'"';
			}
			$fields.=']';
			if ($obj->queryMode==TQueryModeType::$local){
				$data='[';
				while ($obj->data->next()){
					if ($obj->data->iterator()>0) $data.=',';
					$data.='{';
					$aV=$obj->data->value();
					if (!is_array($aV)) $aV=array($aV);
					while ($obj->fields->next()){
						if ($obj->fields->iterator()>0) $data.=',';
						$sV='null';
						if ($obj->fields->iterator()<count($obj->data->value())) $sV=$aV[$obj->fields->iterator()];
						if ($sV=='null'||!is_string($sV))
							$data.='"'.$obj->fields->value().'":'.$sV;
						else
							$data.='"'.$obj->fields->value().'":"'.$sV.'"';
					}
					$data.='}';
				}
				$data.=']';
				$this->writeLn('store:{');
				$this->writeLn('fields:'.$fields.',');
				$this->writeLn('data:'.$data);
				$this->writeLn('},');
			}
			else{			
				if (is_null($obj->eventName)) throw new Exception('ERROR: Missing eventName');
				//
				$this->writeLn('store:{');
				$this->writeLn('autoLoad:'.$this->boolean[$obj->autoLoad].',');	
				$this->writeLn('fields:'.$fields.',');
				$this->writeLn('proxy: {');	
				$this->writeLn('extraParams:{event:"'.$obj->eventName.'",data:""},');
				$this->writeLn('type: "ajax",');
				$this->writeLn('url: "",');
				$this->writeLn('reader: {');
				$this->writeLn('root: "'.$obj->root.'",');
				$this->writeLn('totalProperty: "'.$obj->totalProperty.'"');
				$this->writeLn('}');
				$this->writeLn('}');
				$this->writeLn('},');
			}
			if (!is_null($obj->tabIndex))
				$this->writeLn('tabIndex:'.$obj->tabIndex.',');
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->triggerAction))
				$this->writeLn('triggerAction:"'.$obj->triggerAction.'",');
			if (!is_null($obj->typeAhead))
				$this->writeLn('typeAhead:'.$this->boolean[$obj->typeAhead].',');
			if (!is_null($obj->selectOnFocus))
				$this->writeLn('selectOnFocus:'.$this->boolean[$obj->selectOnFocus].',');
			if (!is_null($obj->selectOnTab))
				$this->writeLn('selectOnTab:'.$this->boolean[$obj->selectOnTab].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->validateOnBlur))
				$this->writeLn('validateOnBlur:'.$this->boolean[$obj->validateOnBlur].',');
			if (!is_null($obj->validateOnChange))
				$this->writeLn('validateOnChange:'.$this->boolean[$obj->validateOnChange].',');
			if (!is_null($obj->validator))
				$this->writeLn('validator:function(value){'.$this->getString($obj->validator).'},');
			if (!is_null($obj->value))
				$this->writeLn('value:"'.$obj->value.'",');
			if (!is_null($obj->valueField))
				$this->writeLn('valueField:"'.$obj->valueField.'",');
			if (!is_null($obj->valueNotFoundText))
				$this->writeLn('valueNotFoundText:"'.$obj->valueNotFoundText.'",');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			//
			if (is_null($obj->queryMode))
				$this->writeLn('queryMode:"local"');
			else
				$this->writeLn('queryMode:"'.$obj->queryMode.'"');
		}
		
		private function  mkDateField($obj){
			if (!is_null($obj->activeError))
				$this->writeLn('activeError:"'.$obj->activeError.'",');
			if (!is_null($obj->allowBlank))
				$this->writeLn('allowBlank:'.$this->boolean[$obj->allowBlank].',');
			if (!is_null($obj->altFormats))
				$this->writeLn('altFormats:"'.$obj->altFormats.'",');
			if (!is_null($obj->anchor))
				$this->writeLn('anchor:"'.$obj->anchor.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->blankText))
				$this->writeLn('blankText:"'.$obj->blankText.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->clearCls))
				$this->writeLn('clearCls:"'.$obj->clearCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->disabledDates)){
				$aD=$obj->disabledDates;
				if (!is_array($aD)) $aD=explode(",",$obj->disabledDates);
				$this->writeLn('disabledDates:[');
				for($i=0;$i<count($aD);$i++){
					if ($i) echo ',';
					echo '"'.$aD[$i].'"';
				}
				$this->writeLn('');
				$this->writeLn('],');
			}
			if (!is_null($obj->disabledDatesText))
				$this->writeLn('disabledDatesText:"'.$obj->disabledDatesText.'",');
			if (!is_null($obj->disabledDays)){
				$aD=$obj->disabledDays;
				if (!is_array($aD)) $aD=explode(",",$obj->disabledDays);
				$this->writeLn('disabledDays:[');
				for($i=0;$i<count($aD);$i++){
					if ($i) echo ',';
					echo $aD[$i];
				}
				$this->writeLn('');
				$this->writeLn('],');
			}
			if (!is_null($obj->disabledDaysText))
				$this->writeLn('disabledDaysText:"'.$obj->disabledDaysText.'",');
			if (!is_null($obj->editable))
				$this->writeLn('editable:'.$this->boolean[$obj->editable].',');
			if (!is_null($obj->emptyText))
				$this->writeLn('emptyText:"'.$obj->emptyText.'",');
			if (!is_null($obj->enableKeyEvents))
				$this->writeLn('enableKeyEvents:'.$this->boolean[$obj->enableKeyEvents].',');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'",');
			if (!is_null($obj->format))
				$this->writeLn('format:"'.$obj->format.'",');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->invalidText))
				$this->writeLn('invalidText:"'.$obj->invalidText.'",');
			if (!is_null($obj->labelAlign))
				$this->writeLn('labelAlign:"'.$obj->labelAlign.'",');
			if (!is_null($obj->labelPad))
				$this->writeLn('labelPad:'.$obj->labelPad.',');
			if (!is_null($obj->labelSeparator))
				$this->writeLn('labelSeparator:"'.$obj->labelSeparator.'",');
			if (!is_null($obj->labelWidth))
				$this->writeLn('labelWidth:'.$obj->labelWidth.',');
			if (!is_null($obj->maskRe))
				$this->writeLn('maskRe:'.$obj->maskRe.',');
			if (!is_null($obj->maxLength))
				$this->writeLn('maxLength:'.$obj->maxLength.',');
			if (!is_null($obj->maxLengthText))
				$this->writeLn('maxLengthText:"'.$obj->maxLengthText.'",');
			if (!is_null($obj->maxText))
				$this->writeLn('maxText:"'.$obj->maxText.'",');
			if (!is_null($obj->maxValue))
				$this->writeLn('maxValue:"'.$obj->maxValue.'",');
			if (!is_null($obj->minLength))
				$this->writeLn('minLength:'.$obj->minLength.',');
			if (!is_null($obj->minLengthText))
				$this->writeLn('minLengthText:"'.$obj->minLengthText.'",');
			if (!is_null($obj->minText))
				$this->writeLn('minText:"'.$obj->minText.'",');
			if (!is_null($obj->minValue))
				$this->writeLn('minValue:"'.$obj->minValue.'",');
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->readOnly))
				$this->writeLn('readOnly:'.$this->boolean[$obj->readOnly].',');
			if (!is_null($obj->showToday))
				$this->writeLn('showToday:'.$this->boolean[$obj->showToday].',');
			if (!is_null($obj->startDay))
				$this->writeLn('startDay:'.$obj->startDay.',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->tabIndex))
				$this->writeLn('tabIndex:'.$obj->tabIndex.',');
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->validateOnBlur))
				$this->writeLn('validateOnBlur:'.$this->boolean[$obj->validateOnBlur].',');
			if (!is_null($obj->validateOnChange))
				$this->writeLn('validateOnChange:'.$this->boolean[$obj->validateOnChange].',');
			if (!is_null($obj->validator))
				$this->writeLn('validator:function(value){'.$this->getString($obj->validator).'},');
			if (!is_null($obj->value))
				$this->writeLn('value:"'.$obj->value.'",');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			//
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}

		private function mkDisplayField($obj){
			if (!is_null($obj->anchor))
				$this->writeLn('anchor:"'.$obj->anchor.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->clearCls))
				$this->writeLn('clearCls:"'.$obj->clearCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'",');
			if (!is_null($obj->frame))
				$this->writeLn('frame:'.$this->boolean[$obj->frame].',');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->labelAlign))
				$this->writeLn('labelAlign:"'.$obj->labelAlign.'",');
			if (!is_null($obj->labelPad))
				$this->writeLn('labelPad:'.$obj->labelPad.',');
			if (!is_null($obj->labelSeparator))
				$this->writeLn('labelSeparator:"'.$obj->labelSeparator.'",');
			if (!is_null($obj->labelWidth))
				$this->writeLn('labelWidth:'.$obj->labelWidth.',');
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->readOnly))
				$this->writeLn('readOnly:'.$this->boolean[$obj->readOnly].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->tabIndex))
				$this->writeLn('tabIndex:'.$obj->tabIndex.',');
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->value))
				$this->writeLn('value:"'.$obj->value.'",');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}

		private function mkFileField($obj){
			if (!is_null($obj->allowBlank))
				$this->writeLn('allowBlank:'.$this->boolean[$obj->allowBlank].',');
			if (!is_null($obj->anchor))
				$this->writeLn('anchor:"'.$obj->anchor.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->buttonText))
				$this->writeLn('buttonText:"'.$obj->buttonText.'",');
			if (!is_null($obj->clearCls))
				$this->writeLn('clearCls:"'.$obj->clearCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'",');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->labelAlign))
				$this->writeLn('labelAlign:"'.$obj->labelAlign.'",');
			if (!is_null($obj->labelPad))
				$this->writeLn('labelPad:'.$obj->labelPad.',');
			if (!is_null($obj->labelSeparator))
				$this->writeLn('labelSeparator:"'.$obj->labelSeparator.'",');
			if (!is_null($obj->labelWidth))
				$this->writeLn('labelWidth:'.$obj->labelWidth.',');
			if (!is_null($obj->msgTarget))
				$this->writeLn('msgTarget:"'.$obj->msgTarget.'",');
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->readOnly))
				$this->writeLn('readOnly:'.$this->boolean[$obj->readOnly].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->tabIndex))
				$this->writeLn('tabIndex:'.$obj->tabIndex.',');
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->value))
				$this->writeLn('value:"'.$obj->value.'",');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}
		
		private function mkHiddenField($obj){
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (is_null($obj->value))
				$this->writeLn('value:""');
			else
				$this->writeLn('value:"'.$obj->value.'"');
		}
		
		private function mkHtmlEditor($obj){
			if (!is_null($obj->anchor))
				$this->writeLn('anchor:"'.$obj->anchor.'",');
			if (!is_null($obj->autoScroll))
				$this->writeLn('autoScroll:'.$this->boolean[$obj->autoScroll].',');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->clearCls))
				$this->writeLn('clearCls:"'.$obj->clearCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->createLinkText))
				$this->writeLn('createLinkText:"'.$obj->createLinkText.'",');
			if (!is_null($obj->defaultLinkValue))
				$this->writeLn('defaultLinkValue:"'.$obj->defaultLinkValue.'",');
			if (!is_null($obj->defaultValue))
				$this->writeLn('defaultValue:"'.$obj->defaultValue.'",');
			if (!is_null($obj->enableAlignments))
				$this->writeLn('enableAlignments:'.$this->boolean[$obj->enableAlignments].',');
			if (!is_null($obj->enableColors))
				$this->writeLn('enableColors:'.$this->boolean[$obj->enableColors].',');
			if (!is_null($obj->enableFont))
				$this->writeLn('enableFont:'.$this->boolean[$obj->enableFont].',');
			if (!is_null($obj->enableFontSize))
				$this->writeLn('enableFontSize:'.$this->boolean[$obj->enableFontSize].',');
			if (!is_null($obj->enableFormat))
				$this->writeLn('enableFormat:'.$this->boolean[$obj->enableFormat].',');
			if (!is_null($obj->enableLinks))
				$this->writeLn('enableLinks:'.$this->boolean[$obj->enableLinks].',');
			if (!is_null($obj->enableLists))
				$this->writeLn('enableLists:'.$this->boolean[$obj->enableLists].',');
			if (!is_null($obj->enableSourceEdit))
				$this->writeLn('enableSourceEdit:'.$this->boolean[$obj->enableSourceEdit].',');
			if (!is_null($obj->fontFamilies)&&is_array($obj->fontFamilies)){
				$this->writeLn('fontFamilies:[');
				for($i=0;$i<count($obj->fontFamilies);$i++){
					if (!$i) $this->writeLn(',');
					echo '"'.$obj->fontFamilies[$i].'"';
				}
				$this->writeLn('');
				$this->writeLn('],');
			}
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->maxHeight))
				$this->writeLn('maxHeight:'.$obj->maxHeight.',');
			if (!is_null($obj->maxWidth))
				$this->writeLn('maxWidth:'.$obj->maxWidth.',');
			if (!is_null($obj->minHeight))
				$this->writeLn('minHeight:'.$obj->minHeight.',');
			if (!is_null($obj->minWidth))
				$this->writeLn('minWidth:'.$obj->minWidth.',');
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->value))
				$this->writeLn('value:"'.$obj->value.'",');
			if (!is_null($obj->validateOnChange))
				$this->writeLn('validateOnChange:'.$this->boolean[$obj->validateOnChange].',');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			//
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}

		private function mkNumberField($obj){
			if (!is_null($obj->allowBlank))
				$this->writeLn('allowBlank:'.$this->boolean[$obj->allowBlank].',');
			if (!is_null($obj->allowDecimals))
				$this->writeLn('allowDecimals:'.$this->boolean[$obj->allowDecimals].',');
			if (!is_null($obj->anchor))
				$this->writeLn('anchor:"'.$obj->anchor.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->blankText))
				$this->writeLn('blankText:"'.$obj->blankText.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->clearCls))
				$this->writeLn('clearCls:"'.$obj->clearCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->decimalPrecision))
				$this->writeLn('decimalPrecision:'.$obj->decimalPrecision.',');
			if (!is_null($obj->decimalSeparator))
				$this->writeLn('decimalSeparator:"'.$obj->decimalSeparator.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->editable))
				$this->writeLn('editable:'.$this->boolean[$obj->editable].',');
			if (!is_null($obj->emptyText))
				$this->writeLn('emptyText:"'.$obj->emptyText.'",');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'",');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->invalidText))
				$this->writeLn('invalidText:"'.$obj->invalidText.'",');
			if (!is_null($obj->keyNavEnabled))
				$this->writeLn('keyNavEnabled:'.$this->boolean[$obj->keyNavEnabled].',');
			if (!is_null($obj->labelAlign))
				$this->writeLn('labelAlign:"'.$obj->labelAlign.'",');
			if (!is_null($obj->labelPad))
				$this->writeLn('labelPad:'.$obj->labelPad.',');
			if (!is_null($obj->labelSeparator))
				$this->writeLn('labelSeparator:"'.$obj->labelSeparator.'",');
			if (!is_null($obj->labelWidth))
				$this->writeLn('labelWidth:'.$obj->labelWidth.',');
			if (!is_null($obj->maskRe))
				$this->writeLn('maskRe:'.$obj->maskRe.',');
			if (!is_null($obj->maxLength))
				$this->writeLn('maxLength:'.$obj->maxLength.',');
			if (!is_null($obj->maxLengthText))
				$this->writeLn('maxLengthText:"'.$obj->maxLengthText.'",');
			if (!is_null($obj->maxText))
				$this->writeLn('maxText:"'.$obj->maxText.'",');
			if (!is_null($obj->maxValue))
				$this->writeLn('maxValue:'.$obj->maxValue.',');
			if (!is_null($obj->minLength))
				$this->writeLn('minLength:'.$obj->minLength.',');
			if (!is_null($obj->minLengthText))
				$this->writeLn('minLengthText:"'.$obj->minLengthText.'",');
			if (!is_null($obj->minText))
				$this->writeLn('minText:"'.$obj->minText.'",');
			if (!is_null($obj->minValue))
				$this->writeLn('minValue:'.$obj->minValue.',');
			if (!is_null($obj->nanText))
				$this->writeLn('nanText:"'.$obj->nanText.'",');
			if (!is_null($obj->negativeText))
				$this->writeLn('negativeText:"'.$obj->negativeText.'",');				
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->readOnly))
				$this->writeLn('readOnly:'.$this->boolean[$obj->readOnly].',');
			if (!is_null($obj->spinDownEnabled))
				$this->writeLn('spinDownEnabled:'.$this->boolean[$obj->spinDownEnabled].',');
			if (!is_null($obj->spinUpEnabled))
				$this->writeLn('spinUpEnabled:'.$this->boolean[$obj->spinUpEnabled].',');
			if (!is_null($obj->step))
				$this->writeLn('step:'.$obj->step.',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->tabIndex))
				$this->writeLn('tabIndex:'.$obj->tabIndex.',');
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->validateOnBlur))
				$this->writeLn('validateOnBlur:'.$this->boolean[$obj->validateOnBlur].',');
			if (!is_null($obj->validateOnChange))
				$this->writeLn('validateOnChange:'.$this->boolean[$obj->validateOnChange].',');
			if (!is_null($obj->validator))
				$this->writeLn('validator:function(value){'.$this->getString($obj->validator).'},');
			if (!is_null($obj->value))
				$this->writeLn('value:'.$obj->value.',');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}

		private function mkRadioField($obj){
			if (!is_null($obj->activeError))
				$this->writeLn('activeError:"'.$obj->activeError.'",');
			if (!is_null($obj->anchor))
				$this->writeLn('anchor:"'.$obj->anchor.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->boxLabel))
				$this->writeLn('boxLabel:"'.$obj->boxLabel.'",');
			if (!is_null($obj->boxLabelAlign))
				$this->writeLn('boxLabelAlign:"'.$obj->boxLabelAlign.'",');
			if (!is_null($obj->checked))
				$this->writeLn('checked:'.$this->boolean[$obj->checked].',');
			if (!is_null($obj->clearCls))
				$this->writeLn('clearCls:"'.$obj->clearCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->enableKeyEvents))
				$this->writeLn('enableKeyEvents:'.$this->boolean[$obj->enableKeyEvents].',');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'",');
			if (!is_null($obj->handler)){
				$this->writeLn('handler:function(){');
				$this->writeLn($this->getString($obj->handler));
				$this->writeLn('},');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->inputValue))
				$this->writeLn('inputValue:"'.$obj->inputValue.'",');
			if (!is_null($obj->labelAlign))
				$this->writeLn('labelAlign:"'.$obj->labelAlign.'",');
			if (!is_null($obj->labelPad))
				$this->writeLn('labelPad:'.$obj->labelPad.',');
			if (!is_null($obj->labelSeparator))
				$this->writeLn('labelSeparator:"'.$obj->labelSeparator.'",');
			if (!is_null($obj->labelWidth))
				$this->writeLn('labelWidth:'.$obj->labelWidth.',');
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->readOnly))
				$this->writeLn('readOnly:'.$this->boolean[$obj->readOnly].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->tabIndex))
				$this->writeLn('tabIndex:'.$obj->tabIndex.',');
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->value))
				$this->writeLn('value:'.$this->boolean[$obj->value].',');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			//
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}

		private function mkTextField($obj){
			if (!is_null($obj->activeError))
				$this->writeLn('activeError:"'.$obj->activeError.'",');
			if (!is_null($obj->allowBlank))
				$this->writeLn('allowBlank:'.$this->boolean[$obj->allowBlank].',');
			if (!is_null($obj->anchor))
				$this->writeLn('anchor:"'.$obj->anchor.'",');
			if (!is_null($obj->blankText))
				$this->writeLn('blankText:"'.$obj->blankText.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->clearCls))
				$this->writeLn('clearCls:"'.$obj->clearCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->emptyText))
				$this->writeLn('emptyText:"'.$obj->emptyText.'",');
			if (!is_null($obj->enableKeyEvents))
				$this->writeLn('enableKeyEvents:'.$this->boolean[$obj->enableKeyEvents].',');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'",');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->inputType))
				$this->writeLn('inputType:"'.$obj->inputType.'",');
			if (!is_null($obj->invalidText))
				$this->writeLn('invalidText:"'.$obj->invalidText.'",');
			if (!is_null($obj->labelAlign))
				$this->writeLn('labelAlign:"'.$obj->labelAlign.'",');
			if (!is_null($obj->labelPad))
				$this->writeLn('labelPad:'.$obj->labelPad.',');
			if (!is_null($obj->labelSeparator))
				$this->writeLn('labelSeparator:"'.$obj->labelSeparator.'",');
			if (!is_null($obj->labelWidth))
				$this->writeLn('labelWidth:'.$obj->labelWidth.',');
			if (!is_null($obj->maskRe))
				$this->writeLn('maskRe:'.$obj->maskRe.',');
			if (!is_null($obj->maxLength))
				$this->writeLn('maxLength:'.$obj->maxLength.',');
			if (!is_null($obj->maxLengthText))
				$this->writeLn('maxLengthText:"'.$obj->maxLengthText.'",');
			if (!is_null($obj->minLength))
				$this->writeLn('minLength:'.$obj->minLength.',');
			if (!is_null($obj->minLengthText))
				$this->writeLn('minLengthText:"'.$obj->minLengthText.'",');
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->readOnly))
				$this->writeLn('readOnly:'.$this->boolean[$obj->readOnly].',');
			if (!is_null($obj->validateOnBlur))
				$this->writeLn('validateOnBlur:'.$this->boolean[$obj->validateOnBlur].',');
			if (!is_null($obj->validateOnChange))
				$this->writeLn('validateOnChange:'.$this->boolean[$obj->validateOnChange].',');
			if (!is_null($obj->value))
				$this->writeLn('value:"'.$obj->value.'",');
			else
				$this->writeLn('value:"",');
			if (!is_null($obj->validator))
				$this->writeLn('validator:function(value){'.$this->getString($obj->validator).'},');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			//
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}
		
		private function mkTextAreaField($obj){
			if (!is_null($obj->activeError))
				$this->writeLn('activeError:"'.$obj->activeError.'",');
			if (!is_null($obj->allowBlank))
				$this->writeLn('allowBlank:'.$this->boolean[$obj->allowBlank].',');
			if (!is_null($obj->anchor))
				$this->writeLn('anchor:"'.$obj->anchor.'",');
			if (!is_null($obj->blankText))
				$this->writeLn('blankText:"'.$obj->blankText.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->clearCls))
				$this->writeLn('clearCls:"'.$obj->clearCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->emptyText))
				$this->writeLn('emptyText:"'.$obj->emptyText.'",');
			if (!is_null($obj->enableKeyEvents))
				$this->writeLn('enableKeyEvents:'.$this->boolean[$obj->enableKeyEvents].',');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'",');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->invalidText))
				$this->writeLn('invalidText:"'.$obj->invalidText.'",');
			if (!is_null($obj->labelAlign))
				$this->writeLn('labelAlign:"'.$obj->labelAlign.'",');
			if (!is_null($obj->labelPad))
				$this->writeLn('labelPad:'.$obj->labelPad.',');
			if (!is_null($obj->labelSeparator))
				$this->writeLn('labelSeparator:"'.$obj->labelSeparator.'",');
			if (!is_null($obj->labelWidth))
				$this->writeLn('labelWidth:'.$obj->labelWidth.',');
			if (!is_null($obj->maskRe))
				$this->writeLn('maskRe:'.$obj->maskRe.',');
			if (!is_null($obj->maxLength))
				$this->writeLn('maxLength:'.$obj->maxLength.',');
			if (!is_null($obj->maxLengthText))
				$this->writeLn('maxLengthText:"'.$obj->maxLengthText.'",');
			if (!is_null($obj->minLength))
				$this->writeLn('minLength:'.$obj->minLength.',');
			if (!is_null($obj->minLengthText))
				$this->writeLn('minLengthText:"'.$obj->minLengthText.'",');
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->readOnly))
				$this->writeLn('readOnly:'.$this->boolean[$obj->readOnly].',');
			if (!is_null($obj->validateOnBlur))
				$this->writeLn('validateOnBlur:'.$this->boolean[$obj->validateOnBlur].',');
			if (!is_null($obj->validateOnChange))
				$this->writeLn('validateOnChange:'.$this->boolean[$obj->validateOnChange].',');
			if (!is_null($obj->value))
				$this->writeLn('value:"'.$obj->value.'",');
			else
				$this->writeLn('value:"",');
			if (!is_null($obj->validator))
				$this->writeLn('validator:function(value){'.$this->getString($obj->validator).'},');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			//
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}

		private function  mkTimeField($obj){
			if (!is_null($obj->activeError))
				$this->writeLn('activeError:"'.$obj->activeError.'",');
			if (!is_null($obj->allowBlank))
				$this->writeLn('allowBlank:'.$this->boolean[$obj->allowBlank].',');
			if (!is_null($obj->altFormats))
				$this->writeLn('altFormats:"'.$obj->altFormats.'",');
			if (!is_null($obj->anchor))
				$this->writeLn('anchor:"'.$obj->anchor.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->blankText))
				$this->writeLn('blankText:"'.$obj->blankText.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->clearCls))
				$this->writeLn('clearCls:"'.$obj->clearCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->editable))
				$this->writeLn('editable:'.$this->boolean[$obj->editable].',');
			if (!is_null($obj->emptyText))
				$this->writeLn('emptyText:"'.$obj->emptyText.'",');
			if (!is_null($obj->enableKeyEvents))
				$this->writeLn('enableKeyEvents:'.$this->boolean[$obj->enableKeyEvents].',');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'",');
			if (!is_null($obj->format))
				$this->writeLn('format:"'.$obj->format.'",');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->increment))
				$this->writeLn('increment:'.$obj->increment.',');
			if (!is_null($obj->invalidText))
				$this->writeLn('invalidText:"'.$obj->invalidText.'",');
			if (!is_null($obj->labelAlign))
				$this->writeLn('labelAlign:"'.$obj->labelAlign.'",');
			if (!is_null($obj->labelPad))
				$this->writeLn('labelPad:'.$obj->labelPad.',');
			if (!is_null($obj->labelSeparator))
				$this->writeLn('labelSeparator:"'.$obj->labelSeparator.'",');
			if (!is_null($obj->labelWidth))
				$this->writeLn('labelWidth:'.$obj->labelWidth.',');
			if (!is_null($obj->maskRe))
				$this->writeLn('maskRe:'.$obj->maskRe.',');
			if (!is_null($obj->maxLength))
				$this->writeLn('maxLength:'.$obj->maxLength.',');
			if (!is_null($obj->maxLengthText))
				$this->writeLn('maxLengthText:"'.$obj->maxLengthText.'",');
			if (!is_null($obj->maxText))
				$this->writeLn('maxText:"'.$obj->maxText.'",');
			if (!is_null($obj->maxValue))
				$this->writeLn('maxValue:"'.$obj->maxValue.'",');
			if (!is_null($obj->minLength))
				$this->writeLn('minLength:'.$obj->minLength.',');
			if (!is_null($obj->minLengthText))
				$this->writeLn('minLengthText:"'.$obj->minLengthText.'",');
			if (!is_null($obj->minText))
				$this->writeLn('minText:"'.$obj->minText.'",');
			if (!is_null($obj->minValue))
				$this->writeLn('minValue:"'.$obj->minValue.'",');
			if (!is_null($obj->name))
				$this->writeLn('name:"'.$obj->name.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->readOnly))
				$this->writeLn('readOnly:'.$this->boolean[$obj->readOnly].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->tabIndex))
				$this->writeLn('tabIndex:'.$obj->tabIndex.',');
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->validateOnBlur))
				$this->writeLn('validateOnBlur:'.$this->boolean[$obj->validateOnBlur].',');
			if (!is_null($obj->validateOnChange))
				$this->writeLn('validateOnChange:'.$this->boolean[$obj->validateOnChange].',');
			if (!is_null($obj->validator))
				$this->writeLn('validator:function(value){'.$this->getString($obj->validator).'},');
			if (!is_null($obj->value))
				$this->writeLn('value:"'.$obj->value.'",');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			//
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}

		private function mkCheckboxRadioGroup($obj){
			if (!is_null($obj->activeError))
				$this->writeLn('activeError:"'.$obj->activeError.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->columns))
				$this->writeLn('columns:'.$obj->columns.',');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'"');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->layout)){
				if (stristr($obj->layout,"{"))
					$this->writeLn('layout:'.$obj->layout.',');
				else
					$this->writeLn('layout:"'.$obj->layout.'",');
			}
			if (!is_null($obj->margin))
				$this->writeLn('margin:"'.$obj->margin.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->vertical))
				$this->writeLn('vertical:'.$this->boolean[$obj->vertical].',');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			$this->writeLn('items:[');
			$this->mkItems($obj->items);
			$this->writeLn(']');
		}
		
		private function mkFieldContainer($obj){
			if (!is_null($obj->activeError))
				$this->writeLn('activeError:"'.$obj->activeError.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->fieldLabel))
				$this->writeLn('fieldLabel:"'.$obj->fieldLabel.'"');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->layout)){
				if (stristr($obj->layout,"{"))
					$this->writeLn('layout:'.$obj->layout.',');
				else
					$this->writeLn('layout:"'.$obj->layout.'",');
			}
			if (!is_null($obj->margin))
				$this->writeLn('margin:"'.$obj->margin.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			$this->writeLn('items:[');
			$this->mkItems($obj->items);
			$this->writeLn(']');
		}
		
		private function mkFieldSet($obj){
			if (!is_null($obj->activeError))
				$this->writeLn('activeError:"'.$obj->activeError.'",');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->collapsed))
				$this->writeLn('collapsed:'.$this->boolean[$obj->collapsed].',');
			if (!is_null($obj->collapsible))
				$this->writeLn('collapsible:'.$this->boolean[$obj->collapsible].',');
			if (!is_null($obj->columnWidth))
				$this->writeLn('columnWidth:'.$obj->columnWidth.',');
			if (!is_null($obj->defaultType))
				$this->writeLn('defaultType:"'.$obj->defaultType.'",');
			if (!is_null($obj->defaults)){
				if (stristr($obj->defaults,"{"))  //Only object
					$this->writeLn('defaults:'.$obj->defaults.',');
			}
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->layout)){
				if (stristr($obj->layout,"{"))
					$this->writeLn('layout:'.$obj->layout.',');
				else
					$this->writeLn('layout:"'.$obj->layout.'",');
			}
			if (!is_null($obj->margin))
				$this->writeLn('margin:"'.$obj->margin.'",');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->title))
				$this->writeLn('title:"'.$obj->title.'",');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			$this->writeLn('items:[');
			$this->mkItems($obj->items);
			$this->writeLn(']');
		}
		
		private function mkCustomButton($obj){
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->allowDepress))
				$this->writeLn('allowDepress:'.$this->boolean[$obj->allowDepress].',');
			if (!is_null($obj->autoWidth))
				$this->writeLn('autoWidth:'.$this->boolean[$obj->autoWidth].',');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->enableToggle))
				$this->writeLn('enableToggle:'.$this->boolean[$obj->enableToggle].',');
			if (!is_null($obj->handler)){
				$this->writeLn('handler:function(){');
				$this->writeLn($this->getString($obj->handler));
				$this->writeLn('},');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->icon))
				$this->writeLn('icon:"'.$obj->icon.'",');
			if (!is_null($obj->iconAlign))
				$this->writeLn('iconAlign:"'.$obj->iconAlign.'",');
			if (!is_null($obj->iconCls))
				$this->writeLn('iconCls:"'.$obj->iconCls.'",');
			if (!is_null($obj->margin))
				$this->writeLn('margin:"'.$obj->margin.'",');
			if (!is_null($obj->maxHeight))
				$this->writeLn('maxHeight:'.$obj->maxHeight.',');
			if (!is_null($obj->maxWidth))
				$this->writeLn('maxWidth:'.$obj->maxWidth.',');
			if ($obj->menu->count()){
				$this->writeLn('menu:{');
				$this->writeLn('xtype:"menu",');
				$this->writeLn('items:[');
				$this->mkItems($obj->menu);
				$this->writeLn(']');
				$this->writeLn('},');
			}
			if (!is_null($obj->menuAlign))
				$this->writeLn('menuAlign:"'.$obj->menuAlign.'",');
			if (!is_null($obj->minHeight))
				$this->writeLn('minHeight:'.$obj->minHeight.',');
			if (!is_null($obj->minWidth))
				$this->writeLn('minWidth:'.$obj->minWidth.',');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->pressed))
				$this->writeLn('pressed:'.$this->boolean[$obj->pressed].',');
			if (!is_null($obj->scale))
				$this->writeLn('scale:"'.$obj->scale.'",');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->tabIndex))
				$this->writeLn('tabIndex:'.$obj->tabIndex.',');
			if (!is_null($obj->tooltip))
				$this->writeLn('tooltip:"'.$obj->tooltip.'",');
			if (!is_null($obj->type))
				$this->writeLn('type:"'.$obj->type.'",');
			//
			if (is_null($obj->text))
				$this->writeLn('text:""');
			else
				$this->writeLn('text:"'.$obj->text.'"');
		}
		
		private function mkCustomMenu($obj){
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');			
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');			
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->handler)){
				$this->writeLn('handler:function(){');
				$this->writeLn($this->getString($obj->handler));
				$this->writeLn('},');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->href))
				$this->writeLn('href:"'.$obj->href.'",');			
			if (!is_null($obj->hrefTarget))
				$this->writeLn('hrefTarget:"'.$obj->hrefTarget.'",');			
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->icon))
				$this->writeLn('icon:"'.$obj->icon.'",');			
			if (!is_null($obj->iconCls))
				$this->writeLn('iconCls:"'.$obj->iconCls.'",');			
			if (!is_null($obj->margin))
				$this->writeLn('margin:"'.$obj->margin.'",');
			if ($obj->menu->count()){
				$this->writeLn('menu:{');
				$this->writeLn('xtype:"menu",');
				$this->writeLn('items:[');
				$obj->menu->reset();
				$this->mkItems($obj->menu);
				$this->writeLn(']');
				$this->writeLn('},');
			}
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->plain))
				$this->writeLn('plain:'.$this->boolean[$obj->plain].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (is_null($obj->text))
				$this->writeLn('text:""');
			else
				$this->writeLn('text:"'.$obj->text.'"');
		}
		
		private function mkCustomToolbar($obj){
			if (!is_null($obj->displayMsg))
				$this->writeLn('displayMsg:"'.$obj->displayMsg.'",');
			//
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');			
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');			
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->plain))
				$this->writeLn('plain:'.$this->boolean[$obj->plain].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->text)&&is_null($obj->html))
				$this->writeLn('text:"'.$obj->text.'",');
			elseif ($obj->xtype=='tbtext'&&is_null($obj->html))
				$this->writeLn('text:"",');
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}
		
		private function columnGrid($fields,$obj,$add){
			$_columns='';
			$_count=$fields->count();
			while ($obj->columns->next()){
				if ($add&&!$obj->columns->value()->columns->count()){	//Add field if do not have children
					$fields->add($_count,$obj->columns->value()->dataIndex);
					$_count++;
				}
				if ($obj->columns->iterator()>0) $_columns.=',';
				$_columns.='{';
				$_columns.='xtype:"'.$obj->columns->value()->xtype.'",';
				$_columns.='id:"'.$obj->columns->name().'",';
				if ($obj->columns->value()->columns->count()){
					$_columns.='columns:[';
					$_columns.=$this->columnGrid($fields,$obj->columns->value(),$add);
					$_columns.='],';
				}
				if (!is_null($obj->columns->value()->header))
					$_columns.='header:"'.$obj->columns->value()->header.'",';
				if (!is_null($obj->columns->value()->height)){
					if (stristr($obj->columns->value()->height,"%"))
						$_columns.='height:"'.$obj->columns->value()->height.'",';
					else
						$_columns.='height:'.$obj->columns->value()->height.',';
				}
				if (!is_null($obj->columns->value()->text))
					$_columns.='text:"'.$obj->columns->value()->text.'",';
				if (!is_null($obj->columns->value()->dataIndex))
					$_columns.='dataIndex:"'.$obj->columns->value()->dataIndex.'",';
				if (!is_null($obj->columns->value()->flex))
					$_columns.='flex:'.$obj->columns->value()->flex.',';
				if (!is_null($obj->columns->value()->renderer)){
					if (!is_array($obj->columns->value()->renderer)&&stristr($obj->columns->value()->renderer,'util.Format')&&!stristr($obj->columns->value()->renderer,'return '))
						$_columns.='renderer:'.$obj->columns->value()->renderer.',';
					else{
						$_columns.='renderer:function(value,metaData,record,rowIndex,colIndex,store,view){'.$this->getString($obj->columns->value()->renderer).'},';
					}
				}
				if (!is_null($obj->columns->value()->hideable))
					$_columns.='hideable:'.$this->boolean[$obj->columns->value()->hideable].',';
				if (!is_null($obj->columns->value()->menuDisabled))
					$_columns.='menuDisabled:'.$this->boolean[$obj->columns->value()->menuDisabled].',';
				if (!is_null($obj->columns->value()->draggable))
					$_columns.='draggable:'.$this->boolean[$obj->columns->value()->draggable].',';
				if (!is_null($obj->columns->value()->groupable))
					$_columns.='groupable:'.$this->boolean[$obj->columns->value()->groupable].',';
				if (!is_null($obj->columns->value()->hidden))
					$_columns.='hidden:'.$this->boolean[$obj->columns->value()->hidden].',';
				if ($obj->columns->value()->xtype=='actioncolumn'){
					$_columns.='items:[';
					while ($obj->columns->value()->items->next()){
						if ($obj->columns->value()->items->iterator()>0) $_columns.=',';
						$_columns.='{';
						if (!is_null($obj->columns->value()->items->value()->icon))
							$_columns.='icon:"'.$obj->columns->value()->items->value()->icon.'",';
						if (!is_null($obj->columns->value()->items->value()->iconCls))
							$_columns.='iconCls:"'.$obj->columns->value()->items->value()->iconCls.'",';
						if (!is_null($obj->columns->value()->items->value()->iconAlign))
							$_columns.='iconAlign:"'.$obj->columns->value()->items->value()->iconAlign.'",';
						if (!is_null($obj->columns->value()->items->value()->tooltip))
							$_columns.='tooltip:"'.$obj->columns->value()->items->value()->tooltip.'",';
						$handler='';
						if (!is_null($obj->columns->value()->items->value()->handler)) $handler=$this->getString($obj->columns->value()->items->value()->handler);
						$_columns.='handler:function(grid,rowIndex,colIndex){'.$handler.'}';
						$_columns.='}';
					}
					$_columns.='],';
				}
				elseif($obj->columns->value()->xtype=='booleancolumn'){
					$_columns.='trueText:"'.$obj->columns->value()->trueText.'",';
					$_columns.='falseText:"'.$obj->columns->value()->falseText.'",';
				}
				elseif($obj->columns->value()->xtype=='datecolumn'||$obj->columns->value()->xtype=='numbercolumn'){
					$_columns.='format:"'.$obj->columns->value()->format.'",';
				}
				elseif($obj->columns->value()->xtype=='templatecolumn'){
					if (!is_null($obj->columns->value()->tpl)){
						if (is_array($obj->columns->value()->tpl)){
							$_columns.='tpl:[';
							for($i=0;$i<count($obj->columns->value()->tpl);$i++){
								if ($i) $_columns.=',';
								$_columns.="'".$obj->columns->value()->tpl[$i]."'";
							}
							$_columns.='],';
						}
						else
							$_columns.='tpl:"'.$obj->columns->value()->tpl.'",';
					}
				}
				if (!is_null($obj->columns->value()->width)){
					if (stristr($obj->columns->value()->width,"%"))
						$_columns.='width:"'.$obj->columns->value()->width.'",';
					else
						$_columns.='width:'.$obj->columns->value()->width.',';
				}
				if (!is_null($obj->columns->value()->summaryType)){
					$_summT=strtolower($obj->columns->value()->summaryType);
					if ($_summT!='count'&&$_summT!='sum'&&$_summT!='min'&&$_summT!='max'&&$_summT!='average')
						$_columns.='summaryType:function(records){'.$obj->columns->value()->summaryType.'},';
					else
						$_columns.='summaryType:"'.$_summT.'",';
				}
				if (!is_null($obj->columns->value()->summaryRenderer)){
					if (!is_array($obj->columns->value()->summaryRenderer)&&stristr($obj->columns->value()->summaryRenderer,'util.Format')&&!stristr($obj->columns->value()->summaryRenderer,'return '))
						$_columns.='summaryRenderer:'.$obj->columns->value()->summaryRenderer.',';
					else{
						$_columns.='summaryRenderer:function(value,summaryData,dataIndex){'.$this->getString($obj->columns->value()->summaryRenderer).'},';
					}
				}
				if (!is_null($obj->columns->value()->sortable))
					$_columns.='sortable:'.$this->boolean[$obj->columns->value()->sortable];
				else
					$_columns.='sortable:false';
				$_columns.='}';
			}

			return ($_columns);
		}
		
		private function mkGridPanel($obj){
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			$this->writeLn('columns:[');
			$this->writeLn($this->columnGrid($obj->fields,$obj,!$obj->fields->count()));
			$this->writeLn('],');
			//
			$fields='[';
			while ($obj->fields->next()){
				if ($obj->fields->iterator()>0) $fields.=',';
				$fields.='"'.$obj->fields->value().'"';
			}
			$fields.=']';
			if ($obj->queryMode==TQueryModeType::$local){
				$data='[';
				while ($obj->data->next()){
					if ($obj->data->iterator()>0) $data.=',';
					$data.='{';
					$aV=$obj->data->value();
					if (!is_array($aV)) $aV=array($aV);
					while ($obj->fields->next()){
						if ($obj->fields->iterator()>0) $data.=',';
						$sV='null';
						if ($obj->fields->iterator()<count($obj->data->value())) $sV=$aV[$obj->fields->iterator()];
						if ($sV=='null'||!is_string($sV))
							$data.='"'.$obj->fields->value().'":'.$sV;
						else
							$data.='"'.$obj->fields->value().'":"'.$sV.'"';
					}
					$data.='}';
				}
				$data.=']';
				$this->writeLn('store:{');
				$this->writeLn('fields:'.$fields.',');
				$this->writeLn('data:'.$data);
				$this->writeLn('},');
			}
			else{
				if (is_null($obj->eventName)) throw new Exception('ERROR: Missing eventName');
				//
				$this->writeLn('store:{');
				if (!is_null($obj->groupField))
					$this->writeLn('groupField:"'.$obj->groupField.'",');
				$this->writeLn('remoteFilter:true,');
				$this->writeLn('autoLoad:'.$this->boolean[$obj->autoLoad].',');	
				$this->writeLn('fields:'.$fields.',');
				$this->writeLn('proxy: {');	
				$this->writeLn('extraParams:{event:"'.$obj->eventName.'",data:"GRID"},');
				$this->writeLn('type: "ajax",');
				$this->writeLn('url: "",');
				$this->writeLn('reader: {');
				$this->writeLn('root: "'.$obj->root.'",');
				$this->writeLn('totalProperty: "'.$obj->totalProperty.'"');
				$this->writeLn('}');
				$this->writeLn('}');
				$this->writeLn('},');
			}
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if ($obj->bbar->count()){
				$this->writeLn('bbar:[');
				$this->mkItems($obj->bbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->buttonAlign))
				$this->writeLn('buttonAlign:"'.$obj->buttonAlign.'",');
			if ($obj->buttons->count()){
				$this->writeLn('buttons:[');
				$this->mkItems($obj->buttons);
				$this->writeLn('],');
			}
			if (!is_null($obj->closable))
				$this->writeLn('closable:'.$this->boolean[$obj->closable].',');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->collapsed))
				$this->writeLn('collapsed:'.$this->boolean[$obj->collapsed].',');
			if (!is_null($obj->collapsible))
				$this->writeLn('collapsible:'.$this->boolean[$obj->collapsible].',');
			if (!is_null($obj->columnLines))
				$this->writeLn('columnLines:'.$this->boolean[$obj->columnLines].',');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->enableColumnHide))
				$this->writeLn('enableColumnHide:'.$this->boolean[$obj->enableColumnHide].',');
			if (!is_null($obj->enableColumnMove))
				$this->writeLn('enableColumnMove:'.$this->boolean[$obj->enableColumnMove].',');
			if (!is_null($obj->enableColumnResize))
				$this->writeLn('enableColumnResize:'.$this->boolean[$obj->enableColumnResize].',');
			if ($obj->fbar->count()){
				$this->writeLn('fbar:[');
				$this->mkItems($obj->fbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->features)){
				if (is_array($obj->features))
					$_features=$obj->features;
				else{
					$_features=array();
					array_push($_features,$obj->features);
				}
				//
				$this->writeLn('features:[');
				for ($i=0;$i<count($_features);$i++){
					if ($i) $this->writeLn(',');
					$this->writeLn('{');
					if (!is_null($_features[$i]->ftype))
						$this->writeLn('ftype:"'.$_features[$i]->ftype.'",');
					else
						$this->writeLn('ftype:"grouping",');
					if (!is_null($_features[$i]->depthToIndent))
						$this->writeLn('depthToIndent:'.$_features[$i]->depthToIndent.',');
					if (!is_null($_features[$i]->enableGroupingMenu))
						$this->writeLn('enableGroupingMenu:'.$this->boolean[$_features[$i]->enableGroupingMenu].',');
					if (!is_null($_features[$i]->enableNoGroups))
						$this->writeLn('enableNoGroups:'.$this->boolean[$_features[$i]->enableNoGroups].',');
					if (!is_null($_features[$i]->groupByText))
						$this->writeLn('depthToIndent:"'.$_features[$i]->groupByText.'",');
					if (!is_null($_features[$i]->groupHeaderTpl))
						if (stristr($_features[$i]->groupHeaderTpl,'"'))
							$this->writeLn('groupHeaderTpl:\''.$_features[$i]->groupHeaderTpl.'\',');
						else
							$this->writeLn('groupHeaderTpl:"'.$_features[$i]->groupHeaderTpl.'",');
					if (!is_null($_features[$i]->hideGroupedHeader))
						$this->writeLn('hideGroupedHeader:'.$this->boolean[$_features[$i]->hideGroupedHeader].',');
					if (!is_null($_features[$i]->showGroupsText))
						$this->writeLn('showGroupsText:"'.$_features[$i]->showGroupsText.'",');
					if (!is_null($_features[$i]->startCollapsed))
						$this->writeLn('startCollapsed:'.$this->boolean[$_features[$i]->startCollapsed]);
					else
						$this->writeLn('startCollapsed:false');
					$this->writeLn('}');
				}
				$this->writeLn('],');
			}
			if (!is_null($obj->forceFit))
				$this->writeLn('forceFit:'.$this->boolean[$obj->forceFit].',');
			if (!is_null($obj->frame))
				$this->writeLn('frame:'.$this->boolean[$obj->frame].',');
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if ($obj->lbar->count()){
				$this->writeLn('lbar:[');
				$this->mkItems($obj->lbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->maxHeight))
				$this->writeLn('maxHeight:'.$obj->maxHeight.',');
			if (!is_null($obj->maxWidth))
				$this->writeLn('maxWidth:'.$obj->maxWidth.',');
			if (!is_null($obj->minHeight))
				$this->writeLn('minHeight:'.$obj->minHeight.',');
			if (!is_null($obj->minWidth))
				$this->writeLn('minWidth:'.$obj->minWidth.',');
			if (!is_null($obj->multiSelect))
				$this->writeLn('multiSelect:'.$this->boolean[$obj->multiSelect].',');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if ($obj->rbar->count()){
				$this->writeLn('rbar:[');
				$this->mkItems($obj->rbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->scroll))
				$this->writeLn('scroll:"'.$obj->scroll.'",');
			if (!is_null($obj->sortableColumns))
				$this->writeLn('sortableColumns:'.$this->boolean[$obj->sortableColumns].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if ($obj->tbar->count()){
				$this->writeLn('tbar:[');
				$this->mkItems($obj->tbar);
				$this->writeLn('],');
			}
			if ($obj->tools->count()){
				$this->writeLn('tools:[');
				$this->mkItems($obj->tools);
				$this->writeLn('],');
			}
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->title))
				$this->writeLn('title:"'.$obj->title.'",');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			if (!is_null($obj->viewConfig)){
				if (stristr($obj->viewConfig,"{"))
					$this->writeLn('viewConfig:'.$obj->viewConfig.',');
				else
					$this->writeLn('viewConfig:{'.$obj->viewConfig.'},');
			}
			//
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}
		
		private function mkDataView($obj){
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->blockRefresh))
				$this->writeLn('blockRefresh:'.$this->boolean[$obj->blockRefresh].',');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disableSelection))
				$this->writeLn('disableSelection:'.$this->boolean[$obj->disableSelection].',');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->emptyText))
				$this->writeLn('emptyText:"'.$obj->emptyText.'",');
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->itemSelector))
				$this->writeLn('itemSelector:"'.$obj->itemSelector.'",');
			if (!is_null($obj->loadingText))
				$this->writeLn('loadingText:"'.$obj->loadingText.'",');
			if (!is_null($obj->margin))
				$this->writeLn('margin:"'.$obj->margin.'",');
			if (!is_null($obj->multiSelect))
				$this->writeLn('multiSelect:'.$this->boolean[$obj->multiSelect].',');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}

			//Last property
			$fields='[';
			while ($obj->fields->next()){
				if ($obj->fields->iterator()>0) $fields.=',';
				$fields.='"'.$obj->fields->value().'"';
			}
			$fields.=']';
			if ($obj->queryMode==TQueryModeType::$local){
				$data='[';
				while ($obj->data->next()){
					if ($obj->data->iterator()>0) $data.=',';
					$data.='{';
					$aV=$obj->data->value();
					if (!is_array($aV)) $aV=array($aV);
					while ($obj->fields->next()){
						if ($obj->fields->iterator()>0) $data.=',';
						$sV='null';
						if ($obj->fields->iterator()<count($obj->data->value())) $sV=$aV[$obj->fields->iterator()];
						if ($sV=='null'||!is_string($sV))
							$data.='"'.$obj->fields->value().'":'.$sV;
						else
							$data.='"'.$obj->fields->value().'":"'.$sV.'"';
					}
					$data.='}';
				}
				$data.=']';
				$this->writeLn('store:{');
				$this->writeLn('fields:'.$fields.',');
				$this->writeLn('data:'.$data);
				$this->writeLn('}');
			}
			else{			
				if (is_null($obj->eventName)) throw new Exception('ERROR: Missing eventName');
				//
				$this->writeLn('store:{');
				$this->writeLn('autoLoad:'.$this->boolean[$obj->autoLoad].',');	
				$this->writeLn('fields:'.$fields.',');
				$this->writeLn('proxy: {');	
				$this->writeLn('extraParams:{event:"'.$obj->eventName.'",data:""},');
				$this->writeLn('type: "ajax",');
				$this->writeLn('url: "",');
				$this->writeLn('reader: {');
				$this->writeLn('root: "'.$obj->root.'",');
				$this->writeLn('totalProperty: "'.$obj->totalProperty.'"');
				$this->writeLn('}');
				$this->writeLn('}');
				$this->writeLn('}');
			}
		}
		
		private function chartLabel($label){
			$this->writeLn('label:{');
			if (!is_null($label->color))
				$this->writeLn('color:"'.$label->color.'",');
			if (!is_null($label->contrast))
				$this->writeLn('contrast:'.$this->boolean[$label->contrast].',');
			if (!is_null($label->display))
				$this->writeLn('display:"'.$label->display.'",');
			if (!is_null($label->field))
				$this->writeLn('field:"'.$label->field.'",');
			if (!is_null($label->font))
				$this->writeLn('font:"'.$label->font.'",');
			if (!is_null($label->orientation))
				$this->writeLn('orientation:"'.$label->orientation.'",');
			if (!is_null($label->renderer))
				$this->writeLn('renderer:'.$label->renderer.',');
			if (!is_null($label->rotate)){
				if (stristr($label->rotate,"{"))
					$this->writeLn('rotate:'.$label->rotate.',');
				else
					$this->writeLn('rotate:{'.$label->rotate.'},');
			}
			if (!is_null($label->textAnchor))
				$this->writeLn('"text-anchor":"'.$label->textAnchor.'",');
			if (is_null($label->minMargin))
				$this->writeLn('minMargin:50');
			else
				$this->writeLn('minMargin:'.$label->minMargin);
			$this->writeLn('},');
		}
		
		private function mkChart($obj){
			if (!is_null($obj->animate)){
				if (stristr($obj->animate,"{"))
					$this->writeLn('animate:'.$obj->animate.',');
				else
					$this->writeLn('animate:'.$this->boolean[$obj->animate].',');
			}
			if (!is_null($obj->autoScroll))
				$this->writeLn('autoScroll:'.$this->boolean[$obj->autoScroll].',');
			if (!is_null($obj->autoShow))
				$this->writeLn('autoShow:'.$this->boolean[$obj->autoShow].',');
			if (!is_null($obj->autoSize))
				$this->writeLn('autoSize:'.$this->boolean[$obj->autoSize].',');
			if (!is_null($obj->axes)&&is_array($obj->axes)){
				$this->writeLn('axes:[');
				for($i=0;$i<count($obj->axes);$i++){
					if ($i) $this->writeLn(',');
					$this->writeLn('{');
					if (!is_null($obj->axes[$i]->adjustMinimumByMajorUnit))
						$this->writeLn('adjustMinimumByMajorUnit:'.$obj->axes[$i]->adjustMinimumByMajorUnit.',');
					if (!is_null($obj->axes[$i]->dashSize))
						$this->writeLn('dashSize:'.$obj->axes[$i]->dashSize.',');
					if (!is_null($obj->axes[$i]->grid)){
						if (stristr($obj->axes[$i]->grid,"{"))
							$this->writeLn('grid:'.$obj->axes[$i]->grid.',');
						else
							$this->writeLn('grid:'.$this->boolean[$obj->axes[$i]->grid].',');
					}
					if (!is_null($obj->axes[$i]->length))
						$this->writeLn('length:'.$obj->axes[$i]->length.',');
					if (!is_null($obj->axes[$i]->majorTickSteps))
						$this->writeLn('majorTickSteps:'.$obj->axes[$i]->majorTickSteps.',');
					if (!is_null($obj->axes[$i]->minorTickSteps))
						$this->writeLn('minorTickSteps:'.$obj->axes[$i]->minorTickSteps.',');
					if (!is_null($obj->axes[$i]->position))
						$this->writeLn('position:"'.$obj->axes[$i]->position.'",');
					if (!is_null($obj->axes[$i]->roundToDecimal))
							$this->writeLn('roundToDecimal:'.$this->boolean[$obj->axes[$i]->roundToDecimal].',');
					if (!is_null($obj->axes[$i]->fields)&&is_array($obj->axes[$i]->fields)){
						$this->writeLn('fields:[');
						for($j=0;$j<count($obj->axes[$i]->fields);$j++){
							if ($j) $this->writeLn(',');
							$this->writeLn('"'.$obj->axes[$i]->fields[$j].'"');
						}
						$this->writeLn('],');
					}
					if (!is_null($obj->axes[$i]->label)&&get_class($obj->axes[$i]->label)=='TChartLabel'){
						$this->chartLabel($obj->axes[$i]->label);
					}
					if (!is_null($obj->axes[$i]->margin))
						$this->writeLn('margin:'.$obj->axes[$i]->margin.',');
					if (!is_null($obj->axes[$i]->maximum))
						$this->writeLn('maximum:'.$obj->axes[$i]->maximum.',');
					if (!is_null($obj->axes[$i]->minimum))
						$this->writeLn('minimum:'.$obj->axes[$i]->minimum.',');
					if (!is_null($obj->axes[$i]->steps))
						$this->writeLn('steps:'.$obj->axes[$i]->steps.',');
					if (!is_null($obj->axes[$i]->title))
						$this->writeLn('title:"'.$obj->axes[$i]->title.'",');
					if (is_null($obj->axes[$i]->type))
						$this->writeLn('type:""');
					else
						$this->writeLn('type:"'.$obj->axes[$i]->type.'"');
					$this->writeLn('}');
				}
				$this->writeLn('],');	//End axes
			}
			if (!is_null($obj->background)){
				if (stristr($obj->background,"{"))
					$this->writeLn('background:'.$obj->background.',');
				else
					$this->writeLn('background:'.$this->boolean[$obj->background].',');
			}
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->flex))
				$this->writeLn('flex:'.$obj->flex.',');
			if (!is_null($obj->floating))
				$this->writeLn('floating:'.$this->boolean[$obj->floating].',');
			if (!is_null($obj->focusOnToFront))
				$this->writeLn('focusOnToFront:'.$this->boolean[$obj->focusOnToFront].',');
			if (!is_null($obj->frame))
				$this->writeLn('frame:'.$this->boolean[$obj->frame].',');
			if (!is_null($obj->gradients&&is_array($obj->gradients))){
				$this->writeLn('gradients:[');
				for ($i=0;$i<count($obj->gradients);$i++){
					if ($i) $this->writeLn(',');
					$this->writeLn($obj->gradients[$i]);
				}
				$this->writeLn('],');
			}
			if (!is_null($obj->html)){
				if (stristr($obj->html,"{"))
					$this->writeLn('html:'.$obj->html.',');
				else
					$this->writeLn('html:"'.$obj->html.'",');
			}
			if (!is_null($obj->insetPadding))
				$this->writeLn('insetPadding:'.$obj->insetPadding.',');
			if (!is_null($obj->legend)&&get_class($obj->legend)=='TChartLegend'){
				$this->writeLn('legend:{');
				if (!is_null($obj->legend->boxFill))
					$this->writeLn('boxFill:"'.$obj->legend->boxFill.'",');
				if (!is_null($obj->legend->boxStroke))
					$this->writeLn('boxStroke:"'.$obj->legend->boxStroke.'",');
				if (!is_null($obj->legend->boxStrokeWidth))
					$this->writeLn('boxStrokeWidth:"'.$obj->legend->boxStrokeWidth.'",');
				if (!is_null($obj->legend->boxZIndex))
					$this->writeLn('boxZIndex:'.$obj->legend->boxZIndex.',');
				if (!is_null($obj->legend->itemSpacing))
					$this->writeLn('itemSpacing:'.$obj->legend->itemSpacing.',');
				if (!is_null($obj->legend->labelFont))
					$this->writeLn('labelFont:"'.$obj->legend->labelFont.'",');
				if (!is_null($obj->legend->padding))
					$this->writeLn('padding:"'.$obj->legend->padding.'",');
				if (!is_null($obj->legend->position))
					$this->writeLn('position:"'.$obj->legend->position.'",');
				if (!is_null($obj->legend->visible))
					$this->writeLn('visible:"'.$this->boolean[$obj->legend->visible].'",');
				if (is_null($obj->legend->x))
					$this->writeLn('x:0,');
				else
					$this->writeLn('x:'.$obj->legend->x.',');
				if (is_null($obj->legend->y))
					$this->writeLn('y:0');
				else
					$this->writeLn('y:'.$obj->legend->y);
				$this->writeLn('},');
			}
			if (!is_null($obj->maintainFlex))
				$this->writeLn('maintainFlex:'.$this->boolean[$obj->maintainFlex].',');
			if (!is_null($obj->margin))
					$this->writeLn('margin:"'.$obj->margin.'",');
			if (!is_null($obj->padding))
					$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->resizable)){
				if (stristr($obj->resizable,"{"))
					$this->writeLn('resizable:'.$obj->resizable.',');
				else
					$this->writeLn('resizable:'.$this->boolean[$obj->resizable].',');
			}
			$this->writeLn('series:[');
			if (!is_null($obj->series)&&is_array($obj->series)){
				for($i=0;$i<count($obj->series);$i++){
					if ($i) $this->writeLn(',');
					$this->writeLn('{');
					if (!is_null($obj->series[$i]->angleField))
						$this->writeLn('angleField:"'.$obj->series[$i]->angleField.'",');
					if (!is_null($obj->series[$i]->axis))
						$this->writeLn('axis:"'.$obj->series[$i]->axis.'",');
					if (!is_null($obj->series[$i]->colorSet)&&is_array($obj->series[$i]->colorSet)){
						$this->writeLn('colorSet:[');
						for ($j=0;$j<count($obj->series[$i]->colorSet);$j++){
							if ($j) $this->writeLn(',');
							$this->writeLn('"'.$obj->series[$i]->colorSet[$j].'"');
						}
						$this->writeLn('],');
					}
					if (!is_null($obj->series[$i]->column))
						$this->writeLn('column:'.$this->boolean[$obj->series[$i]->column].',');
					if (!is_null($obj->series[$i]->donut)){
						if (is_bool($obj->series[$i]->donut))
							$this->writeLn('donut:'.$this->boolean[$obj->series[$i]->donut].',');
						else
							$this->writeLn('donut:'.$obj->series[$i]->donut.',');
					}
					if (!is_null($obj->series[$i]->field))
						$this->writeLn('field:"'.$obj->series[$i]->field.'",');
					if (!is_null($obj->series[$i]->fill))
						$this->writeLn('fill:'.$this->boolean[$obj->series[$i]->fill].',');
					if (!is_null($obj->series[$i]->fillOpacity))
						$this->writeLn('fillOpacity:'.$obj->series[$i]->fillOpacity.',');
					if (!is_null($obj->series[$i]->groupGutter))
						$this->writeLn('groupGutter:'.$obj->series[$i]->groupGutter.',');
					if (!is_null($obj->series[$i]->gutter))
						$this->writeLn('gutter:'.$obj->series[$i]->gutter.',');
					if (!is_null($obj->series[$i]->highlight)){
						if (stristr($obj->series[$i]->highlight,"{"))
							$this->writeLn('highlight:'.$obj->series[$i]->highlight.',');
						else
							$this->writeLn('highlight:'.$this->boolean[$obj->series[$i]->highlight].',');
					}
					if (!is_null($obj->series[$i]->highlightDuration))
						$this->writeLn('highlightDuration:'.$obj->series[$i]->highlightDuration.',');
					if (!is_null($obj->series[$i]->label)&&get_class($obj->series[$i]->label)=='TChartLabel'){
						$this->chartLabel($obj->series[$i]->label);
					}
					if (!is_null($obj->series[$i]->lengthField))
						$this->writeLn('lengthField:"'.$obj->series[$i]->lengthField.'",');
					if (!is_null($obj->series[$i]->markerConfig)){
						if (stristr($obj->series[$i]->markerConfig,"{"))
							$this->writeLn('markerConfig:'.$obj->series[$i]->markerConfig.',');
						else
							$this->writeLn('markerConfig:{'.$obj->series[$i]->markerConfig.'},');
					}
					if (!is_null($obj->series[$i]->renderer))
						$this->writeLn('renderer:function(sprite,record,attributes,index,store){'.$obj->series[$i]->renderer.'},');
					if (!is_null($obj->series[$i]->selectionTolerance))
						$this->writeLn('selectionTolerance:'.$obj->series[$i]->selectionTolerance.',');
					if (!is_null($obj->series[$i]->showInLegend))
						$this->writeLn('showInLegend:'.$this->boolean[$obj->series[$i]->showInLegend].',');
					if (!is_null($obj->series[$i]->showMarkers))
						$this->writeLn('showMarkers:'.$this->boolean[$obj->series[$i]->showMarkers].',');
					if (!is_null($obj->series[$i]->smooth)){
						if (is_bool($obj->series[$i]->smooth))
							$this->writeLn('smooth:'.$this->boolean[$obj->series[$i]->smooth].',');
						else
							$this->writeLn('smooth:'.$obj->series[$i]->smooth.',');
					}
					if (!is_null($obj->series[$i]->stacked))
						$this->writeLn('stacked:'.$this->boolean[$obj->series[$i]->stacked].',');
					if (!is_null($obj->series[$i]->style)){
						if (stristr($obj->series[$i]->style,"{"))
							$this->writeLn('style:'.$obj->series[$i]->style.',');
						else
							$this->writeLn('style:{'.$obj->series[$i]->style.'},');
					}
					if (!is_null($obj->series[$i]->tips)&&get_class($obj->series[$i]->tips)=='TChartTips'){
						$this->writeLn('tips:{');
						if (!is_null($obj->series[$i]->tips->trackMouse))
							$this->writeLn('trackMouse:'.$this->boolean[$obj->series[$i]->tips->trackMouse].',');
						if (!is_null($obj->series[$i]->tips->width))
							$this->writeLn('width:'.$obj->series[$i]->tips->width.',');
						if (!is_null($obj->series[$i]->tips->height))
							$this->writeLn('height:'.$obj->series[$i]->tips->height.',');
						$this->writeLn('renderer:function(storeItem, item){');
						if (!is_null($obj->series[$i]->tips->renderer)){
							$this->writeLn($obj->series[$i]->tips->renderer);
						}
						$this->writeLn('}');
						$this->writeLn('},');
					}
					if (!is_null($obj->series[$i]->title))
						$this->writeLn('title:"'.$obj->series[$i]->title.'",');
					if (!is_null($obj->series[$i]->type))
						$this->writeLn('type:"'.$obj->series[$i]->type.'",');
					if (!is_null($obj->series[$i]->xField))
						$this->writeLn('xField:"'.$obj->series[$i]->xField.'",');
					if (!is_null($obj->series[$i]->xPadding))
						$this->writeLn('xPadding:"'.$obj->series[$i]->xPadding.'",');
					if (!is_null($obj->series[$i]->yField))
						$this->writeLn('yField:"'.$obj->series[$i]->yField.'",');
					if (!is_null($obj->series[$i]->yPadding))
						$this->writeLn('yPadding:"'.$obj->series[$i]->yPadding.'",');
					if (is_null($obj->series[$i]->minMargin))
						$this->writeLn('minMargin:50');
					else
						$this->writeLn('minMargin:'.$obj->series[$i]->minMargin);
				
					$this->writeLn('}');
				}
			}
			$this->writeLn('],');	//end series
			//
			$fields='[';
			while ($obj->fields->next()){
				if ($obj->fields->iterator()>0) $fields.=',';
				$fields.='"'.$obj->fields->value().'"';
			}
			$fields.=']';
			if ($obj->queryMode==TQueryModeType::$local){
				$data='[';
				while ($obj->data->next()){
					if ($obj->data->iterator()>0) $data.=',';
					$data.='{';
					$aV=$obj->data->value();
					if (!is_array($aV)) $aV=array($aV);
					while ($obj->fields->next()){
						if ($obj->fields->iterator()>0) $data.=',';
						$sV='null';
						if ($obj->fields->iterator()<count($obj->data->value())) $sV=$aV[$obj->fields->iterator()];
						if ($sV=='null'||!is_string($sV))
							$data.='"'.$obj->fields->value().'":'.$sV;
						else
							$data.='"'.$obj->fields->value().'":"'.$sV.'"';
					}
					$data.='}';
				}
				$data.=']';
				$this->writeLn('store:{');
				$this->writeLn('fields:'.$fields.',');
				$this->writeLn('data:'.$data);
				$this->writeLn('},');
			}
			else{
				if (is_null($obj->eventName)) throw new Exception('ERROR: Missing eventName');
				//
				$this->writeLn('store:{');
				$this->writeLn('remoteFilter:true,');
				$this->writeLn('autoLoad:'.$this->boolean[$obj->autoLoad].',');	
				$this->writeLn('fields:'.$fields.',');
				$this->writeLn('proxy: {');	
				$this->writeLn('extraParams:{event:"'.$obj->eventName.'",data:"CHART"},');
				$this->writeLn('type: "ajax",');
				$this->writeLn('url: "",');
				$this->writeLn('reader: {');
				$this->writeLn('root: "'.$obj->root.'",');
				$this->writeLn('totalProperty: "'.$obj->totalProperty.'"');
				$this->writeLn('}');
				$this->writeLn('}');
				$this->writeLn('},');
			}
			if (!is_null($obj->shadow)){
				if (!is_bool($obj->shadow))
					$this->writeLn('shadow:'.$this->boolean[$obj->shadow].',');
				else
					$this->writeLn('shadow:"'.$obj->shadow.'",');
			}
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if (!is_null($obj->theme))
				$this->writeLn('theme:"'.$obj->theme.'",');
			if (!is_null($obj->toFrontOnShow))
				$this->writeLn('toFrontOnShow:'.$this->boolean[$obj->toFrontOnShow].',');
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (is_null($obj->toFrontOnShow))
				$this->writeLn('toFrontOnShow:true');
			else
				$this->writeLn('toFrontOnShow:'.$this->boolean[$obj->toFrontOnShow]);
		}
		
		private function getNode($node){
			$_node ='{';
			if (!is_null($node->text))
				$_node.='text:"'.$node->text.'",';
			if (!is_null($node->iconCls))
				$_node.='iconCls:"'.$node->iconCls.'",';
			if ($node->children->count()){
				if (!is_null($node->expanded))
					$_node.='expanded:'.$this->boolean[$node->expanded].',';
				else
					$_node.='expanded:false,';
				$_node.='children:[';
				while ($node->children->next()){
					if ($node->children->iterator()>0) $_node.=',';
					$_node.=$this->getNode($node->children->value());
				}
				$_node.=']';
			}
			else
				$_node.='leaf:true';
			$_node.='}';
			
			return ($_node);
		}
		
		private function mkTreePanel($obj){
			if (!is_null($obj->height)){
				if (stristr($obj->height,"%"))
					$this->writeLn('height:"'.$obj->height.'",');
				else
					$this->writeLn('height:'.$obj->height.',');
			}
			$_columns ='[';
			$_columns.=$this->columnGrid($obj->fields,$obj,!$obj->fields->count());
			$_columns.=']';
			if ($_columns!='[]'&&$obj->queryMode==TQueryModeType::$remote){
				$this->writeLn('columns:'.$_columns.',');
			}
			//
			if (!is_null($obj->rootNode)&&get_class($obj->rootNode)=='TTreeNode'){
				$_root=$this->getNode($obj->rootNode);
			}
			else
				$_root='{}';
			//
			$fields='[';
			while ($obj->fields->next()){
				if ($obj->fields->iterator()>0) $fields.=',';
				$fields.='"'.$obj->fields->value().'"';
			}
			$fields.=']';
			if ($obj->queryMode==TQueryModeType::$local){
				$data='[';
				while ($obj->data->next()){
					if ($obj->data->iterator()>0) $data.=',';
					$data.='{';
					$aV=$obj->data->value();
					if (!is_array($aV)) $aV=array($aV);
					while ($obj->fields->next()){
						if ($obj->fields->iterator()>0) $data.=',';
						$sV='null';
						if ($obj->fields->iterator()<count($obj->data->value())) $sV=$aV[$obj->fields->iterator()];
						if ($sV=='null'||!is_string($sV))
							$data.='"'.$obj->fields->value().'":'.$sV;
						else
							$data.='"'.$obj->fields->value().'":"'.$sV.'"';
					}
					$data.='}';
				}
				$data.=']';
				$this->writeLn('store:{');
/*				if ($fields!='[]'){
					$this->writeLn('fields:'.$fields.',');
					$this->writeLn('data:'.$data.',');
				}*/
				$this->writeLn('root:'.$_root);
				$this->writeLn('},');
			}
			else{
				if (is_null($obj->eventName)) throw new Exception('ERROR: Missing eventName');
				//
				$this->writeLn('store:{');
				$this->writeLn('remoteFilter:true,');
				$this->writeLn('autoLoad:'.$this->boolean[$obj->autoLoad].',');	
				$this->writeLn('fields:'.$fields.',');
				$this->writeLn('proxy: {');	
				$this->writeLn('extraParams:{event:"'.$obj->eventName.'",data:"TreeGRID"},');
				$this->writeLn('type: "ajax",');
				$this->writeLn('url: ""');
//				$this->writeLn(',reader: {');
//				$this->writeLn('root: "'.$obj->root.'",');
//				$this->writeLn('totalProperty: "'.$obj->totalProperty.'"');
//				$this->writeLn('}');
				$this->writeLn('}');
//				$this->writeLn('root:'.$_root);
				$this->writeLn('},');
			}
			if (!is_null($obj->activeItem)){
				if (is_string($obj->activeItem))
					$this->writeLn('activeItem:"'.$obj->activeItem.'",');
				else
					$this->writeLn('activeItem:'.$obj->activeItem.',');
			}
			if (!is_null($obj->animCollapse))
				$this->writeLn('animCollapse:'.$this->boolean[$obj->animCollapse].',');
			if (!is_null($obj->animate))
				$this->writeLn('animate:'.$this->boolean[$obj->animate].',');
			if (!is_null($obj->autoScroll))
				$this->writeLn('autoScroll:'.$this->boolean[$obj->autoScroll].',');
			if (!is_null($obj->autoShow))
				$this->writeLn('autoShow:'.$this->boolean[$obj->autoShow].',');
			if (!is_null($obj->baseCls))
				$this->writeLn('baseCls:"'.$obj->baseCls.'",');
			if ($obj->bbar->count()){
				$this->writeLn('bbar:[');
				$this->mkItems($obj->bbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->border))
				$this->writeLn('border:'.$obj->border.',');
			if (!is_null($obj->bodyBorder))
				$this->writeLn('bodyBorder:'.$this->boolean[$obj->bodyBorder].',');
			if (!is_null($obj->bodyCls))
				$this->writeLn('bodyCls:"'.$obj->bodyCls.'",');
			if (!is_null($obj->bodyPadding)){
				if (is_string($obj->bodyPadding))
					$this->writeLn('bodyPadding:"'.$obj->bodyPadding.'",');
				else
					$this->writeLn('bodyPadding:'.$obj->bodyPadding.',');
			}
			if (!is_null($obj->bodyStyle)){
				if (stristr($obj->bodyStyle,"{"))
					$this->writeLn('bodyStyle:'.$obj->bodyStyle.',');
				else
					$this->writeLn('bodyStyle:"'.$obj->bodyStyle.'",');
			}
			if (!is_null($obj->buttonAlign))
				$this->writeLn('buttonAlign:"'.$obj->buttonAlign.'",');
			if ($obj->buttons->count()){
				$this->writeLn('buttons:[');
				$this->mkItems($obj->buttons);
				$this->writeLn('],');
			}
			if (!is_null($obj->closable))
				$this->writeLn('closable:'.$this->boolean[$obj->closable].',');
			if (!is_null($obj->cls))
				$this->writeLn('cls:"'.$obj->cls.'",');
			if (!is_null($obj->collapsed))
				$this->writeLn('collapsed:'.$this->boolean[$obj->collapsed].',');
			if (!is_null($obj->collapseDirection))
				$this->writeLn('collapseDirection:'.$this->boolean[$obj->collapseDirection].',');
			if (!is_null($obj->collapseFirst))
				$this->writeLn('collapseFirst:'.$this->boolean[$obj->collapseFirst].',');
			if (!is_null($obj->collapsible))
				$this->writeLn('collapsible:'.$this->boolean[$obj->collapsible].',');
			if (!is_null($obj->collapseMode))
				$this->writeLn('collapseMode:"'.$obj->collapseMode.'",');
			if (!is_null($obj->defaults)){
				if (stristr($obj->defaults,"{"))
					$this->writeLn('defaults:'.$obj->defaults.',');
				else
					$this->writeLn('defaults:{'.$obj->defaults.'},');
			}
			if (!is_null($obj->deferRowRender))
				$this->writeLn('deferRowRender:'.$this->boolean[$obj->deferRowRender].',');
			if (!is_null($obj->disabled))
				$this->writeLn('disabled:'.$this->boolean[$obj->disabled].',');
			if (!is_null($obj->displayField))
				$this->writeLn('displayField:'.$this->boolean[$obj->displayField].',');
			if (!is_null($obj->enableColumnHide))
				$this->writeLn('enableColumnHide:'.$this->boolean[$obj->enableColumnHide].',');
			if (!is_null($obj->enableColumnMove))
				$this->writeLn('enableColumnMove:'.$this->boolean[$obj->enableColumnMove].',');
			if (!is_null($obj->enableColumnResize))
				$this->writeLn('enableColumnResize:'.$this->boolean[$obj->enableColumnResize].',');
			if (!is_null($obj->enableLocking))
				$this->writeLn('enableLocking:'.$this->boolean[$obj->enableLocking].',');
			if ($obj->fbar->count()){
				$this->writeLn('fbar:[');
				$this->mkItems($obj->fbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->floatable))
				$this->writeLn('floatable:'.$this->boolean[$obj->floatable].',');
			if (!is_null($obj->floating))
				$this->writeLn('floating:'.$this->boolean[$obj->floating].',');
			if (!is_null($obj->forceFit))
				$this->writeLn('forceFit:'.$this->boolean[$obj->forceFit].',');
			if (!is_null($obj->focusOnToFront))
				$this->writeLn('focusOnToFront:'.$this->boolean[$obj->focusOnToFront].',');
			if (!is_null($obj->folderSort))
				$this->writeLn('folderSort:'.$this->boolean[$obj->folderSort].',');
			if (!is_null($obj->frame))
				$this->writeLn('frame:'.$this->boolean[$obj->frame].',');
			if (!is_null($obj->frameHeader))
				$this->writeLn('frameHeader:'.$this->boolean[$obj->frameHeader].',');
			if (!is_null($obj->headerPosition))
				$this->writeLn('headerPosition:"'.$obj->headerPosition.'",');
			if (!is_null($obj->hidden))
				$this->writeLn('hidden:'.$this->boolean[$obj->hidden].',');
			if (!is_null($obj->hideCollapseTool))
				$this->writeLn('hideCollapseTool:'.$this->boolean[$obj->hideCollapseTool].',');
			if (!is_null($obj->hideHeaders))
				$this->writeLn('hideHeaders:'.$this->boolean[$obj->hideHeaders].',');
			if (!is_null($obj->hideMode))
				$this->writeLn('hideMode:"'.$obj->hideMode.'",');
			if (!is_null($obj->html))
				$this->writeLn('html:"'.$obj->html.'",');
			if (!is_null($obj->iconCls))
				$this->writeLn('iconCls:"'.$obj->iconCls.'",');
			if (!is_null($obj->itemId))
				$this->writeLn('itemId:"'.$obj->itemId.'",');
			if (!is_null($obj->layout)){
				if (stristr($obj->layout,"{"))
					$this->writeLn('layout:'.$obj->layout.',');
				else
					$this->writeLn('layout:"'.$obj->layout.'",');
			}
			if (!is_null($obj->lines))
				$this->writeLn('lines:'.$this->boolean[$obj->lines].',');
			if ($obj->lbar->count()){
				$this->writeLn('lbar:[');
				$this->mkItems($obj->lbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->maintainFlex))
				$this->writeLn('maintainFlex:'.$this->boolean[$obj->maintainFlex].',');
			if (!is_null($obj->maxHeight))
				$this->writeLn('maxHeight:'.$obj->maxHeight.',');
			if (!is_null($obj->maxWidth))
				$this->writeLn('maxWidth:'.$obj->maxWidth.',');
			if (!is_null($obj->minButtonWidth))
				$this->writeLn('minButtonWidth:'.$obj->minButtonWidth.',');
			if (!is_null($obj->minHeight))
				$this->writeLn('minHeight:'.$obj->minHeight.',');
			if (!is_null($obj->minWidth))
				$this->writeLn('minWidth:'.$obj->minWidth.',');
			if (!is_null($obj->multiSelect))
				$this->writeLn('multiSelect:'.$this->boolean[$obj->multiSelect].',');
			if (!is_null($obj->overCls))
				$this->writeLn('overCls:"'.$obj->overCls.'",');
			if (!is_null($obj->overlapHeader))
				$this->writeLn('overlapHeader:'.$this->boolean[$obj->overlapHeader].',');
			if (!is_null($obj->padding))
				$this->writeLn('padding:"'.$obj->padding.'",');
			if (!is_null($obj->preventHeader))
				$this->writeLn('preventHeader:'.$this->boolean[$obj->preventHeader].',');
			if (!is_null($obj->resizable))
				$this->writeLn('resizable:'.$this->boolean[$obj->resizable].',');
			if ($obj->rbar->count()){
				$this->writeLn('rbar:[');
				$this->mkItems($obj->rbar);
				$this->writeLn('],');
			}
			if (!is_null($obj->rootVisible))
				$this->writeLn('rootVisible:'.$this->boolean[$obj->rootVisible].',');
			if (!is_null($obj->saveDelay))
				$this->writeLn('saveDelay:'.$obj->saveDelay.',');
			if (!is_null($obj->scroll))
				$this->writeLn('scroll:"'.$obj->scroll.'",');
			if (!is_null($obj->scrollDelta))
				$this->writeLn('scrollDelta:'.$obj->scrollDelta.',');
			if (!is_null($obj->shadow)){
				if (is_bool($obj->shadow))
					$this->writeLn('shadow:'.$this->boolean[$obj->shadow].',');
				else
					$this->writeLn('shadow:"'.$obj->shadow.'",');
			}
			if (!is_null($obj->simpleSelect))
				$this->writeLn('simpleSelect:'.$this->boolean[$obj->simpleSelect].',');
			if (!is_null($obj->singleExpand))
				$this->writeLn('singleExpand:'.$this->boolean[$obj->singleExpand].',');
			if (!is_null($obj->sortableColumns))
				$this->writeLn('sortableColumns:'.$this->boolean[$obj->sortableColumns].',');
			if (!is_null($obj->style))
				$this->writeLn('style:"'.$obj->style.'",');
			if ($obj->tbar->count()){
				$this->writeLn('tbar:[');
				$this->mkItems($obj->tbar);
				$this->writeLn('],');
			}
			if ($obj->tools->count()){
				$this->writeLn('tools:[');
				$this->mkItems($obj->tools);
				$this->writeLn('],');
			}
			if (!is_null($obj->tpl)){
				if (is_array($obj->tpl)){
					$this->writeLn('tpl:[');
					for($i=0;$i<count($obj->tpl);$i++){
						if ($i) $this->writeLn(',');
						$this->writeLn("'".$obj->tpl[$i]."'");
					}
					$this->writeLn('],');
				}
				else
					$this->writeLn('tpl:"'.$obj->tpl.'",');
			}
			if (!is_null($obj->title))
				$this->writeLn('title:"'.$obj->title.'",');
			if (!is_null($obj->titleCollapse))
				$this->writeLn('titleCollapse:'.$this->boolean[$obj->titleCollapse].',');
			if (!is_null($obj->toFrontOnShow))
				$this->writeLn('toFrontOnShow:'.$this->boolean[$obj->toFrontOnShow].',');
			if (!is_null($obj->width)){
				if (stristr($obj->width,"%"))
					$this->writeLn('width:"'.$obj->width.'",');
				else
					$this->writeLn('width:'.$obj->width.',');
			}
			if (!is_null($obj->useArrows))
				$this->writeLn('useArrows:'.$this->boolean[$obj->useArrows].',');
			//
			if (is_null($obj->margin))
				$this->writeLn('margin:""');
			else
				$this->writeLn('margin:"'.$obj->margin.'"');
		}
		
		private function mkItems($items){
			while ($items->next()){
				if ($items->iterator()>0) $this->writeLn(',');
				$this->writeLn('{');
				$this->writeLn('id:"'.$items->name().'",');
				if ($items->value()->xtype!='tab'&&$items->value()->getOwner()->xtype!='cycle')
					$this->writeLn('xtype:"'.$items->value()->xtype.'",');
				if ($items->value()->xtype=='container')
					$this->mkContainer($items->value());
				elseif ($items->value()->xtype=='panel'||$items->value()->xtype=='form')
					$this->mkPanel($items->value());
				elseif ($items->value()->xtype=='tab')
					$this->mkTab($items->value());
				elseif ($items->value()->xtype=='tabpanel')
					$this->mkTabPanel($items->value());
				elseif ($items->value()->xtype=='gridpanel')
					$this->mkGridPanel($items->value());
				elseif ($items->value()->xtype=='dataview')
					$this->mkDataView($items->value(),$items->name());
				elseif ($items->value()->xtype=='label')
					$this->mkLabel($items->value());
				elseif ($items->value()->xtype=='checkboxfield')
					$this->mkCheckboxField($items->value());
				elseif ($items->value()->xtype=='combobox')
					$this->mkCombobox($items->value());
				elseif ($items->value()->xtype=='datefield')
					$this->mkDateField($items->value());
				elseif ($items->value()->xtype=='displayfield')
					$this->mkDisplayField($items->value());
				elseif ($items->value()->xtype=='filefield')
					$this->mkFileField($items->value());
				elseif ($items->value()->xtype=='hiddenfield')
					$this->mkHiddenField($items->value());
				elseif ($items->value()->xtype=='htmleditor')
					$this->mkHtmlEditor($items->value());
				elseif ($items->value()->xtype=='numberfield')
					$this->mkNumberField($items->value());
				elseif ($items->value()->xtype=='radiofield')
					$this->mkRadioField($items->value());
				elseif ($items->value()->xtype=='textfield')
					$this->mkTextField($items->value());
				elseif ($items->value()->xtype=='textareafield')
					$this->mkTextAreaField($items->value());
				elseif ($items->value()->xtype=='timefield')
					$this->mkTimeField($items->value());
				elseif ($items->value()->xtype=='checkboxgroup'||$items->value()->xtype=='radiogroup')
					$this->mkCheckboxRadioGroup($items->value());
				elseif ($items->value()->xtype=='fieldcontainer')
					$this->mkFieldContainer($items->value());
				elseif ($items->value()->xtype=='fieldset')
					$this->mkFieldSet($items->value());
				elseif ($items->value()->xtype=='button'||$items->value()->xtype=='cycle'||$items->value()->xtype=='splitbutton')
					$this->mkCustomButton($items->value());
				elseif ($items->value()->xtype=='menuitem'||$items->value()->xtype=='menucheckitem'||$items->value()->xtype=='menuseparator')
					$this->mkCustomMenu($items->value());
				elseif ($items->value()->xtype=='tbfill'||$items->value()->xtype=='tbseparator'||$items->value()->xtype=='tbspacer'||$items->value()->xtype=='tbtext')
					$this->mkCustomToolbar($items->value());
				elseif ($items->value()->xtype=='chart')
					$this->mkChart($items->value());
				elseif ($items->value()->xtype=='treepanel')
					$this->mkTreePanel($items->value());
				//
				if ($items->value()->listeners->count()){
					$this->writeLn(',listeners:{');
					while ($items->value()->listeners->next()){
						if ($items->value()->listeners->iterator()>0) $this->writeLn(',');
						echo '"'.$items->value()->listeners->name().'":'.str_replace('%CODE%',$items->value()->listeners->value(),TComponentEvents::$name[$items->value()->listeners->name()]);
					}
					$this->writeLn('');
					$this->writeLn('}');
				}
				$this->writeLn('}');
			}
		}
		
		private function  mkWindow(){
			while ($this->windows->next()){
				$this->writeLn('var '.$this->windows->name().'=Ext.create("Ext.window.Window", {');
				$this->writeLn('id:'.'"'.$this->windows->name().'",');
				if ($this->windows->value()->listeners->count()){
					$this->writeLn('listeners:{');
					while ($this->windows->value()->listeners->next()){
						if ($this->windows->value()->listeners->iterator()>0) $this->writeLn(',');
						echo '"'.$this->windows->value()->listeners->name().'":'.str_replace('%CODE%',$this->windows->value()->listeners->value(),TWindowEvents::$name[$this->windows->value()->listeners->name()]);
					}
					$this->writeLn('');
					$this->writeLn('},');
				}

				if (!is_null($this->windows->value()->height))
					$this->writeLn('height:'.$this->windows->value()->height.',');
				if (!is_null($this->windows->value()->baseCls))
					$this->writeLn('baseCls:"'.$this->windows->value()->baseCls.'",');
				if ($this->windows->value()->bbar->count()){
					$this->writeLn('bbar:[');
					$this->mkItems($this->windows->value()->bbar);
					$this->writeLn('],');
				}
				if (!is_null($this->windows->value()->bodyBorder))
					$this->writeLn('bodyBorder:'.$this->windows->value()->bodyBorder.',');
				if (!is_null($this->windows->value()->bodyCls))
					$this->writeLn('bodyCls:"'.$this->windows->value()->bodyCls.'",');
				if (!is_null($this->windows->value()->bodyPadding))
					$this->writeLn('bodyPadding:"'.$this->windows->value()->bodyPadding.'",');
				if (!is_null($this->windows->value()->bodyStyle))
					$this->writeLn('bodyStyle:"'.$this->windows->value()->bodyStyle.'",');
				if (!is_null($this->windows->value()->border))
					$this->writeLn('border:'.$this->windows->value()->border.',');
				if ($this->windows->value()->buttons->count()){
					$this->writeLn('buttons:[');
					$this->mkItems($this->windows->value()->buttons);
					$this->writeLn('],');
				}
				if (!is_null($this->windows->value()->buttonAlign))
					$this->writeLn('buttonAlign:"'.$this->windows->value()->buttonAlign.'",');
				if (!is_null($this->windows->value()->closable))
					$this->writeLn('closable:'.$this->boolean[$this->windows->value()->closable].',');
				if (!is_null($this->windows->value()->closeAction))
					$this->writeLn('closeAction:"'.$this->windows->value()->closeAction.'",');
				if (!is_null($this->windows->value()->cls))
					$this->writeLn('cls:"'.$this->windows->value()->cls.'",');
				if (!is_null($this->windows->value()->collapsed))
					$this->writeLn('collapsed:'.$this->boolean[$this->windows->value()->collapsed].',');
				if (!is_null($this->windows->value()->collapsible))
					$this->writeLn('collapsible:'.$this->boolean[$this->windows->value()->collapsible].',');
				if (!is_null($this->windows->value()->defaults)){
					if (stristr($this->windows->value()->defaults,"{"))  //Only object
						$this->writeLn('defaults:'.$this->windows->value()->defaults.',');
				}
				if (!is_null($this->windows->value()->disabled))
					$this->writeLn('disabled:'.$this->boolean[$this->windows->value()->disabled].',');
				if ($this->windows->value()->fbar->count()){
					$this->writeLn('fbar:[');
					$this->mkItems($this->windows->value()->fbar);
					$this->writeLn('],');
				}
				if (!is_null($this->windows->value()->frameHeader))
					$this->writeLn('frameHeader:'.$this->boolean[$this->windows->value()->frameHeader].',');
				if (!is_null($this->windows->value()->frame))
					$this->writeLn('frame:'.$this->boolean[$this->windows->value()->frame].',');
				if (!is_null($this->windows->value()->headerPosition))
					$this->writeLn('headerPosition:"'.$this->windows->value()->headerPosition.'",');
				if (!is_null($this->windows->value()->hidden))
					$this->writeLn('hidden:'.$this->boolean[$this->windows->value()->hidden].',');
				if (!is_null($this->windows->value()->html))
					$this->writeLn('html:"'.$this->windows->value()->html.'",');
				if (!is_null($this->windows->value()->layout)){
					if (stristr($this->windows->value()->layout,"{"))
						$this->writeLn('layout:'.$this->windows->value()->layout.',');
					else
						$this->writeLn('layout:'.'"'.$this->windows->value()->layout.'",');
				}
				if ($this->windows->value()->lbar->count()){
					$this->writeLn('lbar:[');
					$this->mkItems($this->windows->value()->lbar);
					$this->writeLn('],');
				}
				if (!is_null($this->windows->value()->margin))
					$this->writeLn('margin:"'.$this->windows->value()->margin.'",');
				if (!is_null($this->windows->value()->maxHeight))
					$this->writeLn('maxHeight:'.$this->windows->value()->maxHeight.',');
				if (!is_null($this->windows->value()->maxWidth))
					$this->writeLn('maxWidth:'.$this->windows->value()->maxWidth.',');
				if (!is_null($this->windows->value()->maximizable))
					$this->writeLn('maximizable:'.$this->boolean[$this->windows->value()->maximizable].',');
				if (!is_null($this->windows->value()->maximized))
					$this->writeLn('maximized:'.$this->boolean[$this->windows->value()->maximized].',');
				if (!is_null($this->windows->value()->minHeight))
					$this->writeLn('minHeight:'.$this->windows->value()->minHeight.',');
				if (!is_null($this->windows->value()->minWidth))
					$this->writeLn('minWidth:'.$this->windows->value()->minWidth.',');
				if (!is_null($this->windows->value()->minimizable))
					$this->writeLn('minimizable:'.$this->boolean[$this->windows->value()->minimizable].',');
				if (!is_null($this->windows->value()->modal))
					$this->writeLn('modal:'.$this->boolean[$this->windows->value()->modal].',');
				if (!is_null($this->windows->value()->overCls))
					$this->writeLn('overCls:"'.$this->windows->value()->overCls.'",');
				if (!is_null($this->windows->value()->padding))
					$this->writeLn('padding:"'.$this->windows->value()->padding.'",');
				if (!is_null($this->windows->value()->plain))
					$this->writeLn('plain:'.$this->boolean[$this->windows->value()->plain].',');
				if ($this->windows->value()->rbar->count()){
					$this->writeLn('rbar:[');
					$this->mkItems($this->windows->value()->rbar);
					$this->writeLn('],');
				}
				if (!is_null($this->windows->value()->resizable))
					$this->writeLn('resizable:'.$this->boolean[$this->windows->value()->resizable].',');
				if (!is_null($this->windows->value()->style))
					$this->writeLn('style:"'.$this->windows->value()->style.'",');
				if ($this->windows->value()->tbar->count()){
					$this->writeLn('tbar:[');
					$this->mkItems($this->windows->value()->tbar);
					$this->writeLn('],');
				}
				$this->writeLn('title:'.'"'.$this->windows->value()->title.'",');
				if (!is_null($this->windows->value()->titleCollapse))
					$this->writeLn('titleCollapse:'.$this->boolean[$this->windows->value()->titleCollapse].',');
				if ($this->windows->value()->tools->count()){
					$this->writeLn('tools:[');
					$this->mkTools($this->windows->value()->tools);
					$this->writeLn('],');
				}
				if (!is_null($this->windows->value()->width)){
					if (stristr($this->windows->value()->width,"%"))
						$this->writeLn('width:"'.$this->windows->value()->width.'",');
					else
						$this->writeLn('width:'.$this->windows->value()->width.',');
				}
				if (!is_null($this->windows->value()->x))
					$this->writeLn('x:'.$this->windows->value()->x.',');
				if (!is_null($this->windows->value()->y))
					$this->writeLn('y:'.$this->windows->value()->y.',');
				$this->writeLn('items:[');
				$this->mkItems($this->windows->value()->items);
				$this->writeLn(']');
				$this->writeLn('});');
			}
		}
		
		private function mkViewport(){
			$this->writeLn('Ext.create("Ext.container.Viewport", {');
			$this->writeLn('renderTo: Ext.getBody(),');
			if ($this->listeners->count()){
				$this->writeLn('listeners:{');
				while ($this->listeners->next()){
					if ($this->listeners->iterator()>0) $this->writeLn(',');
					echo '"'.$this->listeners->name().'":'.str_replace('%CODE%',$this->listeners->value(),TViewportEvents::$name[$this->listeners->name()]);
				}
				$this->writeLn('');
				$this->writeLn('},');
			}
			if (!is_null($this->activeItem)) 
				$this->writeLn('activeItem:'.$this->activeItem.',');
			if (!is_null($this->baseCls)) 
				$this->writeLn('baseCls:"'.$this->baseCls.'",');
			if (!is_null($this->border)) 
				$this->writeLn('border:'.$this->border.',');
			if (!is_null($this->cls)) 
				$this->writeLn('cls:"'.$this->cls.'",');
			if (!is_null($this->defaults)){
				if (stristr($this->defaults,"{"))
					$this->writeLn('defaults:'.$this->defaults.',');
			}
			if (!is_null($this->frame)) 
				$this->writeLn('frame:'.$this->boolean[$this->frame].',');
			if (!is_null($this->html)) 
				$this->writeLn('html:"'.$this->html.'",');
			if (!is_null($this->layout)){
				if (stristr($this->layout,"{"))
					$this->writeLn('layout:'.$this->layout.',');
				else
					$this->writeLn('layout:"'.$this->layout.'",');
			}
			if (!is_null($this->margin)) 
				$this->writeLn('margin:"'.$this->margin.'",');
			if (!is_null($this->overCls)) 
				$this->writeLn('overCls:"'.$this->overCls.'",');
			if (!is_null($this->padding)) 
				$this->writeLn('padding:"'.$this->padding.'",');
			if (!is_null($this->style)) 
				$this->writeLn('style:"'.$this->style.'",');
			$this->writeLn('items:[');
			$this->mkItems($this->items);
			$this->writeLn(']');
			$this->writeLn('});');
		}
		
		private function execEvent($event){
				$found=false;
				while ($this->events->next()){
					if ($this->events->name()==$event){
						$found=true;
						$data='';
						if (isset($_REQUEST['data'])) $data=$_REQUEST['data'];
						$page='1';
						if (isset($_REQUEST['page'])) $page=$_REQUEST['page'];
						$start='0';
						if (isset($_REQUEST['start'])) $start=$_REQUEST['start'];
						$limit='0';
						if (isset($_REQUEST['limit'])) $limit=$_REQUEST['limit'];
						$sort='';
						if (isset($_REQUEST['sort'])) $sort=$_REQUEST['sort'];
						$filter='';
						if (isset($_REQUEST['filter'])) $filter=$_REQUEST['filter'];

						$this->events->value()->setSender($this);
						$this->events->value()->setData($data);
						$this->events->value()->setPage($page);
						$this->events->value()->setStart($start);
						$this->events->value()->setLimit($limit);
						$this->events->value()->setSort($sort);
						$this->events->value()->setFilter($filter);
						$this->events->value()->execute();
						break;
					}
				}
				if (!$found) echo 'ERROR: Event "'.$event.'" not found';
//			}
		}
		//
		//		
		public function onWindowBeforeUnload($value='',$msg='Quit'){
			$this->onWindowBeforeUnloadValue=$value;
			$this->onWindowBeforeUnloadMsg=$msg;
		}
		
		public function onWindowResize($value){
			$this->onWindowResizeValue=$value;
		}
		
		public function onDocumentReady($value){
			$this->onDocumentReadyValue=$value;
		}
		//
		public function __construct($param=array()){
			$this->language=TLanguage::$pt_BR;
			$this->headers=new TListHeader();
			//$this->listeners=new TListListener();
			$this->events=new TListEvent();
			$this->windows=new TListWindow();
			$this->items=new TListItems();
			$this->items->setOwner($this);
			//
			parent::__construct($param);	//Must be here
		}
		
		public function __destruct(){
			unset($this->headers);
			unset($this->events);
			unset($this->windows);
			unset($this->items);
			//
			parent::__destruct();
		}
		
		public function show(){
			if (isset($_REQUEST['event'])){
				$this->execEvent($_REQUEST['event']);
			}
			else{
				$this->writeLn('<html>');
				$this->mkHeader();
				$this->writeLn('<body>');
				$this->writeLn('<script type="text/javascript">');
				if (!is_null($this->onWindowResizeValue)){
					$this->writeLn('Ext.EventManager.onWindowResize(function(){');
					$this->writeLn($this->getString($this->onWindowResizeValue));
					$this->writeLn('},this);');
				}
				if (!is_null($this->onDocumentReadyValue)){
					$this->writeLn('Ext.EventManager.onDocumentReady(function(){');
					$this->writeLn($this->getString($this->onDocumentReadyValue));
					$this->writeLn('},this);');
				}
				if (is_null($this->package)||!count($this->package))
					$this->writeLn("Ext.require('Ext.*');");
				else{
					$this->writeLn("Ext.require([");
					for ($i=0;$i<count($this->package);$i++){
						if ($i) $this->writeLn(",");
						$this->writeLn("    'Ext.".$this->package[$i].".*'");
					}
					$this->writeLn("]);");
				}
				$this->writeLn('Ext.onReady(function(){');
				if (!is_null($this->onWindowBeforeUnloadValue)){
					$this->writeLn('window.onbeforeunload = function(){');
					$this->writeLn($this->getString($this->onWindowBeforeUnloadValue));
					$this->writeLn('return "'.$this->onWindowBeforeUnloadMsg.'";');
					$this->writeLn('}');
				}
				$this->writeLn('Ext.QuickTips.init();');
				$this->mkWindow();
				$this->mkViewport();
				$this->writeLn('});');
				$this->writeLn('</script>');
				$this->writeLn('</body>');
				$this->writeLn('</html>');
			}
		}
	}
?>