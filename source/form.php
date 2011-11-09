<?php
	class TForm extends TComponent{
		public $xtype='form';
		public $eventName=null;
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
		public $split=null;
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
	//
	//
	class TCustomComponent extends TComponent{
		public $activeError=null;
		public $anchor=null;
		public $baseCls=null;
		public $border=null;
		public $clearCls=null;
		public $cls=null;
		public $disabled=null;
		public $enableKeyEvents=null;
		public $fieldLabel=null;
		public $hidden=null;
		public $html=null;
		public $margin='0 0 0 0';
		public $name=null;
		public $padding=null;
		public $readOnly=null;
		public $style=null;
		public $tabIndex=null;
		public $tpl=null;
		public $value=null;
	}
	
	class TLabel extends TCustomComponent{
		public $xtype='label';
		public $text='';
	}
	
	class TCheckbox extends TCustomComponent{
		public $xtype='checkboxfield';
		public $boxLabel=null;
		public $boxLabelAlign=null;
		public $checked=null;
		public $handler=null;
		public $inputValue=null;
		public $labelAlign=null;
		public $labelPad=null;
		public $labelSeparator=null;
		public $labelWidth=null;
	}
	
	class TCombobox extends TCustomComponent{
		public $xtype='combobox';
		public $autoLoad=true;
		public $root='records';
		public $totalProperty='totalCount';
		public $allowBlank=null;
		public $autoSelect=null;
		public $blankText=null;
		public $displayField=null;
		public $editable=null;
		public $emptyText=null;
		public $eventName=null;
		public $forceSelection=null;
		public $invalidText=null;
		public $labelAlign=null;
		public $labelPad=null;
		public $labelSeparator=null;
		public $labelWidth=null;
		public $maskRe=null;
		public $maxLength=null;
		public $maxLengthText=null;
		public $minLength=null;
		public $minLengthText=null;
		public $multiSelect=null;
		public $queryMode='local';
		public $queryParam=null;
		//public $store=null;
		public $selectOnFocus=null;
		public $selectOnTab=null;
		public $triggerAction=null;
		public $typeAhead=null;
		public $validateOnBlur=null;
		public $validateOnChange=null;
		public $validator=null;
		public $valueField=null;
		public $valueNotFoundText=null;
		public $fields;
		public $data;
		
		public function __construct($param=array()){
			$this->fields=new TListString();
			$this->data=new TListString();
			//
			parent::__construct($param);
		}
		
		public function  __destruct(){
			unset($this->fields);
			unset($this->data);
			parent::__destruct();
		}
	}
	
	class TDate extends TCustomComponent{
		public $xtype='datefield';
		public $allowBlank=null;
		public $altFormats=null;
		public $blankText=null;
		public $disabledDates=null;
		public $disabledDatesText=null;
		public $disabledDays=null;
		public $disabledDaysText=null;
		public $editable=null;
		public $emptyText=null;
		public $format=null;
		public $invalidText=null;
		public $labelAlign=null;
		public $labelPad=null;
		public $labelSeparator=null;
		public $labelWidth=null;
		public $maskRe=null;
		public $maxLength=null;
		public $maxLengthText=null;
		public $maxText=null;
		public $maxValue=null;
		public $minLength=null;
		public $minLengthText=null;
		public $minText=null;
		public $minValue=null;
		public $showToday=null;
		public $startDay=null;
		public $validateOnBlur=null;
		public $validateOnChange=null;
		public $validator=null;
	}

	class TDisplay extends TCustomComponent{
		public $xtype='displayfield';
		public $frame=null;
		public $labelAlign=null;
		public $labelPad=null;
		public $labelSeparator=null;
		public $labelWidth=null;
	}
	
	class TFile extends TCustomComponent{
		public $xtype='filefield';
		public $allowBlank=null;
		public $buttonText=null;
		public $labelAlign=null;
		public $labelPad=null;
		public $labelSeparator=null;
		public $labelWidth=null;
		public $msgTarget=null;
	}
	
	class THidden extends TCustomComponent{
		public $xtype='hiddenfield';
	}
	
	class THtmlEditor extends TCustomComponent{
		public $xtype='htmleditor';
		public $autoScroll=null;
		public $createLinkText=null;
		public $defaultLinkValue=null;
		public $defaultValue=null;
		public $enableAlignments=null;
		public $enableColors=null;
		public $enableFont=null;
		public $enableFontSize=null;
		public $enableFormat=null;
		public $enableLinks=null;
		public $enableLists=null;
		public $enableSourceEdit=null;
		public $fontFamilies=null;
		public $maxHeight=null;
		public $maxWidth=null;
		public $minHeight=null;
		public $minWidth=null;
		public $validateOnChange=null;
	}
	
	class TNumber extends TCustomComponent{
		public $xtype='numberfield';
		public $allowBlank=null;
		public $allowDecimals=null;
		public $blankText=null;
		public $decimalPrecision=null;
		public $decimalSeparator=null;
		public $editable=null;
		public $emptyText=null;
		public $invalidText=null;
		public $keyNavEnabled=null;
		public $labelAlign=null;
		public $labelPad=null;
		public $labelSeparator=null;
		public $labelWidth=null;
		public $maskRe=null;
		public $maxLength=null;
		public $maxLengthText=null;
		public $maxText=null;
		public $maxValue=null;
		public $minLength=null;
		public $minLengthText=null;
		public $minText=null;
		public $minValue=null;
		public $nanText=null;
		public $negativeText=null;
		public $spinDownEnabled=null;
		public $spinUpEnabled=null;
		public $step=null;
		public $validateOnBlur=null;
		public $validateOnChange=null;
		public $validator=null;
		public $value=null;
	}
	
	class TRadio extends TCustomComponent{
		public $xtype='radiofield';
		public $boxLabel=null;
		public $boxLabelAlign=null;
		public $checked=null;
		public $handler=null;
		public $inputValue=null;
		public $labelAlign=null;
		public $labelPad=null;
		public $labelSeparator=null;
		public $labelWidth=null;
	}
	
	class TText extends TCustomComponent{
		public $xtype='textfield';
		public $allowBlank=null;
		public $blankText=null;
		public $emptyText=null;
		public $invalidText=null;
		public $labelAlign=null;
		public $labelPad=null;
		public $labelSeparator=null;
		public $labelWidth=null;
		public $inputType=null;
		public $maskRe=null;
		public $maxLength=null;
		public $maxLengthText=null;
		public $minLength=null;
		public $minLengthText=null;
		public $validateOnBlur=null;
		public $validateOnChange=null;
		public $validator=null;
	}
	
	class TTextArea extends TCustomComponent{
		public $xtype='textareafield';
		public $allowBlank=null;
		public $blankText=null;
		public $emptyText=null;
		public $invalidText=null;
		public $labelAlign=null;
		public $labelPad=null;
		public $labelSeparator=null;
		public $labelWidth=null;
		public $maskRe=null;
		public $maxLength=null;
		public $maxLengthText=null;
		public $minLength=null;
		public $minLengthText=null;
		public $validateOnBlur=null;
		public $validateOnChange=null;
		public $validator=null;
	}
	
	class TTime extends TCustomComponent{
		public $xtype='timefield';
		public $allowBlank=null;
		public $altFormats=null;
		public $blankText=null;
		public $editable=null;
		public $emptyText=null;
		public $format=null;
		public $invalidText=null;
		public $increment=null;
		public $labelAlign=null;
		public $labelPad=null;
		public $labelSeparator=null;
		public $labelWidth=null;
		public $maskRe=null;
		public $maxLength=null;
		public $maxLengthText=null;
		public $maxText=null;
		public $maxValue=null;
		public $minLength=null;
		public $minLengthText=null;
		public $minText=null;
		public $minValue=null;
		public $validateOnBlur=null;
		public $validateOnChange=null;
		public $validator=null;
	}
	//
	//
	class TCheckboxGroup extends TCustomComponent{
		public $xtype='checkboxgroup';
		public $columns=1;
		public $vertical=true;
		public $layout=null;
		public $items;
		
		public function __construct($param=array()){
			$this->items=new TListCheckbox();
			$this->items->setOwner($this);
			//
			parent::__construct($param);
		}
		
		public function __destruct(){
			unset($this->items);
			parent::__destruct();
		}
	}
	
	class TFieldContainer extends TCustomComponent{
		public $xtype='fieldcontainer';
		public $labelWidth=null;
		public $layout=null;
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
	
	class TFieldSet extends TCustomComponent{
		public $xtype='fieldset';
		public $columnWidth=null;
		public $title=null;
		public $collapsed=null;
		public $collapsible=null;
		public $defaultType=null;
		public $defaults=null;
		public $layout=null;
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
	
	class TRadioGroup extends TCustomComponent{
		public $xtype='radiogroup';
		public $columns=1;
		public $vertical=true;
		public $layout=null;
		public $items;
		
		public function __construct($param=array()){
			$this->items=new TListRadio();
			$this->items->setOwner($this);
			//
			parent::__construct($param);
		}
		
		public function __destruct(){
			unset($this->items);
			parent::__destruct();
		}
	}
?>