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
           <div class="titulo">Ext4PHP FrameWork - Events</div>
      </div>
      <div style="padding:0 0 0 10px">
           <p>Some objects are required to use events for their operation is correct. Every event is mandatory to insert in the app.</p>
           <p><b>Example:</b> Entering the event for the combobox remote.</p>
           <p><b>$app->events->add('comboboxRemote',new ComboboxRemote());</b></p>
      </div>
      <div style="padding:10px 0 0 10px">
           <fieldset>
               <legend><strong>Usage</strong></legend>
               <?php echo highlight_file("events.php", true);?>
           </fieldset>
      </div>
</body>
