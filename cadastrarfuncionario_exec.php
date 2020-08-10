<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
ini_set("display_errors", "0");
$nome = $_POST["nome"];
$chapa = $_POST["chapa"];
$senha = $_POST["senha"];
$confirmacao = $_POST["confirmacao"];
$pri = $_POST["pri"];


include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";// arquivo com funcoes diversas

echo "o que tem em &ensp;".$pri;
if(empty($nome))
{
	$erro=1;
	$msg='<script type="text/javascript"> alert("Por Favor digite o nome corretamente! ");
		window.location="cadastrarfuncionario_form.php";</script>';
}
elseif(empty($chapa))
{
	$erro=1;
	$msg='<script type="text/javascript"> alert("Por Favor digite uma chapa valida! ");
		window.location="cadastrarfuncionario_form.php";</script>';
	
}
elseif(strlen($senha)<4||strlen($senha)>8)
{
	$erro=1;
	$msg='<script type="text/javascript"> alert("A senha deve ter entre 4 e 8 caracteres! ");
		window.location="cadastrarfuncionario_form.php";</script>';
	
}
elseif(strstr($senha,' ')!=FALSE)
{
	$erro= 1;
	$msg = '<script type="text/javascript"> alert("A senha não pode conter espaçoes em branco! ");
		window.location="cadastrarfuncionario_form.php";</script>';
}
elseif($senha != $confirmacao)
{
	$erro= 1;
	$msg ='<script type="text/javascript"> alert("A senha não confere! ");
		window.location="cadastrarfuncionario_form.php";</script>';
}
elseif($pri=="Nivel")
{
	echo'<script type="text/javascript"> alert("Favor selecionar um nível para o cadastro! ");
		window.location="cadastrarfuncionario_form.php";</script>';
}

if($erro)// se ocorre erro
{
	echo "<html><body>";
	echo "<p align=center>$msg</p>";
	echo "<p align=center><a href='javascript:history.back()'>voltar</a></p>";
	echo "</body></html>";
	echo'<script type="text/javascript"> alert("Favor selecionar um nível para o cadastro! ");
							window.location="cadastrarfuncionario_form.php";
							</script>';
}
else
{	
 	//gravar no banco
	$sql = "INSERT INTO mem_usuarios (usu_cbd,usu_chapa, usu_nome, usu_senha,usu_tipo_privilegio,usu_logado) VALUES ('','".$chapa."', '".$nome."', '".$senha."','".$pri."','nao')";
	//$linhas= nosso_mysql_query($con, $sql,$versaophpaux); //or die("<br /><br />Nao conectou, porque sera?.<br/><br/>". $sql);
	$resultado = mysqli_query($con, $sql) or die("<br /><br />Nao conectou.<br/><br/>". $sql);
	$linhas =  mysqli_fetch_array($resultado);
	
	echo"<html><body>";
	echo"<p align=center>Seu cadastro foi realizado com sucesso!</p>";
	echo '<script type="text/javascript"> alert("Cadastro realizado com sucesso! ");
						window.location="cadastrarfuncionario_form.php";
						</script>';
	//echo "<p align=center><a href ='paginainicial.php'> Entrar! </a></p>";
	echo"</body></html>";
	mysqli_close($con); 
}

?>