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
           <p>Below is an example of use for this object.</p>
      </div>
      <fieldset>
          <legend><strong>For Example</strong></legend>
     <?php echo highlight_file("classT".ucwords($type).".php", true);?>
</fieldset>
</body>
