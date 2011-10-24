<?php
require("database.php");

$path_info=$_SERVER['PATH_INFO'];
if ($path_info){
	$_a=explode(".",$path_info);
	$_database='';
	$_template='';
	if (count($_a)==1){
		$_template=substr($_a[0],1,strlen($_a[0])-1);
	}
	else{
		$_database=substr($_a[0],1,strlen($_a[0])-1);
		$_template=$_a[1];
	}
	if ($_REQUEST){
		$_param=$_REQUEST["param"];
		if ($_param){
			$db=new TDatabase();
			$db->setTypeAccess(TTypeAccess::$taRemote);
			$db->setTemplateDB($_database);
			$db->setTemplateName($_template);
			$db->setInput($_param);
			$db->execute();
		}
		else{
			echo "Error: HDBC param missing";
		}
	}
	else{
		echo "Error: HDBC post missing";
	}
}
else{
	echo "Error: HDBC path info missing";
}
?>
