<!DOCTYPE HTML>
<html>
    <head align=rigth>
        <title>Excluir usuario</title>
		<p><a href = "logout.php"> Sair! </a></p>
		
		
    </head>
<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
session_start();
ini_set("display_errors", "0");
echo "Valor na sessão :&ensp;".$_SESSION["exclui"]."<br />";
include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";

if($_SESSION["exclui"] == "Escolha um nome:")
	{
	echo'<script type="text/javascript"> alert("Favor escolher um nome na lista se deseja excluir um usuário! ");
						window.location="confir_alteracao_excluir.php";
					</script>';
	}
$sql =  "DELETE FROM mem_usuarios WHERE usu_cbd =".$_SESSION["exclui"]."";
$rs = mysqli_query($con , $sql) or die ("<br />erro<br /><p align='center'><a href = 'paginainicial.php'> Retornar a pagina inicial. </a></p>".$sql );

echo '<script language="javascript" type="text/javascript">
var retorno = confirm("Tem certeza de que quer excluir este usuário?");
if (retorno){
alert ("Usuário será excluido!");
} else {
alert ("você clicou no botão cancelar!");
		window.location="confir_alteracao_excluir.php";
}
</script>';
if ($rs)
{
    echo '<script type="text/javascript"> alert("Usuário excluido do sistema! ");
						window.location="confir_alteracao_excluir.php";
						</script>';
}
else {
    echo "Erro ao salvar sua ação&ensp;: Verifique com o administrador do sistema.<hr /><br /> 
	<p align='center'><a href = 'paginainicial.php'> Retornar a pagina inicial. </a></p><br />". mysqli_error($con);
}

?>