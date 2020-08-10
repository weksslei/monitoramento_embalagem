<!DOCTYPE HTML>
<html>
<head>
<title>xxxxxxxxxx</title>
</head>
<frameset rows="20%,*,30%" frameborder="1" framespacing="1">
<frame src="pesquisa.php" name="superior" noresize scrolling="no">
<?php	

session_start();
$_SESSION["definediv"];

if($_SESSION["definediv"]== "Numero")
{
	echo'
	<frame src="pesquisapornumero.php" name="central" marginwidth="2" marginheight="3" noresize scrolling="yes">
	';
}
elseif($_SESSION["definediv"]== "Maquina")
{
			echo'
	<frame src="pesquisapormaq.php" name="central" marginwidth="2" marginheight="3" noresize scrolling="yes">
	';
}
?>
<<FRAME SRC="pesquisapornumero.php" NAME="central" MARGINWIDTH="2" MARGINHEIGHT="3" NORESIZE SCROLLING="YES">
<FRAME SRC="linha3.html" NAME="inferior" NORESIZE SCROLLING="NO">
</FRAMESET>
<noframes>
<body>
</body>
</noframes>
</frameset>
</html>

