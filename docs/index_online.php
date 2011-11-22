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
	$app->ext='../ext-4.0.7-gpl';	
	$app->headers->add('utils','<script type="text/javascript" src="js/utils.js"></script>');
	$app->headers->add('app-style','<link rel="stylesheet" type="text/css" href="css/app.css"/>');

	$topTab=new TTabPanel(array(
		layout=>'fit'
	));

	$contPanel=new TPanel(array(
		region=>'center',
		layout=>'fit'
	));
	$contPanel->items->add('topTab',$topTab);
	
	$main=new TPanel(array(
		title=>'Ext4php Docs (under development)',
		layout=>'border',
		width=>'100%',
		height=>'100%',
		items=>array($westPanel->getPanel())
	));
	$main->items->add('conteudo',$contPanel);

	$app->items->add('main',$main);
	$app->onAfterRender("
		_arrayTabs=[
			['ext4php'],['credits'],
			['tapplication'],['introduction'],['startapplication'],['events'],['headers'],['packages'],
				['windows'],['runapplication'],
			['tbutton'],['tbutton'],['tbuttoncycle'],['tbuttonsplit'],
			['tchart'],['tchart'],['tchartaxis'],['tchartlabel'],['tchartlegend'],['tchartseries'],['tcharttips'],
			['tcontainer'],
			['tform'],['tcheckbox'],['tcheckboxgroup'],['tcombobox'],['tcontainer'],
				['tdate'],['tdisplay'],['tfieldset'],['tfile'],
				['thidden'],['thtmleditor'],['tlabel'],['tnumber'],['tradio'],
				['tradiogroup'],['ttext'],['ttextarea'],['ttime'],
			['tgrid'],['tcolumn'],['tcolumnaction'],['tcolumnboolean'],['tcolumndate'],['tcolumnnumber'],['tcolumntemplate'],
				['tcustomcolumn'],['tgrid'],['tgridfeature'],['tgridplugin'],['ttreecolumn'],
			['tpaging'],['getGrid'],['tpaging'],
			['tpanel'],
			['ttabpanel'],['ttab'],['ttabpanel'],
			['ttree'],['ttree'],['ttreenode'],
			['ttoolbar'],['tcustomtoolbar'],['ttoolbarfill'],['ttoolbarseparator'],['ttoolbarspacer'],['ttoolbartext'],
			['twindow']
		];		
	");
	$app->events->add('wpn_fileExists',new wpn_fileExists());
	$app->show();
}
catch(Exception $e){
	echo $e->getMessage();
}
?>
