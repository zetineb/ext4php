<?php
    $app->events->add('comboboxRemote',new ComboboxRemote());
    $app->events->add('getTree',new getTree());
	$app->events->add('getGridCount',new getGridCount());
	$app->events->add('getGridResult',new getGridResult());
?>
