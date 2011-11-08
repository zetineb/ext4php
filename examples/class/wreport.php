<?php
/*
*	Author : Rigoberto D. Benitez
*	Purpose: Report Generator
* 	Require: mpdf
*	PS     : This class uses anonymous functions.
*			 It is available in version 5 PHP 5.3.0
*/
define ("_MM",0.264583333);

class TWComponent {
	private $name;
	private $left;
	private $top;
	private $height;
	private $width;
	private $alignment;
	private $alignToBand;
	private $autoSize;
	private $fontName;
	private $fontSize;
	private $fontBold;
	private $fontItalic;
	private $owner;
	private $field="";
	private $_onPrint=null;
	
    public function setName($str){
	  $this->name=$str;
	  return ($this);
	}
	public function setLeft($int){
	  $this->left=$int*_MM;
	  return ($this);
	}
	public function setTop($int){
	  $this->top=$int*_MM;
	  return ($this);
	}
	public function setHeight($int){
	  $this->height=$int*_MM;
	  return ($this);
	}
	public function setWidth($int){
	  $this->width=$int*_MM;
	  return ($this);
	}
	public function setAlignment($str){
	  $this->alignment=$str;
	  return ($this);
	}
	public function setAlignToBand($bool){
	  $this->alignToBand=$bool;
	  return ($this);
	}
	public function setAutoSize($bool){
	  $this->autoSize=$bool;
	  return ($this);
	}
	public function setFontName($str){
	  $this->fontName=$str;
	  return ($this);
	}
	public function setFontSize($int){
	  $this->fontSize=$int;
	  return ($this);
	}
	public function setFontBold($bool){
	  $this->fontBold=$bool;
	  return ($this);
	}
	public function setFontItalic($bool){
	  $this->fontItalic=$bool;
	  return ($this);
	}
	public function setOwner($owner){
	  $this->owner=$owner;
	  return ($this);
	}
	public function setField($str){
	  $this->field=$str;
	  return ($this);
	}	
	public function setOnPrint($_onPrint){
      $this->_onPrint=$_onPrint;
	  return ($this);
    }
	
	public function getName(){
	  return $this->name;
	}
	public function getLeft(){
	  return $this->left;
	}
	public function getTop(){
	  return $this->top;
	}
	public function getHeight(){
	  return $this->height;
	}
	public function getWidth(){
	  return $this->width;
	}
	public function getAlignment(){
	  return $this->alignment;
	}
	public function getAlignToBand(){
	  return $this->alignToBand;
	}
	public function getAutoSize(){
	  return $this->autoSize;
	}
	public function getFontName(){
	  return $this->fontName;
	}
	public function getFontSize(){
	  return $this->fontSize;
	}
	public function getFontBold(){
	  return $this->fontBold;
	}
	public function getFontItalic(){
	  return $this->fontItalic;
	}
	public function getOwner(){
	  return $this->owner;
	}
	public function getField(){
	  return $this->field;
	}
	public function getReport(){
	  return $this->owner->getOwner();
	}
	//
	public function fireOnPrint(){
		if ($this->_onPrint){
			$_f = $this->_onPrint;
			$_f($this);
		}
	}
}

class TWShape extends TWComponent {
	private $penWidth;
	private $obj;
	
	public function setPenWidth($int){
	    $this->penWidth=$int*_MM;
		return ($this);
	}	
	public function setShape($str){
	  $this->shape=$str;
	  return ($this);
	}	

	public function getPenWidth(){
	  return $this->penWidth;
	}
	public function getShape(){
	  return $this->shape;
	}
}

class TWSysData extends TWComponent {
	private $data;
	public function setData($str){
	  $this->data=$str;
	  return ($this);
	}	
	public function getData(){
	  return $this->data;
	}
}

//Permitido uso de campos e variáveis, $total
//As variáveis devem estar registradas em report->var['total']=100;
class TWExpr extends TWComponent {
	private $expression;
	//
	public function setExpression($str){
	  $this->expression=$str;
	  return ($this);
	}	
	public function getExpression(){
	  return $this->expression;
	}
}

class TWDBText extends TWComponent {
//
}

class TWLabel extends TWComponent {
	private $caption;
	//
	public function setCaption($str){
	  $this->caption=$str;
	  return ($this);
	}	
	public function getCaption(){
	  return $this->caption;
	}
}

