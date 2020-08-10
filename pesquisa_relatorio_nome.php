<!DOCTYPE HTML>
<html>
<head>
        <title>Relátorios</title>		

	<div style = "background-color:SlateBlue;color:white;padding:20px;">
		<h1 align=center>Relátorios de embalagem</h1>
		<p align="left" font=14 style= "color:red" > Sankyu </p>
	</div> 
	
<hr />	
</head>
<body>
	<form method="POST" action='<?php echo $_SERVER["PHP_SELF"]?>'>
			<p>
				Nome:&emsp; <input  type="text" name="nome_pesquisado" size="30" maxlength="50"> 
				&emsp;<input type="submit" value=" Pesquisar  !">
			</p>
			<hr /> 
			
<?php
include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";// arquivo com funcoes diversas
$nome_pesquisado = $_POST["nome_pesquisado"];


	$sql = "SELECT `rel_cbd`, `rel_nome`, `rel_chapa`, `rel_turno`, `rel_data_inicial`, `rel_data_final`, `rel_total_embalado`, `rel_obersvacao` FROM `mem_relatorio` WHERE rel_nome LIKE '%".$nome_pesquisado."%'";
	$rs=mysqli_query($con, $sql);
if($nome_pesquisado)
{
	while($linha = mysqli_fetch_array($rs))
		{
			
				echo '<table>
						<table align="center" width="700px" border="1">
						
						<p align="center"><strong>Funcionário:</strong>&ensp;
							'.$linha["rel_nome"].'&emsp;
							<strong>Chapa:</strong>	&ensp;						
						'.$linha["rel_chapa"].'
						</p>
						</table>
					<table align="center" width="700px" border="1">
							<tr>
								<td><strong>Turno:</strong>&ensp;</td>
								<td>'.$linha["rel_turno"].'</td>
								<td><strong>Data Inicial:</strong> &ensp;</td>
								<td>'.date("d/m/y H:i",strtotime($linha["rel_data_inicial"])).'</td>
								<td><strong>Data Final :</strong>&ensp;</td>
								<td>'.date("d/m/y H:i",strtotime($linha["rel_data_final"])).'</td>
								<td><strong>Total embalado :</strong> &ensp;	</td>
								<td>'.$linha["rel_total_embalado"].'</td>
						</tr>
					</table>
						<table align="center" width="700px"  border="1">
							<tr>
								<td>
									<strong>Observações:</strong>
								</td>
							</tr>
								<td>
									'.$linha["rel_obersvacao"].'
								</td>
							</tr>	
								
					</table>
					<br />	';

		}//fim do while
}
			else
			{
				echo "Não encontrado.";
				break;
			}
?>
</form>
</body>
</html>