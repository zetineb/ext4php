<?php
require("../../source/application.php");

try{
	class Event1 extends TEvent{
		public function execute(){
			echo "PHP Event OK -->".get_class($this->sender).", data:".$this->data;
		}
	}
	class Combobox2 extends TEvent{
		public function execute(){
			/*$fp = fopen('debug.txt', 'w');
			fwrite($fp, $this->data.'|'.$this->page.'|'.$this->start.'|'.$this->limit.'|'.$this->sort.'|'.$this->filter);
			fclose($fp);*/
			//
			$states = array(array(
					'abbr'=>'AL',
					'name'=>'Alabama',
					'pop'=>1000,
					'dtf'=>'2011/04/22'
				), array(
					'abbr'=>'AK',
					'name'=>'Alaska',
					'pop'=>2000,
					'dtf'=>'2011/05/11'
				), array(
					'abbr'=>'AZ',
					'name'=>'Arizona',
					'pop'=>3000,
					'dtf'=>'2011/06/13'
				)
			);
			
			//echo json_encode($states);
			echo '{"totalCount":30,"records":'.json_encode($states).'}';	//Default obj->totalProperty='totalCount', obj->root='records'; (obj=Combobox or Grid)
		}
	}
	class FormEvent extends TEvent{
		public function execute(){
			if (isset($_REQUEST['load'])){
				echo "{success:true,data:{email:'test@email'}}";
				
			}
			else{
				echo "{success:true,msg:'Form Event OK-->".$_REQUEST['email']."'}";
			}
		}
	}
	
	$lbl1=new TLabel(array(text=>'Label 1'));
	//$lbl1->text='Label 1';
//	$lbl1->margin='5 5 5 5';
	$xb1=new TCheckbox(array(
		boxLabel=>'Checkbox 1',
		name=>'topping',
		inputValue=>1
	));
	/*$xb1->boxLabel='Checkbox 1';
	$xb1->name='topping';
	$xb1->inputValue=1;*/
	$dt1=new TDate();
	$dt1->fieldLabel('Date')->disabledDays(array(0,6));
/*	$dt1->fieldLabel='Date';
	//$dt1->disabledDays='0,6'; //disable Sunday and Saturday
	$dt1->disabledDays=array(0,6);*/
	$dl1=new TDisplay();		
	$dl1->fieldLabel='Display label';
	$dl1->value='10';
	$cb1=new TCombobox(array(
		fieldLabel=>'Combo (local)',
		displayField=>'name',
		valueField=>'abbr',
		fields=>array('abbr','name'),
		data=>array(
			array('AL','Alabama'),
			array('AK','Alaska'),
			array('AZ','Arizona')
		)
	));
	/*$cb1->fieldLabel='Combo (local)';
	$cb1->displayField='name';
	$cb1->valueField='abbr';
	$cb1->fields->add(0,'abbr');
	$cb1->fields->add(1,'name');
	$cb1->data->add(0,array('AL','Alabama'));
	$cb1->data->add(1,array('AK','Alaska'));
	$cb1->data->add(2,array('AZ','Arizona'));*/
	$cb2=new TCombobox();
	$cb2->fieldLabel('Combo (remote)')->
		  displayField('name')->
		  valueField('abbr')->
		  fields(array('abbr','name'))->
		  eventName('combobox2')->
		  queryMode(TQueryModeType::$remote);
		  
/*	$cb2->fieldLabel='Combo (remote)';
	$cb2->displayField='name';
	$cb2->valueField='abbr';
	$cb2->fields->add(0,'abbr');
	$cb2->fields->add(1,'name');
	$cb2->eventName='combobox2';				//PHP event for this combo
	$cb2->queryMode=TQueryModeType::$remote;	//Get data from server
*/
	$ed1=new THtmlEditor();
	$ed1->height=80;
	$nu1=new TNumber();
	$nu1->fieldLabel='Number field';
	$nu1->width=200;
	$nu1->value=99;
	$nu1->maxValue=99;
	$nu1->minValue=0;
	$rd1=new TRadio();
	$rd1->name='color';
	$rd1->boxLabel='Blue';
	$rd1->inputValue='blue';
	$rd1->width=60;
	$rd2=new TRadio();
	$rd2->name='color';
	$rd2->boxLabel='Black';
	$rd2->inputValue='black';
	$rd2->checked=true;
	$cont3=new TContainer();
	$cont3->layout='hbox';
	$cont3->width=200;
	$cont3->height=30;
	$cont3->items->add('rd1',$rd1);
	$cont3->items->add('rd2',$rd2);
	$txt1=new TText();
	$txt1->name('email')->fieldLabel('Email Address')->width(300)->validateOnBlur(true)->validateOnChange(false)->validator('
		if (!value.length){ 
			Ext.Msg.alert("ERROR","Not Allow Blank");
			return (false);
		}
		else 
			return (true);
	');
/*	$txt1->name='email';
	$txt1->fieldLabel='Email Address';
	$txt1->width=300;
	//$txt1->allowBlank=false;
	$txt1->validateOnBlur=true;
	$txt1->validateOnChange=false;
	$txt1->validator='if (!value.length){ 
			Ext.Msg.alert("ERROR","Not Allow Blank");
			return (false);
		}
		else 
			return (true);';*/
	$txa1=new TTextArea();
	$txa1->width=300;
	$txa1->height=50;
	$txa1->value='Text Area';
	$tm1=new TTime();
	$tm1->fieldLabel='Time In';
	$tm1->minValue='6:00 AM';
	$tm1->maxValue='8:00 PM';
	$tm1->increment=30;
	//$cont1=new TContainer();
	$cont1=new TFieldSet();
	$cont1->title='Fieldset';
	$cont1->padding='10 10 10 10';
	$cont1->layout='vbox';
	//$cont1->width=400;
	$cont1->height=500;
	$cont1->items->add('lbl1',$lbl1);
	$cont1->items->add('xb1',$xb1);
	$cont1->items->add('dt1',$dt1);
	$cont1->items->add('dl1',$dl1);
	$cont1->items->add('cb1',$cb1);
	$cont1->items->add('cb2',$cb2);
	$cont1->items->add('ed1',$ed1);
	$cont1->items->add('nu1',$nu1);
	$cont1->items->add('cont3',$cont3);
	$cont1->items->add('txt1',$txt1);
	$cont1->items->add('txa1',$txa1);
	$cont1->items->add('tm1',$tm1);

	$panel1=new TPanel();
	$panel1->title="Panel 1";
	$panel1->layout='fit';
	$panel1->closable=true;
	//
	$tool1=new TTools();
	$tool1->type=TToolsType::$print;
	$tool1->handler='Ext.Msg.alert("INFO","Tool print");';
	//
	$panel1->tools->add('print',$tool1);
	$panel1->items->add('cont1',$cont1);

	$file1=new TFile();
	$file1->name='photo';
	$file1->fieldLabel='Photo';
	$file1->labelWidth=50;
	$file1->msgTarget='side';
	$file1->allowBlank=false;
	$file1->anchor='100%';
	$file1->buttonText='Select Photo...';

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
	$form1=new TForm();
	$form1->frame=true;
	$form1->width='400';
	$form1->height=90;
	$form1->items->add('file1',$file1);
	$form1->buttons->add('btn2',$btn2);

	$col1=new TColumn();
	$col1->header='State';
	$col1->dataIndex='abbr';
	$col2=new TColumn();
	$col2->header='Name';
	$col2->dataIndex='name';
	
	$col3=new TColumnNumber();
	$col3->header='Pop';
	$col3->dataIndex='pop';
	$col3->format='0,000';
	
	$col4=new TColumnDate();
	$col4->header='Date';
	$col4->dataIndex='dtf';
	$col4->format='Y-m-d';
	$col4->flex=1;	
	
	$bdel=new TButton();
	$bdel->icon='images/buttons/delete.png';
	$bdel->handler='Ext.Msg.alert("INFO","Delete "+grid.getStore().getAt(rowIndex).get("name"));';  //handler receives params grid,rowIndex,colIndex
	
	$col5=new TColumnAction();
	$col5->width=40;
	$col5->items->add('bdel',$bdel);
	
	$grid=new TGrid(array(
		columns=>array($col1,$col2,$col3,$col4,$col5)
	));
	$grid->height=200;
	$grid->width='100%';
	$grid->title='Grid Test';
/*	$grid->fields->add(0,'abbr');
	$grid->fields->add(1,'name');
	$grid->fields->add(2,'pop');
	$grid->fields->add(3,'dtf');

	$grid->data->add(0,array('AL','Alabama'));
	$grid->data->add(1,array('AK','Alaska'));
	$grid->data->add(2,array('AZ','Arizona'));*/
	
/*	$grid->columns->add('col1',$col1);
	$grid->columns->add('col2',$col2);
	$grid->columns->add('col3',$col3);
	$grid->columns->add('col4',$col4);
	$grid->columns->add('col5',$col5);*/
	//
	$grid->autoLoad=false;
	$grid->eventName='combobox2';				//PHP event for this combo
	$grid->queryMode=TQueryModeType::$remote;	//Get data from server

	$btn3=new TButton();
	$btn3->text='Submit';
	$btn3->handler="
            var form = Ext.getCmp('form2').getForm();
            if (form.isValid()) {
                form.submit({
                    success: function(form, action) {
                       Ext.Msg.alert('Success', action.result.msg);
                    },
                    failure: function(form, action) {
                        Ext.Msg.alert('Failed', action.result.msg);
                    }
                });
            }
	";	
	$btn4=new TButton();
	$btn4->text='Load';
	$btn4->handler=array(
		"var form = Ext.getCmp('form2').getForm();",
		"form.load({url:window.location,params:{event:'formEvent',load:1},waitMsg: 'Loading'});",  //IE requires url
	);
	$form2=new TForm();
	$form2->eventName='formEvent';
	$form2->frame=true;
	$form2->width='100%';
	$form2->height=200;
	$form2->items->add('txtf1',$txt1);
	$form2->buttons->add('btn3',$btn3);
	$form2->buttons->add('btn4',$btn4);
	
	$view =new TView();
	$view->fields->add(0,'url');
	$view->fields->add(1,'name');
	$view->fields->add(2,'shortName');
	$view->data->add(0,array('images/emotes/face-angel.png','face-angel','angel'));
	$view->data->add(1,array('images/emotes/face-embarrassed.png','face-embarrassed','embarrassed'));
	$view->data->add(2,array('images/emotes/face-kiss.png','face-kiss','kiss'));
	$view->data->add(3,array('images/emotes/face-laugh.png','face-laugh','laugh'));
	$view->data->add(4,array('images/emotes/face-raspberry.png','face-raspberry','raspberry'));
	$view->tpl=array(
                '<tpl for=".">',
                    '<div class="thumb-wrap" id="{name}">',
                    '<div class="thumb"><img src="{url}" title="{name}"></div>',
                    '<span class="x-editable">{shortName}</span></div>',
                '</tpl>',
                '<div class="x-clear"></div>'
	);
	$view->itemSelector='div.thumb-wrap';
	$view->emptyText='No images available';
	
	$tab1=new TTab();
	$tab1->title='Components';
	$tab1->items->add('cont1',$cont1);
	$tab2=new TTab();
	$tab2->title='Upload';
	$tab2->items->add('formUp',$form1);
	$tab3=new TTab();
	//$tab3->listeners->add('activate','if (!Ext.getCmp("grid").getStore().getCount()) Ext.Msg.alert("Information","Load data from menu Tools")');
	$tab3->onActivate('if (!Ext.getCmp("grid").getStore().getCount()) Ext.Msg.alert("Information","Load data from menu Tools")');
	$tab3->title='Grid';
	$tab3->items->add('grid',$grid);	//->add(id,obj)
	$tab4=new TTab();
	$tab4->title='Form';
	$tab4->items->add('form2',$form2);
	$tab5=new TTab();
	$tab5->title='View';
	$tab5->items->add('view',$view);
	$tabpanel1=new TTabPanel();
	$tabpanel1->items->add('tab1',$tab1);
	$tabpanel1->items->add('tab2',$tab2);
	$tabpanel1->items->add('tab3',$tab3);
	$tabpanel1->items->add('tab4',$tab4);
	$tabpanel1->items->add('tab5',$tab5);
	
	$w1=new TWindow(array(
		layout=>'fit',
		title=>'First window',
		width=>700,
		height=>550,
		tools=>$tool1,		//or array
		items=>$tabpanel1	//or array
	));
	$w1->onBeforeHide('Ext.Msg.alert("Information","window beforehide");');
	
	/*$w1->layout='fit';
	$w1->title='First window';
	$w1->width=700;
	$w1->height=550;
	$w1->tools->add('print',$tool1);
	//$w1->listeners->add('beforehide','Ext.Msg.alert("Information","window beforehide");');
	$w1->onBeforeHide('Ext.Msg.alert("Information","window beforehide");');
	//$w1->items->add('panel1',$panel1);
	$w1->items->add('tabpanel1',$tabpanel1);*/
	
	$app=new TApplication();
	$app->extVersion='ext-4.0.2a';
	$app->cls='xbody';
	$app->headers->add('utils','<script type="text/javascript" src="js/utils.js"></script>');
	$app->headers->add('app-style','<link rel="stylesheet" type="text/css" href="css/app.css"/>');
	//Only TApplication---------------------------------------------------------------------------
	$app->onWindowBeforeUnload('','Quit my App'); //Javascript code, Quit Message
	//$app->onWindowResize('alert("WindowResize");'); //Javascript code
	//$app->onDocumentReady('alert("DocumentReady");'); //Javascript code
	//--------------------------------------------------------------------------------------------
	//
	$app->onAfterRender(array('Ext.Msg.alert("Information","application afterrender",',
		'function(){',
			'_APP.send({',
				'event:"event1",',
				'data:"uala",',
				'handler:function(_r){alert(_r);win1.show();}',
			'});',
		'});'));
	$app->events->add('event1',new Event1());  //PHP event
	$app->events->add('combobox2',new Combobox2()); //Return data for combobox
	$app->events->add('formEvent',new FormEvent());
	$app->windows->add('win1',$w1);
	$it1=new TMenuItem();
	$it1->iconCls='badd';
	$it1->iconAlign='left';
	$it1->text='Load Grid Store';
	//$it1->listeners->add('click',
	$it1->onClick("var operation = new Ext.data.Operation({
		action: 'read',
		page  : 1,
		sorters: [
				new Ext.util.Sorter({
					property : 'name',
					direction: 'ASC'
				})
		],
		filters: [
			new Ext.util.Filter({
				property: 'eyeColor',
				value   : 'brown'
			})
		]
	});	
	if (Ext.getCmp('grid')){
		Ext.getCmp('grid').getStore().load(operation);
		Ext.getCmp('paging_grid').doRefresh();	//Name of pagingtoolbar is 'paging_' + 'grid id'
		Ext.Msg.alert('INFO','Send proxy operation to server');
	}
	else
		Ext.Msg.alert('INFO','Not available here');
	");
	$it2=new TMenuSeparator();
	$it3=new TMenuItem();
	$it3->text='Item 3';
	$it3->menu->add('it31',$it1);
	$it4=new TMenuCheckItem();
	$it4->text='select specific';
	$it4->listeners->add('checkchange','Ext.Msg.alert("INFO",(checked)?"true":"false");');
	$btn1=new TButton(array(
		iconCls=>'btools',
		iconAlign=>'left',
		scale=>'small',
		text=>'Tools',
		width=>80,
		menu=>array($it1,$it2,$it3,$it4)
	));
	/*$btn1->iconCls='btools';
	$btn1->iconAlign='left';
	$btn1->scale='small';
	$btn1->text='Tools';
	$btn1->width=80;
	$btn1->menu->add('it1',$it1);
	$btn1->menu->add('it2',$it2);
	$btn1->menu->add('it3',$it3);
	$btn1->menu->add('it4',$it4);*/
	$w1->bbar->add('btnbb1',$btn1);
	$w1->bbar->add('tbsep',new TToolbarSeparator());
	$tbtxt1=new TToolbarText();
	//$tbtxt1->text='tbtext';
	$tbtxt1->html='<b>tbtext</b>';
	$w1->bbar->add('tbtxt1',$tbtxt1);
/*	$w1->lbar->add('btnlb1',$btn1);
	$w1->rbar->add('btnrb1',$btn1);
	$w1->tbar->add('btntb1',$btn1);*/
	$cont2=new TContainer(array(
		layout=>'absolute',
		baseCls=>'xtaskbar',
		width=>'100%',
		height=>23,
		items=>array($btn1)
	));
	/*$cont2->layout='absolute';
	$cont2->baseCls='xtaskbar';
	$cont2->width='100%';
	$cont2->height=23;
	$cont2->items->add('btn1',$btn1);*/
	$app->items->add('cont2',$cont2);
	$app->show();
}
catch(Exception $e){
	echo $e->getMessage();
}
?>