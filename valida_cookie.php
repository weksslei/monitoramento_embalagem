<?php
if(IsSet($_COOKIE["chapa"])){
$chapa = $_COOKIE["chapa"];}
if(!(empty$chapa))
{
	include "conecta_mysql.php";
	$resultado = mysql_query("SELECT usuarios WHERE chapa = '$chapa'");
	if(mysql_num_rows($resultado)==1)
	{
		if($senha != mysql_result($resultado,0,"senha"))
		{
			setcookie("chapa");
			echo"Voce não efetuou o login!";
			exit;
		}
	}
	else
	{
		setcookie("chapa");
		echo"Voce não efetuou o login!";
		exit;
	}
	else
	{
		echo"Voce não efetuou o login!";
		exit;
	}
	mysql_close();
	?>
}