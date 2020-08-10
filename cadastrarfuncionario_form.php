<!DOCTYPE HTML>
<?php
ini_set("display_errors", "0");
include "agiliza.php";
if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["cod_usuario"]))
	{
		// Destrói a sessão por segurança
		session_destroy();
		// Redireciona o visitante de volta pro login
		echo'<script type="text/javascript"> alert("Favor entrar com usuário e senha! ");
						window.location="login_form.php";
						</script>';
	}
	echo "&emsp;&emsp;Status:".status();?>
<html>
<head>
<title>Cadastro</title>
<script language ="javascript">
function validardados(cadasform)
{
	if(cadasform.nome=="")
	{
		alert("Favor digitar um nome para o cadastro.");
		return false;
	}
	if(cadasform.chapa==""||cadasform.chapa.value.indexOf(' ",0)!= -1)
	{
		alert("Favor digitar a chapa do funcionário  para o cadastro.");
		return false;
	}
	if(cadasform.senha.value.length<4||cadasform.senha.value.length<8)
	{
		alert("A senha deve ter entre 4 e 8 caracteres!");
		return false;
	}
	if(cadasform.senha.value.indexOf(' ",0)!= -1)
	{
		alert("A senha não pode conter espaços em branco.");
		
		return false;
	}
	if(cadasform.senha.value != cadasform.confirmacao.value)
	{
		alert("A confirmação de sua senha não confere!");
		return false;
	}

return true;
}
</script>
</head>

<body bgcolor= orange>
<h2 align = center>Entrar com os dados do funcionario usuario do sistema</h2>
<form method = "POST" action="cadastrarfuncionario_exec.php" onSubmit="return validardados(this)">
<p>&emsp;&emsp;&emsp;<a href='paginainicial.php'>Voltar a pagina inicial.</a></p>
&emsp;&emsp;&emsp;<a href = "logout.php"> Sair! </a>
<table font size=16 align= "center">
	<tr><td>
		<tr><td>
			<b>Nome :
				<br/><input type="text" name="nome" maxlength="50"size="50">
			</b>
		</td></tr>
			<tr><td>
				<b>Chapa:
				<br /><input type="text" name="chapa" maxlength="7"size="7">
				</b>
			</td></tr>
		<br /><br />
		<tr><td>
		<b>Senha :
			<br /><input type="password" name="senha" maxlength="8"size="8">
			</b>
		</td></tr>
		<br /><br />
			<tr><td>
				<b>Confirme a senha : <br /><input type="password" name="confirmacao" maxlength="8"size="8">
				</b>
			</td></tr>
		<br /><br />
<!--Somente um usuario nivel 1 pode adcionar um privilegio a um funcionario-->
<?php
	include "conecta_mysql.php" ;
	session_start();
	$_SESSION["nivel"];//vem da pagina inicial definindo as opções para cadastro
	if($_SESSION["nivel"]==1)
	{
		echo"<tr><td><b>Privil&eacute;vgio de usu&aacute;rio : <br /> Defina<br />
		1 para Administrador geral;<br /> 
		2 para administrador comum;<br />
		3 Para usu&aacute;rio comum;";				
		echo "<table >
				<tr><td font>N&iacute;vel:&ensp;<select  name = \"pri\">
					<option selected >Nivel</option>
					<option value=1>1</option>
					<option value=2>2</option>
					<option value=3>3</option>
				</select></td>";
	}
	elseif($_SESSION["nivel"]==2)
	{
		echo	"<tr><td><b>Privil&eacute;gio de usu&aacute;rio : <br />
				Defina <br />2 para Administrador;<br />
							3 Para usu&aacute;rio comum;";
		echo "<table >
					<tr><td font>N&iacute;vel:&ensp;<select  name = \"pri\">
						<option selected >Nivel</option>
						<option value=2>2</option>
						<option value=3>3</option>
					</select></td>";
	}
	elseif($_SESSION["nivel"]==3)
	{
		//Essa tela não modifica para o nivel 3
	}
	elseif($_SESSION=="Nível")
	{
		echo'<script type="text/javascript"> alert("Favor selecionar um nível para o cadastro! ");
		window.location="cadastrarfuncionario_form.php";
		</script>';
	}
			
?>
			
		<tr><td><input type="submit" value="salvar" name="Salvar" size="30" ></b></td></tr>
		</td></tr>
		</table>
</form>

</body>
</html>