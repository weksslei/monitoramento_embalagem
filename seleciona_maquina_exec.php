<?php

date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
ini_set("display_errors", "0");
include "conecta_mysql.php";// conecta ao banco

$maquina = $_POST["maquina"];// Definir qual maquina de embalar sera logada 
$tipo_de_usuario = $_POST["tipo_de_usuario"];

session_start();
$_SESSION["qntberco"];//variavel q define a quantidade de berço cada maquina  tem, dependendo do numero da maquina escolhido
$_SESSION["usuario"];
$_SESSION["maq"] = $maquina;
$_SESSION["controle"] ;//controlar o acesso as paginas
$_SESSION["cod_maq"];

$sql= "SELECT * FROM mem_maquinas WHERE maq_nome = '".$maquina."'";
$res = mysqli_query($con, $sql) or die ("Nao conectou".$sql);
$linhas = mysqli_fetch_array($res);


	if(($linhas["maq_nome"] == "Maquina 1" && $linhas["maq_em_uso"] == "n") &&
	($linhas["maq_entrada"]== "livre" || $linhas["maq_saida"]== "livre" || 
	$linhas["maq_monitor"]== "livre"))
		{
			
			$_SESSION["cod_maq"]= $linhas["maq_cbd"];
			$_SESSION["qntberco"] = 44;
			$_SESSION["usuario"]= $tipo_de_usuario;	
			
		}else
			{
				echo  '<script type="text/javascript"> alert("Esta função está ocupada ! ");
				window.location="paginainicial.php";
				</script>';
			}
	if(($linhas["maq_nome"] == "Maquina 2" && $linhas["maq_em_uso"] == "n") &&
	($linhas["maq_entrada"]== "livre" || $linhas["maq_saida"]== "livre" || 
	$linhas["maq_monitor"]== "livre"))
		{
			$_SESSION["cod_maq"]= $linhas["maq_cbd"];
			$_SESSION["qntberco"] = 44;
			$_SESSION["usuario"]= $tipo_de_usuario;	
		}else
			{
				echo  '<script type="text/javascript"> alert("Esta função está ocupada ! ");
				window.location="paginainicial.php";
				</script>';
			}
	if(($linhas["maq_nome"] == "Maquina 3" && $linhas["maq_em_uso"] == "n") &&
	($linhas["maq_entrada"]== "livre" || $linhas["maq_saida"]== "livre" || 
	$linhas["maq_monitor"]== "livre"))
		{
			$_SESSION["cod_maq"]= $linhas["maq_cbd"];
			$_SESSION["qntberco"] =44;
			$_SESSION["usuario"]= $tipo_de_usuario;

			
		}else
			{
				echo  '<script type="text/javascript"> alert("Esta função está ocupada ! ");
				window.location="paginainicial.php";
				</script>';
			}
	if(($linhas["maq_nome"] == "Maquina 4" && $linhas["maq_em_uso"] == "n") &&
	($linhas["maq_entrada"]== "livre" || $linhas["maq_saida"]== "livre" || 
	$linhas["maq_monitor"]== "livre"))
		{
			$_SESSION["cod_maq"]= $linhas["maq_cbd"];
			$_SESSION["qntberco"] =5;
			$_SESSION["usuario"]= $tipo_de_usuario;
				
		}else
			{
				echo  '<script type="text/javascript"> alert("Esta função está ocupada ! ");
				window.location="paginainicial.php";
				</script>';
			}
	if(($linhas["maq_nome"] == "Maquina 5" && $linhas["maq_em_uso"] == "n") &&
	($linhas["maq_entrada"]== "livre" || $linhas["maq_saida"]== "livre" || 
	$linhas["maq_monitor"]== "livre"))
		{	
			$_SESSION["cod_maq"]= $linhas["maq_cbd"];
			$_SESSION["qntberco"]=8;
			$_SESSION["usuario"]= $tipo_de_usuario;
		}else
			{
				echo  '<script type="text/javascript"> alert("Esta função está ocupada ! ");
				window.location="paginainicial.php";
				</script>';
			}
	if(($linhas["maq_nome"] == "Maquina 8" && $linhas["maq_em_uso"] == "n") &&
	($linhas["maq_entrada"]== "livre" || $linhas["maq_saida"]== "livre" || 
	$linhas["maq_monitor"]== "livre"))
		{	
			$_SESSION["cod_maq"]= $linhas["maq_cbd"];
			$_SESSION["qntberco"] =28;
			$_SESSION["usuario"]= $tipo_de_usuario;
		}else
			{
				echo  '<script type="text/javascript"> alert("Esta função está ocupada ! ");
				window.location="paginainicial.php";
				</script>';
			}

