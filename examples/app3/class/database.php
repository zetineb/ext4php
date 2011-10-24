<?php
/*
*	Author: Rigoberto D. Benitez
*	Purpose: Manipulation SQL template
*/
class TTypeAccess {
	public static $taLocal=0;
	public static $taRemote=1;
}

class TDatabase {
	private $template='template';
	private $database='';
	private $input=array();
	private $token;
	private $user;
	private $pwd;
	private $pdo;
	private $inputRET='Input error';
	private $inTransaction=false;
	private $typeAccess;
	
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
	
    public function __construct(){
		$this->typeAccess=TTypeAccess::$taLocal;
	}
	
	public function setTypeAccess($typeAccess){
		$this->typeAccess=$typeAccess;
		return ($this);
	}
	
	public function setTemplateName($template){
		$this->template=trim($template);
		return ($this);
	}
	
	public function setTemplateDB($database){
		$this->database=trim($database);
		return ($this);
	}
	
	public function setInput($input){
		$this->input=explode("\r\n",$input);
		$_tmp=base64_decode($this->input[0]);
/*$f=fopen('debug.txt','w+');
fwrite($f,base64_decode($this->input[1]));
fclose($f);*/
		$_b=explode(';',$_tmp);
		$this->token='';
		for($i=0;$i<count($_b);$i++){
			$_c=explode('=',$_b[$i]);
			if (trim(strtolower($_c[0]))=='user')
				$this->user=$_c[1];
			elseif (trim(strtolower($_c[0]))=='pwd'||trim(strtolower($_c[0]))=='password')
				$this->pwd=$_c[1];
			else
				$this->token.=$_c[0].'='.$_c[1].';';
		}
		try{
			$this->pdo = new PDO($this->token,$this->user,$this->pwd);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->inputRET="OK";
		}
		catch(PDOException $e){ 
			$this->inputRET=$e->getMessage(); 
		}

		return ($this);
		//return $this->inputRET;
	}
	public function execute(){		
		if ($this->inputRET!='OK'){
			if ($this->typeAccess==TTypeAccess::$taRemote) echo $this->inputRET;
			return $this->inputRET;
		}
		try{
			$_r='OK';	//Valid for auth only
			for($i=1;$i<count($this->input);$i++){
				if (trim($this->input[$i])!=''){
					$_obj=json_decode(base64_decode($this->input[$i]));
					$alias='';
					if (strlen($this->database)) $alias=$this->database.'.';
					$stmt = $this->pdo->prepare('select * from '.$alias.$this->template.' where query_cod="'.$_obj->{'cod'}.'"');
					$stmt->execute();
					$rs = $stmt->fetch(PDO::FETCH_OBJ);
					$_r='Template ['.$_obj->{'cod'}.'] not found !';					
					if ($rs){
						$_sql=trim($rs->query_sql).' ';
						$_sql=$this->parseSQL($_sql,$_obj->{'params'});
						if ($i==1&&strtolower(substr($_sql,0,6))=='select'){
							$stmt = $this->pdo->prepare($_sql);
							$stmt->execute();
							//
							$aCols=array();
							if ($stmt->columnCount()){
								$_r='{"metadata":[';
								for($j=0;$j<$stmt->columnCount();$j++){
									array_push($aCols,null);
									$stmt->bindColumn($j+1,$aCols[$j]);
									//
									$meta = $stmt->getColumnMeta($j);
									$_type='unknown';
									if ($meta["native_type"]=="VAR_STRING"||$meta["native_type"]=="STRING"||$meta["native_type"]=="BLOB")
										$_type='string';
									elseif ($meta["native_type"]=="DATETIME"||$meta["native_type"]=="DATE"||$meta["native_type"]=="TIMESTAMP")
										$_type='date';
									elseif ($meta["native_type"]=="LONG"||$meta["native_type"]=="SHORT"||$meta["native_type"]=="LONGLONG"||substr($meta["native_type"],0,3)=="INT")
										$_type='integer';
									elseif ($meta["native_type"]=="NEWDECIMAL"||$meta["native_type"]=="DOUBLE"||$meta["native_type"]=="FLOAT")
										$_type='float';
										
									$_r.='{"attrname":"'.$meta["name"].'", "attrtype":"'.$_type.'", "attrsize":"'.$meta["len"].'"}';
									if ($j<($stmt->columnCount()-1)) $_r.=',';
								}
								$_r.='],';
								$_r.='"rowdata":[';
								$_first=true;
								while ($row = $stmt->fetch(PDO::FETCH_BOUND)){
									if (!$_first) $_r.=',';
									$_first=false;
									$_r.='{';
									for($j=0;$j<$stmt->columnCount();$j++){
										$meta = $stmt->getColumnMeta($j);
										$_type='unknown';
										if ($meta["native_type"]=="VAR_STRING"||$meta["native_type"]=="STRING"||$meta["native_type"]=="BLOB")
											$_type='string';
										elseif ($meta["native_type"]=="DATE")
											$_type='date';
										elseif ($meta["native_type"]=="DATETIME"||$meta["native_type"]=="TIMESTAMP")
											$_type='datetime';
										elseif ($meta["native_type"]=="LONG"||$meta["native_type"]=="SHORT"||$meta["native_type"]=="LONGLONG"||substr($meta["native_type"],0,3)=="INT")
											$_type='integer';
										elseif ($meta["native_type"]=="NEWDECIMAL"||$meta["native_type"]=="DOUBLE"||$meta["native_type"]=="FLOAT")
											$_type='float';
										$_r.='"'.$meta["name"].'":';
										if ($aCols[$j]==null)
											$_r.='null';
										else
										if ($_type=='string'||$_type=='date'||$_type=='datetime'){
											$val=str_replace("\x03",":",$aCols[$j]);
											$_r.='"'.$val.'"';
										}
										else
											$_r.=$aCols[$j];
										if ($j<($stmt->columnCount()-1)) $_r.=',';
									}
									$_r.='}';
									if ($this->typeAccess==TTypeAccess::$taRemote){
										echo $_r;
										$_r='';
									}
								}
								$_r.=']}';
								if ($this->typeAccess==TTypeAccess::$taRemote){
									echo $_r;
									$_r='';
								}
							}
						}
						else{	//insert, update, delete, ...
							if ($i==1){
								$this->pdo->beginTransaction();
								$this->inTransaction=true;
							}
							$this->pdo->exec($_sql);
						}
					}
					else{	//Template not found
						if ($this->typeAccess==TTypeAccess::$taRemote) echo $_r;
						break;
					}
				}
			}
			if ($this->inTransaction){
				$this->pdo->commit();
				$_r='OK';
				if ($this->typeAccess==TTypeAccess::$taRemote) echo $_r;
			}
			$this->pdo=null;
		}
		catch(Exception $e){
			if ($this->inTransaction) $this->pdo->rollBack();
			$_r=$e->getMessage(); 
			if ($this->typeAccess==TTypeAccess::$taRemote) echo $_r;
		}
		
		return $_r;
	}
}

