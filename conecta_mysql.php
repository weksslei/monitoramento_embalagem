<?php
// essa variavel vai decidir qual tipo de comando SQL usar. 
// i-> mysqli_ 
// diferente de i -> mysql_
$versaophpaux ="i";


$servidor = "localhost";
$usuario_conexao  = "root";
$senha_conexao = "";
$banco = "embalagem";
$con = mysqli_connect($servidor, $usuario_conexao, $senha_conexao, $banco);
//mysqli_select_db($banco);
?>