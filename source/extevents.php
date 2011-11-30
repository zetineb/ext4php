<?php
	class TViewportEvents{
		public static $name=array(
			'activate'          =>'function(component,options){%CODE%}',
			'add'               =>'function(container,component,index,options){%CODE%}',
			'added'             =>'function(component,container,pos,options){%CODE%}',
			'afterlayout'       =>'function(container,layout,options){%CODE%}',
			'afterrender'       =>'function(component,options){%CODE%}',
			'beforeactivate'    =>'function(component,options){%CODE%}',
			'beforeadd'         =>'function(container,component,index,options){%CODE%}',
			'beforecardswitch'  =>'function(container,newcard,oldcard,index,animated,options){%CODE%}',
			'beforedeactivate'  =>'function(component,options){%CODE%}',
			'beforedestroy'     =>'function(component,options){%CODE%}',
			'beforehide'        =>'function(component,options){%CODE%}',
			'beforeremove'      =>'function(container,component,options){%CODE%}',
			'beforerender'      =>'function(component,options){%CODE%}',
			'beforeshow'        =>'function(component,options){%CODE%}',
			'cardswitch'        =>'function(container,newcard,oldcard,index,animated,options){%CODE%}',
			'deactivate'        =>'function(component,options){%CODE%}',
			'destroy'           =>'function(component,options){%CODE%}',
			'disable'           =>'function(component,options){%CODE%}',
			'enable'            =>'function(component,options){%CODE%}',
			'hide'              =>'function(component,options){%CODE%}',
			'move'              =>'function(component,x,y,options){%CODE%}',
			'remove'            =>'function(container,component,options){%CODE%}',
			'removed'           =>'function(component,container,options){%CODE%}',
			'render'            =>'function(component,options){%CODE%}',
			'resize'            =>'function(component,adjWidth,adjHeight,options){%CODE%}',
			'show'              =>'function(component,options){%CODE%}'
		);
	}
	class TWindowEvents{
		public static $name=array(
			'activate'          =>'function(component,options){%CODE%}',
			'add'               =>'function(container,component,index,options){%CODE%}',
			'added'             =>'function(component,container,pos,options){%CODE%}',
			'afterlayout'       =>'function(container,layout,options){%CODE%}',
			'afterrender'       =>'function(component,options){%CODE%}',
			'beforeactivate'    =>'function(component,options){%CODE%}',
			'beforeadd'         =>'function(container,component,index,options){%CODE%}',
			'beforecardswitch'  =>'function(container,newcard,oldcard,index,animated,options){%CODE%}',
			'beforecollapse'    =>'function(container,direction,animate,options){%CODE%}',
			'beforedeactivate'  =>'function(component,options){%CODE%}',
			'beforedestroy'     =>'function(component,options){%CODE%}',
			'beforeexpand'      =>'function(container,animate,options){%CODE%}',
			'beforehide'        =>'function(component,options){%CODE%}',
			'beforeremove'      =>'function(container,component,options){%CODE%}',
			'beforerender'      =>'function(component,options){%CODE%}',
			'beforeshow'        =>'function(component,options){%CODE%}',
			'cardswitch'        =>'function(container,newcard,oldcard,index,animated,options){%CODE%}',
			'collapse'          =>'function(container,options){%CODE%}',
			'deactivate'        =>'function(component,options){%CODE%}',
			'destroy'           =>'function(component,options){%CODE%}',
			'disable'           =>'function(component,options){%CODE%}',
			'enable'            =>'function(component,options){%CODE%}',
			'expand'            =>'function(container,options){%CODE%}',
			'hide'              =>'function(component,options){%CODE%}',
			'maximize'          =>'function(component,options){%CODE%}',
			'minimize'          =>'function(component,options){%CODE%}',
			'move'              =>'function(component,x,y,options){%CODE%}',
			'remove'            =>'function(container,component,options){%CODE%}',
			'removed'           =>'function(component,container,options){%CODE%}',
			'render'            =>'function(component,options){%CODE%}',
			'resize'            =>'function(component,width,height,options){%CODE%}',
			'restore'           =>'function(component,options){%CODE%}',
			'show'              =>'function(component,options){%CODE%}'
		);
	}

	class TComponentEvents{
		public static $name=array(
			'activate'   		=>'function(component,options){%CODE%}',
			'add'               =>'function(container,component,index,options){%CODE%}',
			'added'             =>'function(component,container,pos,options){%CODE%}',
			'afterlayout'       =>'function(container,layout,options){%CODE%}',
			'afterrender'       =>'function(component,options){%CODE%}',
			'beforeactivate'    =>'function(component,options){%CODE%}',
			'beforeadd'         =>'function(container,component,index,options){%CODE%}',
			'beforecardswitch'  =>'function(container,newcard,oldcard,index,animated,options){%CODE%}',
			'beforecollapse'    =>'function(container,direction,animate,options){%CODE%}',
			'beforedeactivate'  =>'function(component,options){%CODE%}',
			'beforedestroy'     =>'function(component,options){%CODE%}',
			'beforeedit'        =>'function(component,options){%CODE%}',
			'beforeexpand'      =>'function(container,animate,options){%CODE%}',
			'beforehide'        =>'function(component,options){%CODE%}',
			'beforepush'        =>'function(htmlEditor,html,options){%CODE%}',
			'beforeremove'      =>'function(container,component,options){%CODE%}',
			'beforerender'      =>'function(component,options){%CODE%}',
			'beforeshow'        =>'function(component,options){%CODE%}',
			'blur'  		    =>'function(component,options){%CODE%}',
			'change'  		    =>'function(component,newValue,oldValue,options){%CODE%}',
			'checkchange'       =>'function(component,checked,options){%CODE%}',
			'click'             =>'function(component,eventObj,options){%CODE%}',
			'cardswitch'        =>'function(container,newcard,oldcard,index,animated,options){%CODE%}',
			'collapse'          =>'function(container,options){%CODE%}',
			'deactivate'        =>'function(component,options){%CODE%}',
			'destroy'           =>'function(component,options){%CODE%}',
			'disable'           =>'function(component,options){%CODE%}',
			'edit' 			    =>'function(editor,component,options){%CODE%}',
			'editmodechange'    =>'function(htmlEditor,sourceEdit,options){%CODE%}',
			'enable'            =>'function(component,options){%CODE%}',
			'expand'            =>'function(container,options){%CODE%}',
			'focus'             =>'function(component,options){%CODE%}',
			'groupclick'        =>'function(component,node,group,eventObj,options){%CODE%}',
			'groupcollapse'     =>'function(component,node,group,eventObj,options){%CODE%}',
			'groupcontextmenu'  =>'function(component,node,group,eventObj,options){%CODE%}',
			'groupdblclick'     =>'function(component,node,group,eventObj,options){%CODE%}',
			'groupexpand'       =>'function(component,node,group,eventObj,options){%CODE%}',
			'hide'              =>'function(component,options){%CODE%}',
			'initialize'        =>'function(htmlEditor,options){%CODE%}',
			'itemclick'         =>'function(component,record,item,index,eventObj,options){%CODE%}',
			'itemcollapse'      =>'function(node,options){%CODE%}',
			'itemdblclick'      =>'function(component,record,item,index,eventObj,options){%CODE%}',
			'itemexpand'        =>'function(node,options){%CODE%}',
			'keydown'           =>'function(component,eventObj,options){%CODE%}',
			'keypress'          =>'function(component,eventObj,options){%CODE%}',
			'keyup'             =>'function(component,eventObj,options){%CODE%}',
			'maximize'          =>'function(component,options){%CODE%}',
			'minimize'          =>'function(component,options){%CODE%}',
			'move'              =>'function(component,x,y,options){%CODE%}',
			'push'              =>'function(htmlEditor,html,options){%CODE%}',
			'remove'            =>'function(container,component,options){%CODE%}',
			'removed'           =>'function(component,container,options){%CODE%}',
			'render'            =>'function(component,options){%CODE%}',
			'resize'            =>'function(component,adjWidth,adjHeight,options){%CODE%}',
			'select'            =>'function(component,record,p3,p4){%CODE%}',
			'show'              =>'function(component,options){%CODE%}',
			'specialkey'        =>'function(component,eventObj,options){%CODE%}',
			'sync'              =>'function(htmlEditor,isValid,options){%CODE%}',
			'titlechange'       =>'function(p1,p2,p3,p4){%CODE%}',
			'validateedit  '    =>'function(editor,component,options){%CODE%}',
			'validitychange'    =>'function(field,isValid,options){%CODE%}'
		);
	}
?>