//token-->mysql:host=localhost;dbname=e0000_comum;user=adm;pwd=xyz
/*  
	//Para verificar drivers instalados
	foreach(PDO::getAvailableDrivers() as $driver){
		echo $driver.'<br />';
    }*/
/*
/*$db=new TDatabase();
$db->setTypeAccess(TTypeAccess::$taRemote);
$db->setTemplateDB('empresas');
$db->setTemplateName('template');
//$db->setInput("bXlzcWw6aG9zdD1sb2NhbGhvc3Q7ZGJuYW1lPWUwMDAwO3VzZXI9YWRtO3B3ZD1hZG1AMTIz\r\neyJjb2QiOiIwMDAwNDIiLCJwYXJhbXMiOlt7Im5hbWUiOiJjZm9fY29kaWdvIiwidmFsdWUiOjk5OTAsInR5cGUiOiJpbnRlZ2VyIn0seyJuYW1lIjoiY2ZvX2Rlc2NyIiwidmFsdWUiOiJDRk8gOTk5MCIsInR5cGUiOiJzdHJpbmcifSx7Im5hbWUiOiJjZm9fdGlwbyIsInZhbHVlIjowLCJ0eXBlIjoiaW50ZWdlciJ9LHsibmFtZSI6ImNmb19yZWR1el9kZXNjciIsInZhbHVlIjoiIiwidHlwZSI6InN0cmluZyJ9XX0= \r\neyJjb2QiOiIwMDAwNDIiLCJwYXJhbXMiOlt7Im5hbWUiOiJjZm9fY29kaWdvIiwidmFsdWUiOjk5OTEsInR5cGUiOiJpbnRlZ2VyIn0seyJuYW1lIjoiY2ZvX2Rlc2NyIiwidmFsdWUiOiJDRk8gOTk5MSIsInR5cGUiOiJzdHJpbmcifSx7Im5hbWUiOiJjZm9fdGlwbyIsInZhbHVlIjowLCJ0eXBlIjoiaW50ZWdlciJ9LHsibmFtZSI6ImNmb19yZWR1el9kZXNjciIsInZhbHVlIjoiIiwidHlwZSI6InN0cmluZyJ9XX0=\r\neyJjb2QiOiIwMDAwNDIiLCJwYXJhbXMiOlt7Im5hbWUiOiJjZm9fY29kaWdvIiwidmFsdWUiOjk5OTIsInR5cGUiOiJpbnRlZ2VyIn0seyJuYW1lIjoiY2ZvX2Rlc2NyIiwidmFsdWUiOiJDRk8gOTk5MiIsInR5cGUiOiJzdHJpbmcifSx7Im5hbWUiOiJjZm9fdGlwbyIsInZhbHVlIjowLCJ0eXBlIjoiaW50ZWdlciJ9LHsibmFtZSI6ImNmb19yZWR1el9kZXNjciIsInZhbHVlIjoiIiwidHlwZSI6InN0cmluZyJ9XX0=");
$db->setInput("bXlzcWw6aG9zdD1sb2NhbGhvc3Q7ZGJuYW1lPWUwMDAwX2NvbXVtO3VzZXI9YWRtO3B3ZD1hZG1AMTIz\r\neyJjb2QiOiIyMDAwNzEiLCJwYXJhbXMiOlsgeyJuYW1lIjoic3RhcnQiLCJ2YWx1ZSI6MCwidHlwZSI6ImludGVnZXIifSwgeyJuYW1lIjoiY291bnQiLCJ2YWx1ZSI6MTAsInR5cGUiOiJpbnRlZ2VyIn0gXX0=");

$_r=$db->execute();
echo "<br><br>execute: ".$_r."<br>";
echo "<br>FIM";*/
?>