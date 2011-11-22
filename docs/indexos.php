<?php
session_start();

require_once "../source/application.php";
require_once "classTButton.php";
require_once "classTContainer.php";
require_once "classTText.php";
require_once "classTTextArea.php";
require_once "classTDate.php";
require_once "classTHtmlEditor.php";
require_once "classTNumber.php";
require_once "classTTime.php";
require_once "classTLabel.php";
require_once "classTComboBox.php";
require_once "classTWindow.php";

try{
	/*$oButton = new classTButton();*/
	$oContainer = new classTContainer();
	$oText = new classTLabel();
	/*$oTextArea = new classTTextArea();
	$oDate = new classTDate();
	$oHtmlEditor = new classTHtmlEditor();
	$oNumber = new classTNumber();
	$oTime = new classTTime();
	$oLabel = new classTLabel();*/
	/*$oComboBox = new classTComboBox();
	$oWindow = new classTWindow(); */
	
    /*$button = $oButton->execute(); */
    $container = $oContainer->execute();
   	$text = $oText->execute();
   	/*$textArea = $oTextArea->execute();
   	$date = $oDate->execute();
   	$htmlEditor = $oHtmlEditor->execute();
   	$number = $oNumber->execute();
   	$time = $oTime->execute();  */
  /*	$label = $oLabel->execute();
  	$comboBox = $oComboBox->execute();
  	$oWindow->execute();   */

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
	$app->ext='../ext';
	$app->cls='xbody';
	$app->headers->add('utils','<script type="text/javascript" src="js/utils.js"></script>');
	$app->headers->add('app-style','<link rel="stylesheet" type="text/css" href="css/app.css"/>');

    //$app->events->add('event1',new Event1());  //PHP event
	/*$eastPanel=new TPanel(array(
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
	)); */

    //$container->items->add('button',$button);
    $container->items->add('text',$text);
    /*$container->items->add('textArea',$textArea);
    $container->items->add('date',$date);
    $container->items->add('htmlEditor',$htmlEditor);
    $container->items->add('number',$number);
    $container->items->add('time',$time);
    $container->items->add('label',$label);*/
    //$container->items->add('comboBox',$comboBox);

    $app->items->add('main',$container);
    //$app->windows->add('window',$oWindow->getWindow());
    $app->onAfterRender(array('window.show();'));
    
	$app->show();
}
catch(Exception $e){
	echo $e->getMessage();
}
?>
