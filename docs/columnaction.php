<?php
	$button=new TButton(array(
		icon=>'images/buttons/edit.png',
		tooltip=>'Edit Data',
		width=>22,
		handler=>"Ext.Msg.alert('Event','Run your event.')"
	));
    $col=new TColumnAction(array(
	  width=>20
	));
	$col->items->add('button',$button);	
?>
