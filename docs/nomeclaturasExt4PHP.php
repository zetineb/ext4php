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
