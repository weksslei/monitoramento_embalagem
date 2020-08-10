<!DOCTYPE HTML>
<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
ini_set("display_errors", "0");
include "conecta_mysql.php";// conecta ao banco
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
	echo "<p align=left>Status:".status();
	$_SESSION["bloqueia_saida"] = "bloqueado";
	$_SESSION["bloqueia_monitor"] = "bloqueado";
?> 

<html>
	<head>
		<title>Entrada</title>
	<div style = "background-color:SlateBlue;color:white;padding:20px;">
		<h1 align= center>Sistema de monitoramento da linha de embalagem
		</h1>
	<p align="left" font=14 style= "color:red" > Sankyu 
	</p>
<hr />	
	</div> 
<script language ="javascript">
function valida(produtoform)
{
	if(entrada_form.numero=="")
	{
		alert("Favor digitar um numero para o cadastro.");
		return false;
	}
	if(entrada_form.numero==""||entrada_form.numero.value.indexOf(' ",0)!= -1)
	{
		alert("Favor digitar um numero de produto!");
		return false;
	}
		}
	if(entrada_form.berco==""||entrada_form.berco.value.indexOf(' ",0)!= -1)
	{
		alert("Favor digitar um berço.");
		return false;
	}
	if(entrada_form.numero.value.maxlength 7||entrada_form.numero.value.minlength 7)
	{
		alert("O numero do produto deve ter  7 caracteres!");
		return false;
	}
return true;
}
</script>
<a href = "logout.php"> Sair! </a><br />


</head>
	<h1><p align="center">Entrada  </p></h1>
<body >

<div align="center" style=" background-color:orange;
border:2px solid black; width:absolute; height:200px; ">

	<form method='post' action='entrada_exec.php' onSubmit="valida(this)" >
	<h1>
	<table align= "center">
	<tr><td>Numero do produto :
	<input type='text' name='numero' pattern="[0-9]+" maxlength="7" ></td></tr>
	<tr><td>Berço: 
	<input type='text' name='berco' maxlength="2" size="2" pattern="[0-9]+" >
	</td></tr>
	<?php

	$d = date ("d/m/y");
	echo'<tr><td> Data :&ensp;&ensp;'.$d.'</label></td></tr>
		<tr><td><input type="submit" value="  OK  "></td></tr>
	</table>
	</div>
	</h1>	<hr />';
	session_start();
	$_SESSION["maq"];
	$_SESSION["qntberco"];
	$_SESSION["cod_maq"];
		$sql = "SELECT  maq_cbd, maq_nome FROM mem_maquinas WHERE maq_nome = '".$_SESSION["maq"]."'";
		
				$rs=mysqli_query($con, $sql);
				while($linha = mysqli_fetch_array($rs))
			{
				//Mostra a maquina onde o usuario esta logado   $_SESSION["maq"]
				if($linha["maq_nome"]==$_SESSION["maq"]){
					echo '<p align="center">'.$linha["maq_nome"].'&ensp;
					quantidade de berços &ensp;'.$_SESSION["qntberco"].'&ensp;';
					$_SESSION["cod_maq"] = $linha["maq_cbd"];
				}else{
					echo " erro codigo nao e igual a variavel<br />";
					break;}
				}//fim do while 
				
			mysqli_close($con);
		
			//session_destroy();
	?> 
</div><br />
	<br />
		</form>
	</body>
</HTML>