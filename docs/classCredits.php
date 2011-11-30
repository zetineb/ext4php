<?php
class classCredits{
	public function __construct(){
	 $html='
		<style>
		body{
			background-color:#ffffff;
		}
		.topo{
			background-image:url(images/credits/topo.png);
			background-repeat:no-repeat;
			width:573px;
			height:40px;
			color:#FFF;
			font-size:18px;
			font-family:Tahoma, Geneva, sans-serif;
			font-weight:bold;
		}

		.titulo{
			color:#569ce5;
			font-size:20px;
			font-family:Arial, Helvetica, sans-serif;
			font-weight:bold;
		}

		.desc{
			color:#333;
			font-size:14px;
			font-family:Arial, Helvetica, sans-serif;
		}
		</style>

		<table border="0" width="600" cellpadding="10" cellspacing="0">
			<tr>
				<td colspan="2" class="topo">Credits</td>
			</tr>
			<tr>
				<td colspan="2" class="titulo"><img src="images/credits/logo_ext64x64.png" border="0"> Ext4php FrameWork</td>
			</tr>
			<tr>
				<td width="100"><img src="images/credits/foto_rigoberto.png" border="0"> </td>
				<td class="desc" valign="top">
					<b>Nome:</b> Rigoberto D. Benitez <br /><br />
					<b>Email:</b> rigoberto.benitez@gmx.com
				</td>
			</tr>
			<tr><td><br  /></td></tr>
			<tr>
				<td colspan="2" class="titulo"><img src="images/credits/logo_docs64x64.png" border="0"> Ext4php Docs</td>
			</tr>
			<tr>
				<td width="100"><img src="images/credits/foto_cezar.png" border="0"></td>
				<td class="desc" valign="top">
					<b>Nome:</b> Cezar Aluisio Pavelski<br /><br />
					<b>Email:</b> cezar@pavelski.net
				</td>
			</tr>
			<tr>
				<td width="100"><img src="images/credits/foto_fausto.png" border="0"></td>
				<td class="desc" valign="top">
					<b>Nome:</b> Fausto Castagnari Marouvo<br /><br />
					<b>Email:</b> fausto@mirageminterativa.com.br
				</td>
			</tr>
			<tr>
				<td width="100"><img src="images/credits/foto_kaisa.png" border="0"></td>
				<td class="desc" valign="top">
					<b>Nome:</b> Kaísa Fernanda P. de Almeida <br /><br />
					<b>Email:</b> kaisafernanda@gmail.com
				</td>
			</tr>
		</table>
	  ';
	  echo $html;
	}
}
$credits = new classCredits();
?>