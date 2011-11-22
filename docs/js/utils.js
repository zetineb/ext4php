_APP={
	send:function(_p){
		if (!('showNetFail' in _p)) _p.showNetFail=true;
		try{
			if (_p.msg) Ext.Msg.wait(_p.msg);
			Ext.Ajax.request({
					url:window.location,
					timeout:30000,
					params:{event:_p.event,data:_p.data},
					method:'POST',
					success: function(response, opts){
						if (_p.msg) Ext.Msg.hide();
						if (_p.handler) _p.handler(response.responseText);
				},
				failure: function(response, opts){
					if (_p.msg) Ext.Msg.hide();
					if (_p.showNetFail) alert(response.statusText);
					if (_p.fail) _p.fail();
				}
			});	
		}
		catch(e){
			if (_p.msg) Ext.Msg.hide();
			alert(e.message)
		}
	},
	fileExists:function(strURL){
		oHttp = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest();
		oHttp.open('GET', strURL, false); 
		oHttp.send();
		return oHttp.responseText.indexOf('404 - File not found') > 0 ? false : true;
	}	
}
