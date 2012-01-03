<?php
session_start();
/*
Developed by: Fausto Marouvo
Contact Email: fausto@mirageminterativa.com.br
*/
//error_reporting(E_USER_NOTICE); //set which php errors are reported
$conexao = mysql_connect("localhost","root","");
$db = mysql_select_db("destaque",$conexao);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Fausto Castagnari Marouvo, fausto@grupouds.com.br">
<title>EXT4PHP - Demonstrative application</title>
<link rel="stylesheet" type="text/css" media="all" href="css/default.css" />
<script type="text/javascript">
  function log(){
	  var Form=document.logar;
		if(Form.usuario.value.length==0){
		  alert('Write username.');
			return false;
		}
		if(Form.senha.value.length==0){
		  alert('Write password.');
			return false;
		}
		Form.submit();
		return true;
	}
	
	function confirma(){
		var form = document.cadastro;
		if (form.nome.value.length==0){
			alert('Write username');
			return false;
		}	
		if (form.email.value.length==0) {
			alert("Write your email");
			form.email.focus();
			return false;
			}else{
				var emailStr = form.email.value;
				var emailReg1 = /(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/; // nao valida
				var emailReg2 = /^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,6}|[0-9]{1,3})(\]?)$/; // valida
				if (!(!emailReg1.test(emailStr) && emailReg2.test(emailStr))) {// se sintax eh valida
					alert("Invalid email! Rewrite.");
					form.email.focus();
					return false;
				}
			}
		if (form.senha_novo.value.length==0){
			alert('Write password');
			return false;
		}		
		if (form.confirma_senha.value.length==0){
			alert('Write password confirmation');
			return false;
		}				
		if(navigator.appCodeName=='Mozilla'){
			if (form.senha_novo.value != form.confirma_senha.value){
				alert('Password and confirmation do not match.');
				return false;
			}			
		}else{
			if (form.senha_novo.value != form.confirma_senha.value){
				alert('Password and confirmation do not match.');
				return false;
			}		
		}
		form.submit();
		return true;
	}
</script>
</head>
<body>
<div id="topo">
    <div class="resolucao">
    	<a href="index.php" title="Back para página inicial" id="logo">EXT4PHP - Demonstrative Application</a>
    </div>
</div>
<div class="resolucao">
    Create a new user or login with bellow user:<br />
		Username: demo<br />
		Password: 123
 </div>
 <div class="right">
     <div id="login">
        <form name="logar" method="post" action="">
            <label for="usuario">Username</label><br />
            <input type="text" name="usuario" id="usuario" class="texto_form_login" /><br />
            <label for="senha">Password</label><br />
            <input type="password" name="senha" id="senha" class="texto_form_login" /><br />
            <input type="hidden" name="entrar" id="entrar" value="1" />
            <input type="submit" value="Login" class="botao_login" onclick="return log();"/>
        </form>
     </div>
      <div id="novo">
        <form action="" method="post" name="cadastro">
            <label for="nome">Username</label><br />
            <input type="text" name="nome" id="nome" class="texto_form_login" /><br />
            <label for="email">Email</label><br />
            <input type="text" name="email" id="email" class="texto_form_login" /><br />
            <label for="senha_novo">Password</label><br />
            <input type="password" name="senha_novo" id="senha_novo" class="texto_form_login" /><br />
            <label for="confirma_senha">Pass Confirmation</label><br />
            <input type="password" name="confirma_senha" id="confirma_senha" class="texto_form_login" /><br />
			      <!--<a href="#" onclick="return confirma()"><img src="" border="0"></a>-->
						<input type="submit" value="Submit" class="botao_novo" onclick="return confirma()" />
        </form>
     </div>
	</div>
	<?php
	if(isset($_POST['entrar'])){
		$user=$_POST['usuario'];
		$senha=$_POST['senha'];
	  $sql = mysql_query("select codigo,nome,entidade from usuario where login='$user' and senha='$senha'");
		if(mysql_num_rows($sql)>0){
		  $user = mysql_fetch_array($sql);
			$perfil = mysql_fetch_array(mysql_query("select codigo from perfil where usuario='$user[codigo]'"));
			$_SESSION['codigo']=$user['codigo'];
			$_SESSION['perfil']=$perfil['codigo'];
			$_SESSION['nome']=ucwords($user['nome']);
			$_SESSION['login']=$_POST['usuario'];
			$_SESSION['senha']=$_POST['senha'];
			$_SESSION['entidade']=$user['entidade'];
			echo '<script type="text/javascript">
			  location.href="index2.php";
			</script>';
		}else{
		  echo'<script type="text/javascript">
			  alert("Incorrect username or password.");
			</script>';
		}
	}
	if(isset($_GET['logout'])){
		$_SESSION['codigo']="";
		$_SESSION['nome']="";
		$_SESSION['login']="";
		$_SESSION['senha']="";
		$_SESSION['store']="";
		echo '<script type="text/javascript">_store="";alert("Logged off.");location.href="index.php";</script>';
	}
	
	if(isset($_POST['nome'])){
		$user=$_POST['nome'];
		$email=$_POST['email'];
		$senha=$_POST['senha_novo'];
		$confirma=$_POST['confirma_senha'];
		$sql = mysql_query("select * from usuario where login='$user'");
			if (mysql_num_rows($sql)==0){
				$sql = mysql_query("insert into custom_email values ('','$email',1,'')");
				$codigo = mysql_fetch_array(mysql_query("select codigo from custom_email where email = '$email'"));
				$sql = mysql_query("insert into usuario values ('',1,0,'','$user','','$senha','','','$codigo[codigo]','','9999')"); 
				echo '<script type="text/javascript">
					alert("Register Successfully");
				</script>';
			}else {
				echo '<script type="text/javascript">
					alert("Username already exists.");
				</script>';
			}
		
	}
	?>
</body>
</html>