if($maquina == "Selecione" && $tipo_de_usuario == "Selecione")
	{		
		echo  '<script type="text/javascript">
		alert("Favor selecionar um tipo de usuário e uma máquina! ");
		window.location="paginainicial.php";
		</script>';
	}
	
	
elseif($tipo_de_usuario == "Entrada" && $maquina != "Selecione")
	{
		if( $linhas["maq_entrada"]== "livre" && $linhas["maq_nome"]==$maquina )
			{
				//header("Location: controle_acesso.php");  
				if ($_SESSION["bloqueia_saida"]=="bloqueado" || $_SESSION["bloqueia_monitor"]=="bloqueado")
				{
						
					echo'<script type="text/javascript"> alert("Você só pode abrir \"Entrada\", \"Saida\" ou \"Monitor\", em um unico dispositivo ! ");
								window.location="entrada_form.php";
								</script>';
				}
				else{
				$_SESSION["controle_entrada"] = "ocupado";
				$sql = "UPDATE mem_maquinas SET maq_entrada = 'ocupado',maq_em_uso= 's' WHERE maq_entrada = 'livre' AND maq_nome = '".$maquina."'";
				$linhas=mysqli_query($con, $sql)or die ("nao entrou".$sql);
				$_SESSION["bloqueia_outras_telas"] = "sim";
				mysqli_close($con);
				header("Location: entrada_form.php");
				}
			}
		else
			 {
				echo  '<script type="text/javascript"> alert("Esta função está ocupada ! ");
				window.location="paginainicial.php";
				</script>'; 
			}
			
	}
elseif($tipo_de_usuario == "Saida" && $maquina != "Selecione")
	{
		if($linhas["maq_saida"]== "livre" && $linhas["maq_nome"]==$maquina )
			{
				//header("Location: controle_acesso.php");  
					
				if ($_SESSION["bloqueia_entrada"]=="bloqueado" || $_SESSION["bloqueia_monitor"]=="bloqueado")
				{
					
					echo'<script type="text/javascript"> alert("Você só pode abrir \"Entrada\", \"Saida\" ou \"Monitor\", em um unico dispositivo ! ");
								window.location="saida_form.php";
								</script>';
				}
				else{
				$_SESSION["controle_saida"] = "ocupado";
				$sql = "UPDATE mem_maquinas SET maq_saida = 'ocupado',maq_em_uso = 's' WHERE maq_saida = 'livre' AND   maq_nome = '".$maquina."'";
				$linhas=mysqli_query($con, $sql)or die ("nao entrou".$sql);
				mysqli_close($con);
				header("Location: saida_form.php");
				}
			}
			else
			{
				echo  '<script type="text/javascript"> alert("Esta função está ocupada ! ");
						window.location="paginainicial.php";
						</script>'; 
			}
	}
elseif($tipo_de_usuario == "Monitor" && $maquina != "Selecione")
	{
		if($linhas["maq_monitor"]== "livre" && $linhas["maq_nome"] )
			{					
				//header("Location: controle_acesso.php");  
					if ($_SESSION["controle_saida"]=="bloqueado" || $_SESSION["controle_entrada"]=="bloqueado")
				{
					
					echo'<script type="text/javascript"> alert("Você só pode abrir \"Entrada\", \"Saida\" ou \"Monitor\", em um unico dispositivo ! ");
								window.location="monitor.php";
								</script>';
				}
				else{
				$_SESSION["controle_monitor"] = "ocupado";
				$sql = "UPDATE mem_maquinas SET maq_monitor = 'ocupado',maq_em_uso = 's' WHERE maq_saida = 'livre' AND   maq_nome = '".$maquina."'";
				$linhas=mysqli_query($con, $sql)or die ("nao entrou".$sql);
				$_SESSION["bloqueia_outras_telas"] = "sim";
				mysqli_close($con);
				header("Location: monitor.php");
				}
			}
		else
			{
				echo  '<script type="text/javascript"> alert("Esta função está ocupada ! ");
				window.location="paginainicial.php";
				</script>'; 
			}
	}

echo '<script type="text/javascript"> alert("Favor selecionar uum tipo de usuário e uma máquina!");
						window.location="paginainicial.php";
						</script>'; 

mysqli_close($con);
?>