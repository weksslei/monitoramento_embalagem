<?php
ini_set("display_errors", "0");
include "conecta_mysql.php";
session_start();

echo "O que tem nessa sessao&ensp;".$_SESSION["cod_maq"];
echo "<BR />Telas bloqueada&ensp;".$_SESSION["bloqueia_outras_telas"] ;
/* if (!isset($_SESSION["maq_cbd"] !))
	{
		
		// Redireciona o visitante de volta pro login
		echo'<script type="text/javascript"> alert("Favor entrar com usuário e senha! ");
						window.location="paginainicial.php";
						</script>';
	} */


$sql = "SELECT * FROM mem_maquinas WHERE maq_cbd = '".$_SESSION["cod_maq"]."'";
$rs = mysqli_query($con, $sql)or die ("nao conectou <br /> ".$sql);
 $linhas = mysqli_fetch_array($rs);
 
	 echo "<br / >Equipamento&ensp;".$linhas["maq_nome"]."<br />Setor&ensp;".$linhas["maq_setor"]."<br />Codigo&ensp;".
	 $linhas["maq_cbd"]."<br />Entrada esta: &ensp;".$linhas["maq_entrada"].
	 "<br />Saida : &ensp;".$linhas["maq_saida"].
	 "<br />Monitor : &ensp;".$linhas["maq_monitor"].
	 "<br />Maquina em uso? &ensp;".$linhas["maq_em_uso"]."<br />************";
	 if($linhas["maq_entrada"]=="ocupado"|| $linhas["maq_saida"]=="ocupado" ||$linhas["maq_monitor"]=="ocupado" && $_SESSION["bloqueia_outras_telas"] =="sim")
	 {
		 /* echo  '<script type="text/javascript"> alert("Você só pode abrir "Entrada", "Saida" ou "Monitor, em um unico dispositivo ! ");
				window.location="paginainicial.php";
				</script>';  */
			echo"<br />Você só pode abrir \"Entrada\", \"Saida\" ou \"Monitor\", em um unico dispositivo !";
			echo "<br />sessão entrada:&ensp;".$_SESSION["bloqueia_entrada"].
			"<br />sessão saida:&ensp;".$_SESSION["bloqueia_saida"].
			"<br />sessão monitor:&ensp;".$_SESSION["bloqueia_monitor"];
	 }
/* 	 elseif($linhas["maq_saida"]=="ocupado" )//&& $_SESSION["bloqueia_outras_telas"] =="sim"
	 {
		
			
			echo"<br />Você só pode abrir \"Entrada\", \"Saida\" ou \"Monitor\", em um unico dispositivo !";
	 }
	  elseif($linhas["maq_monitor"]=="ocupado" )//&& $_SESSION["bloqueia_outras_telas"] =="sim"
	 {
	
			echo"<br />Você só pode abrir \"Entrada\", \"Saida\" ou \"Monitor\", em um unico dispositivo !";
	 } */
    else
	{
		echo "Livre";	
	}
/* $linhas = mysqli_fetch_array($rs);
	if($linhas["ma"] == "Entrada" && $linhas["con_estado"]== "livre" )
	{
		echo 'Esta é a tela de entrada <br />';
		echo " e esta livre para ser usada";
		echo "<br />Logado em:".$_SESSION["maq"];
		echo "<br /> MAE".$linhas["con_maq"];
		//break;
	}
	elseif($linhas["con_tipo_usu"] == "Saida")
	{
		echo "Esta é a tela de saida <br /> ";
		echo " e esta livre para ser usada";
		echo "<br />Logado em:".$_SESSION["maq"];
			echo "<br /> MAE".$linhas["con_maq"];
		//break;
	}
	elseif($linhas["con_tipo_usu"]== "Monitor")
	{
		echo "Esta é a tela do Monitor <br />";
		echo " e esta livre para ser usada";
		echo "<br />Logado em:".$_SESSION["maq"];
			echo "<br /> MAE".$linhas["con_maq"];
		//break;
	} */
//}



?>