<!DOCTYPE HTML>
<?php
ini_set("display_errors", "0");
include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";// arquivo com funcoes diversas
?>
<html>
<head>
        <title>Login</title>
<div style = "background-color:SlateBlue;color:white;padding:20px;">
    <h1 align=center> Entrada no sistema</h1>
	<p align="left" font=14 style= "color:red" > Sankyu </p>
<hr />	
</div> 
	</h3>		
</head>
<body align="justify" bgcolor = orange>
<div >
<hr />
	<form method="POST" action="login_exec.php">
		<h2> <table align=center ></h2>
			<tr><td >Chapa :<br /><input  type="text" name="chapa" maxlength="7"size="7"></td></tr>
			<tr><td>Senha:<br /><input type="password" name="senha"maxlength="8" size="8"></td></tr>
			<tr><td><input type="submit" value="Entrar" name="entrar" ></td></tr> 
			</table>
	</form>
	<hr />
</div>
</body>
</html>