<!DOCTYPE HTML>
<?php
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
</head>
<div style = "background-color:SlateBlue;color:white;padding:20px;">
    <h1 align= center>Sistema de monitoramento da linha de embalagem</h1>
	<p align="left" font=14 style= "color:black" > Sankyu </p>
<hr />
</div>
</head>
	<body style="color:blue">
	
		<form  action="pesquisapornumero.php" method="POST">
			<p> Numero do produto : <input type='text' name="num_pes" pattern=[0-9]+ maxlength=7>
			<input type='submit' value='  OK  '></p>
		</form> 
<?php
ini_set("display_errors", "0");
include "conecta_mysql.php";
		$num_pes = $_POST["num_pes"];
		
		$sql =" SELECT `pro_cbd`, `pro_numero_produto`, `pro_berco`, `pro_data`, `pro_maq_cbd` FROM `mem_producao`
		WHERE pro_numero_produto = '".$num_pes."'";
			$rs=mysqli_query($con, $sql);
					while($linha = mysqli_fetch_array($rs))//Loop  de visualização dos produtos 
				{
					echo "<html><body>";
					echo "<table  border=0:color=blask;>";
					echo "<tr><td>";
					echo "Numero do produto...:&ensp;&ensp;
					$linha[pro_numero_produto]";echo "&ensp;<td>";
					echo "Berço:&ensp;&ensp; $linha[pro_berco]&ensp;&ensp;<td>";
					echo "Maquina:  $linha[pro_maq_cbd]";
					echo "</td></tr><br />";
					echo"</table>";
					echo "</body</html>";
				}
				mysql_close($con);
		?>
	</body>
</html>