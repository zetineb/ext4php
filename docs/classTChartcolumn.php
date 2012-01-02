<?php

class classTChartColumn extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Chart Column Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }
	
	public function chart(){
		$chart=new TChart();
		$chart->style='background:#fff';
		$chart->animate=true;
		$chart->shadow=true;
		$chart->fields->add(0,'month');
		$chart->fields->add(1,'payments');
		$chart->data->add(0,array('May 2011',4824.43));
		$chart->data->add(1,array('June 2011',9631.88));
		$chart->data->add(2,array('July 2011',28373.89));
		$chart->data->add(3,array('August 2011',24072.13));
		$chart->data->add(4,array('September 2011',33475.55));
		return $chart;
	}
	
	public function chartTips(){
		$tips=new TChartTips(array(
			trackMouse=>true,
			width=>140,
			height=>28,
			renderer=>"this.setTitle(storeItem.get('month') + ': ' + storeItem.get('payments') + ' $');"
		));
		return $tips;
	}
	
	public function chartSeries(){
		$label=new TChartLabel(array(
			display=>'insideEnd',
			textAnchor=>'middle',	
			field=>'payments',
			renderer=>"Ext.util.Format.numberRenderer('0')",
			orientation=>'vertical',
			color=>'#333'
		));
		
		$chartSerie=new TChartSeries(array(
			type=>'column',
			axis=>'left',
			highlight=>true,
			tips=>$this->chartTips(),
			label=>$label,
			xField=>'month',
			yField=>'payments'
		));
		return $chartSerie;
	}
	
    public function TChartObj(){
		$chart = $this->chart();
	
		$labelY=new TChartLabel(array(
			renderer=>"Ext.util.Format.numberRenderer('0,0')"
		));
	
		$chartAxisY=new TChartAxis(array(
			type=>'Numeric',
			position=>'left',
			fields=>array('payments'),
			label=>$labelY,
			title=>'Payments',
			grid=>true,
			minimum=>0
		));
		
		$chartAxisX=new TChartAxis(array(
			type=>'Category',
			position=>'bottom',
			fields=>array('month'),
			title=>'Month of the Year'
		));
		
		$chart->axes=array($chartAxisY,$chartAxisX);
		$chart->series=array($this->chartSeries());
	    return $chart;
    }
    
    public function TContainerObj(){
        $north=new TPanel(array(
			region=>'north',
			height=>50,
			layout=>'fit',
			border=>0
		));
		$north->items->add('label_title',$this->labelTitle());
		
		$center = new TPanel(array(
			region=>'center',
			layout=>'fit',
			border=>0
		));
		$center->items->add('chart1',$this->TChartObj());
				
		$main=new TPanel(array(
			layout=>'border',
			width=>'100%',
			height=>'100%',
			items=>array($north),
			border=>0
		));
		$main->items->add('chartcolumn',$center);
	    return $main;
	}
    
    public function execute(){
	   return $this->TTabObj($this->TContainerObj(),'chartcolumn');
    }
}
?>
