<!DOCTYPE HTML>
<html>
    <head align=rigth>
        <title>Editar usu&aacute;rio</title>
		<p><a href = "logout.php"> Sair! </a></p>
		
    </head>
	
<div style = "background-color:SlateBlue;color:black;padding:20px;">
    <body bgcolor = orange>
	
	<h1 align=center> Sistema de monitoramento da linha de embalagem</h1>
	<p align="left" font=14 style= "color:red" > Sankyu </p>
	<hr />
</div>
<body>
	<form method="POST" action="editar_usu.php">
		<table  align= "center">	
				 <tr>
					<td> Selecione o usuário para editar por :&ensp;
						<select  name = "edita">&ensp;
							<option selected >Selecione</option>
							<option value="nome">Nome</option>
							<option value="chapa">Chapa</option>
							<option value="todos">Todos</option>
						</select>
					
			
						<input type="submit" value=" OK! " name="entrar">
					</td>
				</tr> 
		</table>
	<hr />
<?php
ini_set("display_errors", "0");
include "agiliza.php";
include "conecta_mysql.php";
$edita= $_POST["edita"];
session_start();
$_SESSION["editando"] = $edita;


if($edita=="nome")
	{
		header("Location:confir_alteracao.php");
	}
	elseif($edita=="chapa")
	{ 	 	
		header("Location:confir_alteracao.php");
	}
	elseif($edita=="todos")
	{
		$sql = "SELECT * FROM mem_usuarios";
		$rs= mysqli_query($con, $sql);
		while($linha = mysqli_fetch_array($rs))
		{
				echo "<table >	
						 <tr>
							<td>
								<strong>Nome :</strong>&ensp;$linha[usu_nome];
								<strong>Chapa :</strong>&ensp; $linha[usu_chapa]&ensp;
								<input type='submit' value='Editar' name='editar'>
							</td>
						</tr>
					</table>";
		}
}
elseif($edita == "Selecione")
{
	
 	 echo '<script type="text/javascript"> alert("Favor escolher Nome ou Chapa para realizar a busca!");
						window.location="editar_usu.php";
						</script>';  
}
?>
</form>





</body>
</html>