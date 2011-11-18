<?php
require("../../source/application.php");
include ("formupl.php");

try{
	class Event1 extends TEvent{
		public function execute(){
			echo "PHP Event OK -->".get_class($this->sender).", data:".$this->data;
		}
	}
	class Combobox2 extends TEvent{
		public function execute(){
			/*$fp = fopen('debug.txt', 'w');
			//GRID|1|0|25|[{"property":"name","direction":"ASC"}]|[{"property":"eyeColor","value":"brown"}]
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
	class ChartEvent extends TEvent{
		public function execute(){
			$data=array(
				array('month'=>'May 2011','payments'=>4824.43),
				array('month'=>'June 2011','payments'=>9631.88),
				array('month'=>'July 2011','payments'=>28373.89),
				array('month'=>'August 2011','payments'=>24072.13),
				array('month'=>'September 2011','payments'=>33475.55)
			);
			//
			echo json_encode($data);
		}
	}
	class TreeEvent extends TEvent{
		public function execute(){
			if ($this->filter){			//To kill bug ExtJS tree
				$_data="{'text':'.','children': [
					{
						task:'Project: Shopping',
						duration:13.25,
						user:'Tommy Maintz',
						iconCls:'task-folder',
						expanded: true,
						children:[{
							task:'Housewares',
							duration:1.25,
							user:'Tommy Maintz',
							iconCls:'task-folder',
							children:[{
								task:'Kitchen supplies',
								duration:0.25,
								user:'Tommy Maintz',
								leaf:true,
								iconCls:'task'
							},{
								task:'Groceries',
								duration:.4,
								user:'Tommy Maintz',
								leaf:true,
								iconCls:'task'
							},{
								task:'Cleaning supplies',
								duration:.4,
								user:'Tommy Maintz',
								leaf:true,
								iconCls:'task'
							},{
								task: 'Office supplies',
								duration: .2,
								user: 'Tommy Maintz',
								leaf: true,
								iconCls: 'task'
							}]
						}, {
							task:'Remodeling',
							duration:12,
							user:'Tommy Maintz',
							iconCls:'task-folder',
							expanded: true,
							children:[{
								task:'Retile kitchen',
								duration:6.5,
								user:'Tommy Maintz',
								leaf:true,
								iconCls:'task'
							},{
								task:'Paint bedroom',
								duration: 2.75,
								user:'Tommy Maintz',
								iconCls:'task-folder',
								children: [{
									task: 'Ceiling',
									duration: 1.25,
									user: 'Tommy Maintz',
									iconCls: 'task',
									leaf: true
								}, {
									task: 'Walls',
									duration: 1.5,
									user: 'Tommy Maintz',
									iconCls: 'task',
									leaf: true
								}]
							},{
								task:'Decorate living room',
								duration:2.75,
								user:'Tommy Maintz',
								leaf:true,
								iconCls:'task'
							},{
								task: 'Fix lights',
								duration: .75,
								user: 'Tommy Maintz',
								leaf: true,
								iconCls: 'task'
							}, {
								task: 'Reattach screen door',
								duration: 2,
								user: 'Tommy Maintz',
								leaf: true,
								iconCls: 'task'
							}]
						}]
					},{
						task:'Project: Testing',
						duration:2,
						user:'Core Team',
						iconCls:'task-folder',
						children:[{
							task: 'Mac OSX',
							duration: 0.75,
							user: 'Tommy Maintz',
							iconCls: 'task-folder',
							children: [{
								task: 'FireFox',
								duration: 0.25,
								user: 'Tommy Maintz',
								iconCls: 'task',
								leaf: true
							}, {
								task: 'Safari',
								duration: 0.25,
								user: 'Tommy Maintz',
								iconCls: 'task',
								leaf: true
							}, {
								task: 'Chrome',
								duration: 0.25,
								user: 'Tommy Maintz',
								iconCls: 'task',
								leaf: true
							}]
						},{
							task: 'Windows',
							duration: 3.75,
							user: 'Darrell Meyer',
							iconCls: 'task-folder',
							children: [{
								task: 'FireFox',
								duration: 0.25,
								user: 'Darrell Meyer',
								iconCls: 'task',
								leaf: true
							}, {
								task: 'Safari',
								duration: 0.25,
								user: 'Darrell Meyer',
								iconCls: 'task',
								leaf: true
							}, {
								task: 'Chrome',
								duration: 0.25,
								user: 'Darrell Meyer',
								iconCls: 'task',
								leaf: true
							},{
								task: 'Internet Exploder',
								duration: 3,
								user: 'Darrell Meyer',
								iconCls: 'task',
								leaf: true
							}]
						},{
							task: 'Linux',
							duration: 0.5,
							user: 'Aaron Conran',
							iconCls: 'task-folder',
							children: [{
								task: 'FireFox',
								duration: 0.25,
								user: 'Aaron Conran',
								iconCls: 'task',
								leaf: true
							}, {
								task: 'Chrome',
								duration: 0.25,
								user: 'Aaron Conran',
								iconCls: 'task',
								leaf: true
							}]
						}]
					}
				]}";
				echo $_data;
			}
		}
	}
	class GroupingEvent extends TEvent{
		public function execute(){
			echo "[
				{
					name: 'Cheesecake Factory',
					cuisine: 'American'
				},{
					name: 'University Cafe',
					cuisine: 'American'
				},{
					name: 'Slider Bar',
					cuisine: 'American'
				},{
					name: 'Shokolaat',
					cuisine: 'American'
				},{
					name: 'Gordon Biersch',
					cuisine: 'American'
				},{
					name: 'Crepevine',
					cuisine: 'American'
				},{
					name: 'Creamery',
					cuisine: 'American'
				},{
					name: 'Old Pro',
					cuisine: 'American'
				},{
					name: 'Nola\'s',
					cuisine: 'Cajun'
				},{
					name: 'House of Bagels',
					cuisine: 'Bagels'
				},{
					name: 'The Prolific Oven',
					cuisine: 'Sandwiches'
				},{
					name: 'La Strada',
					cuisine: 'Italian'
				},{
					name: 'Buca di Beppo',
					cuisine: 'Italian'
				},{
					name: 'Pasta?',
					cuisine: 'Italian'
				},{
					name: 'Madame Tam',
					cuisine: 'Asian'
				},{
					name: 'Sprout Cafe',
					cuisine: 'Salad'
				},{
					name: 'Pluto\'s',
					cuisine: 'Salad'
				},{
					name: 'Junoon',
					cuisine: 'Indian'
				},{
					name: 'Bistro Maxine',
					cuisine: 'French'
				},{
					name: 'Three Seasons',
					cuisine: 'Vietnamese'
				},{
					name: 'Sancho\'s Taquira',
					cuisine: 'Mexican'
				},{
					name: 'Reposado',
					cuisine: 'Mexican'
				},{
					name: 'Siam Royal',
					cuisine: 'Thai'
				},{
					name: 'Krung Siam',
					cuisine: 'Thai'
				},{
					name: 'Thaiphoon',
					cuisine: 'Thai'
				},{
					name: 'Tamarine',
					cuisine: 'Vietnamese'
				},{
					name: 'Joya',
					cuisine: 'Tapas'
				},{
					name: 'Jing Jing',
					cuisine: 'Chinese'
				},{
					name: 'Patxi\'s Pizza',
					cuisine: 'Pizza'
				},{
					name: 'Evvia Estiatorio',
					cuisine: 'Mediterranean'
				},{
					name: 'Cafe 220',
					cuisine: 'Mediterranean'
				},{
					name: 'Cafe Renaissance',
					cuisine: 'Mediterranean'
				},{
					name: 'Kan Zeman',
					cuisine: 'Mediterranean'
				},{
					name: 'Gyros-Gyros',
					cuisine: 'Mediterranean'
				},{
					name: 'Mango Caribbean Cafe',
					cuisine: 'Caribbean'
				},{
					name: 'Coconuts Caribbean Restaurant &amp; Bar',
					cuisine: 'Caribbean'
				},{
					name: 'Rose &amp; Crown',
					cuisine: 'English'
				},{
					name: 'Baklava',
					cuisine: 'Mediterranean'
				},{
					name: 'Mandarin Gourmet',
					cuisine: 'Chinese'
				},{
					name: 'Bangkok Cuisine',
					cuisine: 'Thai'
				},{
					name: 'Darbar Indian Cuisine',
					cuisine: 'Indian'
				},{
					name: 'Mantra',
					cuisine: 'Indian'
				},{
					name: 'Janta',
					cuisine: 'Indian'
				},{
					name: 'Hyderabad House',
					cuisine: 'Indian'
				},{
					name: 'Starbucks',
					cuisine: 'Coffee'
				},{
					name: 'Peet\'s Coffee',
					cuisine: 'Coffee'
				},{
					name: 'Coupa Cafe',
					cuisine: 'Coffee'
				},{
					name: 'Lytton Coffee Company',
					cuisine: 'Coffee'
				},{
					name: 'Il Fornaio',
					cuisine: 'Italian'
				},{
					name: 'Lavanda',
					cuisine: 'Mediterranean'
				},{
					name: 'MacArthur Park',
					cuisine: 'American'
				},{
					name: 'St Michael\'s Alley',
					cuisine: 'Californian'
				},{
					name: 'Cafe Renzo',
					cuisine: 'Italian'
				},{
					name: 'Osteria',
					cuisine: 'Italian'
				},{
					name: 'Vero',
					cuisine: 'Italian'
				},{
					name: 'Cafe Renzo',
					cuisine: 'Italian'
				},{
					name: 'Miyake',
					cuisine: 'Sushi'
				},{
					name: 'Sushi Tomo',
					cuisine: 'Sushi'
				},{
					name: 'Kanpai',
					cuisine: 'Sushi'
				},{
					name: 'Pizza My Heart',
					cuisine: 'Pizza'
				},{
					name: 'New York Pizza',
					cuisine: 'Pizza'
				},{
					name: 'California Pizza Kitchen',
					cuisine: 'Pizza'
				},{
					name: 'Round Table',
					cuisine: 'Pizza'
				},{
					name: 'Loving Hut',
					cuisine: 'Vegan'
				},{
					name: 'Garden Fresh',
					cuisine: 'Vegan'
				},{
					name: 'Cafe Epi',
					cuisine: 'French'
				},{
					name: 'Tai Pan',
					cuisine: 'Chinese'
				}
			]";
		}
	}
	class GroupHeaderEvent extends TEvent{
		public function execute(){
			$_data = "[
				{company:'3m Co',                               price:71.72, change:0.02,  pctChange:0.03,  lastChange:'9/1 12:00am'},
				{company:'Alcoa Inc',                           price:29.01, change:0.42,  pctChange:1.47,  lastChange:'9/1 12:00am'},
				{company:'Altria Group Inc',                    price:83.81, change:0.28,  pctChange:0.34,  lastChange:'9/1 12:00am'},
				{company:'American Express Company',            price:52.55, change:0.01,  pctChange:0.02,  lastChange:'9/1 12:00am'},
				{company:'American International Group, Inc.',  price:64.13, change:0.31,  pctChange:0.49,  lastChange:'9/1 12:00am'},
				{company:'AT&T Inc.',                           price:31.61, change:-0.48, pctChange:-1.54, lastChange:'9/1 12:00am'},
				{company:'Boeing Co.',                          price:75.43, change:0.53,  pctChange:0.71,  lastChange:'9/1 12:00am'},
				{company:'Caterpillar Inc.',                    price:67.27, change:0.92,  pctChange:1.39,  lastChange:'9/1 12:00am'},
				{company:'Citigroup, Inc.',                     price:49.37, change:0.02,  pctChange:0.04,  lastChange:'9/1 12:00am'},
				{company:'E.I. du Pont de Nemours and Company', price:40.48, change:0.51,  pctChange:1.28,  lastChange:'9/1 12:00am'},
				{company:'Exxon Mobil Corp',                    price:68.1,  change:-0.43, pctChange:-0.64, lastChange:'9/1 12:00am'},
				{company:'General Electric Company',            price:34.14, change:-0.08, pctChange:-0.23, lastChange:'9/1 12:00am'},
				{company:'General Motors Corporation',          price:30.27, change:1.09,  pctChange:3.74,  lastChange:'9/1 12:00am'},
				{company:'Hewlett-Packard Co.',                 price:36.53, change:-0.03, pctChange:-0.08, lastChange:'9/1 12:00am'},
				{company:'Honeywell Intl Inc',                  price:38.77, change:0.05,  pctChange:0.13,  lastChange:'9/1 12:00am'},
				{company:'Intel Corporation',                   price:19.88, change:0.31,  pctChange:1.58,  lastChange:'9/1 12:00am'},
				{company:'International Business Machines',     price:81.41, change:0.44,  pctChange:0.54,  lastChange:'9/1 12:00am'},
				{company:'Johnson & Johnson',                   price:64.72, change:0.06,  pctChange:0.09,  lastChange:'9/1 12:00am'},
				{company:'JP Morgan & Chase & Co',              price:45.73, change:0.07,  pctChange:0.15,  lastChange:'9/1 12:00am'},
				{company:'McDonald\'s Corporation',             price:36.76, change:0.86,  pctChange:2.40,  lastChange:'9/1 12:00am'},
				{company:'Merck & Co., Inc.',                   price:40.96, change:0.41,  pctChange:1.01,  lastChange:'9/1 12:00am'},
				{company:'Microsoft Corporation',               price:25.84, change:0.14,  pctChange:0.54,  lastChange:'9/1 12:00am'},
				{company:'Pfizer Inc',                          price:27.96, change:0.4,   pctChange:1.45,  lastChange:'9/1 12:00am'},
				{company:'The Coca-Cola Company',               price:45.07, change:0.26,  pctChange:0.58,  lastChange:'9/1 12:00am'},
				{company:'The Home Depot, Inc.',                price:34.64, change:0.35,  pctChange:1.02,  lastChange:'9/1 12:00am'},
				{company:'The Procter & Gamble Company',        price:61.91, change:0.01,  pctChange:0.02,  lastChange:'9/1 12:00am'},
				{company:'United Technologies Corporation',     price:63.26, change:0.55,  pctChange:0.88,  lastChange:'9/1 12:00am'},
				{company:'Verizon Communications',              price:35.57, change:0.39,  pctChange:1.11,  lastChange:'9/1 12:00am'},
				{company:'Wal-Mart Stores, Inc.',               price:45.45, change:0.73,  pctChange:1.63,  lastChange:'9/1 12:00am'}
			]";
			echo $_data;
		}
	}
	class GroupSummaryEvent extends TEvent{
		public function execute(){
			$_data = "[
				{projectId: 100, project: 'Ext Forms: Field Anchoring', taskId: 112, description: 'Integrate 2.0 Forms with 2.0 Layouts', estimate: 6, rate: 150, due:'06/24/2007'},
				{projectId: 100, project: 'Ext Forms: Field Anchoring', taskId: 113, description: 'Implement AnchorLayout', estimate: 4, rate: 150, due:'06/25/2007'},
				{projectId: 100, project: 'Ext Forms: Field Anchoring', taskId: 114, description: 'Add support for multiple types of anchors', estimate: 4, rate: 150, due:'06/27/2007'},
				{projectId: 100, project: 'Ext Forms: Field Anchoring', taskId: 115, description: 'Testing and debugging', estimate: 8, rate: 0, due:'06/29/2007'},
				{projectId: 101, project: 'Ext Grid: Single-level Grouping', taskId: 101, description: 'Add required rendering \"hooks\" to GridView', estimate: 6, rate: 100, due:'07/01/2007'},
				{projectId: 101, project: 'Ext Grid: Single-level Grouping', taskId: 102, description: 'Extend GridView and override rendering functions', estimate: 6, rate: 100, due:'07/03/2007'},
				{projectId: 101, project: 'Ext Grid: Single-level Grouping', taskId: 103, description: 'Extend Store with grouping functionality', estimate: 4, rate: 100, due:'07/04/2007'},
				{projectId: 101, project: 'Ext Grid: Single-level Grouping', taskId: 121, description: 'Default CSS Styling', estimate: 2, rate: 100, due:'07/05/2007'},
				{projectId: 101, project: 'Ext Grid: Single-level Grouping', taskId: 104, description: 'Testing and debugging', estimate: 6, rate: 100, due:'07/06/2007'},
				{projectId: 102, project: 'Ext Grid: Summary Rows', taskId: 105, description: 'Ext Grid plugin integration', estimate: 4, rate: 125, due:'07/01/2007'},
				{projectId: 102, project: 'Ext Grid: Summary Rows', taskId: 106, description: 'Summary creation during rendering phase', estimate: 4, rate: 125, due:'07/02/2007'},
				{projectId: 102, project: 'Ext Grid: Summary Rows', taskId: 107, description: 'Dynamic summary updates in editor grids', estimate: 6, rate: 125, due:'07/05/2007'},
				{projectId: 102, project: 'Ext Grid: Summary Rows', taskId: 108, description: 'Remote summary integration', estimate: 4, rate: 125, due:'07/05/2007'},
				{projectId: 102, project: 'Ext Grid: Summary Rows', taskId: 109, description: 'Summary renderers and calculators', estimate: 4, rate: 125, due:'07/06/2007'},
				{projectId: 102, project: 'Ext Grid: Summary Rows', taskId: 110, description: 'Integrate summaries with GroupingView', estimate: 10, rate: 125, due:'07/11/2007'},
				{projectId: 102, project: 'Ext Grid: Summary Rows', taskId: 111, description: 'Testing and debugging', estimate: 8, rate: 125, due:'07/15/2007'}
			]";
			echo $_data;
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
			array('AL','Alabama asdasdsdasdkaçldkaçlsdkasççalsdçaskdçaslkdsçalkdaçsdkçaskdasçdkas'),
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

/*	$file1=new TFile();
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
	$form1->buttons->add('btn2',$btn2);*/

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
	$bdel->tooltip='Delete';
	$bdel->icon='images/buttons/delete.png';
	$bdel->handler='Ext.Msg.alert("INFO","Delete "+grid.getStore().getAt(rowIndex).get("name"));';  //handler receives params grid,rowIndex,colIndex
	
	$col5=new TColumnAction();
	$col5->width=40;
	$col5->items->add('bdel',$bdel);
	

/*	$grid=new TGrid(array(
		columns=>array($col1,$col2,$col3,$col4,$col5),
		bbar=>array(new TToolbarFill(),$bnext)
	));
	$grid->height=200;
	$grid->width='100%';
	$grid->title='Grid Test';*/
	
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
//	$grid->autoLoad=false;
//	$grid->eventName='combobox2';				//PHP event for this combo
//	$grid->queryMode=TQueryModeType::$remote;	//Get data from server
	//$grid->onItemClick(array('Ext.Msg.alert("INFO","click row "+index+" name "+record.get("name"));'));
	//$grid->onItemDblClick(array('Ext.Msg.alert("INFO","dblclick row "+index+" abbr "+record.get("abbr"));'));

	$paging=new TPaging('grid','operation',array(
		columns=>array($col1,$col2,$col3,$col4,$col5),
		height=>200,
		width=>'100%',
		title=>'Paging test',
		autoLoad=>false,
		eventName=>'combobox2',
		queryMode=>TQueryModeType::$remote
	));
	//$paging->first->text='Primeira';
	$paging->first->iconCls='bpgfirst';
	//$paging->prev->text='Anterior';
	$paging->prev->iconCls='bpgprev';
	//$paging->next->text='Próxima';
	$paging->next->iconCls='bpgnext';
	//$paging->last->text='Última';
	$paging->last->iconCls='bpglast';
	
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
	$form1=new FormUpload();
	$tab2->items->add('formUp',$form1->getForm());
	$tab3=new TTab();
	//$tab3->listeners->add('activate','if (!Ext.getCmp("grid").getStore().getCount()) Ext.Msg.alert("Information","Load data from menu Tools")');
	$tab3->onActivate('if (!Ext.getCmp("grid").getStore().getCount()) Ext.Msg.alert("ATTENTION","Load data grid from menu Tools !")');
	$tab3->title='Paging';
	
	$grid=$paging->getGrid();
	$tab3->items->add($paging->gridId,$grid);	//->add(id,obj)
	
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
	//
	//Tab for charts
	$tabpanel2=new TTabPanel();
	$tab6=new TTab(array(
		layout=>'fit',
		title=>'Chart',
		items=>$tabpanel2
	));
	$tab61=new TTab();
	$tab61->layout='fit';
	$tab61->title='Column';
	//
	//Charts
	$chart1=new TChart();
    $chart1->style='background:#fff';
    $chart1->animate=true;
    $chart1->shadow=true;
	$chart1->fields->add(0,'month');
	$chart1->fields->add(1,'payments');
	$chart1->data->add(0,array('May 2011',4824.43));
	$chart1->data->add(1,array('June 2011',9631.88));
	$chart1->data->add(2,array('July 2011',28373.89));
	$chart1->data->add(3,array('August 2011',24072.13));
	$chart1->data->add(4,array('September 2011',33475.55));
	$label11=new TChartLabel(array(
		renderer=>"Ext.util.Format.numberRenderer('0,0')"
	));
	$axes11=new TChartAxis(array(
		type=>'Numeric',
		position=>'left',
		fields=>array('payments'),
		label=>$label11,
		title=>'Payments',
		grid=>true,
		minimum=>0
	));
	$axes12=new TChartAxis(array(
		type=>'Category',
		position=>'bottom',
		fields=>array('month'),
		title=>'Month of the Year'
	));
	$tips11=new TChartTips(array(
		trackMouse=>true,
		width=>140,
		height=>28,
		renderer=>"this.setTitle(storeItem.get('month') + ': ' + storeItem.get('payments') + ' $');"
	));
	$label12=new TChartLabel(array(
		display=>'insideEnd',
		textAnchor=>'middle',	//property text-anchor
		field=>'payments',
		renderer=>"Ext.util.Format.numberRenderer('0')",
		orientation=>'vertical',
		color=>'#333'
	));
	$serie11=new TChartSeries(array(
		type=>'column',
		axis=>'left',
		highlight=>true,
		tips=>$tips11,
		label=>$label12,
		xField=>'month',
		yField=>'payments'
	));
	$chart1->axes=array($axes11,$axes12);
	$chart1->series=array($serie11);
	$tab61->items->add('chart1',$chart1);
	//
	//
	$tab62=new TTab();
	$tab62->layout='fit';
	$tab62->title='Line';
	//
	//Charts
	$chart2=new TChart();
    $chart2->style='background:#fff';
    $chart2->animate=true;
	$chart2->theme='Category1';
    $chart2->shadow=true;
	$chart2->fields->add(0,'month');
	$chart2->fields->add(1,'payments');
	$chart2->data->add(0,array('May 2011',4824.43));
	$chart2->data->add(1,array('June 2011',9631.88));
	$chart2->data->add(2,array('July 2011',28373.89));
	$chart2->data->add(3,array('August 2011',24072.13));
	$chart2->data->add(4,array('September 2011',33475.55));
	$axes21=new TChartAxis(array(
		type=>'Numeric',
		position=>'left',
		fields=>array('payments'),
		title=>'Payments',
		minorTickSteps=>1,
		grid=>"{
                    odd: {
                        opacity: 1,
                        fill: '#ddd',
                        stroke: '#bbb',
                        'stroke-width': 0.5
                    }
                }",
		minimum=>0
	));
	$axes22=new TChartAxis(array(
		type=>'Category',
		position=>'bottom',
		fields=>array('month'),
		title=>'Month of the Year'
	));
	$serie21=new TChartSeries(array(
		type=>'line',
		highlight=>"{
			size: 7,
			radius: 7
		}",
		axis=>'left',
		xField=>'month',
		yField=>'payments',
		markerConfig=>"{
			type: 'cross',
			size: 4,
			radius: 4,
			'stroke-width': 0
		}"
	));
	$chart2->axes=array($axes21,$axes22);
	$chart2->series=array($serie21);
	$tab62->items->add('chart2',$chart2);
	//
	//
	$tab63=new TTab();
	$tab63->layout='fit';
	$tab63->title='Pie';
	//
	//Charts
	$legend31=new TChartLegend();
	$legend31->position='right';
	//
	$chart3=new TChart();
	$chart3->insetPadding=60;
    $chart3->animate=true;
	$chart3->theme='Base:gradients';
    $chart3->shadow=true;
	$chart3->legend=$legend31;
	$chart3->fields->add(0,'month');
	$chart3->fields->add(1,'payments');
	$chart3->autoLoad=true;
	$chart3->eventName='chart';
	$chart3->queryMode=TQueryModeType::$remote;
	$label31=new TChartLabel(array(
		field=>'month',
		display=>'rotate',
		contrast=>true,
		font=>'18px Arial'
	));
	$tips31=new TChartTips(array(
		trackMouse=>true,
		width=>140,
		height=>28,
		renderer=>"
			var total = 0;
			Ext.getCmp('chart3').store.each(function(rec) {
				total += rec.get('payments');
			});
			this.setTitle(storeItem.get('month') + ': ' + Math.round(storeItem.get('payments') / total * 100) + '%');
		"
	));
	$serie31=new TChartSeries(array(
		type=>'pie',
		field=>'payments',
		highlight=>"{
			segment: {
				margin: 20
			}
		}",
		showInLegend=>true,
		donut=>false,
		tips=>$tips31,
		label=>$label31
	));
	$chart3->series=array($serie31);
	$tab63->items->add('chart3',$chart3);
	//
	$tabpanel2->items->add('tab61',$tab61);
	$tabpanel2->items->add('tab62',$tab62);
	$tabpanel2->items->add('tab63',$tab63);
	//
	//For local
	$treeNode1=new TTreeNode(array(text=>'node 1'));
	//$treeNode1->text='node 1';
	$treeNode2=new TTreeNode();
	$treeNode2->text='node 2';
	$treeNode21=new TTreeNode();
	$treeNode21->text='node 21';
	$treeNode22=new TTreeNode();
	$treeNode22->text='node 22';
	$treeNode2->children->add('node21',$treeNode21);
	$treeNode2->children->add('node22',$treeNode22);
	$treeNode221=new TTreeNode();
	$treeNode221->text='node 221';
	$treeNode22->children->add('node221',$treeNode221);
	$treeNode22->expanded=true;
	$treeRootNode=new TTreeNode(array(
		expanded=>true,
		children=>array($treeNode1,$treeNode2)
	));
