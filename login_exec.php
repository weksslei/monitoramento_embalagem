<!DOCTYPE HTML>
<?php
ini_set("display_errors", "0");
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
session_start();
$_SESSION['privilegio'];
$_SESSION["cod_usuario"];
$hr = date("Y-m-d H:i:s");
$_SESSION['hora_do_log'] = $hr;
//ini_set("display_errors", "0");
//obter os valores digitados
$chapa = $_POST["chapa"];//Recebe a o numero da chapa da tela de login
$senha = $_POST["senha"];//Recebe a senha do usuario da tela de login
include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";// arquivo com funcoes diversas


$sql = "SELECT * FROM mem_usuarios WHERE usu_chapa = '".$chapa."' AND 
usu_senha = '".$senha."'";

$linhas=nosso_mysql_query($con, $sql, $versaophpaux);
$_SESSION["cod_usuario"] = $linhas["usu_cbd"];

if(!$linhas) // testando a consulta se algum registro
{
	echo "<html><body>";
	echo "<p align='center'>Usu&aacute;rio n&atilde;o encontrado!</p>";
	echo "<p align=\"center\"><a href=\"login_form.php\">Voltar</a></p>";
 	echo "</html></body>";
} 
elseif($senha != $linhas["usu_senha"])//confere senha
	{
		echo "<html><body>";
		echo " <p align=\"center\"> A senha esta incorreta!</p>";
		echo "<p align=\"center\"><a href=\"login_form.php\">Voltar</a></p>";
 		echo "</html></body>";
	}
elseif($linhas["usu_logado"] ==	"nao")
	{
		
		$_SESSION['privilegio'] = $linhas["usu_tipo_privilegio"];
		$_SESSION["cod_usuario"] = $linhas["usu_cbd"];
		setcookie("chapa", $chapa, time()+28800);
		setcookie("maquina", $maquina, time()+28800);
		setcookie("libera_usuario",$libera_usuario, time() + 28800); 
		header("Location: atualiza_estatus.php");		
		echo "usuario logado<br />".$linhas["usu_logado"];
	
	}
elseif(strtotime($linhas['usu_log_ini']) < $hoje = strtotime('-8 hours',strtotime($hr)))
	{
		echo '<script type="text/javascript"> alert(" Você saiu sem fazer o log-off, favor procure evitar fechar o navegador diretamente! ");
						window.location="atualiza_estatus.php";
			</script>';
		
		mysqli_close($con);
	}
elseif($linhas["usu_logado"]  == "sim")// usuario e senha corretos criando cookie
	{

		echo '<script type="text/javascript"> alert("Nome de usuário já está em uso! ");
						window.location="login_form.php";
					</script>';
	}
	//header("Location: paginainicial.php");//Iniciar a pagina do menu inicial

?>
