<?php
require_once "menuWindow.php"; //botoes internos da janelas
require_once "menuTools.php"; // ferramentas das janelas
require_once "contPerfilL1.php"; //linha1 do formulario
require_once "contPerfilL2.php"; //linha2 do formulario
require_once "contPerfilL3.php"; //linha3 do formulario
require_once "contPerfilL4.php"; //linha4 do formulario
require_once "contPerfilL5.php"; //linha5 do formulario
require_once "contPerfilL6.php"; //linha6 do formulario
require_once "contPerfilL7.php"; //linha7 do formulario

class winPerfil {
 	private $form; 
	private $container; 
	public $window; 
	
	private function btSalvar(){
		$obj=new TButton(array(
			iconCls=>'bsave',
			iconAlign=>'left',
			scale=>'small',
			text=>'Save',
			width=>65,
			handler=>"			
			  var form = Ext.getCmp('formPerfil').getForm();
				if (form.isValid()) {
					form.submit({
						success: function(form, action) {
							_store.perfil=action.result.perfil;
							Ext.Msg.alert('Success', action.result.msg,function(){
								var form = Ext.getCmp('formPerfil').getForm();
								form.load({url:window.location,params:{event:\"per_carregar\",load:1},waitMsg: \"Loading\"});  									   
							});
							if(_store.perfil!=''){
								Ext.getCmp('per_bt3MenuWin').enable();
								Ext.getCmp('mh_btMenu3').enable();
								Ext.getCmp('per_bt4MenuWin').enable();
								Ext.getCmp('mh_btMenu4').enable();
								Ext.getCmp('per_bt5MenuWin').enable();
								Ext.getCmp('mh_btMenu5').enable();
								Ext.getCmp('per_bt6MenuWin').enable();
								Ext.getCmp('mh_btMenu6').enable();
								Ext.getCmp('per_bt7MenuWin').enable();
								Ext.getCmp('mh_btMenu7').enable();
								Ext.getCmp('per_bt8MenuWin').enable();
								Ext.getCmp('mh_btMenu8').enable();
								Ext.getCmp('per_bt9MenuWin').enable();
								Ext.getCmp('mh_btMenu9').enable();
								Ext.getCmp('wp_btFoto').enable();
								Ext.getCmp('cta_bt3MenuWin').enable();
								Ext.getCmp('mh_btMenu3').enable();
								Ext.getCmp('cta_bt4MenuWin').enable();
								Ext.getCmp('mh_btMenu4').enable();
								Ext.getCmp('cta_bt5MenuWin').enable();
								Ext.getCmp('mh_btMenu5').enable();
								Ext.getCmp('cta_bt6MenuWin').enable();
								Ext.getCmp('mh_btMenu6').enable();
								Ext.getCmp('cta_bt7MenuWin').enable();
								Ext.getCmp('mh_btMenu7').enable();
								Ext.getCmp('cta_bt8MenuWin').enable();
								Ext.getCmp('mh_btMenu8').enable();
								Ext.getCmp('cta_bt9MenuWin').enable();
								Ext.getCmp('mh_btMenu9').enable();
								Ext.getCmp('wp_btFoto').enable();								
							}	
						},
						failure: function(form, action) {
							Ext.Msg.alert('Failed', action.result.msg);
						}
					});	
				}						
			"
		));	
		return $obj;
	}

	private function btCancel(){
		$obj=new TButton(array(
			iconCls=>'bcancel',
			iconAlign=>'left',
			scale=>'small',
			text=>'Cancel',
			width=>80,
			handler=>"
				var form = Ext.getCmp('formPerfil').getForm();
				form.load({url:window.location,params:{event:\"per_carregar\",load:1},waitMsg: \"Loading\"});  
			"
		));	
		return $obj;
	}	
	
	private function btPhoto(){
		$obj=new TButton(array(
			iconCls=>'bphoto',
			iconAlign=>'left',
			scale=>'small',
			text=>'Photo',
			width=>55,
			handler=>"
				winFoto.show();  
			"
		));	
		return $obj;
	}		
	
	public function __construct(){
	  
	  $toolsWindow = new menuTools();	
	  $contFormL1  = new contFormL1();
	  $contFormL2  = new contFormL2();
	  $contFormL3  = new contFormL3();
	  $contFormL4  = new contFormL4();
	  $contFormL5  = new contFormL5();
	  $contFormL6  = new contFormL6();
	  $contFormL7  = new contFormL7();
		
	  $this->form=new TForm(array(
			frame=>true,
			width=>'100%',
			height=>280,
			layout=>'vbox',
			eventName=>'per_salvar',
			items=>array($contFormL1->getContFormL1(),$contFormL2->getContFormL2(),$contFormL3->getContFormL3(),$contFormL4->getContFormL4(),$contFormL5->getContFormL5(),$contFormL6->getContFormL6())
		));
		
	  $this->cont=new TContainer(array(
			title=>'Fieldset',
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>274,		
		));	
		$this->cont->items->add('formPerfil',$this->form);
		$this->cont->items->add('fotoView',$contFormL7->getContFormL7());
		
		$this->window=new TWindow(array(
			layout=>'fit',
			title=>'Profile',
			width=>800,
			height=>450,
			items=>array($this->cont),
			tools=>array($toolsWindow->btPrint())
		));
		$btWindow = new menuWindow($this->window,'per');	
		$this->window->bbar->add('wp_btFillPerfil',new TToolbarFill());		
		$this->window->bbar->add('wp_btFoto',$this->btPhoto());		
		$this->window->bbar->add('wp_btSalvar',$this->btSalvar());		
		$this->window->bbar->add('wp_btCancelar',$this->btCancel());		
		$this->window->onBeforeShow(array("		
			setTimeout(function () {
				for(var _i=0;_i<_windows.length;_i++){
				var _win = _windows[_i].toString();
				if(_win.toString()!='winPerfil')				
					var _o=eval(Ext.getCmp(_win));
					if(typeof(_o)!='undefined')
					  _o.close();
			  }
			},300);		
		","
		  var form = Ext.getCmp('formPerfil').getForm();
			form.load({url:window.location,params:{event:\"per_carregar\",load:1},waitMsg: \"Loading\"}); 
		"));
		$this->window->onAfterRender(array("
			if(_store.perfil==''){
				Ext.getCmp('per_bt3MenuWin').disable();
				Ext.getCmp('mh_btMenu3').disable();
				Ext.getCmp('per_bt4MenuWin').disable();
				Ext.getCmp('mh_btMenu4').disable();
				Ext.getCmp('per_bt5MenuWin').disable();
				Ext.getCmp('mh_btMenu5').disable();
				Ext.getCmp('per_bt6MenuWin').disable();
				Ext.getCmp('mh_btMenu6').disable();
				Ext.getCmp('per_bt7MenuWin').disable();
				Ext.getCmp('mh_btMenu7').disable();
				Ext.getCmp('per_bt8MenuWin').disable();
				Ext.getCmp('mh_btMenu8').disable();
				Ext.getCmp('per_bt9MenuWin').disable();
				Ext.getCmp('mh_btMenu9').disable();
				Ext.getCmp('wp_btFoto').disable();
				Ext.getCmp('cta_bt3MenuWin').disable();
				Ext.getCmp('mh_btMenu3').disable();
				Ext.getCmp('cta_bt4MenuWin').disable();
				Ext.getCmp('mh_btMenu4').disable();
				Ext.getCmp('cta_bt5MenuWin').disable();
				Ext.getCmp('mh_btMenu5').disable();
				Ext.getCmp('cta_bt6MenuWin').disable();
				Ext.getCmp('mh_btMenu6').disable();
				Ext.getCmp('cta_bt7MenuWin').disable();
				Ext.getCmp('mh_btMenu7').disable();
				Ext.getCmp('cta_bt8MenuWin').disable();
				Ext.getCmp('mh_btMenu8').disable();
				Ext.getCmp('cta_bt9MenuWin').disable();
				Ext.getCmp('mh_btMenu9').disable();
				Ext.getCmp('wp_btFoto').disable();
			}				
			Ext.EventManager.addListener(winPerfil.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC) winPerfil.close();
			});
			Ext.getCmp('per_dtnasc').setValue('');
		"));
	}
	
	public function getWindow(){
	  return $this->window;
	}	
}

class carregarEntidade extends TEvent{
	public function execute(){
		$arrayResult=array();
		$sql = mysql_query("select codigo,razao_social from entidade where razao_social!='' order by razao_social asc");
		while($res = mysql_fetch_array($sql)){
			$arrayRes['id']=$res['id'];
			$arrayRes['razao_social']=$res['razao_social'];
			array_push($arrayResult,$arrayRes);
		}
		if(count($arrayResult)>0){
			echo '{"totalCount":'.count($arrayResult).',"records":'.json_encode($arrayResult).'}';
		}else{
			echo "{success:false,msg:'There was an error loading the list of entities.'}";
		}
	}
}

class per_carregar extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
	  $sql = mysql_fetch_array(mysql_query("select * from perfil where usuario='$store->codigo'"));
		$entCod=$sql['entidade'];
		$ent = mysql_fetch_array(mysql_query("select razao_social from entidade where codigo='$entCod'"));
		$entNome=utf8_encode($ent['razao_social']);
		$sqlCod=$sql['codigo'];
		$sqlDtnasc=$sql["data_nascimento"];
		$sqlCpf=$sql["cpf"];
		$sqlRg=$sql["rg"];
		$sqlUfrg=$sql['uf_rg'];
		$sqlEstcivil=$sql["estado_civil"];
		$sqlGrauinstr=$sql["grau_instrucao"];
		$sqlNaturalidade=$sql["naturalidade"];
		$sqlSexo=$sql["sexo"];
		$sqlFumante=$sql["fumante"];
		$sqlPne=$sql["pne"];
		$sqlPnedescr=$sql["pne_descricao"];
		$sqlStatus=$sql["status"];
		$sqlMotivostatus=$sql["motivo_status"];
		$sqlDatacad=$sql["data_cadastro"];
		$sqlBanco=$sql["banco"];
		$sqlAg=$sql["agencia"];
		$sqlAgdv=$sql["agenciadv"];
		$sqlConta=$sql["conta"];
		$sqlContadv=$sql["contadv"];
		$sqlTpconta=$sql["tipo_conta"];
		if($sqlCpf!=""){
		  $sqlCpf=substr($sql["cpf"],0,3).".".substr($sql["cpf"],3,3).".".substr($sql["cpf"],6,3)."-".substr($sql["cpf"],7,2);
		}
		if($sql["banco"]==null){
		  $sql["banco"]="vazio";
		}
		if($sql["banco"]==""){
		  $sql["banco"]="vazio2";
		}
		$ret = '{success:true,data:{
		  per_codigo:"'.$sqlCod.'",
		  per_dtnasc:"';
		if($sqlDtnasc!=""){
			$ret .= dateToField($sqlDtnasc);
		}else{
		  $sqlDtnasc;	
		}			
		$ret .='",
		  per_cpf:"'.$sqlCpf.'",
		  per_rg:"'.$sqlRg.'",
		  per_ufrg:"'.$sqlUfrg.'",
		  per_estcivil:"'.$sqlEstcivil.'",
		  per_graduacao:"'.$sqlGrauinstr.'",
		  per_cidNatal:"'.$sqlNaturalidade.'",
		  per_sexo:"'.$sqlSexo.'",
		  per_fumante:"'.$sqlFumante.'",
		  per_necess:"'.$sqlPne.'",
		  per_necessDescr:"'.$sqlPnedescr.'",
		  per_dispo:"'.$sqlStatus.'",
		  per_motivo:"'.$sqlMotivostatus.'",
		  per_dataCad:"';
		if($sqlDatacad!=""){	
		  $ret .= dateToField($sqlDatacad);
		}else{
		  $ret .= date('d/m/Y');
		}
		$ret .= '",
		  per_entCodigo:"'.$entCod.'",
		  per_entidade:"'.$entNome.'",
		  per_codBanco:"'.$sqlBanco.'",
		  per_agencia:"'.$sqlAg.'",
		  per_agDv:"'.$sqlAgdv.'",
		  per_conta:"'.$sqlConta.'",
		  per_ctDv:"'.$sqlContadv.'",
		  per_tipoConta:"'.$sqlTpconta.'"
		}}';
		echo $ret;
	}
}

class per_salvar extends TEvent{
  public function execute(){
	  $store = json_decode($_SESSION['store']);
		$per_codigo=strtoupper($_REQUEST['per_codigo']);
		$per_dtnasc=fieldToDate($_REQUEST['per_dtnasc']);
		$per_cpf=str_replace(array(".","-"),array("",""),$_REQUEST['per_cpf']);
		$per_rg=$_REQUEST['per_rg'];
		$per_ufrg=strtoupper($_REQUEST['per_ufrg']);
		$per_estcivil=$_REQUEST['per_estcivil'];
		$per_graduacao=$_REQUEST['per_graduacao'];
		$per_cidNatal=$_REQUEST['per_cidNatal'];
		$per_sexo=$_REQUEST['per_sexo'];
		$per_fumante=$_REQUEST['per_fumante'];
		$per_necess=$_REQUEST['per_necess'];
		$per_necessDescr=strtoupper($_REQUEST['per_necessDescr']);
		$per_dispo=$_REQUEST['per_dispo'];
		$per_motivo=strtoupper($_REQUEST['per_motivo']);
		$per_dataCad=fieldToDate($_REQUEST['per_dataCad']);
		$per_entCodigo=$_REQUEST['per_entCodigo'];
		$per_entidade=$_REQUEST['per_entidade'];
		$per_codBanco=$_REQUEST['per_codBanco'];
		$per_agencia=$_REQUEST['per_agencia'];
		$per_agDv=$_REQUEST['per_agDv'];
		$per_conta=$_REQUEST['per_conta'];
		$per_ctDv=$_REQUEST['per_ctDv'];
		$per_tipoConta=$_REQUEST['per_tipoConta'];
		if($per_dataCad==""){
		  $per_dataCad=date('d/m/Y');
		}
		$verCpf = mysql_num_rows(mysql_query("select codigo from perfil where cpf='$per_cpf' and codigo!='$store->perfil'"));
		if($verCpf==0){
			$verifica = mysql_num_rows(mysql_query("select codigo from perfil where codigo='$per_codigo'")); 		
			if($verifica>0){ 
				$sql = mysql_query("update perfil set cpf='$per_cpf',data_nascimento='$per_dtnasc',estado_civil='$per_estcivil',grau_instrucao='$per_graduacao',fumante='$per_fumante',naturalidade='$per_cidNatal',rg='$per_rg',sexo='$per_sexo',uf_rg='$per_ufrg',usuario='$store->codigo',status='$per_dispo',motivo_status='$per_motivo',pne_descricao='$per_necessDescr',pne='$per_necess',data_cadastro='$per_dataCad',entidade='$per_entCodigo',banco='$per_codBanco',agencia='$per_agencia',conta='$per_conta',tipo_conta='$per_tipoConta',agenciadv='$per_agDv',contadv='$per_ctDv' where codigo='$per_codigo'");
				echo '{success:true,msg:"Record updated successfully!"}';
			}else{
				$sql = mysql_query("replace into perfil (codigo,cpf,data_nascimento,estado_civil,grau_instrucao,fumante,naturalidade,rg,sexo,uf_rg,usuario,status,motivo_status,pne_descricao,pne,data_cadastro,entidade,banco,agencia,conta,tipo_conta,agenciadv,contadv) values ('$per_codigo','$per_cpf','$per_dtnasc','$per_estcivil','$per_graduacao','$per_fumante','$per_cidNatal','$per_rg','$per_sexo','$per_ufrg','$store->codigo','$per_dispo','$per_motivo','$per_necessDescr','$per_necess','$per_dataCad','$per_entCodigo','$per_codBanco','$per_agencia','$per_conta','$per_tipoConta','$per_agDv','$per_ctDv')");
				$codPer = mysql_fetch_array(mysql_query("select codigo from perfil where usuario='$store->codigo'"));
				$_SESSION['perfil']=$codPer['codigo'];
				if($_SESSION['perfil']!=""){
					echo '{success:true,msg:"Record registered successfully!",perfil:"'.$_SESSION['perfil'].'"}';
				}else{
					echo '{failure:true,msg:"Write your CPF to save."}';
				}
			}
		}else{
		  echo '{failure:true,msg:"CPF already in use."}';
		}
	}
}
?>