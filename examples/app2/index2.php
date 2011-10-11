<?php
/*
Developed by: Fausto Marouvo
Contact Email: fausto@mirageminterativa.com.br
*/

session_start();
//error_reporting(E_USER_NOTICE); //set which php errors are reported
require "../../source/application.php";

require_once "inc/functions.php";
require_once "inc/mask.php";
require_once  "winCidadeSel.php";
require_once  "winCursoSel.php";
require_once  "winDadosConta.php";
require_once  "winEndereco.php";
require_once  "winFone.php";
require_once  "winFormacao.php";
require_once  "winFoto.php"; 
require_once  "winHabilidade.php";
require_once  "winHabilidadeSel.php"; 
require_once  "winHistorico.php"; 
require_once  "winIdiomas.php"; 
require_once  "winIdiomasSel.php";
require_once  "winInformatica.php"; 
require_once  "winInforSel.php";
require_once  "winInstituicao.php";
require_once  "winPerfil.php";
require_once  "menuHeader.php";

$conexao = mysql_connect("localhost","root","");
$db = mysql_select_db("destaque",$conexao);

if($_SESSION['login']!="" and $_SESSION['senha']!=""){
  $_SESSION['store']='{"nome":"'.$_SESSION['nome'].'","login":"'.$_SESSION['login'].'","senha":"'.$_SESSION['senha'].'","codigo":"'.$_SESSION['codigo'].'","perfil":"'.$_SESSION['perfil'].'","entidade":"'.$_SESSION['entidade'].'"}';
}
$entidade=9999;
try{
	if($_SESSION['store']==""){
		echo('<script type="text/javascript">alert("Invalid Session");location.href="index.php";</script>');
		throw new Exception('Invalid Session');
	}
		
	$menuHeader 	  	= new menuHeader();	
	$winCidadeSel    	= new winCidadeSel();
	$winCursoSel    	= new winCursoSel();
	$winDadosConta  	= new winDadosConta();
	$winEndereco 	  	= new winEndereco();
	$winFone 			  	= new winFone();
	$winFormacao	  	= new winFormacao();
	$winFoto	  	    = new winFoto();
	$winHabilidade  	= new winHabilidade();	
	$winHabilidadeSel = new winHabilidadeSel();	
	$winHistorico	    = new winHistorico();
	$winIdiomas     	= new winIdiomas();
	$winIdiomasSel  	= new winIdiomasSel();
	$winInformatica 	= new winInformatica();
	$winInforSel    	= new winInforSel();
	$winInstituicao 	= new winInstituicao();
	$winPerfil 		  	= new winPerfil();
	
  $app=new TApplication();
	$app->ext='ext-4.0.2a';
	$app->cls='xbody';
	$app->headers->add('utils','<script type="text/javascript" src="js/utils.js"></script>');
	$app->headers->add('app-style','<link rel="stylesheet" type="text/css" href="css/app.css"/>');
	$app->onWindowBeforeUnload('','Exit'); 
	$app->onBeforeRender(array("
		_store={\"nome\":\"".$_SESSION['nome']."\",\"codigo\":\"".$_SESSION['codigo']."\",\"perfil\":\"".$_SESSION['perfil']."\",\"entidade\":\"".$_SESSION['entidade']."\"};
		_windows=[['winDadosConta'],['winEndereco'],['winFone'],[winFoto],['winFormacao'],['winHabilidade'],['winHistorico'],['winIdiomas'],['winInformatica'],['winPerfil'],[winCidadeSel],[winIdiomasSel],[winHabilidadeSel],[winCursoSel],[winInstituicao]];
	"));
	$app->onAfterRender(array("
		if(_store.nome==''){
		  winDadosConta.show();
			setTimeout(function () {
				if(_store.nome==''){
					Ext.Msg.alert('ATTENTION','Write your name and save to continue.<br><span style=\"color: red\">Attention</span> your name cant be edited after save.');
				}	
			},5000);			
		}else{
		  winPerfil.show();
			setTimeout(function () {
				if(_store.perfil==''){
					Ext.Msg.alert('ATTENTION','You do not have a profile.<br>Complete the form and save.');
				}	
			},5000);			
		}	
	"));		
	
	//eventos
	$app->events->add('cta_carregar',new cta_carregar()); 		
	$app->events->add('cta_salvar',new cta_salvar()); 		
	$app->events->add('cid_carregarUf',new cid_carregarUf()); 				
	$app->events->add('cid_getGridCountSel',new cid_getGridCountSel()); 
	$app->events->add('cid_getGridSel',new cid_getGridSel()); 
  $app->events->add('cus_getGrid',new cus_getGrid()); 	
	$app->events->add('cus_getGridCount',new cus_getGridCount()); 
  $app->events->add('end_apagar',new end_apagar());	
	$app->events->add('end_carregar',new end_carregar()); 		
	$app->events->add('end_getGrid',new end_getGrid()); 		
	$app->events->add('end_getGridCount',new end_getGridCount()); 			
	$app->events->add('end_salvar',new end_salvar()); 
  $app->events->add('per_carregar',new per_carregar());	
	$app->events->add('per_salvar',new per_salvar()); 			
  $app->events->add('fon_apagar',new fon_apagar()); 
  $app->events->add('fon_carregar',new fon_carregar());	
  $app->events->add('fon_getGrid',new fon_getGrid()); 	
	$app->events->add('fon_getGridCount',new fon_getGridCount()); 						 			
	$app->events->add('fon_salvar',new fon_salvar()); 	
  $app->events->add('for_apagar',new for_apagar());	
  $app->events->add('for_carregar',new for_carregar());	
  $app->events->add('for_getGrid',new for_getGrid()); 	
	$app->events->add('for_getGridCount',new for_getGridCount()); 						 			
	$app->events->add('for_salvar',new for_salvar()); 
	$app->events->add('fot_salvar',new fot_salvar()); 
  $app->events->add('his_apagar',new his_apagar()); 
  $app->events->add('his_carregar',new his_carregar()); 	
  $app->events->add('his_getGrid',new his_getGrid()); 	
	$app->events->add('his_getGridCount',new his_getGridCount()); 									
	$app->events->add('his_salvar',new his_salvar()); 			
	$app->events->add('hab_apagar',new hab_apagar());
	$app->events->add('hab_getGridCount',new hab_getGridCount()); 			
	$app->events->add('hab_getGrid',new hab_getGrid()); 		
	$app->events->add('hab_salvar',new hab_salvar()); 	
	$app->events->add('hab_apagarSel',new hab_apagarSel());	
	$app->events->add('hab_carregarSel',new hab_carregarSel()); 
	$app->events->add('hab_getGridCountSel',new hab_getGridCountSel()); 			
	$app->events->add('hab_getGridSel',new hab_getGridSel()); 						
	$app->events->add('hab_salvarSel',new hab_salvarSel());
  $app->events->add('idi_apagar',new idi_apagar());	
	$app->events->add('idi_carregar',new idi_carregar());
	$app->events->add('idi_getGrid',new idi_getGrid());
	$app->events->add('idi_getGridCount',new idi_getGridCount());
	$app->events->add('idi_salvar',new idi_salvar());
	$app->events->add('idi_carregarSel',new idi_carregarSel());
	$app->events->add('idi_getGridCountSel',new idi_getGridCountSel());
	$app->events->add('idi_getGridSel',new idi_getGridSel());
	$app->events->add('idi_salvarSel',new idi_salvarSel());	
	$app->events->add('inf_apagar',new inf_apagar());	
	$app->events->add('inf_carregar',new inf_carregar());
	$app->events->add('inf_getGridCount',new inf_getGridCount());
	$app->events->add('inf_getGrid',new inf_getGrid());
	$app->events->add('inf_salvar',new inf_salvar());	
	$app->events->add('inf_apagarSel',new inf_apagarSel()); 
	$app->events->add('inf_carregarSel',new inf_carregarSel());	
	$app->events->add('inf_getGridCountSel',new inf_getGridCountSel()); 	
	$app->events->add('inf_getGridSel',new inf_getGridSel()); 	 	
	$app->events->add('inf_salvarSel',new inf_salvarSel()); 		
	$app->events->add('ins_getGrid',new ins_getGrid()); 			
	$app->events->add('ins_getGridCount',new ins_getGridCount()); 
	
	//janelas
	$app->windows->add('winCidadeSel',$winCidadeSel->getWindow());	
	$app->windows->add('winCursoSel',$winCursoSel->getWindow());	
	$app->windows->add('winDadosConta',$winDadosConta->getWindow());				
	$app->windows->add('winEndereco',$winEndereco->getWindow());	
	$app->windows->add('winFone',$winFone->getWindow());		
	$app->windows->add('winFormacao',$winFormacao->getWindow());		
	$app->windows->add('winFoto',$winFoto->getWindow());		
	$app->windows->add('winHabilidade',$winHabilidade->getWindow());		
	$app->windows->add('winHabilidadeSel',$winHabilidadeSel->getWindow());		
	$app->windows->add('winHistorico',$winHistorico->getWindow());		
	$app->windows->add('winIdiomas',$winIdiomas->getWindow());
  $app->windows->add('winIdiomasSel',$winIdiomasSel->getWindow());	
	$app->windows->add('winInformatica',$winInformatica->getWindow());			
	$app->windows->add('winInforSel',$winInforSel->getWindow());					
	$app->windows->add('winInstituicao',$winInstituicao->getWindow());		
	$app->windows->add('winPerfil',$winPerfil->getWindow());	
	$app->items->add('menuHeader',$menuHeader->getMenuHeader());	
	$app->show();
}
catch(Exception $e){
	echo $e->getMessage();
}
?>