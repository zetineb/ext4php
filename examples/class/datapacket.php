<?php
/*
*	Author: Rigoberto D. Benitez
*	Purpose: Datapacket Manipulation
*/
class TFieldConversion{
	private $valor;
	
  public function __construct($val){
    $this->valor=$val;
  }
  public function isNull(){
    return ($this->valor==null) ? true : false;
  }
  public function asString(){
    return (string)$this->valor;
  }
  public function asInteger(){
    return (int)$this->valor;
  }
  public function asFloat(){
    return (float)$this->valor;
  }
  public function asDateTime(){
    $val = date("Y-m-d H:i:s", strtotime($this->valor));
    return $val;
  }
  public function asDate(){
    $val = date('Y-m-d', strtotime($this->valor));
    return $val;
  }
}
	
class TMetaField{
	private $valor;
	
  public function __construct($val){
    $this->valor=$val;
  }
  public function fieldName(){
    return $this->valor->{'attrname'};
  }
  public function fieldType(){
    return $this->valor->{'attrtype'};
  }
  public function fieldSize(){
    return $this->valor->{'attrsize'};
  }
}

class TMetaData {
	private $valor;
	
  public function __construct($val){
    $this->valor=$val;
  }
  public function count(){
    return count($this->valor);
  }
  public function field($index){
    if($index >=0 and $index < $this->count()){
      return new TMetaField($this->valor[$index]);
    }else{
      throw new Exception(get_class($this).' Error: Out of range');
    }
  }
  public function field2($name){
    $index = -1;
    for($i=0;$i<$this->count();$i++){
      if(strtolower($name) == strtolower($this->valor[$i]->{'attrname'})){
        $index = $i;
        break;
      }
    }
    if($index>=0){
      return $this->field($index);
    }else{
      throw new Exception(get_class($this).' Error: Name not found');
    }
  }
}

class TDataPacket{
  private $commands=array();
  private $url='';
  private $metadata;
  private $rowdata;
  private $message="";
  private $token;
  private $next;
  private $close;
  private $open;
  private $pointer=-1;
  private $isOpen=false;
  private $eof=true;
  private $db=null;
	
  public function setDatabase($db){
	if (get_class($db)!='TDatabase') throw new Exception(get_class($this).' Error: Invalid Database');
	$this->db=$db;
  }
  
  public function add($commands) {
	array_push($this->commands,$commands);
  }
  public function setToken($token){
    $this->token = base64_encode($token);
  }
  public function setUrl($url){
    $this->url = $url;
  }
  public function getRecordCount(){
    return count($this->rowdata);
  }
  public function getMetadata(){
    return new TMetaData($this->metadata);
  }
  public function getRowdata(){
    return $this->rowdata;
  }
  public function getMessage(){
    return $this->message;
  }
  public function getCommands(){
    return $this->commands;
  }
  public function execute(){
	if (!strlen($this->url)&&!$this->db) throw new Exception(get_class($this).' Error: Missing URL and Database');
	if (!strlen($this->token)) throw new Exception(get_class($this).' Error: Missing Token');
	if (!count($this->commands)) throw new Exception(get_class($this).' Error: Missing Commands');
	
	$p='';
	if (stristr($this->url,"hdbc.php")) $p='param=';
    $sret="";
    $req = $this->token."\r\n";
    foreach ($this->commands as $a){
      $req .= base64_encode($a)."\r\n";
    }
	if (!$this->db){
		$ch = curl_init($this->url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $p.$req);
		$retorno = curl_exec($ch);	
	}
	else{
		$this->db->setInput($req);
		$retorno=$this->db->execute();
	}
    if(!$this->isOpen or !stristr($retorno,"metadata")){
      $sret=$retorno;
    }else{
      $sret = "JSON Decode error";
      $retorno = json_decode($retorno);
	  if ($retorno){
		  $sret="OK";
		  $this->metadata = $retorno->{'metadata'};
		  $this->rowdata = $retorno->{'rowdata'};
		  $this->next();
	  }
    }
    return $sret;
  }
  public function prev(){
    if($this->getRecordCount()>0 and $this->pointer>0){
      $this->pointer--;
    }
  }
  public function next(){
    if($this->getRecordCount()>0 and $this->pointer<($this->getRecordCount())){
      $this->pointer++;
    }
  }
  public function fieldByName($name){
	if($this->pointer == $this->getRecordCount()){
		throw new Exception(get_class($this).' Error: End of file');
	}
	else
	if (!$name) throw new Exception(get_class($this).' Error: Invalid field name');
	
    $rowdata = $this->getRowdata();
    return new TFieldConversion($rowdata[$this->pointer]->{$name});
  }
  public function fieldByIndex($index){
    return $this->fieldByName($this->metadata[$index]->{'attrname'});
  }
  public function clear(){
    $this->commands=array();
  }
  public function close(){
    $this->metadata = "";
    $this->rowdata = "";
    $this->isOpen = false;
    $this->eof = true;
  }
  public function open(){
    $this->close();
    $this->isOpen=true;
	$_ret=$this->execute();
	//if ($_ret!='OK') throw new Exception(get_class($this).' Error: '.$_ret);
	
    return $_ret;
  }
  public function eof(){
    if($this->pointer<0 or $this->pointer==$this->getRecordCount()){
      return true;
    }else{
      return false;
    }
  }
}

/*
$dataPacket = new TDataPacket();
//select $filtro = '{"cod":"000051","params":[{"name":"pdv_codigo","value":"%","type":"integer"},{"name":"start","value":0,"type":"integer"},{"name":"count","value":9999999,"type":"integer"}]}';
$filtro = '{"cod":"200101","params":[{"name":"start","value":0,"type":"integer"},{"name":"count","value":9999999,"type":"integer"}]}';
//$token = "dsn=empresa;database=e0000";
$token = "dsn=empresa;database=e0000_comum";
$dataPacket->setToken($token);
$dataPacket->add($filtro);
try{
	$ret = $dataPacket->execute();
	if($ret!="OK"){
	  echo $ret;
	}

	$metadata = $dataPacket->getMetadata();
  for($i=0;$i<$metadata->count();$i++){
	  $name = $metadata->field($i)->fieldName();
	  echo $metadata->field2($name)->fieldName()." ".$metadata->field2($name)->fieldType()." ".$metadata->field2($name)->fieldSize()."<br>";
	}
	*/
	/*
	for($i=0;$i<$metadata->count();$i++){
	  echo $metadata->field($i)->fieldName()." ".$metadata->field($i)->fieldType()." ".$metadata->field($i)->fieldSize()."<br>";
	}
    */
	/*
	while(!$dataPacket->eof()){
		for($i=0;$i<$dataPacket->getMetadata()->count();$i++){
			echo $dataPacket->fieldByIndex($i)->asInteger()." ";
		}
		$dataPacket->next();
		echo "<br>";
  }
	echo "<br>".$dataPacket->getRecordCount();
	
	while(!$dataPacket->eof()){
	  echo $dataPacket->fieldByName('pdv_codigo')->asString()."<br>";
	  $dataPacket->next();
	}
	
	//echo "<br><br><br><pre>";print_r($dataPacket->getMetadata());
}catch (Exception $e) {
  echo ($e->getMessage());
}	
*/
?>