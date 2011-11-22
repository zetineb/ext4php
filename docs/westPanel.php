<?php
class WestPanel{

	private function TreeNode1(){
		$nodeS1=new TTreeNode(array(
			text=>'Introduction'
		));
		
		$nodeS2=new TTreeNode(array(
			text=>'Start Application'
		));
		
		$nodeS3=new TTreeNode(array(
			text=>'Events'
		));
		
		$nodeS5=new TTreeNode(array(
			text=>'Headers'
		));
		
		$nodeS6=new TTreeNode(array(
			text=>'Packages'
		));	

		$nodeS7=new TTreeNode(array(
			text=>'Windows'
		));

		$nodeS8=new TTreeNode(array(
			text=>'Run Application'
		));
		
		$node=new TTreeNode(array(
			text=>'TApplication'
		));
		$node->children->add('n1s1',$nodeS1);
		$node->children->add('n1s2',$nodeS2);
		$node->children->add('n1s3',$nodeS3);
		$node->children->add('n1s5',$nodeS5);
		$node->children->add('n1s6',$nodeS6);
		$node->children->add('n1s7',$nodeS7);	
		$node->children->add('n1s8',$nodeS8);	
		return $node;
	}

	private function TreeNode2(){
		$nodeS1=new TTreeNode(array(
			text=>'TButton'
		));
		
		$nodeS2=new TTreeNode(array(
			text=>'TButtonCycle'
		));
		
		$nodeS3=new TTreeNode(array(
			text=>'TButtonSplit'
		));
		
		$node=new TTreeNode(array(
			text=>'TButton'
		));
		$node->children->add('n2s1',$nodeS1);
		$node->children->add('n2s2',$nodeS2);
		$node->children->add('n2s3',$nodeS3);
		return $node;		
	}
	
	private function TreeNode3(){
		$nodeS1=new TTreeNode(array(
			text=>'TChartTips'
		));

		$nodeS2=new TTreeNode(array(
			text=>'TChartLegend'
		));

		$nodeS3=new TTreeNode(array(
			text=>'TChartLabel'
		));

		$nodeS4=new TTreeNode(array(
			text=>'TChartAxis'
		));

		$nodeS5=new TTreeNode(array(
			text=>'TChartSeries'
		));

		$nodeS6=new TTreeNode(array(
			text=>'TChart'
		));

		$node=new TTreeNode(array(
			text=>'TChart'
		));
		$node->children->add('n3s6',$nodeS6);	
		$node->children->add('n3s1',$nodeS1);
		$node->children->add('n3s2',$nodeS2);
		$node->children->add('n3s3',$nodeS3);
		$node->children->add('n3s4',$nodeS4);
		$node->children->add('n3s5',$nodeS5);
		return $node;
	}

	private function TreeNode4(){
		$node=new TTreeNode(array(
			text=>'TContainer',
			leaf=>true
		));
		return $node;
	}
	
	private function TreeNode5(){
		
		$nodeS1=new TTreeNode(array(
			text=>'TCheckbox'
		));
		
		$nodeS2=new TTreeNode(array(
			text=>'TCheckboxGroup'
		));
		
		$nodeS3=new TTreeNode(array(
			text=>'TCombobox'
		));
		
		$nodeS6=new TTreeNode(array(
			text=>'TDate'
		));
		
		$nodeS7=new TTreeNode(array(
			text=>'TDisplay'
		));
		
		$nodeS8=new TTreeNode(array(
			text=>'TFieldSet'
		));
		
		$nodeS9=new TTreeNode(array(
			text=>'TFile'
		));
		
		$nodeS10=new TTreeNode(array(
			text=>'THidden'
		));
		
		$nodeS11=new TTreeNode(array(
			text=>'THtmlEditor'
		));
		
		$nodeS12=new TTreeNode(array(
			text=>'TLabel'
		));
		
		$nodeS13=new TTreeNode(array(
			text=>'TNumber'
		));
		
		$nodeS14=new TTreeNode(array(
			text=>'TRadio'
		));
		
		$nodeS15=new TTreeNode(array(
			text=>'TRadioGroup'
		));
		
		$nodeS16=new TTreeNode(array(
			text=>'TText'
		));
		
		$nodeS17=new TTreeNode(array(
			text=>'TTextarea'
		));
		
		$nodeS18=new TTreeNode(array(
			text=>'TTime'
		));

		$node=new TTreeNode(array(
			text=>'TForm'
		));
		$node->children->add('n5s1',$nodeS1);
		$node->children->add('n5s2',$nodeS2);	
		$node->children->add('n5s3',$nodeS3);		
		$node->children->add('n5s6',$nodeS6);	
		$node->children->add('n5s7',$nodeS7);	
		$node->children->add('n5s8',$nodeS8);	
		$node->children->add('n5s9',$nodeS9);	
		$node->children->add('n5s10',$nodeS10);	
		$node->children->add('n5s11',$nodeS11);	
		$node->children->add('n5s12',$nodeS12);	
		$node->children->add('n5s13',$nodeS13);	
		$node->children->add('n5s14',$nodeS14);	
		$node->children->add('n5s15',$nodeS15);	
		$node->children->add('n5s16',$nodeS16);	
		$node->children->add('n5s17',$nodeS17);	
		$node->children->add('n5s18',$nodeS18);	
		return $node;
	}
	
