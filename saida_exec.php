<!DOCTYPE HTML>

<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
ini_set("display_errors", "0");

session_start();

$numero = $_SESSION["numero"];
$berco = $_SESSION["berco"];
//ini_set("display_errors", "0");
include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";// arquivo com funcoes diversas

$numero_saida = $_POST["numero_saida"];
$berco_saida = $_POST["berco_saida"];
$sql = "SELECT * FROM mem_producao WHERE pro_numero_produto = '".$numero_saida."' AND pro_berco = '".$berco_saida."'"; 




$linhas=nosso_mysql_query($con, $sql, $versaophpaux);
		if($numero_saida=="" || $berco_saida=="")
			{
				$mensagem="Favor digitar um numero de produto e um para o berço, para conferência !";
				echo '<script type="text/javascript">alert("' . $mensagem. '")</script>';
				echo "<p align=\"center\"><a href=\"saida_form.php\">Voltar</a></p>";
			}
		elseif($numero_saida != $linhas["pro_numero_produto"])
			{
				$mensagem=" Atenção o numero do produto não confere com o berço de entrada!";
				echo '<script type="text/javascript">alert("' . $mensagem. '")</script>';
				echo "<p align=\"center\"><a href=\"saida_form.php\">Voltar</a></p>";
			}
		elseif($berco_saida != $linhas["pro_berco"])
			{
				$mensagem="Atenção o numero do berço não confere com o berço de entrada!";
				echo '<script type="text/javascript">alert("' . $mensagem. '")</script>';
				echo "<p align=\"center\"><a href=\"saida_form.php\">Voltar</a></p>";
			}
		else
		{ 
			$_SESSION["numero"]=$_POST["numero_saida"];
			$_SESSION["berco"]=$_POST["berco_saida"];
			$mensagem="ok !  Embalagem Realizada com sucesso!!!";
			echo '<script type="text/javascript">alert("' . $mensagem. '")</script>';
			echo "<p align=\"center\"><a href=\"saida_form.php\">Voltar</a></p>";
	    } 
		

		
?>





