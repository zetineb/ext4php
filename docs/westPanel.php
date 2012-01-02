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
		
		$nodeS10S2=new TTreeNode(array(
			text=>'Chart Line'
		));
		
		$nodeS10S3=new TTreeNode(array(
			text=>'Chart Pie'
		));
		
		$nodeS10S1=new TTreeNode(array(
			text=>'Chart Column'
		));
		
		$nodeS7=new TTreeNode(array(
			text=>'Examples',
			expanded=>true
		));
		$nodeS7->children->add('S10S1',$nodeS10S1);		
		$nodeS7->children->add('S10S2',$nodeS10S2);		
		$nodeS7->children->add('S10S3',$nodeS10S3);		
		
		$node->children->add('n3s6',$nodeS6);	
		$node->children->add('n3s1',$nodeS1);
		$node->children->add('n3s2',$nodeS2);
		$node->children->add('n3s3',$nodeS3);
		$node->children->add('n3s4',$nodeS4);
		$node->children->add('n3s5',$nodeS5);
		$node->children->add('n3s7',$nodeS7);
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
			text=>'TCheckboxgroup'
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
			text=>'TTextArea'
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
		
		$nodeS8=new TTreeNode(array(
			text=>'TGrid'
		));
		
		$nodeS9=new TTreeNode(array(
			text=>'TGridFeature'
		));
		
		$nodeS10=new TTreeNode(array(
			text=>'TGridPlugin'
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
		$node->children->add('n6s8',$nodeS8);	
		$node->children->add('n6s9',$nodeS9);	
		$node->children->add('n6s10',$nodeS10);	
		return $node;
	}
	
    private function TreeNode7(){
 		$nodeS1=new TTreeNode(array(
			text=>'getGrid'
		));
		
		$nodeS2=new TTreeNode(array(
			text=>'TPaging'
		)); 
        
        $nodeS3=new TTreeNode(array(
			text=>'Introduction'
		));   
        
 		$node=new TTreeNode(array(
			text=>'TPaging',
			leaf=>true
		));
        $node->children->add('n7s3',$nodeS3);	
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

        $nodeS3=new TTreeNode(array(
			text=>'TTreeColumn'
		));
        
		$nodeS2=new TTreeNode(array(
			text=>'TTreeNode'
		));
	
		$node=new TTreeNode(array(
			text=>'TTree'
		));
		$node->children->add('n10s1',$nodeS1);
		$node->children->add('n10s3',$nodeS3);
		$node->children->add('n10s2',$nodeS2);
		return $node;
	}
	
	private function TreeNode11(){	
		$nodeS1=new TTreeNode(array(
			text=>'TToolbar'
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
			text=>'TWindow'
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
        _treeText = record.get('text').replace(' ','');
			for(var _i=0;_i<_arrayTabs.length;_i++){	               
				if(_treeText=='Ext4PHP')
					_treeText='Introduction';
				if(_treeText=='TApplication')
					_treeText='Introduction';
				if(_treeText=='StartApplication')
					_treeText='Startapplication';
				if(_treeText=='RunApplication')
					_treeText='Runapplication';
				if(_treeText=='Examples')
					_treeText='TChartcolumn';
				if(_treeText=='ChartLine')
					_treeText='TChartline';
				if(_treeText=='ChartPie')
					_treeText='TChartpie';                    
				if(_treeText=='ChartColumn')             
					_treeText='TChartcolumn';                   
                if(_treeText=='TChart')
					_treeText='TChart';
                if(_treeText=='TChartTips')
					_treeText='TCharttips';
                if(_treeText=='TChartLegend')
					_treeText='TChartlegend';
                if(_treeText=='TChartSeries')
					_treeText='TChartseries';
                if(_treeText=='TChartAxis')
					_treeText='TChartaxis';
                if(_treeText=='TChartLabel')
					_treeText='TChartlabel';  
                if(_treeText=='TColumnAction')
					_treeText='TColumnaction';  
                if(_treeText=='TToolbarFill')
					_treeText='TToolbarfill';
                if(_treeText=='TToolbar')
					_treeText='TToolbar';
                if(_treeText=='TToolbarSeparator')
					_treeText='TToolbarseparator';
                if(_treeText=='TToolbarSpacer')
					_treeText='TToolbarspacer';
                if(_treeText=='TToolbarText')
					_treeText='TToolbartext'; 
                if(_treeText=='TTreeColumn')
					_treeText='TTreecolumn'; 
                if(_treeText=='TTreeNode')
					_treeText='TTreenode'; 
                if(_treeText=='TPaging')
					_treeText='TPaging'; 
                if(_treeText=='getGrid')
					_treeText='Getgrid';
                if(_treeText=='Introduction'){
                    if(record.parentNode.get('text')=='TPaging')
                        _treeText='Pagingintroduction';               
                }
                if(_treeText=='TGrid')
					_treeText='TGrid'; 
                if(_treeText=='TGridFeature')
					_treeText='TGridfeature'; 
                if(_treeText=='TGridPlugin')
					_treeText='TGridplugin'; 
				if(_arrayTabs[_i][0]==_treeText.toLowerCase()){
					index=_i;
					break;
				}else
					index=null;
			}         
			if(index!=null){
				var _filename='class'+_treeText+'.php';
				_APP.send({event:\"wpn_fileExists\",data:_treeText,handler:function(_r){
					if(_r=='OK'){
						_index=_arrayTabs[index].toString();
						if(_treeText.substr(0,1)!='T'){
							_iframe=_filename.toString();
						}
						else {                          
							if(_treeText=='TTab'){
							  _iframe=_filename.toString();
							}else if (_treeText.search('TGrid') != '-1'){
                              if(_treeText=='TGrid')
                                _iframe='indexIFrame.php?type='+_index.toString();
                              else
                                _iframe=_filename.toString();                            
                            }else if (_treeText.search('PagingIntroduction') != '-1'){
                                _iframe=_filename.toString();
                            }else if (_treeText.search('TColumn') != '-1'){
                                _iframe=_filename.toString();
                            }else if (_treeText.search('GetGrid') != '-1'){
                                _iframe=_filename.toString();
                            }else if (_treeText.search('getgrid') != '-1'){
                                _iframe=_filename.toString();
                            }else if (_treeText.search('TTree') != '-1'){
                                if(_treeText=='TTree')
                                    _iframe='indexIFrame.php?type='+_index.toString();
                                else
                                    _iframe=_filename.toString();
                            }else if (_treeText.search('TTool') != '-1'){
                              if(_treeText=='TToolbar')
                                _iframe='indexIFrame.php?type='+_index.toString();
                              else
                                _iframe=_filename.toString();
                            }else if (_treeText.search('TChart') != '-1'){
                              if(_treeText=='TChartcolumn' || _treeText=='TChartline' || _treeText=='TChartpie')
                                _iframe='indexIFrame.php?type='+_index.toString();
                              else
                                _iframe=_filename.toString();
                            }else{						    
                              _iframe='indexIFrame.php?type='+_index.toString();
                            }
                        }
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
			$file = strtolower($file);
			$pos = substr($file,0,1);
			if($pos=='t')
				$file = 'class'.strtoupper(substr($file,0,2)).substr($file,2,strlen($file)).'.php';
			else
				$file = 'class'.strtoupper(substr($file,0,1)).substr($file,1,strlen($file)).'.php';
			if($file!=""){
				if(file_exists($file))
					echo "OK";
				else
					echo "FAILURE: File does not exist!";
			}else{
				echo "FAILURE: GET File is empty!";
			}		
		}
	}
?>
