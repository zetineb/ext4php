<?php
	$paging=new TPaging('grid','operation',array(
		height=>217,
		width=>490,
		padding=>"10 10 10 10",
		autoLoad=>false,
		eventName=>'getGridResult',
		queryMode=>TQueryModeType::$remote
	));
	$paging->displayMsg='Page'; 
	$paging->first->iconCls='bpgfirst';
	$paging->first->text='First';
	$paging->prev->iconCls='bpgprev';
	$paging->prev->text='Previous';
	$paging->next->iconCls='bpgnext';
	$paging->next->text='Next';
	$paging->last->iconCls='bpglast';
	$paging->last->text='Last';	
	
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
	
	$grid=$this->paging()->getGrid();
	$grid->columns->add('col1',$col1);
	$grid->columns->add('col2',$col2);	
?>