	private function TreeNode6(){
	
		$nodeS1=new TTreeNode(array(
			text=>'TColumn'
		));
		
		$nodeS2=new TTreeNode(array(
			text=>'TColumnAction'
		));
		
		$nodeS3=new TTreeNode(array(
			text=>'TColumnBoolean'
		));
		
		$nodeS4=new TTreeNode(array(
			text=>'TColumnDate'
		));
		
		$nodeS5=new TTreeNode(array(
			text=>'TColumnNumber'
		));
		
		$nodeS6=new TTreeNode(array(
			text=>'TColumnTemplate'
		));
		
		$nodeS7=new TTreeNode(array(
			text=>'TCustomColumn'
		));
		
		$nodeS8=new TTreeNode(array(
			text=>'TGrid'
		));
		
		$nodeS9=new TTreeNode(array(
			text=>'TGridFeature'
		));
		
		$nodeS10=new TTreeNode(array(
			text=>'TGridPlugin'
		));
		
		$nodeS11=new TTreeNode(array(
			text=>'TTreeColumn'
		));
		
		$node=new TTreeNode(array(
			text=>'TGrid'
		));
		$node->children->add('n6s1',$nodeS1);	
		$node->children->add('n6s2',$nodeS2);	
		$node->children->add('n6s3',$nodeS3);	
		$node->children->add('n6s4',$nodeS4);	
		$node->children->add('n6s5',$nodeS5);	
		$node->children->add('n6s6',$nodeS6);	
		$node->children->add('n6s7',$nodeS7);	
		$node->children->add('n6s8',$nodeS8);	
		$node->children->add('n6s9',$nodeS9);	
		$node->children->add('n6s10',$nodeS10);	
		$node->children->add('n6s11',$nodeS11);	
		return $node;
	}
	
	private function TreeNode7(){
	
		$nodeS1=new TTreeNode(array(
			text=>'getGrid'
		));
		
		$nodeS2=new TTreeNode(array(
			text=>'TPaging'
		));
		
		$node=new TTreeNode(array(
			text=>'TPaging'
		));
		$node->children->add('n7s1',$nodeS1);
		$node->children->add('n7s2',$nodeS2);
		return $node;
	}
	
	private function TreeNode8(){	
		$node=new TTreeNode(array(
			text=>'TPanel',
			leaf=>true
		));
		return $node;
	}

	private function TreeNode9(){	
		$nodeS1=new TTreeNode(array(
			text=>'TTab'
		));
		
		$nodeS2=new TTreeNode(array(
			text=>'TTabPanel'
		));
	
		$node=new TTreeNode(array(
			text=>'TTabPanel'
		));
		$node->children->add('n9s1',$nodeS1);
		$node->children->add('n9s2',$nodeS2);
		return $node;
	}
	
	private function TreeNode10(){	
		$nodeS1=new TTreeNode(array(
			text=>'TTree'
		));
		
		$nodeS2=new TTreeNode(array(
			text=>'TTreeNode'
		));
	
		$node=new TTreeNode(array(
			text=>'TTree'
		));
		$node->children->add('n10s1',$nodeS1);
		$node->children->add('n10s2',$nodeS2);
		return $node;
	}
	
