<?php
require_once "menuWindow.php"; 
require_once "menuTools.php"; 

class winDadosConta { 
	private $form;
	private $container; 		
	private $contL1;
	private $contL2;				
	public $window;
	
	private function TCodigoEmail(){	
		$obj=new THidden(array(
			name=>'cta_codigoEmail',
		));
		return $obj;
	}
	
	private function TCodigo(){	
		$obj=new TText(array(
			name=>'cta_codigo',
			fieldLabel=>'Code',
			padding=>'0 0 5 0',
			width=>300,
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}	
	
	private function TNome(){	
		$obj=new TText(array(
			name=>'cta_nome',
			fieldLabel=>'Name',
			padding=>'0 0 5 0',
			width=>300,
			readOnly=>true,
			validateOnBlur=>false,
			validateOnChange=>false
		));
		return $obj;
	}
	
	private function TEmail(){	
		$obj=new TText(array(
			name=>'cta_email',
			fieldLabel=>'Email',
			padding=>'0 0 5 0',
			width=>300,
			value=>'',
			validateOnBlur=>true,
			validateOnChange=>false,
			validator=>'	
			if (value.length>0){ 
				var emailStr = value;
				var emailReg1 = /(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/;
				var emailReg2 = /^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,6}|[0-9]{1,3})(\]?)$/; 
				if (!(!emailReg1.test(emailStr) && emailReg2.test(emailStr))) {
					Ext.Msg.alert("ERROR","Write a email!");
					return false;
				}else{
					return (true);
				}
			}else{
			  return (true);
			}',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('cta_senha').focus();
		");
		return $obj;
	}

	private function TFrase(){	
		$obj=new TTextarea(array(
			name=>'cta_frase',
			fieldLabel=>'Phrase',
			margin=>'0 0 3 0',
			width=>300,
			height=>85,
			validateOnBlur=>true,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		return $obj;
	}
	
	private function TLogin(){	
		$obj=new TText(array(
			name=>'cta_login',
			fieldLabel=>'User',
			padding=>'0 0 5 0',
			width=>300,
			validateOnBlur=>true,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('cta_frase').focus();
		");
		return $obj;
	}
	
	private function TSenha(){
		$obj=new TText(array(
			name=>'cta_senha',
			fieldLabel=>'Password',
			padding=>'0 0 5 0',
			inputType=>'password',
			width=>300,
			validateOnBlur=>true,
			validateOnChange=>false,
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('cta_confirmar').focus();
		");
		return $obj;
	}
	
	private function TConfirmar(){
		$obj=new TText(array(
			name=>'cta_confirmar',
			fieldLabel=>'Confirm Password',
			padding=>'0 0 5 0',
			inputType=>'password',
			width=>300,
			validateOnBlur=>true,
			validateOnChange=>false,
			validator=>"if (value!=Ext.getCmp('cta_senha').getValue()){ 
				Ext.Msg.alert('ERRO','A senha e a confirmação não conferem.');
				return (false);
			}
			else 
				return (true);",
			enableKeyEvents=>true
		));	
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('cta_btSalvar').focus();
		");
		return $obj;
	}
	
	private function btSalvar(){
		$obj=new TButton(array(
			iconCls=>'bsave',
			iconAlign=>'left',
			scale=>'small',
			text=>'Save',
			width=>65,
			handler=>"
				var form = Ext.getCmp('formDConta').getForm();
				if (form.isValid()){
					form.submit({
						success: function(form, action) {
							_store.nome=action.result.nome;
							Ext.Msg.alert('Success', action.result.msg,function(){
							  form.load({url:window.location,params:{event:'cta_carregar',load:1},waitMsg: 'Loading'});
							});	
							if(_store.nome!=''){
								Ext.getCmp('cta_bt2MenuWin').enable();
								Ext.getCmp('mh_btMenu2').enable();
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
			var form = Ext.getCmp('formDConta').getForm();
			form.load({url:window.location,params:{event:'cta_carregar',load:1},waitMsg: 'Loading'});
			"
		));	
		return $obj;
	}	
	
  public function __construct(){
		
		$toolsWindow = new menuTools();
		
		$this->contL1 = new TContainer(array(				
			layout=>'vbox',
			height=>350
		));					
		$this->contL1->items->add('cta_codigo',$this->TCodigo());
		$this->contL1->items->add('cta_nome',$this->TNome());
		$this->contL1->items->add('cta_login',$this->TLogin());
		$this->contL1->items->add('cta_frase',$this->TFrase());
		$this->contL1->items->add('cta_codigoEmail',$this->TCodigoEmail());
		$this->contL1->items->add('cta_email',$this->TEmail());
		$this->contL1->items->add('cta_senha',$this->TSenha());
		$this->contL1->items->add('cta_confirmar',$this->TConfirmar());
		
		$this->form=new TForm(array(
			frame=>true,
			width=>'100%',
			height=>400,
			eventName=>'cta_salvar',
			autoLoad=>true,
			items=>array($this->contL1)				
		));
		
		$this->cont=new TContainer(array(				
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>400
		));		
		$this->cont->items->add('formDConta',$this->form);
		
		
		$this->window=new TWindow(array(
			layout=>'fit',
			title=>'Account',
			width=>335,
			height=>350,
			resizable=>false,
			items=>array($this->cont),
			tools=>array($toolsWindow->btPrint())				
		));	
		$btWindow = new menuWindow($this->window,'cta');
		$this->window->bbar->add('wcta_btFill',new TToolbarFill());		
		$this->window->bbar->add('wcta_btSalvar',$this->btSalvar());		
		$this->window->bbar->add('wcta_btCancel',$this->btCancel());			
		$this->window->onBeforeShow(array("
			var form = Ext.getCmp('formDConta').getForm();
			form.load({url:window.location,params:{event:'cta_carregar',load:1},waitMsg: 'Loading'});
			setTimeout(function () {
				for(var _i=0;_i<_windows.length;_i++){
				var _win = _windows[_i].toString();
				if(_win.toString()!='winDadosConta')				
					var _o=eval(Ext.getCmp(_win));
					if(typeof(_o)!='undefined')
					  _o.close();
			  }
			},300);		
		"));		
		$this->window->onAfterRender(array("
			if(_store.perfil==''){
				Ext.getCmp('cta_nome').setReadOnly(false);
				Ext.getCmp('cta_bt2MenuWin').disable();
				Ext.getCmp('mh_btMenu2').disable();
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
		
			Ext.EventManager.addListener(winDadosConta.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC) winDadosConta.close();
			});
		"));
	}
	
	public function getWindow(){
		return $this->window;
	}
}

class cta_carregar extends TEvent{
	private $cta_login='';
	private $cta_senha='';
	public function execute(){
	  $store = json_decode($_SESSION['store']);
	  $res = mysql_fetch_array(mysql_query("select a.codigo, a.nome, a.login, a.frase, a.email as codemail, a.login, a.senha, b.email as email from usuario a left join custom_email b on (a.email=b.codigo) where a.codigo='$_SESSION[codigo]'"));
		if(isset($_REQUEST['cta_login'])) $this->cta_login=$_REQUEST['cta_login'];
		if(isset($_REQUEST['cta_senha'])) $this->cta_senha=$_REQUEST['cta_senha'];
		echo '{success:true,data:{cta_codigo:"'.utf8_decode($res['codigo']).'",
			cta_nome:"'.utf8_decode($res['nome']).'",
			cta_login:"'.utf8_decode($res['login']).'",
			cta_frase:"'.removeWhiteLine(utf8_decode($res['frase'])).'",
			cta_codigoEmail:"'.utf8_decode($res['codemail']).'",
			cta_email:"'.utf8_decode($res['email']).'",
			cta_senha:"'.utf8_decode($res['senha']).'",
			cta_confirmar:"'.utf8_decode($res['senha']).'"}}
		';	
	}
}

class cta_salvar extends TEvent{
	public function execute(){
		$codigo=$_REQUEST['cta_codigo'];
		$store = json_decode($_SESSION['store']);
		$nome=strtoupper(utf8_encode($_REQUEST['cta_nome']));
		$login=strtoupper(utf8_encode($_REQUEST['cta_login']));
		$frase=strtoupper(utf8_encode($_REQUEST['cta_frase']));
		$frase=removeWhiteLine($frase);
		$codigoEmail=$_REQUEST['cta_codigoEmail'];
		$email=strtoupper(utf8_encode($_REQUEST['cta_email']));
		$senha=strtoupper(utf8_encode($_REQUEST['cta_senha']));		
		if($codigoEmail==0){
		  mysql_query("insert into custom_email values ('','$email',1,'')");
			$res=mysql_fetch_array(mysql_query("select codigo from custom_email order by codigo desc limit 1"));
			$codigoEmail=$res['codigo'];
		  mysql_query("update usuario set email='$codigoEmail' where codigo='$_SESSION[codigo]'");
		}
				$verify = mysql_query("select codigo from usuario where login='$login' and codigo!='$codigo'");
		if(mysql_num_rows($verify)>=1){
			echo '{success:false,msg:"User already exists."}';	
		}else{
			$sql = mysql_query("update usuario set nome='$nome', login='$login', frase='$frase',senha='$senha' where codigo='$codigo'");
			$sql2 = mysql_query("update custom_email set email='$email' where codigo='$codigoEmail'");
			$_SESSION['nome']=$nome;
			echo '{success:true,msg:"Register updated successfully!",nome:"'.$_SESSION['nome'].'"}';						
		}
	}
}
?>