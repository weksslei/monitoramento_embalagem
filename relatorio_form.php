<!DOCTYPE HTML>
<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
ini_set("display_errors", "0");
include "agiliza.php";
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
<html>
<head>
        <title>Relátorios</title>		

	<div style = "background-color:SlateBlue;color:white;padding:20px;">
		<h1 align=center>Relátorios de embalagem</h1>
		<p align="left" font=14 style= "color:red" > Sankyu </p>
	</div> 
	
<hr />	
<script>
function validardados_relatorio(relatorioform)
{
	if(relatorioform.nome=="")
	{
		alert("Favor dentrar com um nome para o relatário.");
		return false;
	}
	if(relatorioform.chapa==""||saidaform.chapa.value.indexOf(' ",0)!= -1)
	{
		alert("Favor entrar com uma chapa valida !");
		return false;
	}

	if(relatorioform.observacoes==""||relatorioform.observacoes.numero.value.maxllength 200)
	{
		alert("As observações devem ter no máximo 200 caracteres!");
		return false;
	}
return true;
}

		</script>
</head>
<div>
	</div>
<body bgcolor = orange  >
<div align="center" style=" ;background-color:orange;
border:2px solid black; width:absolute; height:100px; ">
	<form method="POST" action="relatorio_exec.php" onSubmit="validardados_relatorio(this)">	
		<table >
			<tr>
				<td>
					Funcionário:&emsp;
					<input type="text" name="nome" size="30" maxlength="50">&emsp;
						Chapa:&emsp;
						<input type="text" name="chapa" size="5" pattern="[0-9]+"  maxlength="7">&emsp;
						Turno:&emsp;
					<select  name = "turno">
						<option font = 16 selected > Selecione</option>
						<option value="A">Turno A</option>
						<option value="B">Turno B</option>
						<option value="C">Turno C</option>
					</select>
				</td>
			</tr>
			<br />
				<tr>
					<td>
						Data inicio:&emsp;&ensp;
						<input type="datetime-local" name="data" value="<?php echo date('c', $timestamp); ?>" >
					&emsp;&emsp;
	
					Bobinas embaladas no turno:&emsp;
						 <input type="text" name="qntembalada" size="1" pattern="[0-9]+" maxlength="3"> <br />
					</td>
			</tr>
		</table>
	<hr />
		<h2>
			Observações 
		</h2>
			<textarea name="observacoes" align="center" rows="15" cols="100" maxlength="200" ></textarea>
	<hr />
		<input type="submit" value="Salvar relatário." >
	</form>
</div>
		</body>
</html>