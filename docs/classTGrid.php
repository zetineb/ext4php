<?php
class classTGrid extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Grid Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }
	
	public function TabGrid(){
        $tab1=new TTab(array(
            title=>'Default'
        ));
        $tab1->items->add('tabGridDefault',$this->TGridDefault());
        
        $tab2=new TTab(array(
            title=>'Grouping'
        ));
       $tab2->items->add('tabGridGrouping',$this->TGridGrouping());
        
        $tab3=new TTab(array(
            title=>'Group Header'
        ));
        $tab3->items->add('tabGridGroupHeader',$this->TGridGroupHeader());
        
        $tab4=new TTab(array(
            title=>'Group Summary'
        ));
        $tab4->items->add('tabGridSummary',$this->TGridSummary());
        
        $tabpanel=new TTabPanel(array(
                margin=>'5 5 5 5',
				width=>600
        ));
        $tabpanel->items->add('tabonepanel',$tab1);
        $tabpanel->items->add('tabtwopanel',$tab2);
        $tabpanel->items->add('tabthreepanel',$tab3);
        $tabpanel->items->add('tabfourpanel',$tab4);
        return $tabpanel;
    }
	
	public function TGridGrouping(){
			$colName=new TColumn();
			$colName->header='Name';
			$colName->dataIndex='name';	
			$colName->flex=1;
			
			$colCuisine=new TColumn();
			$colCuisine->header='Cuisine';
			$colCuisine->dataIndex='cuisine';
			$colCuisine->flex=1;

			$feature=new TGridFeature();
			$feature->ftype='grouping';
			$feature->groupHeaderTpl='Cuisine: {name} ({rows.length} Item{[values.rows.length > 1 ? "s" : ""]})';

			$grid=new TGrid(array(
				width=>600,
				height=>300,
				padding=>10,
				columns=>array($colName,$colCuisine)
			));
			$grid->features=$feature;	//or array($feature,...) to more than one feature
			$grid->autoLoad=true;
			$grid->eventName='grouping';
			$grid->queryMode=TQueryModeType::$remote;
			$grid->groupField='cuisine';
		return $grid;
	}
	
	public function TGridSummary(){
			$feature=new TGridFeature();
			$feature->ftype='groupingsummary';
			$feature->groupHeaderTpl='{name}';
			$feature->hideGroupedHeader=true;
			$feature->enableGroupingMenu=false;

			$plugins=new TGridPlugin();
			$plugins->ptype='cellediting';
			$plugins->clicksToEdit=1;
			$plugins->listeners->add("edit","Ext.getCmp('groupsummary').getView().refresh();");

			$colTask=new TColumn(); 
			$colTask->text='Task';
			$colTask->flex=1;
			$colTask->sortable=true;
			$colTask->dataIndex='description';
			$colTask->hideable=false;
			$colTask->summaryType='count';
			$colTask->summaryRenderer="return ((value === 0 || value > 1) ? '(' + value + ' Tasks)' : '(1 Task)');";	

			$colProject=new TColumn(); 
			$colProject->header='Project';
			$colProject->width=20;
			$colProject->sortable=true;
			$colProject->dataIndex='project';

			$colDueDate=new TColumn(); 
			$colDueDate->header='Due Date';
			$colDueDate->width=80;
			$colDueDate->sortable=true;
			$colDueDate->dataIndex='due';
			$colDueDate->summaryType='max';
			$colDueDate->renderer="Ext.util.Format.dateRenderer('m/d/Y')";			//Renderer with format should not be array
			$colDueDate->summaryRenderer="Ext.util.Format.dateRenderer('m/d/Y')";	//Renderer with format should not be array
			$colDueDate->field=new TDate();		//For plugin

			$colEstimate=new TColumn(); 
			$colEstimate->header='Estimate';
			$colEstimate->width=75;
			$colEstimate->sortable=true;
			$colEstimate->dataIndex='estimate';
			$colEstimate->summaryType='sum';
			$colEstimate->renderer="return value + ' hours';";
			$colEstimate->summaryRenderer="return value + ' hours';";
			$colEstimate->field=new TNumber();	//For plugin

			$colRate=new TColumn();
			$colRate->header='Rate';
			$colRate->width=75;
			$colRate->sortable=true;
			$colRate->renderer='Ext.util.Format.usMoney';			//Renderer with format should not be array
			$colRate->summaryRenderer='Ext.util.Format.usMoney';	//Renderer with format should not be array
			$colRate->dataIndex='rate';
			$colRate->summaryType='average';
			$colRate->field=new TNumber();	//For plugin
			
			$colCost=new TColumn(); 
			$colCost->header='Cost';
			$colCost->width=75;
			$colCost->sortable=false;
			$colCost->groupable=false;
			$colCost->renderer="return Ext.util.Format.usMoney(record.get('estimate') * record.get('rate'));";
			$colCost->dataIndex='cost';
			$colCost->summaryType="
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
			$colCost->summaryRenderer='Ext.util.Format.usMoney';	//Renderer with format should not be array

			$grid=new TGrid(array(
				width=>600,
				height=>300,
				padding=>10,
				columns=>array($colTask,$colProject,$colDueDate,$colEstimate,$colRate,$colCost)
			));
			$grid->features=array($feature);
			$grid->plugins=array($plugins);
			$grid->autoLoad=true;
			$grid->eventName='groupsummary';
			$grid->queryMode=TQueryModeType::$remote;
			$grid->groupField='project';
		return $grid;
	}
	
	public function TGridGroupHeader(){
			$colCompany=new TColumn();
			$colCompany->header='Company';
			$colCompany->dataIndex='company';	
			$colCompany->flex=1;
			
			$colStockPrice=new TColumn();
			$colStockPrice->text='Stock Price';
			
			$colPrice=new TColumn();
			$colPrice->text='Price';
			$colPrice->width=75;
			$colPrice->sortable=true;
			$colPrice->renderer='Ext.util.Format.usMoney';	//Renderer with format should not be array
			$colPrice->dataIndex='price';
			
			$colChange=new TColumn();
			$colChange->text='Change';
			$colChange->width=75;
			$colChange->sortable=true;
			$colChange->renderer="
				if (value > 0) {
					return '<span style=\"color:green;\">' + value + '</span>';
				} else if (value < 0) {
					return '<span style=\"color:red;\">' + value + '</span>';
				}
				return value;
			";
			$colChange->dataIndex='change';
			
			$colPorcChange=new TColumn();
			$colPorcChange->text='% Change';
			$colPorcChange->width=75;
			$colPorcChange->sortable=true;
			$colPorcChange->renderer="
				if (value > 0) {
					return '<span style=\"color:green;\">' + value + '%</span>';
				} else if (value < 0) {
					return '<span style=\"color:red;\">' + value + '%</span>';
				}
				return value;
			";
			$colPorcChange->dataIndex='pctChange';

			$colStockPrice->columns->add('price1',$colPrice);
			$colStockPrice->columns->add('change1',$colChange);
			$colStockPrice->columns->add('porcchange1',$colPorcChange);

			$colLastUpdated=new TColumn();
			$colLastUpdated->text='Last Updated';
			$colLastUpdated->width=85;
			$colLastUpdated->sortable=true;
			$colLastUpdated->dataIndex='lastChange';

			$grid=new TGrid(array(
				width=>600,
				height=>300,
				padding=>10,
				columns=>array($colCompany,$colStockPrice,$colLastUpdated)
			));
			$grid->autoLoad=true;
			$grid->eventName='groupheader';
			$grid->queryMode=TQueryModeType::$remote;
			
		return $grid;
	}
	
    public function TGridDefault(){
		$col1 = new TColumn(array(
			header=>'Code',
			dataIndex=>'code',
			width=>60
		));
		
		$col2 = new TColumn(array(
			header=>'Name',
			dataIndex=>'descr',
			width=>430,
			flex=>1
		));	
		
		$grid=new TGrid(array(
			width=>600,
			height=>250,
			padding=>10
		));
			
		$grid->fields->add(0,'code');
		$grid->fields->add(1,'descr');

		$grid->data->add(0,array("1","John"));
		$grid->data->add(1,array("2","Joseph"));
		$grid->data->add(2,array("3","Alice"));
		$grid->data->add(3,array("4","Mariay"));
		$grid->data->add(4,array("2","Joseph"));
		$grid->data->add(5,array("5","Brad"));
		$grid->data->add(6,array("6","Washington"));
		$grid->data->add(7,array("7","Angelina"));
		$grid->data->add(8,array("8","Jennifer"));
		$grid->data->add(9,array("9","Emma"));
		$grid->data->add(10,array("10","Evan"));
		$grid->data->add(11,array("11","Sarah"));
		$grid->data->add(12,array("12","Julia"));
		$grid->data->add(13,array("13","Samuel"));
		$grid->data->add(14,array("14","Will"));
		$grid->data->add(15,array("15","Johnny"));
		$grid->data->add(16,array("16","George"));
		
		$grid->columns->add('col1',$col1);
		$grid->columns->add('col2',$col2);	
		
	    return $grid;
    }
    
	public function TContainerObj(){
      $obj = new TContainer(array(
             layout=>'vbox',
             width=>'100%',
             height=>'100%'
	  ));
	  $obj->items->add('label_title',$this->labelTitle());
	  $obj->items->add('tabGrid',$this->TabGrid());
	  return $obj;
	}
	    
    public function execute(){
	   return $this->TTabObj($this->TContainerObj(),'grid');
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
?>