class TWBand {
	private $_onAfterPrint=null;
	private $_onBeforePrint=null;
	private $name;
	private $components=array();
	private $bandType;
	private $forceNewPage;
	private $expression;
	private $height;
	private $width;
	private $linkBand="";
	private $oldValue="";
	private $owner;
	
	public function setName($str){
	  $this->name=$str;
	  return ($this);
	}
	public function setBandType($str){
	  $this->bandType=$str;
	  return ($this);
	}
	public function setForceNewPage($bool){
	  $this->forceNewPage=$bool;
	  return ($this);
	}
	public function setExpression($str){
	  $this->expression=$str;
	  return ($this);
	}
	public function setHeight($int){
	  $this->height=$int*_MM;
	  return ($this);
	}
	public function setWidth($int){
	  $this->width=$int*_MM;
	  return ($this);
	}
	public function setLinkBand($str){
	  $this->linkBand=$str;
	  return ($this);
	}
	public function add($obj){
	  if (is_array($obj)){
		for($i=0;$i<count($obj);$i++){
			$obj[$i]->setOwner($this);
			array_push($this->components,$obj[$i]);
		}
	  }
	  else{
	    $obj->setOwner($this);
		array_push($this->components,$obj);
	  }
	}
	public function setOldValue($str){
	  $this->oldValue=$str;
	  return ($this);
	}
	public function setOwner($owner){
	  $this->owner=$owner;
	  return ($this);
	}
	
	public function getName(){
	  return $this->name;
	}
	public function getBandType(){
	  return $this->bandType;
	}
	public function getForceNewPage(){
	  return $this->forceNewPage;
	}
	public function getExpression(){
	  return $this->expression;
	}
	public function getHeight(){
	  return $this->height;
	}
	public function getWidth(){
	  return $this->width;
	}
	public function getLinkBand(){
	  return $this->linkBand;
	}
	public function getComponents(){
	  return $this->components;
	}
	public function getOldValue(){
	  return $this->oldValue;
	}
	public function getOwner(){
	  return $this->owner;
	}
	public function getReport(){
	  return $this->owner;
	}
	
	public function setOnBeforePrint($_onBeforePrint){
	  $this->_onBeforePrint=$_onBeforePrint;
	  return ($this);
	}
	public function setOnAfterPrint($_onAfterPrint){
	  $this->_onAfterPrint=$_onAfterPrint;
	  return ($this);
	}
	//
	public function fireOnBeforePrint(){
		if ($this->_onBeforePrint){
			$_f = $this->_onBeforePrint;
			$_f($this);
		}
	}
	public function fireOnAfterPrint(){
		if ($this->_onAfterPrint){
			$_f = $this->_onAfterPrint;
			$_f($this);
		}
	}
}

class TWReport extends mPDF{	
	private $_onAfterPrint=null;
	private $_onEndPage=null;
	private $_onStartPage=null;
	private $name;
	private $bottomMargin=0;
	private $leftMargin=0;
	private $orientation;
	private $pageSize;
	private $rightMargin=0;
	private $topMargin=0;
	private $height;
	private $width;
	private $dataPacket=null;
	private $bands=array();
	private $totPageH=0;
	private $pageN=0;
	private $summaryH=0;
	private $footerH=0;
	private $_type='pdf';
	public $var=array();		//Variáveis registradas pelo usuário. REGISTRO em beforeExecute: report->var['total']=100; USO em qualquer evento: $sender->getReport()->var['total']+=10;
  
	private function parseFormula($expr){
		$result='';
		$field='';
		for($i=0;$i<strlen($expr);$i++){
			$c=substr($expr,$i,1);
			if ((ord($c)>=97 && ord($c)<=122) || (ord($c)>=65 && ord($c)<=90) || ((ord($c)>=48 && ord($c)<=57) && (strlen($field)>0)) || ($c=='_') || ($c=='$')){
				$field.=$c;
			}
			else{
				if(strlen($field)>0){
					if (substr($field,0,1)!='$'){
						$result.=$this->dataPacket->fieldByName($field)->asString();
					}
					else{
						$result.=$this->var[substr($field,1,strlen($field)-1)];
					}
					$field='';
				}
				$result.=$c;
			}
		}    
		if(strlen($field)>0){
			if (substr($field,0,1)!='$'){
				$result.=$this->dataPacket->fieldByName($field)->asString();
			}
			else{
				$result.=$this->var[substr($field,1,strlen($field)-1)];
			}
		}
		
		return ($result);
	}
	
