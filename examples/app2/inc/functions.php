<?php
function dateToField($date){
	if($date=='1970-01-01 00:00:00' or $date=='0000-00-00'){
		$date="";
		return $date;	
	}else{
		$date = str_replace("-","/",$date);
		$date = date('d/m/Y',strtotime($date));
		return $date;
	}
}

function fieldToDate($date){
	if($date=='1970-01-01 00:00:00' or $date=='0000-00-00'){
		$date="";
		return $date;	
	}else{
		$date = str_replace("/","-",$date);
		$date = date('Y-m-d',strtotime($date));
		return $date;
	}
}

function removeWhiteLine($text){
  $str = preg_split('#[\n\r]#',$text);
	$str = implode($str);
	return $str;
}
?>