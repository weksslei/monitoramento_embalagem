<!DOCTYPE HTML>
<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
ini_set("display_errors", "0");
include "agiliza.php";
include "conecta_mysql.php";
if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["cod_usuario"]))
	{
		session_destroy();
		echo'<script type="text/javascript"> alert("Favor entrar com usuário e senha! ");
						window.location="login_form.php";
						</script>';
	}

$_SESSION["bloqueia_saida"] = "bloqueado";
$_SESSION["bloqueia_entrada"]="bloqueado";

?>
<html>

  <header style= "background-color:blue;color:white;padding:10;border:2px solid white; top: 0;right: 0;left: 0;"font=20 align="center">

  <nav class="fR">
        <title>Monitor</title>
		<p align='right'  ><a  href = "logout.php"> <font color="white" >Sair!
		</font> </a>&ensp;</p>
		<meta http-equiv="refresh" content="1";url="monitor.php">
	
		<div style = "color:white; "font=20 align="center">
			<h1>
				Sistema de monitoramento da linha de embalagem
			</h1>
			<hr/>
				&ensp;<p align="left" font=8> Sankyu</p>
				
				
						<?php
					echo "Status:".status();
						echo "&ensp;|&ensp;".$_SESSION["maq"]." &ensp;|&ensp;Berços:&ensp;".$_SESSION["qntberco"];
						echo"&ensp;|&ensp;";
						$agora = date('d/m/Y H:i:s');
						echo"HOJE :".$agora;
							?>

				
				</nav>	</div>	


		</header>
	
<body  bgcolor =orange method= "POST" action="monitor.php">	
<?php

session_start();
$_SESSION["qntberco"];//rebece quantidade de berço tem a maquina selecionada
$_SESSION["usuario"];
$_SESSION["numero"];//Obtem o numero do produto para parar embalagem
$_SESSION["berco"];
$_SESSION["maq"]; //recebe o valor do codigo da maquina da pag inicial
$contador=0;
$vazio=0;
	


$sql = "SELECT * FROM mem_producao WHERE pro_data > '".$_SESSION['hora_do_log']."' AND
 pro_maq_cbd = '".$_SESSION["cod_maq"]."'";	//".$dia."
 //$sql = "SELECT * FROM mem_producao limit 15";
	//echo '<div style=" border:2px solid black; top: 0;right: 0;left: 0; height:600px;width:absolute; z-index:1; overflow: auto  ">';
$rs=mysqli_query($con, $sql) or die ("Erro na query".$sql);
while($linha = mysqli_fetch_array($rs))//Loop  de visualização dos produtos na tela de TV.
	{
		echo '		
		<h2 >
				<table align="center">
				<tr><td>
					Numero do produto:&ensp;&ensp; '.$linha["pro_numero_produto"].'
						&emsp;| &emsp;
					<td>Berço: &ensp; '.$linha["pro_berco"].'&ensp;|<td>
				
				</td></tr>
				</table>
			</h2>
			 ';
		
		$contador++;
		if($linha["pro_numero_produto"] == "vazio")
		{
			$vazio++;
		}

	}
	echo '</div>';
	
	if($_SESSION["qntberco"]>=$linha["pro_berco"])
		{
			echo "<br /><br />
						Quandidade de bobinas embaladas :".$total= $contador-$vazio;
			echo"<br />Berços vazios:&ensp;".$vazio;			
				$volta=$contador;
				break;
		}
		else
			{
				echo "<br /><br />
						Quandidade de bobinas embaladas :".$total= $contador-$vazio;
				echo"<br />Berços vazios:&ensp;".$vazio;
					$volta= $contador+$volta;
					echo "TOTAL : ".$total= $contador+$volta-$vazio;
					$contador = 0;
			}
	
//Compara as bobinas digitadas na saida
$sql = "SELECT * FROM mem_producao WHERE pro_numero_produto = '".$_SESSION['numero']."' AND pro_berco = '".$_SESSION['berco']."'"; 
mysql_close($con);

if($_SESSION["numero"]){
$rs=mysqli_query($con, $sql);
while($linha = mysqli_fetch_array($rs))
{
	echo "<br />Busca no banco numero ".$linha["pro_numero_produto"];
	echo "<br />Busca no banco berço ".$linha["pro_berco"];
	if($_SESSION["numero"] != $linha["pro_numero_produto"] )
	{
		
		echo'<h1 align=center>Numero do produto não confere!</h1>
				<p>
					<stronger>Favor verificar o produto:'.$_SESSION["numero"].'</stronger>
				</p> <br />
				
					<a href =monitor.php ><input type=button value="Favor verificar o produto !"  name=des ></a>';
		$des = $_POST["des"];
		break;
	}
	elseif($_SESSION["berco"] != $linha["pro_berco"])
	{
		echo"Berço não confere!";
	}
	elseif($_SESSION["numero"] == $linha["pro_numero_produto"] )
	{
		echo "<br />continue embalando<br />";
		
	}

		mysqli_close($con);
	//session_destroy();
}
}
	echo "<br />
		<br />Numero digitado da saida".$_SESSION["numero"];	
		echo "<br />numero do berço da saida".$linha["pro_berco"];
	
?>

</body>
	<footer >Rodapé
	</footer>
</html>
