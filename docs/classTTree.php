<?php
class getTree extends TEvent{
	public function execute(){
		if ($this->filter){
			$_data="{
            'text':'',
            'children': [
			{
				className:'Firefox',
				iconCls:'task-folder',
				expanded: false,
				children:[
					{
						className:'Firebug',
						iconCls:'task-folder',
						expanded: false,
						children:[{
							className:'Console Javascript',
							iconCls:'task-folder',
							listeners:'alert(\'a\');',
							children:[]
						}]
					}
				]
			},
			{
				className:'Chrome',
				iconCls:'task-folder',
				expanded: false,
				children:[{
					className:'Console Javascript',
					iconCls:'task-folder',
					listeners:'alert(\'a\');',
					children:[]
				}]
			}]}";
			echo $_data;
		}
	}
}

class classTTree extends TTabDefault implements iObject{
    public function labelTitle(){
       $obj = new TLabel(array(
    	    text=>"Tree Demo",
            name=>"label_name",
            padding=>"10 10 10 10",
            style=>"font-size:25px"
       ));
	   return $obj;
    }
    
    public function labelRemote(){
       $obj = new TLabel(array(
    	    text=>"Tree Remote",
            name=>"remote_name",
            padding=>"10 10 0 10"
       ));
	   return $obj;
    }
    
    public function TTreeRemote(){
       $treecol=new TTreeColumn(array(
           text=>'',
		   flex=>1,
		   dataIndex=>'className'
        ));

	   $tree=new TTree(array(
	       autoLoad=>false,
		   eventName=>'getTree',
		   queryMode=>TQueryModeType::$remote,
		   rootVisible=>true,
		   useArrows=>true,
		   width=>300,
           height=>120,
           border=>0,
           margin=>'5 5 20px 5'
       ));
       $tree->columns->add('treecol',$treecol);

       $tree->onAfterRender("
			operation = new Ext.data.Operation({
				filters: [
					{'property':'load','value':1}
				]
			});
			Ext.getCmp('treeremote').getStore().load(operation);
	   ");
       return $tree;
    }
    
    public function labelLocal(){
       $obj = new TLabel(array(
    	    text=>"Tree Local",
            name=>"local_name",
            padding=>"10 10 0 10"
       ));
	   return $obj;
    }
    
    public function TTreeLocal(){
       $treeNodeOS = new TTreeNode(array(
          text=>"OS",
          expanded=>true
       ));
       $treeNodeWindows = new TTreeNode(array(
          text=>"Windows",
          leaf=>true
       ));
       $treeNodeMac = new TTreeNode(array(
          text=>"Mac OS",
          leaf=>true
       ));
       $treeNodeLinux = new TTreeNode(array(
          text=>"Linux",
          leaf=>true
       ));

       $treeNodeOS->children->add('nodeWindows',$treeNodeWindows);
       $treeNodeOS->children->add('nodeMac',$treeNodeMac);
	   $treeNodeOS->children->add('nodeLinux',$treeNodeLinux);
	   
       $treeNodeBrowser = new TTreeNode(array(
          text=>"Browser"
       ));
       $treeNodeFirefox = new TTreeNode(array(
          text=>"Firefox",
          leaf=>true
       ));
       $treeNodeIE = new TTreeNode(array(
          text=>"Internet Explorer",
          leaf=>true
       ));
       $treeNodeChrome = new TTreeNode(array(
          text=>"Chrome",
          leaf=>true
       ));
       $treeNodeSafari = new TTreeNode(array(
          text=>"Safari",
          leaf=>true
       ));
       $treeNodeOpera = new TTreeNode(array(
          text=>"Opera",
          leaf=>true
       ));
    
       $treeNodeBrowser->children->add('nodeFirefox',$treeNodeFirefox);
       $treeNodeBrowser->children->add('nodeIE',$treeNodeIE);
	   $treeNodeBrowser->children->add('nodeChrome',$treeNodeChrome);
	   $treeNodeBrowser->children->add('nodeSafari',$treeNodeSafari);
	   $treeNodeBrowser->children->add('nodeOpera',$treeNodeOpera);
       
       $treeNodeRoot = new TTreeNode(array(
           text=>"Project",
           expanded=>true,
           children=>array($treeNodeOS,$treeNodeBrowser)
       ));
       
       $tree=new TTree(array(
			margin=>"5 5 5 5",
			width=>300,
			height=>250,
			border=>0,
			rootNode=>$treeNodeRoot
		));
       return $tree;
    }
    
    public function TContainerObj(){
      $obj = new TContainer(array(
             layout=>'vbox',
             width=>'100%',
             height=>'100%',
             border=>0
	  ));
      $obj->items->add('label_title',$this->labelTitle());
      $obj->items->add('label_remote',$this->labelRemote());
      $obj->items->add('treeremote',$this->TTreeRemote());
      $obj->items->add('label_local',$this->labelLocal());
      $obj->items->add('treelocal',$this->TTreeLocal());
	  return $obj;
	}
    
    public function execute(){
       return $this->TTabObj($this->TContainerObj(),'tree');
    }
}
?>
