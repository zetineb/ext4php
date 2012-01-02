<?php
	$gridFeature=new TGridFeature();
	$gridFeature->ftype='grouping';
	$gridFeature->groupHeaderTpl='Cuisine: {name} ({rows.length} Item{[values.rows.length > 1 ? "s" : ""]})';

	$col1 = new TColumn(array(
		header=>'Code',
		dataIndex=>'code',
		width=>60
	));
	
	$col2 = new TColumn(array(
		header=>'Name',
		dataIndex=>'descr',
		width=>430,
		flex=>1
	));
	
	$grid=new TGrid(array(
		columns=>array($col1,$col2)
	));
	$grid->features=$gridFeature;	
	$grid->autoLoad=true;
	$grid->eventName='grouping';
	$grid->queryMode=TQueryModeType::$remote;
	$grid->groupField='cuisine';	
?>
