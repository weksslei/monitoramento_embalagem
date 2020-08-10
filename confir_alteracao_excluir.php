<!DOCTYPE HTML>
<html>
<?php
ini_set("display_errors", "0");
include "agiliza.php";
include "valida_cookies.inc";
if(!isset($_SESSION)) session_start();
if (!isset($_SESSION["cod_usuario"]))
	{
		// Destrói a sessão por segurança
		session_destroy();
		// Redireciona o visitante de volta pro login
		echo'<script type="text/javascript"> alert("Favor entrar com usuário e senha! ");
						window.location="login_form.php";
						</script>';
	}
echo "Status:".status();

?>
    <head align=rigth>
        <title>Confirmar alteração</title>
		<p><a href = "logout.php"> Sair! </a></p>
		<p><a href='paginainicial.php'>Voltar a pagina inicial.</a></p>
<script language ="javascript">
function valida()
var x=document.forms["confir_alteracao_excluir"]["edita"].value;
var y=document.forms["confir_alteracao_excluir"]["cod_usuario"].value;
	if(x ==" " || x == NULL)
	{
		alert("Você deve inserir um nome para consulta!");
		return false;
	}

	if(y ==" " || y == NULL)
	{
		alert("Você deve ecolher um nome para excluir !");
		return false;
	}
return true;
}
</script>
    </head>
	
<div style = "background-color:SlateBlue;color:black;padding:20px;">
    <body bgcolor = orange>
		<h1 align=center> Sistema de monitoramento da linha de embalagem</h1>
			<p align="left" font=14 style= "color:red" >
			Sankyu 
			</p>
	<hr />
</div>
<form method="POST"  action="confir_alteracao_excluir.php" Onsubmit="return valida()" >
<table align= "center" >
			<tr>
				<td>
<br />				
					<strong>Digite um nome:</strong>&ensp;<input type="text" name= "edita">
					<input type="submit" value=" PESQUISAR 	! ">
					</td>
				</tr>
	</table> <hr /><br />
<p align="center">
<?php 
$edita = $_POST["edita"];
if($edita)
{
	echo "<p align='center'><font size=5> Selecione um nome na lista para a exclusão e clique em escolha!</font></p>";
}
echo' <p align="center"><font color="blue"><strong>Lista :</strong> </font>
			<select  name= "cod_usuario">
				<option selected >Escolha um nome:</option >&ensp;';
				
$sql = "SELECT usu_cbd, usu_chapa, usu_nome FROM mem_usuarios WHERE 
usu_nome LIKE '%".$edita."%'";
	$rs=mysqli_query($con, $sql)or die ("nao conectou para altera".$sql);
	$count=0;

if($edita == "Digite um nome:" || empty($edita) )
{
	echo"<option value=''></option>";
}
else
{		while($linha = mysqli_fetch_array($rs))
		{
			$cod = $linha["usu_cbd"];
			$nome = $linha["usu_nome"];
			$chapa = $linha["usu_chapa"];
			$count++;
			echo '
			<option value='.$cod.'>'.$nome.'</option>&ensp;';
			
		}

		echo '&ensp;<input type="submit" value=" escolha ! ">
		</select></p>';

}
mysql_close($con);		
$cod_usuario = $_POST["cod_usuario"]; 
 echo "<p align='center'><br />&ensp;Quantidade de registros encontrados :&ensp;".$count."</p><br />";
 if($cod_usuario)
 { 
	session_start();
	 $_SESSION["exclui"] = $cod_usuario;
	?>
	 <br /><hr />
	 <p align= "center"><a href="exclui_usuario.php"><input type=button value= "	EXCLUIR UM USUÁRIO	! "></a></p><br/><hr />
	<?php
 }
 ?>
</form>
</body></html>