<?php
	class TChartTips extends TComponent{
		public $trackMouse=null;
		public $renderer=null;
	}
	
	class TChartLegend extends TComponent{
		public $boxFill=null;
		public $boxStroke=null;
		public $boxStrokeWidth=null;
		public $boxZIndex=null;
		public $itemSpacing=null;
		public $labelFont=null;
		public $padding=null;
		public $position=null;
		public $visible=null;
		public $x=null;
		public $y=null;
	}
	
	class TChartLabel extends TComponent{
		public $color=null;
		public $contrast=null;
		public $display=null;
		public $field=null;
		public $font=null;
		public $orientation=null;
		public $renderer=null;
		public $textAnchor=null;
		public $minMargin=50;
	}
	
	class TChartAxis extends TComponent{
		public $dashSize=null;
		public $grid=null;
		public $length=null;
		public $majorTickSteps=null;
		public $minorTickSteps=null;
		public $position=null;
		public $fields=null;	//array
		public $label=null;		//Object TChartLabel
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
		public $column=null;
		public $donut=null;
		public $field=null;
		public $fill=null;
		public $groupGutter=null;
		public $gutter=null;
		public $highlight=null;
		public $highlightDuration=null;
		public $label=null;				//Object TChartLabel
		public $lengthField=null;
		public $markerConfig=null;
		public $renderer=null;
		public $selectionTolerance=null;
		public $showInLegend=null;
		public $smooth=null;
		public $tips=null;		//Object TCharTips
		public $title=null;
		public $type=null;
		public $xField=null;
		public $xPadding=null;
		public $yField=null;
		public $yPadding=null;
		public $minMargin=50;
	}
	
	class TChart extends TComponent{
		public $xtype='chart';
		public $autoLoad=true;
		public $root='records';
		public $totalProperty='totalCount';
		public $eventName=null;
		public $queryMode='local';
		//
		public $animate=null;
		public $autoScroll=null;
		public $autoShow=null;
		public $autoSize=null;
		public $axes=null;			//array of TChartAxis
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
		public $legend=null;		//Object TChartLegend
		public $maintainFlex=null;
		public $margin=null;
		public $padding=null;
		public $resizable=null;
		public $series=null;	  //array of TChartSeries
		public $shadow=null;
		public $style=null;
		public $theme=null;
		public $toFrontOnShow=null;
		public $tpl=null;
		public $viewBox=true;
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