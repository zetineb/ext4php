<?php
class FormUpload{
	private $form;
	
	private function file(){
		$file1=new TFile();
		$file1->name='photo';
		$file1->fieldLabel='Photo';
		$file1->labelWidth=50;
		$file1->msgTarget='side';
		$file1->allowBlank=false;
		$file1->anchor='100%';
		$file1->buttonText='Select Photo...';
		
		return ($file1); 
	}
	
	private function button(){
		$btn2=new TButton();
		$btn2->text='Upload';
		$btn2->handler=array(
				"var form = Ext.getCmp('formUp').getForm();",
				"if(form.isValid()){",
					"form.submit({",
						"url: 'photo-upload.php',",
						"waitMsg: 'Uploading your photo...',",
						"success: function(fp, o) {",
							"Ext.Msg.alert('Success', 'Your photo \"' + o.result.file + '\" has been uploaded.');",
						"}",
					"});",
				"}");
		return ($btn2);
	}
	
	public function __construct(){
		$this->form=new TForm();
		$this->form->frame=true;
		$this->form->width='400';
		$this->form->height=90;
		$this->form->items->add('file1',$this->file());
		$this->form->buttons->add('btn2',$this->button());
	}
	
	public function getForm(){
		return ($this->form);
	}
}
?>