/*	$treeRootNode->expanded=true;
	$treeRootNode->children->add('node1',$treeNode1);
	$treeRootNode->children->add('node2',$treeNode2);*/
	//
	//
	$tree=new TTree();
	//
	//For remote
	$treecol1=new TTreeColumn();
	$treecol1->text='Task';
	$treecol1->flex=2;
	$treecol1->dataIndex='task';
	$treecol2=new TColumn();
    $treecol2->text='Duration';
    $treecol2->flex=1;
    $treecol2->sortable=true;
    $treecol2->dataIndex='duration';
    $treecol2->align='center';
	$treecol3=new TColumn();
    $treecol3->text='Assigned To';
    $treecol3->flex=1;
    $treecol3->dataIndex='user';
    $treecol3->sortable=true;
	$tree->columns->add('treecol1',$treecol1);
	$tree->columns->add('treecol2',$treecol2);
	$tree->columns->add('treecol3',$treecol3);
	//
	$tree->fields->add(0,'task');
	$tree->fields->add(1,'user');
	$tree->fields->add(2,'duration');
	$tree->autoLoad=false;
	$tree->eventName='tree';
	//
	$tree->queryMode=TQueryModeType::$remote;	//Test with TQueryModeType::$local
	//
	//
	$tree->title='Tree';
	$tree->rootVisible=true;
	$tree->useArrows=true;
	if ($tree->queryMode==TQueryModeType::$local){
		$tree->rootNode=$treeRootNode;
	}
	else{
		$tree->onAfterRender("
			operation = new Ext.data.Operation({
				filters: [
					{'property':'load','value':1}
				]
			});	
			Ext.getCmp('tree').getStore().load(operation);	//ExtJS execute store twice in the tree (???), use filters to kill the bug
		");
	}
	$tree->onItemClick("
		alert(record.get('task'));
		//alert(record.get('text'));	//for TQueryModeType -> local
/*		var _o=Ext.getCmp('tree').getSelectionModel().selected;
		_o.each(function(_res){
					for(var _p in _res.data){
					  alert(_p+'='+_res.data[_p]);
					}
		});*/
	");
	//
	$tab7=new TTab();
	$tab7->layout='fit';
	$tab7->title='Tree';
	$tab7->items->add('tree',$tree);
	//
	$tabpanel1->items->add('tab6',$tab6);
	$tabpanel1->items->add('tab7',$tab7);
	//
	//
	$tabpanel3=new TTabPanel();
	$tab8=new TTab(array(
		layout=>'fit',
		title=>'Grid',
		items=>$tabpanel3
	));
	$tab81=new TTab();
	$tab81->layout='fit';
	$tab81->title='Grouping';
	//
	$col811=new TColumn();
	$col811->header='Name';
	$col811->dataIndex='name';	
	$col811->flex=1;
	$col812=new TColumn();
	$col812->header='Cuisine';
	$col812->dataIndex='cuisine';
	$col812->flex=1;
	//
	$feature81=new TGridFeature();
	$feature81->ftype='grouping';
	$feature81->groupHeaderTpl='Cuisine: {name} ({rows.length} Item{[values.rows.length > 1 ? "s" : ""]})';
	//
	$grid81=new TGrid(array(
		columns=>array($col811,$col812)
	));
	$grid81->features=$feature81;	//or array($feature81,...) to more than one feature
	$grid81->autoLoad=true;
	$grid81->eventName='grouping';
	$grid81->queryMode=TQueryModeType::$remote;
	$grid81->groupField='cuisine';
	//
	$tab81->items->add('grouping',$grid81);
	$tabpanel3->items->add('tab81',$tab81);
	//
	//
	$tab82=new TTab();
	$tab82->layout='fit';
	$tab82->title='Group header';
	//
	$col821=new TColumn();
	$col821->header='Company';
	$col821->dataIndex='company';	
	$col821->flex=1;
	$col822=new TColumn();
	$col822->text='Stock Price';
	$col8221=new TColumn();
    $col8221->text='Price';
    $col8221->width=75;
    $col8221->sortable=true;
    $col8221->renderer='Ext.util.Format.usMoney';	//Renderer with format should not be array
    $col8221->dataIndex='price';
	$col8222=new TColumn();
    $col8222->text='Change';
    $col8222->width=75;
    $col8222->sortable=true;
    $col8222->renderer="
        if (value > 0) {
            return '<span style=\"color:green;\">' + value + '</span>';
        } else if (value < 0) {
            return '<span style=\"color:red;\">' + value + '</span>';
        }
        return value;
	";
    $col8222->dataIndex='change';
	$col8223=new TColumn();
    $col8223->text='% Change';
    $col8223->width=75;
    $col8223->sortable=true;
    $col8223->renderer="
        if (value > 0) {
            return '<span style=\"color:green;\">' + value + '%</span>';
        } else if (value < 0) {
            return '<span style=\"color:red;\">' + value + '%</span>';
        }
        return value;
	";
    $col8223->dataIndex='pctChange';
	//
	$col822->columns->add('col8221',$col8221);
	$col822->columns->add('col8222',$col8222);
	$col822->columns->add('col8223',$col8223);
	//
	$col823=new TColumn();
    $col823->text='Last Updated';
    $col823->width=85;
    $col823->sortable=true;
    $col823->dataIndex='lastChange';
	//
	$grid82=new TGrid(array(
		columns=>array($col821,$col822,$col823)
	));
	$grid82->autoLoad=true;
	$grid82->eventName='groupheader';
	$grid82->queryMode=TQueryModeType::$remote;
	//
	$tab82->items->add('groupheader',$grid82);
	$tabpanel3->items->add('tab82',$tab82);
	//
	//
	$tab83=new TTab();
	$tab83->layout='fit';
	$tab83->title='Group summary + plugin (<small>cellediting</small>)';
	//
	$feature83=new TGridFeature();
    $feature83->ftype='groupingsummary';
    $feature83->groupHeaderTpl='{name}';
    $feature83->hideGroupedHeader=true;
    $feature83->enableGroupingMenu=false;
	//
	$plugins83=new TGridPlugin();
	$plugins83->ptype='cellediting';
	$plugins83->clicksToEdit=1;
	$plugins83->listeners->add("edit","Ext.getCmp('groupsummary').getView().refresh();");
	//
	$col831=new TColumn();
    $col831->text='Task';
    $col831->flex=1;
    $col831->sortable=true;
    $col831->dataIndex='description';
    $col831->hideable=false;
    $col831->summaryType='count';
    $col831->summaryRenderer="return ((value === 0 || value > 1) ? '(' + value + ' Tasks)' : '(1 Task)');";	
	//
	$col832=new TColumn();
    $col832->header='Project';
    $col832->width=20;
    $col832->sortable=true;
    $col832->dataIndex='project';
	//
	$col833=new TColumn();
    $col833->header='Due Date';
    $col833->width=80;
    $col833->sortable=true;
    $col833->dataIndex='due';
    $col833->summaryType='max';
    $col833->renderer="Ext.util.Format.dateRenderer('m/d/Y')";			//Renderer with format should not be array
    $col833->summaryRenderer="Ext.util.Format.dateRenderer('m/d/Y')";	//Renderer with format should not be array
	$col833->field=new TDate();			//For plugin
	//
	$col834=new TColumn();
    $col834->header='Estimate';
    $col834->width=75;
    $col834->sortable=true;
    $col834->dataIndex='estimate';
    $col834->summaryType='sum';
    $col834->renderer="return value + ' hours';";
    $col834->summaryRenderer="return value + ' hours';";
	$col834->field=new TNumber();			//For plugin
	//
	$col835=new TColumn();
    $col835->header='Rate';
    $col835->width=75;
    $col835->sortable=true;
    $col835->renderer='Ext.util.Format.usMoney';			//Renderer with format should not be array
    $col835->summaryRenderer='Ext.util.Format.usMoney';		//Renderer with format should not be array
    $col835->dataIndex='rate';
    $col835->summaryType='average';
	$col835->field=new TNumber();			//For plugin
	//
	$col836=new TColumn();
    $col836->header='Cost';
    $col836->width=75;
    $col836->sortable=false;
    $col836->groupable=false;
    $col836->renderer="return Ext.util.Format.usMoney(record.get('estimate') * record.get('rate'));";
    $col836->dataIndex='cost';
    $col836->summaryType="
                var i = 0,
                    length = records.length,
                    total = 0,
                    record;

                for (; i < length; ++i) {
                    record = records[i];
                    total += record.get('estimate') * record.get('rate');
                }
                return total;
	";
    $col836->summaryRenderer='Ext.util.Format.usMoney';		//Renderer with format should not be array
	//
	$grid83=new TGrid(array(
		columns=>array($col831,$col832,$col833,$col834,$col835,$col836)
	));
	$grid83->features=array($feature83);
	$grid83->plugins=array($plugins83);
	$grid83->autoLoad=true;
	$grid83->eventName='groupsummary';
	$grid83->queryMode=TQueryModeType::$remote;
	$grid83->groupField='project';
	//
	$tab83->items->add('groupsummary',$grid83);
	$tabpanel3->items->add('tab83',$tab83);
	//
	$tabpanel1->items->add('tab8',$tab8);
	//
	//
	$w1=new TWindow(array(
		layout=>'fit',
		title=>'First window',
		width=>700,
		height=>550,
		tools=>$tool1,		//or array
		items=>$tabpanel1	//or array
	));
	$w1->onBeforeHide('Ext.Msg.alert("Information","window beforehide")');
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
	$app->ext='ext-4.0.7-gpl';		//Path from the http root
	$app->cls='xbody';
	$app->headers->add('utils','<script type="text/javascript" src="js/utils.js"></script>');
	$app->headers->add('app-style','<link rel="stylesheet" type="text/css" href="css/app.css"/>');
	//Only TApplication---------------------------------------------------------------------------
	$app->onWindowBeforeUnload('','Quit my App'); //Javascript code, Quit Message
	//$app->onWindowResize('alert("WindowResize");'); //Javascript code
	//$app->onDocumentReady(""); //Javascript code
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
	$app->events->add('chart',new ChartEvent());
	$app->events->add('tree',new TreeEvent());
	$app->events->add('grouping',new GroupingEvent());
	$app->events->add('groupheader',new GroupHeaderEvent());
	$app->events->add('groupsummary',new GroupSummaryEvent());
	$app->windows->add('win1',$w1);
	$it1=new TMenuItem();
	$it1->iconCls='badd';
	$it1->iconAlign='left';
	$it1->text='Load data grid';
	//$it1->listeners->add('click',
	$it1->onClick("
		if (Ext.getCmp('grid')){
			operation = new Ext.data.Operation({
				start : 0,
				page  : 1,
				limit :50,
				count :1200,  //total records is not mandatory
				sorters: [
				],
				filters: [
				]
			});	
			Ext.getCmp('grid').getStore().load(operation);
			Ext.getCmp('grid_display').setText('<b>Page: 1 - '+Math.ceil(operation.count/operation.limit)+'</b>');
		}
		else{
			Ext.Msg.alert('ERROR','Not Allow here');
		}
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