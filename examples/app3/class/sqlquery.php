<?php
class TDriverType{
	public static $dblib='dblib';
	public static $firebird='firebird';
	public static $ibm='ibm';
	public static $informix='informix';
	public static $mysql='mysql';
	public static $oci='oci';
	public static $odbc='odbc';
	public static $pgsql='pgsql';
	public static $sqlite='sqlite';
	public static $sqlsrv='sqlsrv';
}

class TParam{
	private $field;
	//
	public $asString=null;	
	public $asDate=null;	
	public $asDateTime=null;	
	public $asInteger=null;	
	public $asFloat=null;	
	public function __construct($value){
		$this->field=$value;
	}
	public function getField(){
		return ($this->field);
	}
}

class TField{
	public $value;
	public $name;
	public $type;
	public $len;
	public $precision;
	
	public function isNull(){
		return ($this->value==null) ? true : false;
	}
	public function asString(){
		return (string)$this->value;
	}
	public function asInteger(){
		return (int)$this->value;
	}
	public function asFloat(){
		return (float)$this->value;
	}
	public function asDateTime(){
		$val = date("Y-m-d H:i:s", strtotime($this->value));
		return $val;
	}
	public function asDate(){
		$val = date("Y-m-d", strtotime($this->value));
		return $val;
	}
	//
	public function value(){
		return $this->value;
	}
	public function name(){
		return $this->name;
	}
	public function type(){
		return $this->type;
	}
	public function len(){
		return $this->len;
	}
	public function precision(){
		return $this->precision;
	}
}

class TSQLDB{
	private $user=null;
	private $pwd='';
	private $dbname=null;
	private $driver=null;
	private $host='localhost';
	private $query=null;
	private $strConn=null;

	public function __construct($value){
		$this->query=$value;
	}
	public function setUser($value){
		$this->user=$value;
		return $this;
	}
	public function setPwd($value){
		$this->pwd=$value;
		return $this;
	}
	public function setDriver($value){
		$this->driver=$value;
		return $this;
	}
	public function setDBName($value){
		$this->dbname=$value;
		return $this;
	}
	public function setHost($value){
		$this->host=$value;
		return $this;
	}
	public function setStrConn($value){
		$this->strconn=$value;
		return $this;
	}
	//
	public function connect(){
		$this->query->__connect();
	}
	public function startTransaction(){
		$this->query->__startTransaction();
	}
	public function commit(){
		$this->query->__commit();
	}
	public function rollBack(){
		$this->query->__rollBack();
	}
	//
	public function getUser(){
		return $this->user;
	}
	public function getPwd(){
		return $this->pwd;
	}
	public function getDriver(){
		return $this->driver;
	}
	public function getDBName(){
		return $this->dbname;
	}
	public function getHost(){
		return $this->host;
	}
	public function getStrConn(){
		return $this->strconn;
	}
}

class TSQLQuery{
	private $pdo;
	
	private $sql=null;
	private $_sql='';	//Parsed
	private $params=array();
	private $fields=array();
	private $eof=true;
	private $stmt=null;
	private $inTrans=false;
	//
	public $database;
	
