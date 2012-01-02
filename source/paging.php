<?php
/*
	Ext.data.Operation is required to use this class. 
	Required properties are start, and page limit. 
	Property count (total records) is not mandatory
*/
class TPaging{
	private $grid;
	//
	public $buttonsAlign='left';
	public $displayMsg='Page';
	//
	public $gridId;
	public $first;
	public $prev;
	public $next;
	public $last;
	
	public function __construct($id,$operation,$param=array()){	//grid id, variable operation name, params of grid
		$this->gridId=$id;
		$this->grid=new TGrid($param);
		//
		$this->first=new TButton();
		$this->first->text='First';
		//$this->first->iconCls='bpgfirst';
		$this->first->iconAlign='left';
		$this->first->handler="
			if (typeof ".$operation."=='undefined'){
				Ext.Msg.alert('ERROR','Missing paging operation for id ".$id."');
				return;
			}
			var _last=999999;
			if (typeof ".$operation.".count!='undefined') _last=Math.ceil(".$operation.".count/".$operation.".limit);
			".$operation.".page=1;
			".$operation.".start=0;
			var _txt='?';
			if (typeof ".$operation.".count!='undefined') _txt=_last;
			if (Ext.getCmp('".$id."_display').displayMsg!='')
				Ext.getCmp('".$id."_display').setText('<b>'+Ext.getCmp('".$id."_display').displayMsg+': '+".$operation.".page+' - '+_txt+'</b>');
			Ext.getCmp('".$id."').getStore().load(".$operation.");
		";
		//
		$this->prev=new TButton();
		$this->prev->text='Previous';
		//$this->prev->iconCls='bpgprev';
		$this->prev->iconAlign='left';
		$this->prev->handler="
			if (typeof ".$operation."=='undefined'){
				Ext.Msg.alert('ERROR','Missing paging operation for id ".$id."');
				return;
			}
			var _last=999999;
			if (typeof ".$operation.".count!='undefined') _last=Math.ceil(".$operation.".count/".$operation.".limit);
			if (".$operation.".page>1){
				".$operation.".page--;
				".$operation.".start-=".$operation.".limit;
				var _txt='?';
				if (typeof ".$operation.".count!='undefined') _txt=_last;
				if (Ext.getCmp('".$id."_display').displayMsg!='')
					Ext.getCmp('".$id."_display').setText('<b>'+Ext.getCmp('".$id."_display').displayMsg+': '+".$operation.".page+' - '+_txt+'</b>');
				Ext.getCmp('".$id."').getStore().load(".$operation.");
			}
			else
			if (".$operation.".page==-1){
				Ext.Msg.alert('INFORMATION','Click on the first page');
			}
		";
		//
		$this->next=new TButton();
		$this->next->text='Next';
		//$this->next->iconCls='bpgnext';
		$this->next->iconAlign='left';
		$this->next->handler="
			if (typeof ".$operation."=='undefined'){
				Ext.Msg.alert('ERROR','Missing paging operation for id ".$id."');
				return;
			}
			var _last=999999;
			if (typeof ".$operation.".count!='undefined') _last=Math.ceil(".$operation.".count/".$operation.".limit);
			if (".$operation.".page!=-1&&".$operation.".page<_last){
				".$operation.".page++;
				".$operation.".start+=".$operation.".limit;
				var _txt='?';
				if (typeof ".$operation.".count!='undefined') _txt=_last;
				if (Ext.getCmp('".$id."_display').displayMsg!='')
					Ext.getCmp('".$id."_display').setText('<b>'+Ext.getCmp('".$id."_display').displayMsg+': '+".$operation.".page+' - '+_txt+'</b>');
				Ext.getCmp('".$id."').getStore().load(".$operation.");
			}
		";
		//
		$this->last=new TButton();
		$this->last->text='Last';
		//$this->last->iconCls='bpglast';
		$this->last->iconAlign='left';
		$this->last->handler="
			if (typeof ".$operation."=='undefined'){
				Ext.Msg.alert('ERROR','Missing paging operation for id ".$id."');
				return;
			}
			var _last=999999;
			if (typeof ".$operation.".count!='undefined') _last=Math.ceil(".$operation.".count/".$operation.".limit);
			if (".$operation.".page!=-1&&".$operation.".page<_last){
				if (_last==999999){
					".$operation.".page =-1;
					".$operation.".start=-1;
				}
				else{
					".$operation.".page =_last;
					".$operation.".start=_last*".$operation.".limit-".$operation.".limit;
				}
				var _txt='?';
				if (typeof ".$operation.".count!='undefined') _txt=_last;
				if (Ext.getCmp('".$id."_display').displayMsg!='')
					Ext.getCmp('".$id."_display').setText('<b>'+Ext.getCmp('".$id."_display').displayMsg+': '+_txt+' - '+_txt+'</b>');
				Ext.getCmp('".$id."').getStore().load(".$operation.");
			}
		";
	}
	public function getGrid(){
		if ($this->buttonsAlign=='right'){
			$this->grid->bbar->add('',new TToolbarFill());
		}
		$this->grid->bbar->add(spl_object_hash($this->first),$this->first);
		$this->grid->bbar->add(spl_object_hash($this->prev) ,$this->prev);
		$this->grid->bbar->add(spl_object_hash($this->next) ,$this->next);
		$this->grid->bbar->add(spl_object_hash($this->last) ,$this->last);
		//
		$this->grid->bbar->add('',new TToolbarSpacer());
		$this->grid->bbar->add('',new TToolbarSpacer());
		if ($this->buttonsAlign=='left'){
			$this->grid->bbar->add('',new TToolbarFill());
		}
		$display='';
		$displayMsg=$this->displayMsg;
		if (is_null($this->displayMsg)) $displayMsg='';
		if ($displayMsg) $display='<b>'.$displayMsg.': 1 - ?</b>';
		$this->grid->bbar->add($this->gridId.'_display',new TToolbarText(array(displayMsg=>$displayMsg,text=>$display)));
		//
		return ($this->grid);
	}
}
?>