	private function TreeNode11(){	
		$nodeS1=new TTreeNode(array(
			text=>'TCustomToolbar'
		));
		
		$nodeS2=new TTreeNode(array(
			text=>'TToolbarFill'
		));
		
		$nodeS3=new TTreeNode(array(
			text=>'TToolbarSeparator'
		));
		
		$nodeS4=new TTreeNode(array(
			text=>'TToolbarSpacer'
		));
		
		$nodeS5=new TTreeNode(array(
			text=>'TToolbarText'
		));
	
		$node=new TTreeNode(array(
			text=>'TToolbar'
		));
		$node->children->add('n11s1',$nodeS1);
		$node->children->add('n11s2',$nodeS2);
		$node->children->add('n11s3',$nodeS3);
		$node->children->add('n11s4',$nodeS4);
		$node->children->add('n11s5',$nodeS5);
		return $node;
	}
	
	private function TreeNode12(){	
		$node=new TTreeNode(array(
			text=>'TWindow',
			leaf=>true
		));
		return $node;
	}
	
	private function TreeRoot(){
	
		$credits=new TTreeNode(array(
			text=>'Credits',
			leaf=>true
		));
		
		$root=new TTreeNode(array(
			text=>'Ext4PHP',
			expanded=>true,
			children=>array($credits,$this->TreeNode1(),$this->TreeNode2(),$this->TreeNode3(),$this->TreeNode4(),$this->TreeNode5(),
				$this->TreeNode6(),$this->TreeNode7(),$this->TreeNode8(),$this->TreeNode9(),$this->TreeNode10(),
				$this->TreeNode11(),$this->TreeNode12()
			)
		));
		return $root;		
	}
	
	private function WPTree(){
				
		$tree=new TTree(array(		
			autoLoad=>false,
			queryMode=>TQueryModeType::$local,
			rootVisible=>true,
			useArrows=>true,
			height=>'100%',
			rootNode=>$this->TreeRoot()
		));		
		$tree->onAfterRender("
			Ext.getCmp('topTab').add(
				{
					xtype:'tab',
					id:'tabIntroduction',
					title:'Introduction',
					region:'center',
					html:'<iframe width=\'100%\' height=\'100%\' frameborder=\'0\' marginwidth=\'0\' marginheight=\'0\' align=\'top\' hspace=\'0\' vspace=\'0\' src=\'classIntroduction.php\'>',
					width:'100%'							
				}			
			);

			_nextTab=Ext.getCmp('topTab').items.length-1;
			Ext.getCmp('topTab').setActiveTab(_nextTab);
		");		
		$tree->onItemClick("
			for(var _i=0;_i<_arrayTabs.length;_i++){	
				_treeText = record.get('text').replace(' ','');
				if(_arrayTabs[_i][0]==_treeText.toLowerCase()){
					index=_i;
					break;
				}else
					index=null;
			}
			if(index!=null){
				_filename='class'+_treeText+'.php';
				_APP.send({event:\"wpn_fileExists\",data:_filename,handler:function(_r){
					if(_r=='OK'){
						_index=_arrayTabs[index].toString();
						if(_treeText.substr(0,1)!='T')
							_iframe=_filename.toString();
						else
						  _iframe='indexIFrame.php?type='+_index.toString();
						if (!Ext.getCmp('tab'+_treeText)){
							Ext.getCmp('topTab').add(
								{
									xtype:'tab',
									id:'tab'+_treeText,
									title:_treeText,
									region:'center',
									html:'<iframe width=\'100%\' height=\'100%\' frameborder=\'0\' marginwidth=\'0\' marginheight=\'0\' align=\'top\' hspace=\'0\' vspace=\'0\' src=\''+_iframe+'\'>',
									width:'100%'							
								}			
							);
						}
						Ext.getCmp('topTab').setActiveTab('tab'+_treeText);
					}else{
						Ext.Msg.alert('COMMING SOON','Wait few days');
					}					
				}});
			}
		");
		return $tree;
	}
	
	public function __construct(){
		$this->westPanel=new TPanel(array(
			title=>'Components',
			region=>'west',
			split=>true,
			width=>300,
			layout=>'fit'
		));
		$this->westPanel->items->add('WPTree',$this->WPTree());
	}
	
	public function getPanel(){
		return $this->westPanel;
	}
	
}

	class wpn_fileExists extends TEvent{
		public function execute(){
			if(isset($this->data)) $file = $this->data; else $file='';
			if($file!=""){
				if(file_exists($file))
					echo "OK";
				else{
					echo "FAILURE: File does not exist!";
				}
			}else{
				echo "FAILURE: GET File is empty!";
			}			
		}
	}
?>