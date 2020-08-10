<!DOCTYPE HTML>
<?php
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
?>
<html>
<head>
        <title>Relátorios</title>		

	<div style = "background-color:SlateBlue;color:white;padding:20px;">
		<h1 align=center>Relátorios de embalagem</h1>
		<p align="left" font=14 style= "color:red" > Sankyu </p>
	</div> 
	
<hr />	
</head>
<div>

	</div>
<body   bgcolor = white  >
<form method="POST" action="visualiza_rel.php">
	<table font >
		<tr><td  >Pesquisar relatórios por :&ensp;<select  name = "pesquisa">
				 	<option  selected > Escolha</option>

					<option value="1">Nome</option>

					<option value="2">Data</option>
	
					<option value="3">Chapa</option>
				</select></td> 
				<td>&ensp;<input type='submit' value=' OK  !'></td></tr>
	</table>
<hr />
</body>
</html>