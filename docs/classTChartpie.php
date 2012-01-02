<?php

class classTChartPie extends TTabDefault implements iObject{
    public function labelTitle(){
        $obj = new TLabel(array(
             text=>"Chart Pie Demo",
             name=>"label_name",
             padding=>"10 10 10 10",
             style=>"font-size:25px"
        ));
	    return $obj;
    }

	public function chart(){
		$legend=new TChartLegend();
		$legend->position='right';
		
		$chart=new TChart();
		$chart->style='background:#fff';
		$chart->insetPadding=30;
		$chart->animate=true;
		$chart->theme='Base:gradients';
		$chart->shadow=true;
		$chart->legend=$legend;
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
			renderer=>"
				var total = 0;
				Ext.getCmp('chart1').store.each(function(rec) {
					total += rec.get('payments');
				});
				this.setTitle(storeItem.get('month') + ': ' + Math.round(storeItem.get('payments') / total * 100) + '%');
			"
		));
		return $tips;
	}
	
	public function chartSeries(){
		$label=new TChartLabel(array(
			field=>'month',
			display=>'rotate',
			contrast=>true,
			font=>'12px Arial'
		));
		
		$chartSerie=new TChartSeries(array(
			type=>'pie',
			field=>'payments',
			axis=>'left',
			highlight=>"{
				segment: {
					margin: 20
				}
			}",
			showInLegend=>true,
			donut=>true,
			tips=>$this->chartTips(),
			label=>$label
		));
		return $chartSerie;
	}
	
    public function TChartObj(){
		$chart = $this->chart();
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
		$main->items->add('chartpie',$center);
	    return $main;
	}
    
    public function execute(){
	   return $this->TTabObj($this->TContainerObj(),'chartpie');
    }
}
?>