	private function getComponentValue($comp){
		$text='???';
		if (get_class($comp)=="TWLabel"){
			$text = $comp->getCaption();
		}
		elseif (get_class($comp)=="TWDBText"){
			$text=$comp->getField();
			if ($this->dataPacket&&strlen($text)) 
				$text=$this->dataPacket->fieldByName($text)->asString();
			else
				$text=$comp->getName();
		}
		elseif (get_class($comp)=="TWExpr"){
			$text='';
			if (strlen(trim($comp->getExpression()))){
				$_formula='$text='.$this->parseFormula(strtolower($comp->getExpression())).';';
				eval($_formula);
			}
		}
		elseif (get_class($comp)=="TWSysData"){
			$_data=$comp->getData();
			if ($_data=='wsDate')
				$text=date("d/m/Y");
			elseif ($_data=='wsDateTime')
				$text=date("d/m/Y H:i:s");
			elseif ($_data=='wsTime')
				$text=date("H:i:s");
			elseif ($_data=='wsPageNumber')
				$text=(string)$this->pageN;
		}
	
		return ($text);
	}
	
	private function printShape($i,$obj){
		if ($this->_type!='pdf') return;
		//
		$this->SetLineWidth($obj->getPenWidth());
		if ($obj->getShape()=='wsHorLine'){
			if($this->bands[$i]->getBandType()=="wbPageFooter")
				$this->Line($obj->getLeft(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop(),$obj->getLeft()+$obj->getWidth(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop());
			else
				$this->Line($obj->getLeft(),$this->totPageH+$obj->getTop(),$obj->getLeft()+$obj->getWidth(),$this->totPageH+$obj->getTop());
		}
		elseif ($obj->getShape()=='wsRectangle'){
			if($this->bands[$i]->getBandType()=="wbPageFooter")
				$this->Rect($obj->getLeft(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop(),$obj->getWidth(),$obj->getHeight());
			else
				$this->Rect($obj->getLeft(),$this->totPageH+$obj->getTop(),$obj->getWidth(),$obj->getHeight());
		}
		elseif ($obj->getShape()=='wsRightAndLeft'){
			if($this->bands[$i]->getBandType()=="wbPageFooter"){
				$this->Line($obj->getLeft(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop(),$obj->getLeft(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop()+$obj->getHeight());
				$this->Line($obj->getLeft()+$obj->getWidth(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop(),$obj->getLeft()+$obj->getWidth(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop()+$obj->getHeight());
			}
			else{
				$this->Line($obj->getLeft(),$this->totPageH+$obj->getTop(),$obj->getLeft(),$this->totPageH+$obj->getTop()+$obj->getHeight());
				$this->Line($obj->getLeft()+$obj->getWidth(),$this->totPageH+$obj->getTop(),$obj->getLeft()+$obj->getWidth(),$this->totPageH+$obj->getTop()+$obj->getHeight());
			}
		}
		elseif ($obj->getShape()=='wsTopAndBottom'){
			if($this->bands[$i]->getBandType()=="wbPageFooter"){
				$this->Line($obj->getLeft(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop(),$obj->getLeft()+$obj->getWidth(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop());
				$this->Line($obj->getLeft(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop()+$obj->getHeight(),$obj->getLeft()+$obj->getWidth(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop()+$obj->getHeight());
			}
			else{
				$this->Line($obj->getLeft(),$this->totPageH+$obj->getTop(),$obj->getLeft()+$obj->getWidth(),$this->totPageH+$obj->getTop());
				$this->Line($obj->getLeft(),$this->totPageH+$obj->getTop()+$obj->getHeight(),$obj->getLeft()+$obj->getWidth(),$this->totPageH+$obj->getTop()+$obj->getHeight());
			}
		}
		elseif ($obj->getShape()=='wsVertLine'){
			if($this->bands[$i]->getBandType()=="wbPageFooter")
				$this->Line($obj->getLeft(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop(),$obj->getLeft(),($this->getHeight()-$this->bands[$i]->getHeight())+$obj->getTop()+$obj->getHeight());
			else
				$this->Line($obj->getLeft(),$this->totPageH+$obj->getTop(),$obj->getLeft(),$this->totPageH+$obj->getTop()+$obj->getHeight());
		}	
	}
	
	private function printComponents($bandName){
		$_field=0;
		//
		for($i=0;$i<count($this->bands);$i++){
		  if($this->bands[$i]->getName()==$bandName){
			  $this->bands[$i]->fireOnBeforePrint();
			  $comps=$this->bands[$i]->getComponents();
				for($j=0;$j<count($comps);$j++){
					$comps[$j]->fireOnPrint();
					if (get_class($comps[$j])=="TWShape"){
						$this->printShape($i,$comps[$j]);
					}
					else{
						$text=$this->getComponentValue($comps[$j]);
						if ($this->_type=='pdf'){
							$align = "";
							if(!$comps[$j]->getAlignToBand()){
								if($comps[$j]->getAlignment()=="taCenter"){
									$align = "C";
								}elseif($comps[$j]->getAlignment()=="taLeftJustify"){
									$align = "L";
								}elseif($comps[$j]->getAlignment()=="taRightJustify"){
									$align = "R";
								}	
							}
							$style="";
							if($comps[$j]->getFontBold()){
							$style.="B";
							}
							/* esta dando problema com o I no mpdf
							if($comps[$j]->getFontItalic()){
							$style.="I";
							}*/

							$this->SetFont($comps[$j]->getFontName(),$style,$comps[$j]->getFontSize());
							if($this->bands[$i]->getBandType()=="wbPageFooter"){
								$this->SetXY($comps[$j]->getLeft(),($this->bands[$i]->getHeight()-$comps[$j]->getTop())*-1);
							}
							else{
								$this->SetXY($comps[$j]->getLeft(),$this->totPageH+$comps[$j]->getTop());
							}
							if (stristr(strtolower($text),"<table"))
								$this->WriteHTML($text,2,true,true);
							else
								$this->Cell($comps[$j]->getWidth(),$comps[$j]->getHeight(),$text,0,0,$align);
						}
						elseif ($this->_type=='word'||$this->_type=='calc'||$this->_type=='writer'){
							echo "<TD>".$text."</TD>";
						}
						elseif ($this->_type=='excel(xls)'){
							$_fieldName='';
							if (strlen($comps[$j]->getField()))
								$_fieldName=$comps[$j]->getField();
							else{
								$_field++;
								$_fieldName="F".(string)_field;
							}
							echo "<".$_fieldName.">".$text."</".$_fieldName.">";
						}
						elseif ($this->_type=='excel(csv)'||$this->_type=='calc(csv)'){
							echo $text.";";
						}
					}
				}
				$this->totPageH+=$this->bands[$i]->getHeight();
				$this->bands[$i]->fireOnAfterPrint();
			}
		}
	}
	
	//
	private function pageFooter(){
		if ($this->_type!='pdf') return;
		//
		for($i=0;$i<count($this->bands);$i++){
			if($this->bands[$i]->getBandType()=="wbPageFooter"){
				$this->printComponents($this->bands[$i]->getName());
				break;
			}
		}
	}
	private function pageHeader(){
		if ($this->_type!='pdf') return;
		//
		if ($this->pageN){
			$this->pageFooter();
			$this->AddPage($this->getOrientation(),'','','','',$this->getLeftMargin(),$this->getRightMargin(),$this->getTopMargin(),$this->getBottomMargin(),'','','','','','',0,0,0,0,''/*,$this->getPageSize()*/);
			$this->fireOnEndPage();
		}
		$this->fireOnStartPage();
		$this->totPageH=0;
		$this->pageN++;
		for($i=0;$i<count($this->bands);$i++){
			if($this->bands[$i]->getBandType()=="wbTitle" or $this->bands[$i]->getBandType()=="wbPageHeader"){
				$this->printComponents($this->bands[$i]->getName());
			}
		}
	}
	//
	private function summary(){
		if ($this->_type!='pdf') return;
		//
		for($i=0;$i<count($this->bands);$i++){
			if($this->bands[$i]->getBandType()=="wbSummary"){
				$this->printComponents($this->bands[$i]->getName());
				break;
			}
		}
	}
	//
	private function groupFooter($i){
		if ($this->_type!='pdf') return;
		//
		for($j=0;$j<count($this->bands);$j++){
			if($this->bands[$i]->getLinkBand()==$this->bands[$j]->getName()){
				if ($this->dataPacket->eof()||$this->dataPacket->fieldByName($this->bands[$j]->getExpression())->asString()!=$this->bands[$j]->getOldValue()){
					$this->dataPacket->prev();
					if ($this->totPageH>=($this->getHeight()-($this->getBottomMargin()+$this->footerH+$this->bands[$i]->getHeight()))){
						$this->pageHeader();
					}
					$this->printComponents($this->bands[$i]->getName());
					$this->dataPacket->next();
					//
					break;
				}
			}
		}
	}
	private function groupHeader($i){
		if ($this->_type!='pdf') return;
		//
		if ($this->dataPacket->fieldByName($this->bands[$i]->getExpression())->asString()!=$this->bands[$i]->getOldValue()){
			if (($this->bands[$i]->getForceNewPage()&&strlen($this->bands[$i]->getOldValue()))||($this->totPageH>=($this->getHeight()-($this->getBottomMargin()+$this->footerH+$this->bands[$i]->getHeight())))){
				$this->pageHeader();
			}
			$this->printComponents($this->bands[$i]->getName());
			//
			$this->bands[$i]->setOldValue($this->dataPacket->fieldByName($this->bands[$i]->getExpression())->asString());
		}
	}
	//
	private function details(){
		$this->pageHeader();
		while (!$this->dataPacket->eof()){
			if ($this->totPageH>=($this->getHeight()-($this->getBottomMargin()+$this->footerH))){
				$this->pageHeader();
			}
			for($i=0;$i<count($this->bands);$i++){
				if($this->bands[$i]->getBandType()=="wbGroupHeader"){
					$this->groupHeader($i);
				}
			}
			for($i=0;$i<count($this->bands);$i++){
				if($this->bands[$i]->getBandType()=="wbDetail" || $this->bands[$i]->getBandType()=="wbSubDetail"){
					if ($this->_type=='word'||$this->_type=='calc'||$this->_type=='writer') echo "<TR>";
					elseif ($this->_type=='excel(xls)') echo "<R>";
					$this->printComponents($this->bands[$i]->getName());
					if ($this->_type=='word'||$this->_type=='calc'||$this->_type=='writer') echo "</TR>";
					elseif ($this->_type=='excel(xls)') echo "</R>";
					elseif ($this->_type=='excel(csv)'||$this->_type=='calc(csv)') echo "\r\n";
				}
			}
			//
			$this->dataPacket->next();
			//
			for($i=0;$i<count($this->bands);$i++){
				if($this->bands[$i]->getBandType()=="wbGroupFooter"){
					$this->groupFooter($i);
				}
			}
		}
		//
		if ($this->summaryH>0){
			if ($this->totPageH>=($this->getHeight()-($this->getBottomMargin()+$this->footerH+$this->summaryH))){
				$this->pageHeader();
			}
			$this->summary();
		}
		if ($this->totPageH<($this->getHeight()-($this->getBottomMargin()+$this->footerH))){
			$this->pageFooter();
		}
	}
	private function orderBands(){
		$_a=array();
		$_order=array('wbTitle'=>0,'wbPageHeader'=>1,'wbGroupHeader'=>2,'wbDetail'=>3,'wbSubDetail'=>4,'wbGroupFooter'=>5,'wbPageFooter'=>6,'wbSummary'=>7);
		for($i=0;$i<count($this->bands);$i++){
			$_b=array($_order[$this->bands[$i]->getBandType()],$i);
			array_push($_a,$_b);
		}
		sort($_a);
		$_bands=$this->bands;
		$this->bands=array();
		for($i=0;$i<count($_a);$i++){
			array_push($this->bands,$_bands[$_a[$i][1]]);
		}
	}
	//
	public function setName($str){
	  $this->name=$str;
	  return ($this);
	}	
	public function setBottomMargin($int){
	  $this->bottomMargin=$int*_MM;
	  return ($this);
	}
	public function setLeftMargin($int){
	  $this->leftMargin=$int*_MM;
	  return ($this);
	}
	public function setOrientation($str){
	  $this->orientation=$str;
	  return ($this);
	}
	public function setPageSize($str){
	  $this->pageSize=$str;
	  return ($this);
	}
	public function setRightMargin($int){
	  $this->rightMargin=$int*_MM;
	  return ($this);
	}
	public function setTopMargin($int){
	  $this->topMargin=$int*_MM;
	  return ($this);
	}
	public function setHeight($int){
	  $this->height=$int*_MM;
	  return ($this);
	}
	public function setWidth($int){
	  $this->width=$int*_MM;
	  return ($this);
	}
	public function setDataPacket($dataPacket){
	  $this->dataPacket=$dataPacket;
	  return ($this);
	}
	public function setType($_type){
	  $this->_type=$_type;
	  return ($this);
	}
	public function add($band){
	  if (is_array($band)){
		for($i=0;$i<count($band);$i++){
			$band[$i]->setOwner($this);
			array_push($this->bands,$band[$i]);
		}
	  }
	  else{
		  $band->setOwner($this);
		  array_push($this->bands,$band);
	  }
	}
	public function getName(){
	  return $this->name;
	}
	public function getBottomMargin(){
	  return $this->bottomMargin;
	}
	public function getLeftMargin(){
	  return $this->leftMargin;
	}
	public function getOrientation(){
	  return $this->orientation;
	}
	public function getPageSize(){
	  return $this->pageSize;
	}
	public function getRightMargin(){
	  return $this->rightMargin;
	}
	public function getTopMargin(){
	  return $this->topMargin;
	}
	public function getHeight(){
	  return $this->height;
	}
	public function getWidth(){
	  return $this->width;
	}
	public function getDataPacket(){
	  return $this->dataPacket;
	}
	public function getType(){
	  return $this->_type;
	}
	public function getBands(){
	  return $this->bands;
	}
	public function getReport(){
	  return $this;
	}

	//
	public function setOnAfterPrint($_onAfterPrint){
	  $this->_onAfterPrint=$_onAfterPrint;
	  return ($this);
	}
	public function setOnEndPage($_onEndPage){
	  $this->_onEndPage=$_onEndPage;
	  return ($this);
	}	
	public function setOnStartPage($_onStartPage){
	  $this->_onStartPage=$_onStartPage;
	  return ($this);
	}
	//
	public function fireOnAfterPrint(){
		if ($this->_onAfterPrint){
			$_f = $this->_onAfterPrint;
			$_f($this);
		}
	}
	public function fireOnEndPage(){
		if ($this->_onEndPage){
			$_f = $this->_onEndPage;
			$_f($this);
		}
	}
	public function fireOnStartPage(){
		if ($this->_onStartPage){
			$_f = $this->_onStartPage;
			$_f($this);
		}
	}
	//
	//
	public function execute(){
		//
		//Order bands by types
		$this->orderBands();
		//
		for($i=0;$i<count($this->bands);$i++){
			if($this->bands[$i]->getBandType()=="wbPageFooter"){
				$this->footerH=$this->bands[$i]->getHeight();
			}
			if($this->bands[$i]->getBandType()=="wbSummary"){
				$this->summaryH=$this->bands[$i]->getHeight();
			}
		}
		if ($this->_type=='pdf'){  //Bug na orientation quando inclui getPageSize, testar na última versão do mpdf
			$this->AddPage($this->getOrientation(),'','','','',$this->getLeftMargin(),$this->getRightMargin(),$this->getTopMargin(),$this->getBottomMargin(),'','','','','','',0,0,0,0,''/*,$this->getPageSize()*/);
		}
		elseif ($this->_type=='word'){
			header('Content-Type: application/msword');
			header('Content-Disposition: attachment; filename="'.$this->name.'.doc"');
			echo "<TABLE>";
		}
		elseif ($this->_type=='excel(xls)'){
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.$this->name.'.xls"');
			echo '<?xml version="1.0" ?>';
			echo "<T>";
		}
		elseif ($this->_type=='excel(csv)'){
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.$this->name.'.csv"');
		}
		elseif ($this->_type=='calc(csv)'){
			header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
			header('Content-Disposition: attachment; filename="'.$this->name.'.ods"');
		}
		elseif ($this->_type=='calc'){
			header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
			header('Content-Disposition: attachment; filename="'.$this->name.'.ods"');
			echo "<TABLE>";
		}
		elseif ($this->_type=='writer'){
			header('Content-Type: application/vnd.oasis.opendocument.text-web');
			header('Content-Disposition: attachment; filename="'.$this->name.'.oth"');
			echo "<TABLE>";
		}
		
		$this->details();
		$this->fireOnAfterPrint();
		if ($this->_type=='pdf')
			$this->Output();
		elseif ($this->_type=='word'||$this->_type=='calc'||$this->_type=='writer'){
			echo "</TABLE>";
		}
		elseif ($this->_type=='excel(xls)'){
			echo "</T>";
		}
	}	
}
?>