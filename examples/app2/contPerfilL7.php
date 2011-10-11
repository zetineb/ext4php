<?php
class contFormL7 {
	public $contFormL7;
	
	public function __construct(){
		$store = json_decode($_SESSION['store']);
		$sql = mysql_fetch_array(mysql_query("select foto,sexo from perfil where codigo='$store->perfil'"));
		if($sql['foto']==""){
			if($sql['sexo']=="FEMALE")
			  $foto="female.png";
			else
			  $foto="male.png";	
			$msg='<div style=\"width: 100px;height:20px;float:right;color:red\"><br /><br />Sem Foto</div>';
		}else{
		  $foto=$sql['foto'];	
			$msg='<div style=\"width: 100px;height:20px;float:right\"><br /><br />Sua Foto&nbsp;&nbsp;</div>';
		}
		$this->obj=new TContainer(array(
			width=>800,
			height=>86,
			cls=>'fotoPerfil'
		));
		$this->obj->onAfterRender("
		  fotoPerfil = Ext.create('Ext.Img', {
				src: 'uploads/".$foto."',
				renderTo: Ext.getCmp('fotoView').id
			});
			fotoPerfil.setWidth(60);
			fotoPerfil.setHeight(82);
		");
	}
	
	public function getcontFormL7(){
	  return $this->obj;
	}
}
?>