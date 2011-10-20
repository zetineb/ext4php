<?php
	class TChartLabel extends TComponent{
		public $color=null;
		public $display=null;
		public $field=null;
		public $font=null;
		public $minMargin=null;
		public $orientation=null;
		public $renderer=null;
	}
	
	class TTChartAxis extends TComponent{
		public $dashSize=null;
		public $grid=null;
		public $length=null;
		public $majorTickSteps=null;
		public $minorTickSteps=null;
		public $position=null;
		public $fields=null;	//array
		public $label=null;		//TChartLabel
		public $margin=null;
		public $maximum=null;
		public $minimum=null;
		public $steps=null;
		public $title=null;
		public $type='';
	}
	
	class TChartSeries extends TComponent{
		public $angleField=null;
		public $axis=null;
		public $color=null;
		public $column=null;
		public $display=null;
		public $donut=null;
		public $field=null;
		public $fill=null;
		public $font=null;
		public $groupGutter=null;
		public $gutter=null;
		public $highlight=null;
		public $highlightDuration=null;
		public $lengthField=null;
		public $minMargin=null;
		public $orientation=null;
		public $renderer=null;
		public $selectionTolerance=null;
		public $showInLegend=null;
		public $smooth=null;
		public $tips=null;		//Object
		public $title=null;
		public $type=null;
		public $xField=null;
		public $yField=null;
	}
	
	class TChart extends TComponent{
		public $xtype='chart';
		public $animate=null;
		public $autoScroll=null;
		public $autoShow=null;
		public $axes=null;			//array of TChartAxis
		public $autoSize=null;
		public $background=null;
		public $baseCls=null;
		public $border=null;
		public $cls=null;
		public $disabled=null;
		public $floating=null;
		public $focusOnToFront=null;
		public $frame=null;
		public $html=null;
		public $insetPadding=null;
		public $legend=null;
		public $maintainFlex=null;
		public $margin=null;
		public $padding=null;
		public $resize=null;
		public $series=null;	  //array of TChartSeries
		public $shadow=null;
		public $style=null;
		public $theme=null;
		public $toFrontOnShow=null;
		public $tpl=null;
		public $viewBox=null;
		//
		public $fields;
		public $data;
		
		public function __construct($param=array()){
			$this->fields=new TListString();
			$this->data=new TListString();
			//
			parent::__construct($param);
		}
		
		public function __destruct(){
			unset($this->fields);
			unset($this->data);
			parent::__destruct();
		}
	}
?>