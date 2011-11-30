<?php
require("../source/application.php");

try{
	$app=new TApplication();
	$app->package=array(
		TPackage::$button,
		TPackage::$chart,
		TPackage::$container,
		TPackage::$data,
		TPackage::$form,
		TPackage::$grid,
		TPackage::$layout,
		TPackage::$menu,
		TPackage::$tab,
		TPackage::$tip,
		TPackage::$toolbar,
		TPackage::$util,
		TPackage::$view,
		TPackage::$tree,
		TPackage::$window
	);
	$app->ext='ext-4.0.7-gpl';		//Path from the http root
	//$app->cls='xbody';
	$app->headers->add('utils','<script type="text/javascript" src="js/utils.js"></script>');
	$app->headers->add('app-style','<link rel="stylesheet" type="text/css" href="css/app.css"/>');
	//
	//$app->events->add('event1',new Event1());  //PHP event
	$eastPanel=new TPanel(array(
		title=>'Components',
		region=>'west',
		split=>true,
		flex=>1,
		width=>300
	));
	$centerPanel=new TPanel(array(
		title=>'&nbsp',
		region=>'center',
		//html=>"<iframe width='99%' height='99%' src='...'/>",
		width=>'100%'
	));
	$main=new TPanel(array(
		title=>'Ext4php Docs',
		layout=>'border',
		width=>'100%',
		height=>'100%',
		items=>array($eastPanel,$centerPanel)
	));
	$app->items->add('main',$main);
	$app->show();
}
catch(Exception $e){
	echo $e->getMessage();
}
?>
