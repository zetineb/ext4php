<?php
	$file=$_FILES['photo']['name'];
	$tmpFile=$_FILES['photo']['tmp_name'];
	$path=$_REQUEST['path'];
  //create path directory if not exists 
	if(!is_dir($path)){
	  mkdir($path,0777);
	}	
	move_uploaded_file($tmpFile,$path.$file); //upload file
	if(file_exists($path.$file)){
	  echo '{success:true,file:'.json_encode($file).'}';
	}else{
		echo '{failure:true,file:'.json_encode($file).'}';
	}	
?>