	private function parseSQL($_sql,$_params){
		$_res='';
		$_f=false;
		$_var='';
		for($i=0;$i<strlen($_sql);$i++){
			$_c=substr($_sql,$i,1);
			if ($_f&&($_c==' '||$_c==','||$_c==')'||$_c==';'||$_c=='='||$_c=='-'||$_c=='+'||$_c=='/'||$_c=='*'||$_c=='<'||$_c=='>'||$_c=='!'||$_c=='.')){
				for($j=0;$j<count($_params);$j++){
					if (strtolower($_params[$j]->{'name'})==strtolower($_var)){
						if (strtolower($_params[$j]->{'type'})=='null')
							$_res.='null';
						elseif (strtolower($_params[$j]->{'type'})=='string'||strtolower($_params[$j]->{'type'})=='date'||strtolower($_params[$j]->{'type'})=='datetime'||strtolower($_params[$j]->{'type'})=='timestamp'){
							$_res.='"'.$_params[$j]->{'value'}.'"';
						}
						else{
							$_res.=$_params[$j]->{'value'};
						}
						
						break;
					}
				}
				$_res.=$_c;
				$_f=false;
				$_var='';
			}
			elseif ($_f){
				$_var.=$_c;
			}
			elseif ($_c==':'){
				$_f=true;
			}
			else
				$_res.=$_c;
		}
		
		return trim($_res);
	}
	private function exec(){
		if (!$this->pdo) throw new Exception(get_class($this).' Error: not connected');
		$param='[';
		for ($i=0;$i<count($this->params);$i++){
			if ($i) $param.=',';
			if (!is_null($this->params[$i]->asString)) $param.='{"name":"'.$this->params[$i]->getField().'","value":"'.$this->params[$i]->asString.'","type":"string"}';
			elseif (!is_null($this->params[$i]->asDate)) $param.='{"name":"'.$this->params[$i]->getField().'","value":"'.$this->params[$i]->asDate.'","type":"date"}';
			elseif (!is_null($this->params[$i]->asDateTime)) $param.='{"name":"'.$this->params[$i]->getField().'","value":"'.$this->params[$i]->asDateTime.'","type":"datetime"}';
			elseif (!is_null($this->params[$i]->asInteger)) $param.='{"name":"'.$this->params[$i]->getField().'","value":'.$this->params[$i]->asInteger.',"type":"integer"}';
			elseif (!is_null($this->params[$i]->asFloat)) $param.='{"name":"'.$this->params[$i]->getField().'","value":'.$this->params[$i]->asFloat.',"type":"float"}';
		}
		$param.=']';
		$this->_sql=$this->parseSQL($this->sql.' ',json_decode($param));
	}
	//
	public function __construct(){
		$this->database=new TSQLDB($this);
	}
	public function __destruct(){
		unset($this->database);
		$this->close();
	}
	public function __connect(){
		//mysql:host=localhost;dbname=e0000;user=adm;pwd=adm@123
		if ($this->database->getDriver()!=TDriverType::$odbc){
			$this->pdo = new PDO($this->database->getDriver().':host='.$this->database->getHost().';dbname='.$this->database->getDBName().';',$this->database->getUser(),$this->database->getPwd());
		}
		else{
			$this->pdo = new PDO(TDriverType::$odbc.':'.$this->database->getStrConn());
		}
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	public function sql($value){
		$this->sql=$value;
	}
	public function paramByName($value){
		array_push($this->params,new TParam($value));
		return $this->params[count($this->params)-1];
	}
	public function open($value=''){
		if ($value) $this->sql=$value;
		$this->exec();
		$this->stmt = $this->pdo->prepare($this->_sql);
		$this->stmt->execute();
		for($j=0;$j<$this->stmt->columnCount();$j++){
			array_push($this->fields,new TField());
			$this->stmt->bindColumn($j+1,$this->fields[$j]->value);
			//
			try{
				$meta = $this->stmt->getColumnMeta($j);
				$this->fields[$j]->type='unknown';
				if ($meta["native_type"]=="VAR_STRING"||$meta["native_type"]=="STRING"||$meta["native_type"]=="BLOB")
					$this->fields[$j]->type='string';
				elseif ($meta["native_type"]=="DATE")
					$this->fields[$j]->type='date';
				elseif ($meta["native_type"]=="DATETIME"||$meta["native_type"]=="TIMESTAMP")
					$this->fields[$j]->type='datetime';
				elseif ($meta["native_type"]=="LONG"||$meta["native_type"]=="SHORT"||$meta["native_type"]=="LONGLONG"||substr($meta["native_type"],0,3)=="INT")
					$this->fields[$j]->type='integer';
				elseif ($meta["native_type"]=="NEWDECIMAL"||$meta["native_type"]=="DOUBLE"||$meta["native_type"]=="FLOAT")
					$this->fields[$j]->type='float';
				$this->fields[$j]->name=$meta["name"];
				$this->fields[$j]->len=$meta["len"];
				$this->fields[$j]->precision=$meta["precision"];
			}
			catch(Exception $e){
				$this->fields[$j]->type='unknown';
				$this->fields[$j]->name=$j;
				$this->fields[$j]->len=0;
				$this->fields[$j]->precision=0;
			}
		}
		$this->next();
	}
	public function next(){
		$this->eof=!$this->stmt->fetch(PDO::FETCH_BOUND);
	}
	public function eof(){
		return ($this->eof);
	}
	public function close(){
		if ($this->pdo) unset($this->pdo);
		$this->stmt=null;
		$this->pdo=null;
		$this->eof=true;
		$this->_sql='';
		for($i=0;$i<count($this->params);$i++) unset($this->params[$i]);
		for($i=0;$i<count($this->fields);$i++) unset($this->fields[$i]);
		$this->params=array();
		$this->fields=array();
	}
	public function fieldByName($value){
		$index=-1;
		for ($i=0;$i<count($this->fields);$i++){
			if (!strcasecmp($value,$this->fields[$i]->name)){
				$index=$i;
				break;
			}
		}

		return ($this->fields[$index]);
	}
	public function fieldByIndex($value){
		return ($this->fields[$value]);
	}
	public function __startTransaction(){
		$this->pdo->beginTransaction();
		$this->inTrans=true;
	}
	public function __commit(){
		if ($this->inTrans){
			$this->pdo->commit();
		}
		$this->inTrans=false;
		$this->close();
	}
	public function __rollBack(){
		if ($this->inTrans){
			$this->pdo->rollBack();
		}
		$this->inTrans=false;
		$this->close();
	}
	public function execute($value=''){
		if (!$this->inTrans) throw new Exception(get_class($this).' Error: missing start transaction');
		if ($value) $this->sql=$value;
		$this->exec();
		$this->pdo->exec($this->_sql);
		//
		for($i=0;$i<count($this->params);$i++) unset($this->params[$i]);
		$this->params=array();
	}
	public function getSQL(){
		return ($this->_sql);
	}
	public function fields(){
		return $this->fields;
	}
	public function getRecord(){
		$record='[';
		for($i=0;$i<count($this->fields);$i++){
			if ($i) $record.=',';
			if ($this->fields[$i]->isNull())
				$record.='{"'.$this->fields[$i]->name().'":null}';
			elseif ($this->fields[$i]->type()=='string'||$this->fields[$i]->type()=='date'||$this->fields[$i]->type()=='datetime')
				$record.='{"'.$this->fields[$i]->name().'":"'.$this->fields[$i]->value().'"}';
			else
				$record.='{"'.$this->fields[$i]->name().'":'.$this->fields[$i]->value().'}';
		}
		$record.=']';
		
		return ($record);
	}
}
/*
try{
	$qry=new TSQLQuery();
	$qry->database->setDriver(TDriverType::$mysql)->setDBName('e0000')->setUser('root');
	$qry->database->connect();
	$qry->sql('select * from cfo where cfo_codigo=:cfo_codigo or cfo_descr like :cfo_descr');
	$qry->paramByName('cfo_codigo')->asInteger=1;
	$qry->paramByName('cfo_descr')->asString='%';
	$qry->open();
	$fields=$qry->fields();
	for($i=0;$i<count($fields);$i++)
		echo $fields[$i]->name().'|'.$fields[$i]->type().'|'.$fields[$i]->len().'|'.$fields[$i]->precision().'<br>';
	while (!$qry->eof()){
//		echo $qry->fieldByName('cfo_codigo')->asInteger().' ';
//		echo $qry->fieldByName('cfo_descr')->asString().' ';
//		echo $qry->fieldByName('cfo_reduz_descr')->isNull()?'true':'false';
		echo $qry->getRecord();
		echo '<br>';
		$qry->next();
	}
	$qry->close();
	//
	$qry->database->connect();
	$qry->database->startTransaction();
	$qry->execute('delete from cfo');
	$qry->sql('insert into cfo (cfo_codigo,cfo_descr) values (:cfo_codigo,:cfo_descr)');
	for($i=0;$i<10;$i++){
		$qry->paramByName('cfo_codigo')->asInteger=$i;
		$qry->paramByName('cfo_descr')->asString='Descr'.$i;
		//
		$qry->execute();
	}
	$qry->database->commit();
}
catch(Exception $e){
	echo $e->getMessage();
}*/
?>