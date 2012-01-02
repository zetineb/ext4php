<?php
    $chartSerie=new TChartSeries(array(
		type=>'column',
		axis=>'left',
		highlight=>true,
		tips=>$this->chartTips(),
		label=>$label,
		xField=>'month',
		yField=>'payments'
	));
?>
