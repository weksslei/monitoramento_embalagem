<!DOCTYPE HTML>
<html>
<div style = "background-color:SlateBlue;color:white;padding:20px;">
    <h1 align= center>Sistema de monitoramento da linha de embalagem</h1>
	<p align="left" font=14 style= "color:red" > Sankyu </p>
<hr />
</div>
</head>
	
		<form action="pesquisa_por_data.php" method="POST">
			<br/ ><br />
				 <table align=center >
					 <tr>
						<td>
					Data inicial &ensp;<input type="datetime-local" name="dataini" value="<?php echo date('c', $timestamp); ?>"/>
					Data Final &ensp; <input type="datetime-local" name="datafim" value="<?php echo date('c', $timestamp); ?>"> 
					&ensp;
						<input type="submit" value="Entrar" name="entrar" >
						</td>
					</tr> 
						</table>
						
		</form>
<body>
<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
ini_set("display_errors", "0");
include "conecta_mysql.php";
		$dataini = $_POST["dataini"];
		$datafim = $_POST["datafim"]; 
				$sql ="SELECT pro_numero_produto, pro_berco,pro_maq_cbd ,pro_data FROM mem_producao WHERE pro_data 
				BETWEEN '".$dataini."' AND '".$datafim."'";
			$rs=mysqli_query($con, $sql);
					
					
					while($linha = mysqli_fetch_array($rs))//Loop  de visualização dos produtos 
				{
					echo '
						<table align=center >
							<td>Numero do produto:&ensp;&ensp;
							'.$linha["pro_numero_produto"]. '&ensp;<td>
							Berço:&ensp;&ensp; '.$linha["pro_berco"].'&ensp;&ensp;<td>
							Maquina:  '.$linha["pro_maq_cbd"].'&ensp;
							<td> Data : &ensp;'. date('d/m/y',strtotime($linha['pro_data'])).'
							</td>
							<br />
						</table>
					';
					
				}
				mysql_close($con);
?>
	</body>
</html>