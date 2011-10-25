<?php
	class TPackage{
		public static $app      ='app';
		public static $button   ='button';
		public static $chart    ='chart';
		public static $container='container';
		public static $data     ='data';
		public static $dd       ='dd';
		public static $direct   ='direct';
		public static $draw     ='draw';
		public static $env      ='env';
		public static $flash    ='flash';
		public static $form     ='form';
		public static $fx       ='fx';
		public static $grid     ='grid';
		public static $layout   ='layout';
		public static $menu     ='menu';
		public static $panel    ='panel';
		public static $picker   ='picker';
		public static $resizer  ='resizer';
		public static $selection='selection';
		public static $slider   ='slider';
		public static $state    ='state';
		public static $tab      ='tab';
		public static $tip      ='tip';
		public static $toolbar  ='toolbar';
		public static $tree     ='tree';
		public static $util     ='util';
		public static $view     ='view';
		public static $window   ='window';
	}
	
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