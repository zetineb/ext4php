<?php
    $tree=new TTree();
	$treecol1=new TTreeColumn();
	$treecol1->text='Task';
	$treecol1->flex=2;
	$treecol1->dataIndex='task';
	$treecol2=new TColumn();
    $treecol2->text='Duration';
    $treecol2->flex=1;
    $treecol2->sortable=true;
    $treecol2->dataIndex='duration';
    $treecol2->align='center';
	$treecol3=new TColumn();
    $treecol3->text='Assigned To';
    $treecol3->flex=1;
    $treecol3->dataIndex='user';
    $treecol3->sortable=true;
	
	$tree->columns->add('treecol1',$treecol1);
	$tree->columns->add('treecol2',$treecol2);
	$tree->columns->add('treecol3',$treecol3);
	
	$tree->fields->add(0,'task');
	$tree->fields->add(1,'user');
	$tree->fields->add(2,'duration');
	$tree->autoLoad=false;
	$tree->eventName='tree';
		
	$tree->title='Tree';
	$tree->rootVisible=true;
	$tree->useArrows=true;
?>
