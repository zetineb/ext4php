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

}
?>
<style>
    *{
       font-family:Verdana;
       font-size:12px;
    }
    fieldset{
       border:1px solid #cccccc;
       padding:20px;
    }
</style>
<fieldset>
          <legend><strong>For Example</strong></legend>
     <?php echo highlight_string($stringObj, true);?>
</fieldset>
