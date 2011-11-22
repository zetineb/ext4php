<?php
require_once("../source/application.php");
require_once("westPanel.php");

try{
	$westPanel=new WestPanel();
	$app=new TApplication();
	$app->package=array(
		TPackage::$container,
		TPackage::$layout,
		TPackage::$tree,
	);
	$app->ext='../ext';	
	$app->headers->add('utils','<script type="text/javascript" src="js/utils.js"></script>');
	$app->headers->add('app-style','<link rel="stylesheet" type="text/css" href="css/app.css"/>');

	$iframePanel=new TPanel(array(
		region=>'center',
		html=>"<iframe width='99%' height='99%' src='indexIFrame.php'/>",
		width=>'100%'
	));
	
	$tab1=new TTab(array(
		title=>'Label',
		items=>($iframePanel)
	));
	
	$topTab=new TTabPanel();

	$contPanel=new TPanel(array(
		region=>'center',
		layout=>'fit'
	));
	$contPanel->items->add('topTab',$topTab);
	
	$main=new TPanel(array(
		title=>'Ext4php Docs',
		layout=>'border',
		width=>'100%',
		height=>'100%',
		items=>array($westPanel->getPanel())
	));
	$main->items->add('conteudo',$contPanel);
	
	$app->items->add('main',$main);
	$app->show();
}
catch(Exception $e){
	echo $e->getMessage();
}
?>
