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

function line($str,$n){
	if($n==1)
	  $str = chr(13).chr(10).$str;
	else
		$str = chr(13).chr(10).$str.chr(13).chr(10);
	return $str;
}

function debug($file,$str){
	if(!is_dir('temp'))
		mkdir('temp',0777);
	$conteudo='';
	if(!is_file('temp/debug_'.$file.'.txt')){
		$conteudo .= 'Tabela de possíveis erros:'.chr(13).chr(10);
		$conteudo .= '[1] Erro: "template [] not found!" ou "template not found ()"'.chr(13).chr(10).'[1] Motivo: erro com o json'.chr(13).chr(10);
		$conteudo .= '[2] Erro: "Unknown error"'.chr(13).chr(10).'[2] Motivo: $dataPacket->add();'.chr(13).chr(10);
		$conteudo .= '[3] Erro: "invalid data source name" ou "SQLSTATE[42000] [1049] Unknown database \'\'"'.chr(13).chr(10).'[3] Motivo: O token esta errado;'.chr(13).chr(10);
	}
	$conteudo .= chr(13).chr(10).date('d/m/Y h:i:s').' - '.$str;
	$conteudo .= chr(13).chr(10).'-----------------------------------------------------------------------------';
  $file=fopen('temp/debug_'.$file.'.txt','a+');
	fwrite($file,$conteudo);
	fclose($file);
}

function sqlError($ret){
	$ret = explode(" ",$ret);
	$primaryKey=array("duplicate","entry","primary",0);
	foreach($ret as $valRet){
		foreach($primaryKey as $valPri){
			if($valRet == $valPri)
				$primaryKey[3]=$primaryKey[3]+1;
		}
	}
	if($primaryKey[3]>0){
		$ret="Este registro já existe.";
		return $ret;
	}
}

function strUpper($str){
	$a=array('á','é','í','ó','ú','ý','à','è','ì','ò','ù','â','ê','ô','ã','õ','ñ','ä','ë','ï','ö','ü','ÿ','ç');
	$b=array('Á','É','Í','Ó','Ú','Ý','À','È','Ì','Ò','Ù','Â','Ê','Ô','Ã','Õ','Ñ','Ä','Ë','Ï','Ö','Ü','Y','Ç');
	$str=str_replace($a,$b,$str);
	$str=strtoupper($str);
	return $str;
}
?>