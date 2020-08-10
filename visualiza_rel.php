<!DOCTYPE HTML>
<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
$sql ="";
ini_set("display_errors", "0");

include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";// arquivo com funcoes diversas
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

	<div style = "background-color:MediumBlue;color:white;padding:20px;">
		<h1 align=center>Relátorios de embalagem</h1>
		<p align="left" font=14 style= "color:red" > Sankyu </p>
	</div> 
	
<hr />	
</head>
<body >
<div align="center" style=" margin-left:350px;background-color:orange;
border:2px solid black;color:white; width:700px; height:75px; ">
	<form method="POST" action="visualiza_rel.php">
	<br  />
		<table center" font >
		<tr><td  >Pesquisar relatórios por :&ensp;<select  name = "pesquisa">
				 	<option  selected > Escolha</option>
					<option value="1">Nome</option>
					<option value="2">Data</option>
					<option value="3">Chapa</option>
					<option value="4">Turno</option>
				</select></td> 
				<td>&ensp;<input type='submit' value=' Pesquisar  !'></td></tr>
	</table>

</div>
<hr />
<?php
$pesquisa = $_POST["pesquisa"];

	if($pesquisa == 1)
	{
			echo'<p>
				Nome:&emsp; <input  type="text" name="nome_pesquisado" size="30" maxlength="50"> 
				&emsp;<input type="submit" value=" Pesquisar  !">
			</p>
			<hr />'; 
	}
	elseif($pesquisa == 2)
	{
			echo '
					<p>
				Data:&emsp;</p>
					<p>De&ensp; <input  type="datetime-local" name="dataincial" > 
						até: &ensp;<input type="datetime-local" name="datafim" >
						&emsp;<input type="submit" value=" Pesquisar  !">
					</p>
					<hr /> ';
	}
	elseif($pesquisa == 3)
	{
		echo '
			<p>
				Chapa:&emsp; <input  type="text" name="chapa_pesquisada" size="5" maxlength="7" pattern=[0-9]+> 
				&emsp;<input type="submit" value=" Pesquisar  !">
			</p>	<hr />';
	}
	elseif($pesquisa == 4)
	{
		echo '
		<table font >
			<tr><td >Turno:&ensp;<select  name = "turno">
				 	<option  selected > Escolha</option>

					<option value="A">A</option>

					<option value="B">B</option>
	
					<option value="C">C</option>
				</select></td>&ensp;
				<td><input type="submit" value="  OK ! "></td></tr>
		</table>	
	<hr />';
	}
$nome_pesquisado = $_POST["nome_pesquisado"];	
$dataincial = $_POST["dataincial"];
$datafim = $_POST["datafim"];	
$chapa_pesquisada = $_POST["chapa_pesquisada"];
$turno = $_POST["turno"];
if($chapa_pesquisada)
{
	$sql = "SELECT `rel_cbd`, `rel_nome`, `rel_chapa`, `rel_turno`, `rel_data_inicial`, `rel_data_final`, `rel_total_embalado`, `rel_obersvacao` FROM `mem_relatorio` WHERE rel_chapa ='".$chapa_pesquisada."'";

}
elseif($dataincial)
{
	$sql = "SELECT `rel_cbd`, `rel_nome`, `rel_chapa`, `rel_turno`, `rel_data_inicial`, `rel_data_final`, `rel_total_embalado`, `rel_obersvacao` FROM `mem_relatorio` WHERE rel_data_inicial = '".$dataincial."' AND rel_data_inicial = '".$datafim."'";	
}
elseif($turno=="A" || $turno=="B" || $turno=="C")
{
	$sql = "SELECT `rel_cbd`, `rel_nome`, `rel_chapa`, `rel_turno`, `rel_data_inicial`, `rel_data_final`, `rel_total_embalado`, `rel_obersvacao` FROM `mem_relatorio` WHERE rel_turno LIKE '".$turno."'";
}
elseif($nome_pesquisado)
{
	$sql = "SELECT `rel_cbd`, `rel_nome`, `rel_chapa`, `rel_turno`, `rel_data_inicial`, `rel_data_final`, `rel_total_embalado`, `rel_obersvacao` FROM `mem_relatorio` WHERE rel_nome LIKE '%".$nome_pesquisado."%'";
}

if($sql)
{
$rs=mysqli_query($con, $sql);
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
	}

			
}
elseif($pesquisa == "Escolha" && $sql == "")
{
	echo "<p align='center' style='color:blue'>Favor entrar com um item para pesquisa!</p>";
}

?>
	</form>
</body>
</html>