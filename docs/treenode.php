<?php
     $treeNode1 = new TTreeNode(array(
          text=>"Windows",
          leaf=>true
     ));
     $treeNode2 = new TTreeNode(array(
          text=>"Mac OS",
          leaf=>true
     ));

     $treeNodeRoot = new TTreeNode(array(
          text=>"OS",
          leaf=>true
     ));

     $treeNodeRoot->children->add('nodeWindows',$treeNode1);
     $treeNodeRoot->children->add('nodeMac',$treeNode2);
?>
