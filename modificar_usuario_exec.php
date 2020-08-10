<DOCTYPE HTML>
<html>
<head >
	 <title>Confirmação</title>
		<div style = "background-color:SlateBlue;color:white;padding:20px;">
			<h1 align=center> Confirmação</h1>
			<p align="left" font=14 style= "color:red" > Sankyu </p>
			<p><a href = "logout.php"> Sair! </a>
			<p><a href = "modificar_usuario_form.php">Voltar!</a></p>
			
			<hr />
		</div> 
</head>
	<body align="center">
<?php
ini_set("display_errors", "0");
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";// arquivo com funcoes diversas
session_start();


$sqlEscolhido =  "SELECT usu_cbd, usu_nome, usu_chapa, usu_tipo_privilegio FROM mem_usuarios WHERE usu_cbd =".$_SESSION["codigo_p_alterar"];
$rs= mysqli_query($con , $sqlEscolhido);
$row=mysqli_fetch_array($rs);
//$_SESSION["codigo_p_alterar"] = $row["usu_cbd"];

 
 
echo "<br /><p align='center'>
	Foi selecionado o usuario&ensp;".$row["usu_nome"]."&ensp;com a chapa&ensp; ".$row["usu_chapa"].". Usuário nível ".$row["usu_tipo_privilegio"]."<br /></p>";


?>
<form method="POST" action="modificar_usuario_exec.php">

<table align="center">
	<td>
		<tr>Alteração de privilégio:
			<select  name = "pri">
				<option selected  ></option>
				<option value=1>1</option>
				<option value=2>2</option>
				<option value=3>3</option>
			</select></td>
				<input  type="submit" value="ok">
				</form>
<?php

$pri = $_POST["pri"];

	if($pri == $row["usu_tipo_privilegio"]|| $pri == "" )
	{
		echo  '<script type="text/javascript"> alert(" Esse usuário ja possui esse privilégio, ou você não escolheu uma opção para troca! ");
						window.location="modificar_usuario_exec.php"';
	}
	
		$sql = "UPDATE  mem_usuarios  SET usu_tipo_privilegio = '".$pri."' WHERE
	 usu_cbd = ".$_SESSION["codigo_p_alterar"];
	 $r = mysqli_query($con , $sql) or die 
	 ("Não houve mudança no privilegio do usuário<br />".$sql."<br /variavel>&ensp;");
		if(mysqli_affected_rows($r))
		{	
			echo'<script type="text/javascript"> alert(" Alteração feita com sucesso!");
						window.location="modificar_usuario_form.php"';
		}else
		{
			'<script type="text/javascript"> alert(" Erro ao atualizar! ");
						window.location="modificar_usuario_form.php"';
		}
	
	mysqli_close($con);
	?>
	</body>
</html>