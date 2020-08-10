<DOCTYPE HTML>
<?php
ini_set("display_errors", "0");
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
session_start();
?>
<html>
    <head align=rigth  >
        <title>Modificar usuario</title>
		<div style = "background-color:SlateBlue;color:white;padding:20px;">
			<p><a href='paginainicial.php'>Voltar a pagina inicial.</a></p>
			<p><a href = "logout.php"> Sair! </a></p>
		</div>
	<hr />	
    </head>
		<html>
			<body>
				<form method="POST" action="modificar_usuario_form.php" Onclick >
				<br />
				<table  align="center">
					<tr>
						<td>					
							<strong>Digite um nome :</strong>&ensp;
							<input type="text" name= "editanome" size="50" maxlength="50" >
							<input type="submit" value=" PESQUISAR ! ">
						</td>
					</tr>
			</table>
			<p align="center">Para mostrar todos os usuários cadastrados pressione espaço e pesquise.</p><br />
			<hr />
<br /><br />
<?php
include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";// arquivo com funcoes diversas
$conta = 0;
$editanome = $_POST["editanome"];
$altera = $_POST["altera"];
$pri = $_POST["pri"];
if($editanome)
{
			$sql = "SELECT * FROM mem_usuarios WHERE usu_nome LIKE '%".$editanome."%'";
		$rs= mysqli_query($con, $sql);
		while($linha = mysqli_fetch_array($rs))
		{
			if(!$rs)
			{ 	
				echo "Usuário não encontrado !";
				break;		
			}
			
			$conta++;
			echo'	<table >	
				<tr>
					<td>	
			</select></td>
						<strong>Código :&ensp; 
						</strong> 
						'.$linha["usu_cbd"].'&emsp;
						<strong>Chapa :</strong>&emsp;
						</strong>&ensp; 
						'. $linha["usu_chapa"].'&emsp;
						Nivel&ensp;'.$linha["usu_tipo_privilegio"].'
						<strong>&emsp;
							Nome :
							<button type="submit" name="altera" value='.$linha["usu_cbd"].'>'.$linha["usu_nome"].'</button>

					</td><td>
	 <td>
				
					</td></tr></table><hr />
					</form>
				';
				
			}	
		}
if(!empty($editanome))
{
	echo'Encontrados &ensp; '.$conta.' &ensp;registros na pesquisa<br />';
	echo" Clique no nome para alterar o privilégio de usuário.";
}
session_start();
$_SESSION["codigo_p_alterar"] = $altera;

 if($altera)
{
	mysqli_close($con);
	header("Location:modificar_usuario_exec.php");
} 
?>
	
 </body>
 </html>