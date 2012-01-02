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
require_once "classTWindow.php";
require_once "classSimpleWindow.php";
require_once "classToolbarWindow.php";
require_once "classToolsWindow.php";
require_once "classTCheckboxgroup.php";
require_once "classTRadiogroup.php";
require_once "classTButtoncycle.php";
require_once "classTButtonsplit.php";
require_once "classTTabpanel.php";
require_once "classTTree.php";
require_once "classTPanel.php";
require_once "classTHidden.php";
require_once "classTToolbar.php";
require_once "classTChartcolumn.php";
require_once "classTChartline.php";
require_once "classTChartpie.php";
require_once "classTGrid.php";
require_once "classTPaging.php";

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
            case 'tcheckboxgroup':  $object = new classTCheckBoxGroup();break;
            case 'tradiogroup':  $object = new classTRadioGroup();break;
            case 'tbuttoncycle':  $object = new classTButtonCycle();break;
            case 'tbuttonsplit':  $object = new classTSplitButton();break;
            case 'ttabpanel':  $object = new classTTabPanel();break;
            case 'ttree':  $object = new classTTree();break;
            case 'tpanel':  $object = new classTPanel();break;
            case 'thidden':  $object = new classTHidden();break;
			case 'ttoolbar':  $object = new classTToolbar();break;
			case 'tchartcolumn':  $object = new classTChartColumn();break;
			case 'tchartline':  $object = new classTChartLine();break;
			case 'tchartpie':  $object = new classTChartPie();break;
			case 'tpaging':  $object = new classTPaging();break;
			case 'tgrid':  $object = new classTGrid();break;
            default:  $object = new classTText(); break;
       }
    }else{
       $object = new classTText();
    }

    $simpleWindow = new classSimpleWindow();
    $toolsWindow = new classToolsWindow();
    $toolbarWindow = new classToolbarWindow();

    $container->items->add('content',$object->execute());

    $app->items->add('main',$container);
	
	//============== LISTENERS =================================================//
	
	$app->onAfterRender("
	    _APP.send({event:\"getPagingCount\",handler:function(_r){
		operation = new Ext.data.Operation({
	    start : 0, 
	    page  : 1,	
	    count : _r, 
	    limit : 10,  
	    sorters: [ 																	
	    ],
	    filters: [  										
	    ]
	    });	
	    Ext.getCmp('paging').getStore().load(operation);	
	    Ext.getCmp('paging_display').setText('<b>Page: 1 - '+Math.ceil(operation.count/operation.limit)+'</b>');
	    
	    }});
	");
	
	//============== EVENTS ====================================================//
   
    $app->events->add('comboboxRemote',new ComboboxRemote());
    $app->events->add('getTree',new getTree());
	$app->events->add('getPagingCount',new getPagingCount());
	$app->events->add('getPagingResult',new getPagingResult());
	
	//============== WINDOWS =================================================//
   
    $app->windows->add('simpleWindow',$simpleWindow->getWindow());
    $app->windows->add('toolsWindow',$toolsWindow->getWindow());
    $app->windows->add('toolbarWindow',$toolbarWindow->getWindow());
	
	//=========================================================================
	
	$app->show();
}
catch(Exception $e){
	echo $e->getMessage();
}
?>
