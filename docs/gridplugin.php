<?php
	$plugins=new TGridPlugin();
	$plugins->ptype='cellediting';
	$plugins->clicksToEdit=1;
	$plugins->listeners->add("edit","Ext.getCmp('groupsummary').getView().refresh();");

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
	$grid->plugins=array($plugins);	
	$grid->autoLoad=true;
	$grid->eventName='grouping';
	$grid->queryMode=TQueryModeType::$remote;
	$grid->groupField='cuisine';	
?>
