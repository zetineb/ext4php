<?php
class Chart{
	public function execute(){ 	
		$tab61=new TContainer();
		$tab61->layout='fit';
		$tab61->title='Column';
		//
		//Charts
		$chart1=new TChart();
			$chart1->style='background:#fff';
			$chart1->animate=true;
			$chart1->shadow=true;
		$chart1->fields->add(0,'month');
		$chart1->fields->add(1,'payments');
		$chart1->data->add(0,array('May 2011',4824.43));
		$chart1->data->add(1,array('June 2011',9631.88));
		$chart1->data->add(2,array('July 2011',28373.89));
		$chart1->data->add(3,array('August 2011',24072.13));
		$chart1->data->add(4,array('September 2011',33475.55));
		$label11=new TChartLabel(array(
			renderer=>"Ext.util.Format.numberRenderer('0,0')"
		));
		$axes11=new TChartAxis(array(
			type=>'Numeric',
			position=>'left',
			fields=>array('payments'),
			label=>$label11,
			title=>'Payments',
			grid=>true,
			minimum=>0
		));
		$axes12=new TChartAxis(array(
			type=>'Category',
			position=>'bottom',
			fields=>array('month'),
			title=>'Month of the Year'
		));
		$tips11=new TChartTips(array(
			trackMouse=>true,
			width=>140,
			height=>28,
			renderer=>"this.setTitle(storeItem.get('month') + ': ' + storeItem.get('payments') + ' $');"
		));
		$label12=new TChartLabel(array(
			display=>'insideEnd',
			textAnchor=>'middle',	//property text-anchor
			field=>'payments',
			renderer=>"Ext.util.Format.numberRenderer('0')",
			orientation=>'vertical',
			color=>'#333'
		));
		$serie11=new TChartSeries(array(
			type=>'column',
			axis=>'left',
			highlight=>true,
			tips=>$tips11,
			label=>$label12,
			xField=>'month',
			yField=>'payments'
		));
		$chart1->axes=array($axes11,$axes12);
		$chart1->series=array($serie11);
		$tab61->items->add('chart1',$chart1);

		return $tab61;
	}
}
?>