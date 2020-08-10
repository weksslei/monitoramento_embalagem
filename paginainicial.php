<!DOCTYPE HTML>
<?php
ini_set("display_errors", "0");
include "agiliza.php";
include "valida_cookies.inc";
if(!isset($_SESSION)) session_start();
/* if (!isset($_SESSION["cod_usuario"]))
	{
		// Destrói a sessão por segurança
		session_destroy();
		// Redireciona o visitante de volta pro login
		echo'<script type="text/javascript"> alert("Favor entrar com usuário e senha! ");
						window.location="login_form.php";
						</script>';
	} */
echo "Status:".status();

?>
<html>
    <head align=rigth>
        <title>Pagina Inicial</title>
		<p><a href = "logout.php"> Sair! </a></p>
		
    </head>
	
<div style = "background-color:SlateBlue;color:black;padding:20px;">
    <body bgcolor = orange>
	
	<h1 align=center> Sistema de monitoramento da linha de embalagem</h1>
	<p align="left" font=14 style= "color:red" > Sankyu </p>
	<hr />
</div>
<frameset>
<noframes>Frames nao suportado!</noframes>
	<a style = "font-color:white;" href = "logout.php">SAIR !</a>
	<p align = 'center'><font size =5>Defina qual máquina de embalar e o tipo de usuario.</font></p>
	
	<form method="POST" action="seleciona_maquina_exec.php" >
		<table font size=16 align= "center">
			<tr><td font size=16 >Máquina:<br /><select  name = "maquina"><br />
				 	<option font = 16 selected > Selecione</option>
					<option value="Maquina 1">Maquina 1</option>
					<option value="Maquina 2">Maquina 2</option>
					<option value="Maquina 3">Maquina 3</option>
					<option value="Maquina 4">Maquina 4</option>
					<option value="Maquina 5">Maquina 5</option>
					<option value="Maquina 8">Maquina 8</option>
	
				</select></td></tr>
	<tr><td>Tipo de Usuario:<br /><select  name = "tipo_de_usuario"><br />
				    <option selected  >Selecione</option>
					<option value="Monitor"> Monitor</option>
					<option value="Entrada">Entrada</option>
					<option value="Saida">Saida</option>


				</select></td>
	<tr><td><input type="submit" value="Entrar" name="entrar"></td></tr> 
      	</table>
	</frameset>
<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
session_start();
$_SESSION['privilegio'];
$_SESSION["nivel"];

//$_SESSION['numero'];
if($_SESSION["privilegio"]==1)//Vem da pagina de login usuario ja definido 
	{
		$_SESSION["nivel"]=1;?>
		<h4 align=center>Você é um administrador nível 1 !<h4>
		<p align=center><a href="cadastrarfuncionario_form.php"><input type="button" value= "Cadastrar Novo Usuario!" Onclick="cadastrar"></a>&ensp;
		<a href="confir_alteracao_excluir.php"><input type="button" value="Excluir um usuário !" ></a>&ensp;
		<a href="modificar_usuario_form.php"><input type="button" value= "Modificar um usuário !"" ></a></p>"<!--//aplicar aqui a tela ou codigo para mudar o privilegio de um usuario-->
		<?php
	}
	elseif($_SESSION["privilegio"]==2)
	{
		$_SESSION["nivel"]=2;
		echo "<html><body >";
		echo "<h4 align=center>Você é um administrador nível 2 !<h4>";
		echo "<p align=center><a href=\"cadastrarfuncionario_form.php\"><input type=button value= \"Cadastrar Novo Usuario!\"  ></a>&ensp;";
		echo "</body></html>";
	}
	else
	{
		$_SESSION["nivel"]=3;
		//Nao alterar a tela.
	}
 
?>

    
</body>
</html>
