<?php
class contFormL6 {
	public $contFormL6;
	
	private function TCodBanco(){
	  $obj = new TCombobox(array(
			name=>'per_codBanco',
			fieldLabel=>'Bank',
			labelWidth=>385,
			labelAlign=>'top',
			width=>385,
			maskRe=>'/[""]/',
			displayField=>'nome',
			valueField=>'id',
			fields=>array('id','nome'),
			data=>array(
				array('001','BANK DO BRASIL S.A.'),
				array('104','CAIXA ECONOMICA FEDERAL'),
				array('237','BANK BRADESCO S.A.'),
				array('341','BANK ITAÚ S.A.'),
				array('399','HSBC BANK BRASIL S.A.'),
				array('748','BANK COOPERATIVO SICREDI S.A.'),
				array('003','BNK DA AMAZONIA S.A. Bco Comercial'),
				array('004','BNK DO NORDESTE DO BRASIL S.A. Bco Múltiplo'),
				array('012','BNK STANDARD DE INVESTIMENTOS S.A. Bco de Investimento'),
				array('014','NATIXIS BRASIL S.A. BNK MÚLTIPLO Bco Múltiplo'),
				array('019','BNK AZTECA DO BRASIL S.A. Bco Múltiplo'),
				array('021','BANESTES S.A. BNK DO ESTADO DO ESPIRITO SANTO Bco Múltiplo'),
				array('024','BNK DE PERNAMBUCO S.A. - BANDEPE Bco Múltiplo'),
				array('025','BNK ALFA S.A. Bco Comercial'),
				array('029','BNK BANERJ S.A. Bco Múltiplo'),
				array('031','BNK BEG S.A. Bco Múltiplo'),
				array('033','BNK SANTANDER (BRASIL) S.A. Bco Múltiplo'),
				array('037','BNK DO ESTADO DO PARÁ S.A. Bco Múltiplo'),
				array('040','BNK CARGILL S.A. Bco Múltiplo'),
				array('041','BNK DO ESTADO DO RIO GRANDE DO SUL S.A. Bco Múltiplo'),
				array('044','BNK BVA S.A. Bco Múltiplo'),
				array('045','BNK OPPORTUNITY S.A. Bco Múltiplo'),
				array('047','BNK DO ESTADO DE SERGIPE S.A. Bco Múltiplo'),
				array('062','HIPERCARD BNK MÚLTIPLO S.A. Bco Múltiplo'),
				array('063','BNK IBI S.A. - BNK MÚLTIPLO Bco Múltiplo'),
				array('065','BNK LEMON S.A. Bco Múltiplo'),
				array('066','BNK MORGAN STANLEY S.A. Bco Múltiplo'),
				array('069','BPN BRASIL BNK MÚLTIPLO S.A. Bco Múltiplo'),
				array('070','BRB - BNK DE BRASILIA S.A. Bco Múltiplo'),
				array('072','BNK RURAL MAIS S.A. Bco Múltiplo'),
				array('073','BB BNK POPULAR DO BRASIL S.A. Bco Múltiplo'),
				array('074','BNK J. SAFRA S.A. Bco Múltiplo'),
				array('075','BNK CR2 S/A Bco Comercial'),
				array('076','BNK KDB DO BRASIL S.A. Bco Múltiplo'),
				array('077','BNK INTERMEDIUM S/A Bco Múltiplo'),
				array('078','BES INVESTIMENTO DO BRASIL S.A. - BNK DE INVESTIMENTO Bco de Investimento'),
				array('079','JBS BNK S/A Bco Múltiplo'),
				array('081','CONCÓRDIA BNK S.A. Bco Múltiplo'),
				array('082','BNK TOPÁZIO S.A. Bco Múltiplo'),
				array('083','BNK DA CHINA BRASIL S.A Bco Múltiplo'),
				array('096','BNK BM&F DE SERVIÇOS DE LIQUIDAÇÃO E CUSTÓDIA S.A. Bco Comercial'),
				array('107','BNK BBM S/A Bco Múltiplo'),
				array('151','BNK NOSSA CAIXA S.A. Bco Múltiplo'),
				array('204','BNK BRADESCO CARTÕES S.A. Bco Múltiplo'),
				array('208','BNK UBS PACTUAL S.A. Bco Múltiplo'),
				array('212','BNK MATONE S.A. Bco Múltiplo'),
				array('213','BNK ARBI S.A. Bco Comercial'),
				array('214','BNK DIBENS S.A. Bco Múltiplo'),
				array('215','BNK COMERCIAL E DE INVESTIMENTO SUDAMERIS S.A. Bco Múltiplo'),
				array('217','BNK JOHN DEERE S.A. Bco Múltiplo'),
				array('218','BNK BONSUCESSO S.A. Bco Múltiplo'),
				array('222','BNK CALYON BRASIL S.A. Bco Múltiplo'),
				array('224','BNK FIBRA S.A. Bco Múltiplo'),
				array('225','BNK BRASCAN S.A. Bco Múltiplo'),
				array('229','BNK CRUZEIRO DO SUL S.A. Bco Múltiplo'),
				array('230','UNICARD BNK MÚLTIPLO S.A. Bco Múltiplo'),
				array('233','BNK GE CAPITAL S.A. Bco Múltiplo'),
				array('241','BNK CLASSICO S.A. Bco Múltiplo'),
				array('243','BNK MÁXIMA S.A. Bco Comercial'),
				array('246','BNK ABC BRASIL S.A. Bco Múltiplo'),
				array('248','BNK BOAVISTA INTERATLANTICO S.A. Bco Múltiplo'),
				array('249','BNK INVESTCRED UNIBCO S.A. Bco Múltiplo'),
				array('250','BNK SCHAHIN S.A. Bco Múltiplo'),
				array('254','PARANÁ BNK S.A. Bco Múltiplo'),
				array('263','BNK CACIQUE S.A. Bco Múltiplo'),
				array('265','BNK FATOR S.A. Bco Múltiplo'),
				array('266','BNK CEDULA S.A. Bco Múltiplo'),
				array('300','BNK DE LA NACION ARGENTINA Bco Comercial Estrangeiro - Filial no país'),
				array('318','BNK BMG S.A. Bco Múltiplo'),
				array('320','BNK INDUSTRIAL E COMERCIAL S.A. Bco Múltiplo'),
				array('366','BNK SOCIETE GENERALE BRASIL S.A. Bco Múltiplo'),
				array('370','BNK WESTLB DO BRASIL S.A. Bco Múltiplo'),
				array('376','BNK J.P. MORGAN S.A. Bco Múltiplo'),
				array('389','BNK MERCANTIL DO BRASIL S.A. Bco Múltiplo'),
				array('394','BNK FINASA BMC S.A. Bco Múltiplo'),
				array('409','UNIBCO-UNIAO DE BCOS BRASILEIROS S.A. Bco Múltiplo'),
				array('412','BNK CAPITAL S.A. Bco Múltiplo'),
				array('422','BNK SAFRA S.A. Bco Múltiplo'),
				array('453','BNK RURAL S.A. Bco Múltiplo'),
				array('456','BNK DE TOKYO-MITSUBISHI UFJ BRASIL S/A Bco Múltiplo'),
				array('464','BNK SUMITOMO MITSUI BRASILEIRO S.A. Bco Múltiplo'),
				array('473','BNK CAIXA GERAL - BRASIL S.A. Bco Múltiplo'),
				array('477','CITIBANK N.A. Bco Comercial Estrangeiro - Filial no país'),
				array('479','BNK ITAUBANK S.A. Bco Múltiplo'),
				array('487','DEUTSCHE BANK S.A. - BNK ALEMAO Bco Múltiplo'),
				array('488','JPMORGAN CHASE BANK, NATIONAL ASSOCIATION Bco Comercial Estrangeiro - Filial no país'),
				array('492','ING BANK N.V. Bco Comercial Estrangeiro - Filial no país'),
				array('494','BNK DE LA REPUBLICA ORIENTAL DEL URUGUAY Bco Comercial Estrangeiro - Filial no país'),
				array('495','BNK DE LA PROVINCIA DE BUENOS AIRES Bco Comercial Estrangeiro - Filial no país'),
				array('505','BNK CREDIT SUISSE (BRASIL) S.A. Bco Múltiplo'),
				array('600','BNK LUSO BRASILEIRO S.A. Bco Múltiplo'),
				array('604','BNK INDUSTRIAL DO BRASIL S.A. Bco Múltiplo'),
				array('610','BNK VR S.A. Bco Múltiplo'),
				array('611','BNK PAULISTA S.A. Bco Comercial'),
				array('612','BNK GUANABARA S.A. Bco Múltiplo'),
				array('613','BNK PECUNIA S.A. Bco Múltiplo'),
				array('623','BNK PANAMERICANO S.A. Bco Múltiplo'),
				array('626','BNK FICSA S.A. Bco Múltiplo'),
				array('630','BNK INTERCAP S.A. Bco Múltiplo'),
				array('633','BNK RENDIMENTO S.A. Bco Comercial'),
				array('634','BNK TRIANGULO S.A. Bco Múltiplo'),
				array('637','BNK SOFISA S.A. Bco Múltiplo'),
				array('638','BNK PROSPER S.A. Bco Múltiplo'),
				array('641','BNK ALVORADA S.A. Bco Múltiplo'),
				array('643','BNK PINE S.A. Bco Múltiplo'),
				array('652','ITAÚ UNIBCO BNK MÚLTIPLO S.A. Bco Múltiplo'),
				array('653','BNK INDUSVAL S.A. Bco Comercial'),
				array('654','BNK A.J. RENNER S.A. Bco Múltiplo'),
				array('655','BNK VOTORANTIM S.A. Bco Múltiplo'),
				array('707','BNK DAYCOVAL S.A. Bco Múltiplo'),
				array('719','BANIF - BNK INTERNACIONAL DO FUNCHAL (BRASIL), S.A. Bco Múltiplo'),
				array('721','BNK CREDIBEL S.A. Bco Múltiplo'),
				array('734','BNK GERDAU S.A Bco Múltiplo'),
				array('735','BNK POTTENCIAL S.A. Bco Comercial'),
				array('738','BNK MORADA S.A Bco Múltiplo'),
				array('739','BNK BGN S.A. Bco Múltiplo'),
				array('740','BNK BARCLAYS S.A. Bco Múltiplo'),
				array('741','BNK RIBEIRAO PRETO S.A. Bco Múltiplo'),
				array('743','BNK SEMEAR S.A. Bco Múltiplo'),
				array('745','BNK CITIBANK S.A. Bco Múltiplo'),
				array('746','BNK MODAL S.A. Bco Múltiplo'),
				array('747','BNK RABOBANK INTERNATIONAL BRASIL S.A. Bco Múltiplo'),
				array('749','BNK SIMPLES S.A. Bco Múltiplo'),
				array('751','DRESDNER BANK BRASIL S.A. BNK MULTIPLO Bco Múltiplo'),
				array('752','BNK BNP PARIBAS BRASIL S.A. Bco Múltiplo'),
				array('753','NBC BANK BRASIL S. A. - BNK MÚLTIPLO Bco Múltiplo'),
				array('756','BNK COOPERATIVO DO BRASIL S.A. - BCOOB Bco Comercial Cooperativo'),
				array('757','BNK KEB DO BRASIL S.A. Bco Comercial')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_agencia').focus();
		");
		return $obj;
	}
	
	private function TAgencia(){
	  $obj = new TText(array(
		  name=>'per_agencia',
			fieldLabel=>'Agency',
			labelWidth=>60,
			labelAlign=>'top',
			width=>60,
			value=>'',
			maxLength=>6,
			maskRe=>'/[0-9]/',
			margin=>'0 0 5 7',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_agDv').focus();
		");
		return $obj;
	}
	
	private function TAgDv(){
	  $obj = new TText(array(
		  name=>'per_agDv',
			fieldLabel=>'DV',
			labelWidth=>25,
			labelAlign=>'top',
			width=>25,
			value=>'',
			maxLength=>2,
			maskRe=>'/[a-zA-Z0-9]/',
			margin=>'0 0 5 7',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_conta').focus();
		");
		return $obj;
	}	

	private function TConta(){
	  $obj = new TText(array(
		  name=>'per_conta',
			fieldLabel=>'Acc. Num.',
			labelWidth=>70,
			labelAlign=>'top',
			width=>70,
			value=>'',
			maxLength=>8,
			maskRe=>'/[0-9]/',
			margin=>'0 0 5 7',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_ctDv').focus();
		");
		return $obj;
	}
	
	private function TCtDv(){
	  $obj = new TText(array(
		  name=>'per_ctDv',
			fieldLabel=>'DV',
			labelWidth=>25,
			labelAlign=>'top',
			width=>25,
			value=>'',
			maxLength=>2,
			maskRe=>'/[a-zA-Z0-9]/',
			margin=>'0 0 5 7',
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('per_tipoConta').focus();
		");
		return $obj;
	}	
	
	private function TTipoConta(){
	  $obj = new TCombobox(array(
			name=>'per_tipoConta',
			fieldLabel=>'Acc. Type',
			labelWidth=>135,
			labelAlign=>'top',
			width=>135,
			displayField=>'nome',
			valueField=>'nome',
			margin=>'0 0 5 7',
			maskRe=>'/[""]/',
			fields=>array('nome'),
			data=>array(
				array('NOTHING'),
				array('CURRENT ACCOUNT'),
				array('SAVING')
			),
			enableKeyEvents=>true
		));
		$obj->listeners->add("keydown","
		  if(eventObj.getKey()==13)
			  Ext.getCmp('wp_btSalvar').focus();
		");
		return $obj;
	}
	
	public function __construct(){
	  $this->contFormL6=new TContainer(array(
		  layout=>'hbox',
			width=>800,
			height=>45
		));
		$this->contFormL6->items->add('per_codBanco',$this->TCodBanco());
		$this->contFormL6->items->add('per_agencia',$this->TAgencia());
		$this->contFormL6->items->add('per_agDv',$this->TAgDv());
		$this->contFormL6->items->add('per_conta',$this->TConta());
		$this->contFormL6->items->add('per_ctDv',$this->TCtDv());
		$this->contFormL6->items->add('per_tipoConta',$this->TTipoConta());
		return $this->contFormL6;
	}
	
	public function getcontFormL6(){
	  return $this->contFormL6;
	}
}
?>