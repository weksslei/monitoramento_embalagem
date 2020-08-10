<!DOCTYPE HTML>
<html>
<div style = "background-color:SlateBlue;color:white;padding:20px;">
    <h1 align= center>Sistema de monitoramento da linha de embalagem</h1>
	<p align="left" font=14 style= "color:red" > Sankyu </p>
<hr />
</div>
	<body>
		<form  action="pesquisapormaq.php" method="POST">
			<p> Informe a Maquina : <input type='text' name="maquina" pattern=['0-9']+ maxlength="1" size="1">
			<input type='submit' value='  OK  '></p>
		</form>
<?php
ini_set("display_errors", "0");
include "conecta_mysql.php";
		$maquina = $_POST["maquina"];

		$sql =" SELECT `pro_cbd`, `pro_numero_produto`, `pro_berco`, `pro_data`, `pro_maq_cbd` FROM `mem_producao`
		WHERE pro_maq_cbd = '".$maquina."'";
			$rs=mysqli_query($con, $sql);
					while($linha = mysqli_fetch_array($rs))//Loop  de visualização dos produtos 
				{
					echo "<html><body  >";
					echo "<table align=justify border=0:color=blask;>";
					echo "<tr><td>";
					echo "Numero do produto...:&ensp;&ensp;
					$linha[pro_numero_produto]";echo "&ensp;<td>";
					echo "Berço:&ensp;&ensp; $linha[pro_berco]&ensp;&ensp;<td>";
					echo "Maquina:  $linha[pro_maq_cbd]&ensp;";
					echo "<td> Data : ".date('d/m/y',strtotime($linha['pro_data']));
					echo "</td></tr><br />";
					echo"</table>";
					echo "</body></html>";
				}
				mysql_close($con);
?>		
		
			
	</body>			
</html>
