<!DOCTYPE HTML>
<?php
if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["cod_usuario"]))
	{
		// Destrói a sessão por segurança
		session_destroy();
		// Redireciona o visitante de volta pro login
		header("Location: login_form.php"); exit;
	}?>
<html>
<head>
</head>
<div style = "background-color:SlateBlue;color:white;padding:20px;">
    <h1 align= center>Sistema de monitoramento da linha de embalagem</h1>
	<p align="left" font=14 style= "color:red" > Sankyu </p>
<hr />
</div>
</head>

<body>
<div >
<form  action="pesquisa.php" method="POST">

<div>
	<table font >
		<tr><td  >Pesquisar por:&ensp;<select  name = "pesquisa">
				 	<option  selected > Escolha</option>

					<option value="Numero">Numero</option>

					<option value="Data">Data</option>
	
					<option value="Maquina">Maquina</option>
				</select></td></tr>
				<tr><td><input type='submit' value='  OK  '></td></tr>
	</table>
</div>
<hr>
<?php
		
$pesquisa = $_POST["pesquisa"];
session_start();
$_SESSION["definediv"] = $pesquisa;
 	if($pesquisa=="Numero")
	{
		header('Location:pesquisapornumero.php');
	}
	elseif($pesquisa=="Maquina")
	{
		header('Location:pesquisapormaq.php');
	}
	elseif($pesquisa == "Data")
	{
			header('Location:pesquisa_por_data.php');
	} 

?>
		</form>
	</body>
</html>