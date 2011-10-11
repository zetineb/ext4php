<?php
class mask{
  public function CPF($val){
	  $maskCPF = '
			if(eventObj.getKey()!=8){
				var _str = Ext.getCmp("per_cpf").getValue();
				if(_str.length==3)
					_str = _str.substr(0,3)+"."+_str.substr(3,1);
				if(_str.length==7)
					_str = _str.substr(0,7)+"."+_str.substr(7,1);
				if(_str.length==11)
					_str = _str.substr(0,11)+"-"+_str.substr(11,1);
				Ext.getCmp("per_cpf").setValue(_str);
			}
		';
		echo $maskCPF;
	}
}
?>