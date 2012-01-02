<?php
    $chart=new TChart();
	$chart->style='background:#fff';
	$chart->animate=true;
	$chart->shadow=true;
	$chart->fields->add(0,'month');
	$chart->fields->add(1,'payments');
	$chart->data->add(0,array('May 2011',4824.43));
	$chart->data->add(1,array('June 2011',9631.88));
	$chart->data->add(2,array('July 2011',28373.89));
	$chart->data->add(3,array('August 2011',24072.13));
	$chart->data->add(4,array('September 2011',33475.55));
	
	$label=new TChartLabel(array(
		display=>'insideEnd',
		textAnchor=>'middle',	
		field=>'payments',
		renderer=>"Ext.util.Format.numberRenderer('0')",
		orientation=>'vertical',
		color=>'#333'
	));
		
	$chartSerie=new TChartSeries(array(
		type=>'column',
		axis=>'left',
		highlight=>true,
		tips=>$this->chartTips(),
		label=>$label,
		xField=>'month',
		yField=>'payments'
	));

	$labelY=new TChartLabel(array(
		renderer=>"Ext.util.Format.numberRenderer('0,0')"
	));
	
	$chartAxisY=new TChartAxis(array(
		type=>'Numeric',
		position=>'left',
		fields=>array('payments'),
		label=>$labelY,
		title=>'Payments',
		grid=>true,
		minimum=>0
	));
	
	$chartAxisX=new TChartAxis(array(
		type=>'Category',
		position=>'bottom',
		fields=>array('month'),
		title=>'Month of the Year'
	));
	
	$chart->axes=array($chartAxisY,$chartAxisX);
	$chart->series=array($chartSerie);
?>
