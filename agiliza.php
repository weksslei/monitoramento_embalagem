<?php
// CODIGO PARA AGILIZAR CONEXÃO COM O BANCO 
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
include "conecta_mysql.php"; 
function nosso_mysql_query($con, $sql, $versaophpaux)
{
	if($versaophpaux=="i")
	{
		$resultado = mysqli_query($con, $sql) or die("<br /><br />Nao conectou.<br/><br/>". $sql);
		$linhas =  mysqli_fetch_array($resultado);
		mysqli_close($con);
	}
	else//condição que define o acesso ao bando de dados, dependendo da versao do servidor.
	{
		$resultado = mysql_query($con, $sql) or die("<br /><br />Nao conectou.");
		$linhas =  mysql_fetch_array($resultado);
		mysql_close($con);
	}
	
	

	return $linhas; 
}
///////////////////////////////////////////////////////////////////////////////////////////
function status()
{
include "conecta_mysql.php";// conecta ao banco
session_start();
$_SESSION["cod_usuario"];
$sql = "SELECT * FROM mem_usuarios WHERE usu_cbd =
'".$_SESSION["cod_usuario"]."'LIMIT 1";
$rs=mysqli_query($con, $sql)or die("Desconectado!");
while($linha = mysqli_fetch_array($rs))
{
	//if($linha["usu_logado"] == "sim")
	if($linha["usu_cbd"]==$_SESSION["cod_usuario"]&& $linha["usu_logado"] == "sim" )
	{
		$lin = '&emsp;Código:&ensp;'.$linha["usu_cbd"].'
			&ensp;Usuário:&ensp;'.$linha["usu_nome"].'
			&emsp;Chapa:&ensp;'.$linha["usu_chapa"].'
			&emsp;Nível:&ensp;'. $linha["usu_tipo_privilegio"].'
			Logado &ensp;'.$linha["usu_logado"];
			return $lin;
			mysqli_close($con);
	}
	elseif($linha["usu_logado"] == "nao")
	{
		session_destroy(); 
		mysqli_close($con);
		$lin = '<script type="text/javascript"> alert("Nome de usuário já está em uso! ");
						window.location="login_form.php";
						</script>';
						return $lin;
	}
	
}
}

///////////////////////////////////////////////////////////////////////////////////////////


?>