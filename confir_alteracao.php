<!DOCTYPE HTML>
<html>
    <head align=rigth>
        <title>Confirmar alteração</title>
		<p><a href = "logout.php"> Sair! </a></p>
		
    </head>
	
<div style = "background-color:SlateBlue;color:black;padding:20px;">
    <body bgcolor = orange>
		<h1 align=center> Sistema de monitoramento da linha de embalagem</h1>
			<p align="left" font=14 style= "color:red" >
			Sankyu 
			</p>
	<hr />
</div>
<form method="POST" action="confir_alteracao.php">
<?php
ini_set("display_errors", "0");
include "agiliza.php";
include "conecta_mysql.php";
session_start();
$_SESSION["editando"];
if($_SESSION["editando"] == "nome")
	{
			echo'<table >
					<tr>
						<td>					
							<strong>Digite um nome :</strong>&ensp;<input type="text" name= "editanome">
							<input type="submit" value=" OK ! ">
						</td>
					</tr>
			</table>';
			echo "<br /><br />";
			$editanome = $_POST["editanome"];
			$sql = "SELECT usu_cbd, usu_nome,usu_chapa FROM mem_usuarios WHERE usu_nome LIKE '%".$editanome."%'";
		$rs= mysqli_query($con, $sql);
		while($linha = mysqli_fetch_array($rs))
		{
			if(!$rs)
			{ 	
				echo "Usuário não encontrado !";
				break;		
			}
			else
			{
				if($editanome)
				{

					echo "<table >	
							 <tr>
								<td>
									<strong>Código :&ensp; 
									</strong>'$linha[usu_cbd]'&ensp;<label value='$linha[usu_cbd]' name='cod'>
									<strong>
										Nome :
									</strong>&ensp;
									<input type='text' value='$linha[usu_nome]' name='nome' maxlength='50' size='30'>
									<strong>
										Chapa :
									</strong>&ensp; 
									<input type='text' value='$linha[usu_chapa]' name='chapa' size='3' maxlength='7'
									pattern='[0-9]+'>&ensp;
									<input type='submit' value='Alterar' name='alterar'>
								</td=>
							</tr>
						</table>";
				}
				elseif(empty($editanome))
				{
					echo 'Favor entrar com um nome para a busca';
					break;
				}
				
			$cod = $_POST["cod"];
			$nome = $_POST["nome"];
			echo "<br / >codigo pego ao clicar no alterar".$cod;
			//mysql_close($con);
			$sql = "UPDATE mem_usuarios SET usu_nome = '".$nome."' WHERE mem_usuarios . usu_cbd = '".$linha["usu_cbd"]."'";
			$rs= mysqli_query($con, $sql);
			echo "<br /><br />Registro alterado com sucesso !",mysql_affected_rows();
			}
			session_destroy();
		}


	}
	
	
elseif($_SESSION["editando"] =="chapa")
	{
			echo'<table >
						<tr>
							<td>					
								<strong>Chapa :</strong>&ensp;
								<input type="text" name= "editachapa">
								<input type="submit" value=" OK ! ">
							</td>
						</tr>
				</table>';
			$editachapa = $_POST["editachapa"];
			$sql = "SELECT usu_cbd, usu_nome,usu_chapa FROM mem_usuarios WHERE usu_chapa = '".$editachapa."'";
			$rs= mysqli_query($con, $sql);
			while($linha = mysqli_fetch_array($rs))
			{
				if(empty($editachapa)|| $editachapa !=$linha["usu_chapa"])
				{
					echo 'Favor entrar com uma chapa para a busca';
					break;	
				}
				elseif($editachapa == $linha["usu_chapa"])
				{ 	 
					echo "<table >	
							 <tr>
								<td>
									<strong>Código :&ensp; </strong>'$linha[usu_cbd]'&ensp;
									<strong>Chapa :</strong>&ensp;
									<input type='text' value='$linha[usu_chapa]'size='3' maxlength='7'pattern='[0-9]+'>&ensp;
									<strong>Nome :</strong>&ensp;<input type='text' value='$linha[usu_nome]' maxlength='50' size='30'>
									</td=>
							</tr>
						</table>";
				}
				else{
					echo "Usuário não encontrado, favor digitar uma chapa válida !";
					break;
				}
			}	
		mysql_close($con);
		session_destroy();
	}


?>
</form>
</body></html>