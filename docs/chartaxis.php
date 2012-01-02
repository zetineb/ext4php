<?php
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
?>
