<?php
$type = $_GET['type'];
switch($type){
  case 'label':
     $stringObj='
     <?php
        $obj=new TLabel(array(
           text=>"Label",
           name=>"label_name",
           padding=>"10 10 10 10"
        ));
     ?>';
     break;
  case 'hidden':
     $stringObj='
     <?php
        $obj=new THidden(array(
           name=>"hidden_name",
           value=>10
        ));
     ?>';
     break;
  case 'number':
     $stringObj='
     <?php
       $obj = new TNumber(array(
            name=>"number_name",
            margin=>"2 0 10 2",
			width=>150,
			fieldLabel=>"Number",
			labelWidth=>50,
			value=>0
		));
      ?>';
	  break;
  case 'text':
     $stringObj='
     <?php
       $obj = new TText(array(
    	    emptyText=>"My name is John",
            name=>"text_name",
            margin=>"2 0 10 2",
			width=>250,
			fieldLabel=>"Text",
			labelWidth=>40
		));
      ?>';
	  break;
  case 'button':
     $stringObj='
     <?php
     $obj = new TButton(array(
    	    text=>"Button",
			padding=>"10 10 10 10",
			margin=>"5 5 5 5",
			width=>85,
			iconCls=>"btools",
			iconAlign=>"left",
			handler=>"Ext.Msg.alert(\'Alert\',\'Is button.\');"
		));
      ?>';
      break;
  case 'combobox':
     $stringObj='
     <?php
       $comboLocal = new TCombobox(array(
			name=>"combolocal_name",
			fieldLabel=>"ComboBox (local)",
			labelWidth=>100,
			width=>300,
			padding=>"10 10 10 10",
			validateOnBlur=>false,
			validateOnChange=>false,
			enableKeyEvents=>true,
			maskRe=>\'/[""]/\',
			displayField=>"name",
			valueField=>"id",
			fields=>array("id","name"),
			data=>array(
				array("1,2,3,4,5","ALL"),
				array(1,"NUMBER ONE"),
				array(2,"NUMBER TWO"),
				array(3,"NUMBER THREE"),
				array(4,"NUMBER FOUR"),
				array(5,"NUMBER FIVE")
			)
		));
		
		$comboRemote = new TCombobox(array(
            fieldLabel=>"Combo (remote)",
            labelWidth=>300,
            width=>500,
			padding=>"10 10 10 10",
		    displayField=>"name",
		    valueField=>"abbr",
		    fields=>array("abbr","name"),
		    eventName=>"comboboxRemote",
	        queryMode=>TQueryModeType::$remote
        ));
      ?>';
      break;
  case 'date':
      $stringObj='
      <?php
         $obj = new TDate(array(
    	    format=>"d/m/Y",
            name=>"date_name",
            padding=>"10 10 10 10",
			width=>100,
            minValue=>date("1984-01-01"),
            maxValue=>date("Y-m-d"),
            value=>date("Y-m-d")
		 ));
      ?>';
      break;
   case 'htmleditor':
      $stringObj='
      <?php
        $obj = new THtmlEditor(array(
            name=>"txtarea_name",
            padding=>"10 10 10 10",
			width=>500,
			height=>200
		));
      ?>
      ';
      break;
   case 'panel':
      $stringObj='
      <?php
        $obj = new TPanel(array(
             layout=>"vbox",
             title=>"Panel",
             width=>300,
             height=>200,
             margin=>"5 5 5 5"
	    ));
      ?>
      ';
      break;
   case 'textarea':
      $stringObj='
      <?php
        $obj = new TTextArea(array(
    	    emptyText=>"it is a textarea",
            name=>"txtarea_name",
            padding=>"10 10 10 10",
			width=>500,
			height=>200,
			fieldLabel=>"TextArea",
			labelWidth=>60
		));
      ?>
      ';
      break;
   case 'time':
      $stringObj='
      <?php
        $obj = new TTime(array(
            name=>"time_name",
            padding=>"10 10 10 10",
			width=>150,
			fieldLabel=>"Time",
            increment=>1,
			labelWidth=>50,
            minValue=>"00:00 AM",
			maxValue=>"23:59 PM",
			format=>"H:i",
			value=>date("H:i")
		));
      ?>
      ';
      break;
   case 'container':
      $stringObj='
      <?php
        $obj = new TContainer(array(
             layout=>"vbox",
             width=>300,
             height=>300
	    ));
      ?>
      ';
      break;
   case 'display':
      $stringObj='
      <?php
        $obj = new TDisplay(array(
            name=>"display_name",
            padding=>"10 10 10 10",
			width=>250,
			fieldLabel=>"Display",
			labelWidth=>40,
			value=>11
		));
      ?>
      ';
      break;
   case 'checkbox':
      $stringObj='
      <?php
        $obj = new TCheckbox(array(
		    boxLabel=>"Checkbox",
		    name=>"checkbox_name",
		    inputValue=>1
       ));
      ?>
      ';
      break;
   case 'file':
      $stringObj='
      <?php
        $obj = new TFile(array(
            name=>"file_name",
            fieldLabel=>"Photo",
            labelWidth=>50,
            padding=>"10 10 10 10",
            width=>300,
            msgTarget=>"side",
            allowBlank=>false,
            buttonText=>"Select Photo..."
		));
      ?>
      ';
      break;
    case 'radio':
      $stringObj='
      <?php
        $obj = new TRadio(array(
		    boxLabel=>"Radiobutton",
		    name=>"radio_name",
            padding=>"10 10 10 10",
		    inputValue=>1
        ));
      ?>
      ';
      break;
    case 'fieldset':
      $stringObj='
      <?php
        $obj = new TFieldset(array(
            columnWidth=>0.5,
            title=>"Title Fieldset",
            collapsible=>true,
            margin=>"5 10 10 5",
            padding=>"10 10 10 10",
            layout=>"vbox",
            width=>300,
            height=>180
       ));
      ?>
      ';
      break;
    case 'radiogroup':
      $stringObj='
      <?php
        $radio1 = new TRadio(array(
		     boxLabel=>"Radio 1",
		     name=>"radio",
		     inputValue=>1
        ));

        $radio2 = new TRadio(array(
		     boxLabel=>"Radio 2",
		     name=>"radio",
		     inputValue=>2,
		     checked=>true
        ));

        $radio3 = new TRadio(array(
		      boxLabel=>"Radio 3",
		      name=>"radio",
		      inputValue=>3
        ));

        $obj = new TRadioGroup(array(
              fieldLabel=>"Radio Group",
		      columns=>2,
              vertical=>true,
              width=>300,
              height=>300,
              margin=>"6 6 6 6"
        ));
        $obj->items->add("radio1",$radio1);
        $obj->items->add("radio2",$radio2);
        $obj->items->add("radio3",$radio3);
      ?>
      ';
      break;
    case 'checkboxgroup':
      $stringObj='
      <?php
        $check1 = new TCheckbox(array(
		     boxLabel=>"Checkbox 1",
		     name=>"checkbox1",
		     inputValue=>1
        ));

        $check2 = new TCheckbox(array(
		     boxLabel=>"Checkbox 2",
		     name=>"checkbox2",
		     inputValue=>2
        ));

        $check3 = new TCheckbox(array(
		     boxLabel=>"Checkbox 3",
		     name=>"checkbox3",
		     inputValue=>3,
		     checked=>true
        ));

        $obj = new TCheckboxGroup(array(
            fieldLabel=>"Checkbox Group",
		    columns=>2,
            vertical=>true,
            width=>300,
            height=>300,
            margin=>"6 6 6 6"
        ));
        $obj->items->add("checkbox1",$check1);
        $obj->items->add("checkbox2",$check2);
        $obj->items->add("checkbox3",$check3);
      ?>
      ';
      break;
    case 'tree':
      $stringObj='
      ==================================
      Tree Remote
      ==================================
      
      <?php
		$treecol=new TTreeColumn(array(
           text=>"",
		   flex=>1,
		   dataIndex=>"className"
       ));

	   $tree=new TTree(array(
	       autoLoad=>false,
		   eventName=>"getTree",
		   queryMode=>TQueryModeType::$remote,
		   rootVisible=>true,
		   useArrows=>true,
		   width=>300,
           height=>150,
           border=>0,
           margin=>"5 5 20px 5"
       ));
       $tree->columns->add("treecol",$treecol);

       $tree->onAfterRender("
			operation = new Ext.data.Operation({
				filters: [
					{\'property\':\'load\',\'value\':1}
				]
			});
			Ext.getCmp(\'treeremote\').getStore().load(operation);
	   ");
      ?>
	   
      ==================================
      Tree Local
      ==================================

      <?php
        $treeNodeOS = new TTreeNode(array(
            text=>"OS",
            expanded=>true
        ));
        $treeNodeWindows = new TTreeNode(array(
            text=>"Windows",
            leaf=>true
        ));
        $treeNodeMac = new TTreeNode(array(
            text=>"Mac OS",
            leaf=>true
        ));
        $treeNodeLinux = new TTreeNode(array(
            text=>"Linux",
            leaf=>true
        ));

        $treeNodeOS->children->add("nodeWindows",$treeNodeWindows);
        $treeNodeOS->children->add("nodeMac",$treeNodeMac);
	    $treeNodeOS->children->add("nodeLinux",$treeNodeLinux);

        $treeNodeBrowser = new TTreeNode(array(
            text=>"Browser",
            expanded=>true
        ));
        $treeNodeFirefox = new TTreeNode(array(
            text=>"Firefox",
            leaf=>true
        ));
        $treeNodeIE = new TTreeNode(array(
            text=>"Internet Explorer",
            leaf=>true
        ));
        $treeNodeChrome = new TTreeNode(array(
            text=>"Chrome",
            leaf=>true
        ));
        $treeNodeSafari = new TTreeNode(array(
            text=>"Safari",
            leaf=>true
        ));
        $treeNodeOpera = new TTreeNode(array(
            text=>"Opera",
            leaf=>true
        ));

        $treeNodeBrowser->children->add("nodeFirefox",$treeNodeFirefox);
        $treeNodeBrowser->children->add("nodeIE",$treeNodeIE);
	    $treeNodeBrowser->children->add("nodeChrome",$treeNodeChrome);
	    $treeNodeBrowser->children->add("nodeSafari",$treeNodeSafari);
	    $treeNodeBrowser->children->add("nodeOpera",$treeNodeOpera);

        $treeNodeRoot = new TTreeNode(array(
            text=>"Project",
            expanded=>true,
            children=>array($treeNodeOS,$treeNodeBrowser)
        ));

        $tree=new TTree(array(
			margin=>"5 5 5 5",
			width=>300,
			height=>600,
			border=>false,
			rootNode=>$treeNodeRoot
		));
      ?>
      
      ==================================
      ';
      break;
    case 'buttonsplit':
      $stringObj='
      <?php
        $button1=new TMenuItem(array(
            text=>"Button 1"
        ));
        $button1->onClick("Ext.Msg.alert(\'Alert\',\'Is button one.\');");

        $button2 = new TMenuItem(array(
    	    text=>"Button 2"
        ));
        $button2->onClick("Ext.Msg.alert(\'Alert\',\'Is button two.\');");

        $buttonSplit = new TButtonSplit(array(
    	    text=>"Button Split",
			padding=>"10 10 10 10",
			margin=>"5 5 5 5",
			width=>120,
			iconCls=>"btools",
			iconAlign=>"left",
			handler=>"Ext.Msg.alert(\'Alert\',\'Is button split.\');"
		));
		$buttonSplit->menu->add("button1",$button1);
		$buttonSplit->menu->add("button2",$button2);
      ?>
      ';
      break;
    case 'buttoncycle':
      $stringObj='
      <?php
        $button1=new TMenuItem(array(
            text=>"Button 1"
        ));
        $button1->onClick("Ext.Msg.alert(\'Alert\',\'Is button one.\');");

        $button2 = new TMenuItem(array(
    	    text=>"Button 2"
        ));
        $button2->onClick("Ext.Msg.alert(\'Alert\',\'Is button two.\');");

        $buttonCycle = new TButtonCycle(array(
    	    text=>"Button Cycle",
			padding=>"10 10 10 10",
			margin=>"5 5 5 5",
			width=>120,
			iconCls=>"btools",
			iconAlign=>"left",
			handler=>"Ext.Msg.alert(\'Alert\',\'Is button cycle.\');"
		));
		$buttonCycle->menu->add("button1",$button1);
		$buttonCycle->menu->add("button2",$button2);
      ?>
      ';
      break;
    case 'tabpanel':
      $stringObj='
      <?php
        public function inputField($text,$name){
           $obj = new TText(array(
               fieldLabel=>$text,
               labelWidth=>100,
               name=>$name,
               padding=>"10 10 10 10",
               width=>350
           ));
	       return $obj;
        }

        $tab1=new TTab(array(
            title=>"Tab One"
        ));
	    $tab1->items->add("tabone",$this->inputField("Name","name"));

	    $tab2=new TTab(array(
            title=>"Tab Two"
        ));
        $tab2->items->add("tabtwo",$this->inputField("Phone","phone"));

	    $tab3=new TTab(array(
            title=>"Tab Three"
        ));
        $tab3->items->add("tabthree",$this->inputField("Email","email"));

	    $tab4=new TTab(array(
            title=>"Tab Four"
        ));
        $tab4->items->add("tabfour",$this->inputField("Subject","subject"));

	    $tabpanel=new TTabPanel(array(
                margin=>"5 5 5 5"
        ));
	    $tabpanel->items->add("tabonepanel",$tab1);
	    $tabpanel->items->add("tabtwopanel",$tab2);
	    $tabpanel->items->add("tabthreepanel",$tab3);
	    $tabpanel->items->add("tabfourpanel",$tab4);
      ?>
      ';
      break;
    case 'window':
      $stringObj='
      ==================================
      Simple Window
      ==================================

      <?php
        $simpleWindow = new TWindow(array(
            layout=>"fit",
		    title=>"Simple Window",
		    width=>600,
		    height=>300
        ));
      ?>
      
      ==================================
      Tools Window
      ==================================
      
      <?php
        $tool=new TTools();
	    $tool->type=TToolsType::$print;
	    $tool->handler="Ext.Msg.alert(\'INFO\',\'Print\');";
        $toolsWindow = new TWindow(array(
          layout=>"fit",
		  title=>"Tools Window",
		  width=>600,
		  height=>300,
		  tools=>$tool
	   ));
      ?>
      
      ==================================
      Toolbar Window
      ==================================
      
      <?php
        $buttonClose = new TButton(array(
    	    text=>"Close",
    	    iconCls=>"bclose",
			iconAlign=>"left",
			handler=>"Ext.Msg.alert(\'INFO\',\'Close\');"
		));

		$buttonNew = new TButton(array(
    	    text=>"New",
    	    iconCls=>"badd",
			iconAlign=>"left",
            handler=>"Ext.Msg.alert(\'INFO\',\'New\');"
		));

		$buttonSave = new TButton(array(
    	    text=>"Save",
            iconCls=>"bsave",
			iconAlign=>"left",
            handler=>"Ext.Msg.alert(\'INFO\',\'Save\');"
		));

       $toolbarWindow = new TWindow(array(
            layout=>"fit",
		    title=>"Toolbar Window",
		    width=>600,
		    height=>300
	   ));

	   $toolbarWindow->bbar->add("bnew",$buttonNew);
   	   $toolbarWindow->bbar->add("bsave",$buttonSave);
   	   $toolbarWindow->bbar->add("bclose",$buttonClose);
      ?>
      
      ==================================
      ';
      break;

}
?>

<?php
$type = $_GET['type'];
?>
<style>
    body{
       background-color:#FFFFFF;
       margin:10;
    }
    *{
       font-family:Verdana;
       font-size:12px;
    }
    p{
       padding:0 0 0 0;
       margin:0 0 0 0;
    }
    fieldset{
       border:1px solid #cccccc;
       padding:20px;
    }
    .titulo{
	   color:#569ce5;
	   font-size:20px;
	   font-family:Arial, Helvetica, sans-serif;
	   font-weight:bold;
	   padding:20px 0 0 0;
    }
</style>
<body>
      <div style="margin-bottom:20px">
           <img src="images/credits/logo_ext64x64.png" alt="Ext4PHP" title="Ext4PHP" style="float:left; margin:10px"/>
           <div class="titulo">Ext4PHP FrameWork - <?php echo ucwords($type);?></div>
      </div>
      <div style="padding:0 0 10px 10px">
           <p>The following is the naming of the object for use in your project.</p>
      </div>
      <fieldset>
          <legend><strong>For Example</strong></legend>
          <?php echo highlight_string($stringObj, true);?>
      </fieldset>
</body>
