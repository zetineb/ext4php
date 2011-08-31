<?php
	class TToolsType{
		public static $toggle  ='toogle';
		public static $close   ='close';
		public static $minimize='minimize';
		public static $maximize='maximize';
		public static $restore ='restore';
		public static $gear    ='gear';
		public static $pin     ='pin';
		public static $unpin   ='unpin';
		public static $right   ='right';
		public static $left    ='left';
		public static $up      ='up';
		public static $down    ='down';
		public static $refresh ='refresh';
		public static $minus   ='minus';
		public static $plus    ='plus';
		public static $help    ='help';
		public static $search  ='search';
		public static $save    ='save';
		public static $print   ='print';
	}
	
	class TQueryModeType{		//queryMode -> Combobox, grid
		public static $local ='local';
		public static $remote='remote';
	}
	
	class TScrollType{			//scroll -> Grid
		public static $both      ='both';
		public static $horizontal='horizontal';
		public static $vertical  ='vertical';
	}
	
	class TCloseAction{
		public static $destroy='destroy';
		public static $hide   ='hide';
	}
?>