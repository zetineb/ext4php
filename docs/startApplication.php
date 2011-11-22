<?php
     session_start();
     require_once "../source/application.php"; //path application.php Ext4PHP

     try{
	     $app=new TApplication();
         $app->package=array(
		     TPackage::$container,
		     TPackage::$form
         );
	     $app->ext='ext-4.0.7-gpl';  //path Ext JS
	     
	     //======================= NOT REQUIRED ===============================
	     $app->cls='xbody';
	     $app->headers->add('utils','<script type="text/javascript" src="js/utils.js"></script>');
	     $app->headers->add('app-style','<link rel="stylesheet" type="text/css" href="css/app.css"/>');
         //=================================================================
         
         $label = new TLabel(array(
    	    text=>"Hello World!",
            name=>"hello_world",
            margin=>"10 10 10 10",
            style=>"font-size:25px"
         ));

         $container = new TContainer(array(
             layout=>"fit",
             width=>"100%",
             height=>"100%"
         ));

         $container->items->add('hello',$label);
         $app->items->add('main',$container);
	     $app->show();
      }
      catch(Exception $e){
         echo $e->getMessage();
      }
?>
