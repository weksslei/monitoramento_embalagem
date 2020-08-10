<!DOCTYPE HTML>
<html>
    <head>
        <title>Seleção de maquina.</title>
    </head>

    <body bgcolor = orange>
	<h1 align=center> SELECIONE A MAQUINA DE EMBALAR :</h1>
	<hr />
 
	<body>
		<h2><form method="POST" action="seleciona_maquina_exec.php">
			<p align="center"> Defina em qual maquina iremos trabalhar hoje:
				<select size ="Maquina" name = "maquina">
				<option selected value="Selecione" align= "center">Selecione</option></p>

					<option value="1">1</option>

					<option value="2">2</option>
	
					<option value="3">3</option>

					<option value="4">4</option>

					<option value="5">5</option>

					<option value="8">8</option>
					

				</select>
		<input type="submit" value="OK!" size="10" name="entrar">


<?php

echo '<p><a href="entrar"("http://localhost/monitoramento_embalagem/seleciona_maquina_exec.php");"></a></p>';
?>
</form>
</h2>
</body>
</html>