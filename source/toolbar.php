<?php
	class TCustomToolbar extends TComponent{
		public $baseCls=null;
		public $cls=null;
		public $disabled=null;
		public $hidden=null;
		public $html=null;
		public $margin='0 0 0 0';
		public $padding=null;
		public $plain=null;
		public $style=null;
		public $displayMsg=null;
		public $text=null;
	}
	
	class TToolbarFill extends TCustomToolbar{
		public $xtype='tbfill';
	}

	class TToolbarSeparator extends TCustomToolbar{
		public $xtype='tbseparator';
	}

	class TToolbarSpacer extends TCustomToolbar{
		public $xtype='tbspacer';
	}
	
	class TToolbarText extends TCustomToolbar{
		public $xtype='tbtext';
	}
?>