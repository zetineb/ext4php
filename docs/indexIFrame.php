<?php
session_start();

require_once "../source/application.php";
require_once "interfaceObject.php";
require_once "TTabDefault.php";
require_once "classTButton.php";
require_once "classTContainer.php";
require_once "classTText.php";
require_once "classTTextarea.php";
require_once "classTDate.php";
require_once "classTHtmleditor.php";
require_once "classTNumber.php";
require_once "classTTime.php";
require_once "classTLabel.php";
require_once "classTCombobox.php";
require_once "classTDisplay.php";
require_once "classTCheckbox.php";
require_once "classTRadio.php";
require_once "classTFile.php";
require_once "classTFieldset.php";

try{
	/*$oButton = new classTButton();*/
	$container = new TContainer(array(
          layout=>'fit',
          margin=>'2 0 10 2',
          width=>'100%',
          height=>'100%'
    ));

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
	$app->ext='ext-4.0.7-gpl';
	//$app->cls='xbody';
	$app->headers->add('utils','<script type="text/javascript" src="js/utils.js"></script>');
	$app->headers->add('app-style','<link rel="stylesheet" type="text/css" href="css/app.css"/>');

    if(isset($_GET['type'])){
       switch($_GET['type']){
            case 'tlabel':  $object = new classTLabel(); break;
            case 'tnumber':  $object = new classTNumber(); break;
            case 'ttext':  $object = new classTText(); break;
            case 'tbutton':  $object = new classTButton(); break;
            case 'tcombobox':  $object = new classTComboBox(); break;
            case 'tdate':  $object = new classTDate(); break;
            case 'thtmleditor':  $object = new classTHtmlEditor(); break;
            case 'ttextarea':  $object = new classTTextArea(); break;
            case 'ttime':  $object = new classTTime(); break;
            case 'tcontainer':  $object = new classTContainer(); break;
            case 'tdisplay':  $object = new classTDisplay(); break;
            case 'tcheckbox':  $object = new classTCheckBox(); break;
            case 'tfile':  $object = new classTFile(); break;
            case 'tradio':  $object = new classTRadio(); break;
            case 'tfieldset':  $object = new classTFieldset(); break;
            case 'twindow':  $object = new classTWindow();break;
            default:  $object = new classTText(); break;
       }
    }else{
       $object = new classTText();
    }


    $container->items->add('object',$object->execute());
    if($_GET['type']=='window'){
      $app->windows->add('windowObject',$object->getWindow());
    }

    $app->items->add('main',$container);
   	$app->events->add('comboboxRemote',new ComboboxRemote());

	$app->show();
}
catch(Exception $e){
	echo $e->getMessage();
}
?>
