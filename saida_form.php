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

	echo "Status:".status();
$_SESSION["bloqueia_entrada"] = "bloqueado";
$_SESSION["bloqueia_monitor"] = "bloqueado";
?>
<html>
	<title> Saida</title>
		<head>
			<div style = "background-color:SlateBlue;color:white;padding:20px;">
				<h2 align=center>Sistema de monitoramento da linha de embalagem
				</h2>
			<p font=14 style= "color:red" ;>
			Sankyu    Conferência dos produtos embalados  
			</p>
<hr />
			</div>
<script>
function validardados_saida(saidaform)
{
	if(saidaform.numero=="")
	{
		alert("Favor digitar um numero para o cadastro.");
		return false;
	}
	if(saidaform.numero==""||saidaform.numero.value.indexOf(' ",0)!= -1)
	{
		alert("Favor digitar um numero de produto!");
		return false;
	}
		}
	if(saidaform.berco==""||saidaform.berco.value.indexOf(' ",0)!= -1)
	{
		alert("Favor digitar um berço.");
		return false;
	}
	if(saidaform.numero.value.maxllength 8)
	{
		alert("O numero do produto deve ter  7 caracteres!");
		return false;
	}
return true;
}

		</script>
	</head>
<a href = "logout.php"> Sair! </a>
	<h1><p align="center">Saida  </p></h1>

	 <body bgcolor = orange>
<form method= "post" action= "saida_exec.php" onSubmit="validardados_saida(this)" >
	<h1>
		<table align= "center" >
		<tr>
			<td >Numero do produto : 
				<input type='text' name='numero_saida'  pattern="[0-9]+" maxlength="7" size="7">
			</td>
		</tr>
		<tr>
			<td>Berço........................:
				<input type='text'size=2 name="berco_saida" pattern="[0-9]+" maxlength="2" size="2">
			</td>
		</tr>
<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
	$hora = date ("d/m/y");
	echo"<tr>
			<td> Data ...:$hora
			</td>
		</tr>";
?> 
		<tr>
			<td>
				<input type='submit' value='  OK  '>
				
			</td>
			<hr />
		</tr>
	</h1>

</FORM>
</body>
</html>




