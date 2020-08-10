<?php
include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";// arquivo com funcoes diversas

$sql = "SELECT berco_ocupado,voltas FROM usuario WHERE '".$cod_maquina."'";
$linhas=nosso_mysql_query($con, $sql, $versaophpaux);


$sql = "SELECT berco_ocupado,voltas FROM embalagem":
$result = mysql_query($sql); // Executa a consulta

while($row = mysql_fetch_array($result)){
 $total = $row['voltas'] * $row['comissao']; // Pega os valores e multiplica
 echo $row['voltas'] . '----------------' . $row['comissao'] . '----------------' . $total; // Mostra os dados
 $total_final += $total; // Adiciona o total ao total_final
}

echo 'total final: ' . $total_final; // Mostra o total_final



?>