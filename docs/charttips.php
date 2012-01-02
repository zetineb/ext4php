<?php
    $obj=new TChartTips(array(
		trackMouse=>true,
		width=>140,
		height=>28,
		renderer=>"this.setTitle(storeItem.get('month') + ': ' + storeItem.get('payments') + ' $');"
	));
?>
