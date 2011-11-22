<?php
$type = $_GET['type'];
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
     <?php echo highlight_file("classT".ucwords($type).".php", true);?>
</fieldset>
