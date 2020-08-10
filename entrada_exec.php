<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
ini_set("display_errors", "0");
$numero =  $_POST["numero"];
$berco = $_POST["berco"];


//include  "alerta1.php";//testando criação de messagebox
include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";// arquivo com funcoes diversas

session_start();
$_SESSION["qntberco"];
$_SESSION["tipo_de_usuario"];
$_SESSION["maq"];
$_SESSION["num_conf_vazio"];
$_SESSION["berco_conf_vazio"]; 
	if($berco > $_SESSION["qntberco"])
				{
					 echo '<script type="text/javascript"> alert("Numero do berço digitado não se aplica à essa máquina! ");
							window.location="entrada_form.php";
							</script>';
				}

	for($i=1;$i<=$_SESSION["qntberco"];$i++)
	{
	
		//echo " <br /> berço n  ".$i;
		
		
			if(empty($numero) && !empty($berco))
			{//Permitirá que entre com o numero vazio, considerando berço vazio
				$_SESSION["num_conf_vazio"] = "vazio";
				$_SESSION["berco_conf_vazio"] = $berco;
				echo '<script type="text/javascript"> alert("Este berço esta vazio? ");
						window.location="confirma_berco_vazio.php";
						</script>';
						break;				
			}
			elseif(empty($berco))
			{
				$erro=1;
				$msg1="Por Favor digite corretamente um numero de berço !";
			}
			elseif(strlen($numero)<7||strlen($senha)>7)
			{
					$erro=1;
					$msg1="O numero do produto deve ter 7 caracteres!";
			}
			elseif(strstr($numero,' ')!=FALSE)
			{
				$erro= 1;
				$msg1 = "Nao preencha com espaços em branco!";
				
			}
			elseif(strstr($berco,' ')!=FALSE)
			{
				$erro= 1;
				$msg1 = "Nao preencha com espaços em branco!";
			}
		
				
			if($erro)// se ocorre erro
			{
				echo "<html><body>";
				echo "<p align=center>$msg1</p>";
				echo "<p align=center><a href='javascript:history.back()'>voltar</a></p>";
				echo "</body></html>";
				break;
			}
			else
			{	
				$datahoje = date ("Y-m-d H:i");
	
				//gravar no banco
				$sql = "INSERT INTO `mem_producao` (pro_numero_produto, pro_berco, pro_data, pro_maq_cbd) VALUES
				('".$numero."', '".$berco."','".$datahoje."','".$_SESSION["cod_maq"]."')";
				$linhas= nosso_mysql_query($con, $sql, $versaophpaux);
				echo '<script type="text/javascript"> alert("Realizado Com Sucesso! ");
						window.location="entrada_form.php";
						</script>';
			}
			if($i == $berço)
			{
				//$_SESSION["qntberco"] = 0;
				 session_destroy();
				 $i = 0;
						 echo '<script type="text/javascript"> alert("Uma volta finalizada! ");
						window.location="entrada_form.php";
						</script>';  
				
			}
	
	$contavoltas = 0;
	if ($contavoltas < $_SESSION["qntberco"])
	{
		$contavoltas++;
	}
}//fim do laço
	echo "<br />";
	echo $contavoltas."º volta na linha";
	//session_destroy();
?>