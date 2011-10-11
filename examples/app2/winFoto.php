<?php
require_once "menuTools.php"; 

class winFoto { 
	private $form;
	private $container; 		
	private $contL1;
	private $contL2;				
	public $window;

	private function file(){
		$obj=new TFile(array(
			name=>'photo',
			labelWidth=>40,
			width=>400,
			fieldLabel=>'Foto',
			msgTarget=>'side',
			allowBlank=>false,
			anchor=>'100%',
			buttonText=>'Select a photo...'
		));		
		return $obj; 
	}
	
	private function path(){
		$obj=new THidden(array(
		  name=>'path',
			value=>'uploads/'
		));
		return $obj; 
	}
	
	private function button(){
		$obj=new TButton(array(
			text=>'Upload',
			iconCls=>'bupload',
			handler=>array("
				var form = Ext.getCmp('formFoto').getForm();
				if(form.isValid()){
					form.submit({
						url: 'photo-upload.php',
						waitMsg: 'Uploading your photo...',
						success: function(fp, o) {
							_APP.send({event:\"fot_salvar\",data:o.result.file,handler:function(_r){
							    Ext.Msg.alert('Success', 'Your photo \"' + o.result.file + '\" was sent successfully!.',function(){
									  fotoPerfil.setSrc('uploads/'+o.result.file);
									  winFoto.close();
										winPerfil.show();
									});
								}
							});
						},
						failure: function(fp,o){
							Ext.Msg.alert('Failure', 'Your photo \"' + o.result.file + '\"can not be sent.');
						}
					});
				}
			")		
		));
		return $obj;
	}
		
	private function TButtonBack(){
	  $obj = new TButton(array(
		  text=>"Back",
			margin=>'2 0 0 2',
			width=>65,
			iconCls=>'bback',
			iconAlign=>'left',
			handler=>"
				winFoto.close();
			  winPerfil.show();
			"
		));
		return $obj;
	}		
	
  public function __construct(){		
		$toolsWindow = new menuTools();
		
		$this->form=new TForm(array(
		  frame=>true,
			width=>'100%',
			height=>90,
			autoLoad=>false			
		));
		$this->form->items->add('fot_file1',$this->file());
		$this->form->items->add('fot_path',$this->path());
		$this->form->buttons->add('fot_btn2',$this->button());
		
		$this->cont=new TContainer(array(				
			padding=>'10 10 10 10',
			layout=>'vbox',
			height=>120
		));		
		$this->cont->items->add('formFoto',$this->form);
		
		
		$this->window=new TWindow(array(
			layout=>'fit',
			title=>'Send Photo',
			width=>400,
			height=>150,
			resizable=>false,
			items=>array($this->cont),
			tools=>array($toolsWindow->btPrint())				
		));	
		$this->window->bbar->add('wfot_btFill',new TToolbarFill());			
		$this->window->bbar->add('wfot_btCancel',$this->TButtonBack());			
		$this->window->onBeforeShow(array("
			setTimeout(function () {
				for(var _i=0;_i<_windows.length;_i++){
				var _win = _windows[_i].toString();
				if(_win.toString()!='winFoto')				
					var _o=eval(Ext.getCmp(_win));
					if(typeof(_o)!='undefined')
					  _o.close();
			  }
			},300);	
		"));		
		$this->window->onAfterRender(array("
			Ext.EventManager.addListener(winFoto.getEl().id,'keypress',function(eventObj){
				if (eventObj.getKey()==eventObj.ESC) winFoto.close();
			});
		"));
	}
	
	public function getWindow(){
		return $this->window;
	}
}

class fot_salvar extends TEvent{
	public function execute(){
		$store = json_decode($_SESSION['store']);
		$sql = mysql_query("update perfil set foto='$this->data' where codigo='$store->perfil'");
		echo '{success:true}';
	}
}
?>