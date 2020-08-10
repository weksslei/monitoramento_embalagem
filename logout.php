 <?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
ini_set("display_errors", "0");
include "conecta_mysql.php";
session_start();
setcookie("chapa", $chapa);
setcookie("maquina", $maquina);
//muda a situação de logon do usuario ao clicar em sair
/* echo "o  que vem na sessao: &ensp;".$_SESSION['hora_do_log'];
echo "o  que vem na sessao: &ensp;".number_format( $_SESSION["hora_do_log"]);
echo "<br />saida".$_SESSION["controle_saida"]; */

if($_SESSION["cod_usuario"]){
$sql = "UPDATE mem_usuarios SET usu_logado = 'nao', usu_log_sai = NOW() WHERE usu_cbd = '".$_SESSION["cod_usuario"]."'";
$res = mysqli_query($con, $sql) or die("<br /><br />Nao conectou e não mudou.<br/><br/>". $sql);		
if ($res) {
    echo "Nem aparece, atualizado";
	} else {
    echo "Error na atualização: " . mysqli_error($con);
}
}

//controla o acesso a algumas paginas

if($_SESSION["controle_entrada"] == "ocupado")
	{ 
		$sql = "UPDATE mem_maquinas SET maq_entrada = 'livre',maq_em_uso ='n' WHERE maq_entrada ='ocupado'AND maq_cbd ='".$_SESSION["cod_maq"]."'";
		$res = mysqli_query($con, $sql) or die("<br /><br />Nao conectou e não mudou.<br/><br/>". $sql);	
	}

if($_SESSION["controle_saida"] == "ocupado")
{
	$sql = "UPDATE mem_maquinas SET maq_saida = 'livre',maq_em_uso ='n' WHERE
	maq_saida ='ocupado' AND maq_cbd ='".$_SESSION["cod_maq"]."'"; 
	$res = mysqli_query($con, $sql) or die("<br /><br />Nao conectou e não mudou.<br/><br/>". $sql);
}

if($_SESSION["controle_monitor"] == "ocupado")
{
	$sql = "UPDATE mem_maquinas SET maq_monitor = 'livre',maq_em_uso ='n' WHERE maq_monitor ='ocupado' AND maq_cbd ='".$_SESSION["cod_maq"]."'"; 
	$res = mysqli_query($con, $sql) or die("<br /><br />Nao conectou e não mudou.<br/><br/>". $sql);
}

$linhas=mysqli_query($con, $sql)or die ("nao entrou".$sql);
mysql_close($con);
if ($res) 
	{
			echo "OK estado alterado";// nem aparece
	}
	else 
	{
		echo "Error em atualizar estado: " . mysqli_error($con);
	}



session_destroy();
header("Location: login_form.php");

?>

