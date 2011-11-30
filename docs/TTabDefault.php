<?php
class TTabDefault{
     public function TTabObj($container,$idObject){
        $tab1=new TTab(array(
            title=>'View',
            padding=>'10 10 10 10'
        ));
	    $tab1->items->add('view',$container);
	    $tab2=new TTab(array(
            title=>'Source Code'
        ));
	    $tab2->html="<iframe width='99%' height='99%' src='viewSource.php?type=".$idObject."'/>";
	    $tab3=new TTab(array(
            title=>'Attributes'
        ));
        $tab3->html="<iframe width='99%' height='99%' src='attributes.php?type=".$idObject."''/>";
	    $tab4=new TTab(array(
            title=>'Listeners'
        ));
        $tab4->html="<iframe width='99%' height='99%' src='listeners.php?type=".$idObject."''/>";
        $tab5=new TTab(array(
            title=>'Usage'
        ));
        $tab5->html="<iframe width='99%' height='99%' src='usage.php?type=".$idObject."''/>";
	    $tabpanel=new TTabPanel();
	    $tabpanel->items->add('tab1',$tab1);
	    $tabpanel->items->add('tab2',$tab2);
	    $tabpanel->items->add('tab3',$tab3);
	    $tabpanel->items->add('tab4',$tab4);
   	    $tabpanel->items->add('tab5',$tab5);
	    return $tabpanel;
    }
}
?>
