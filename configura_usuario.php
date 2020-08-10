<!DOCTYPE HTML>
<html>

<title> Excluir usuário</title>
<head>

<div style = "background-color:SlateBlue;color:white;padding:20px;"><a href = "logout.php"> Sair! </a>
    <h2 align=center>Sistema de monitoramento da linha de embalagem</h2>
	<p font=14 style= "color:white" ;> Sankyu  &emsp; &emsp; &emsp; &emsp;  Configurações de usuário  </p></head>
	<!--<style>p.indent{ padding-left: 1.8em }</style>-->
	<hr /></div> 
<body>
	
	<?php
	include "conecta_mysql.php";// conecta ao banco
	session_start();
	$_SESSION["privilegio"];
	echo"privilegio\n\n\n\n".$_SESSION["privilegio"];
	//if($_SESSION["privilegio"]==1)
		//{
			$sql = "SELECT * FROM mem_usuarios" ;
			$linhas=mysqli_query($con, $sql);
			echo"<html><body>";
			//echo "<form  method='post' action='configura_usuario.php'>";
/*			echo "<table font size=16 align=center>";
					echo" <label  >Selecione um produto</label>";  
 					echo"<tr><td><option size=20px>Usuário</option>";
 					echo"<select name= selecione>";
					echo"<option font = 12 selected > Selecione</option>"; */	
			while($linha = mysqli_fetch_array($linhas)) 
				{
					echo "echo Usuario...: $linhas[usu_nome] $linhas[usu_chapa] <br/>";
/*					echo"<option  value= $linha[usu_nome]</option>";// echo $linha[usu_chapa] echo $linha[usu_tipo_privilegio]</optiontd></td></tr>" ;
					echo "</select>";
					echo"</body></html>"; 
					echo "Usuario...:  \n\n\n\n\n\n\n\n\n $linhas[usu_nome]<br/>";
					echo "Chapa...:\n\n\n\n\n\n\n\n\n $linhas[usu_chapa]<br />";
					echo "Privilégio...: \n\n\n\n\n\n\n\n\n $linhas[usu_tipo_privilegio]"; 
					echo "<html><h2>";*/
				}
		//}</select>

?>

  

</form>
	
</body>
	
</html>