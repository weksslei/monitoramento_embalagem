<DOCTYPE HTML>
<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
include "conecta_mysql.php";// conecta ao banco
include "agiliza.php";// arquivo com funcoes diversas

$nome = $_POST["nome"];
$data = $_POST["data"];
$chapa = $_POST["chapa"];
$turno = $_POST["turno"];
$qntembalada = $_POST["qntembalada"];
$observacoes = $_POST["observacoes"];


if(empty($nome))
{
	echo '<script type="text/javascript"> alert("Favor entrar com um nome para registrar o relatório! ");
			window.location="relatorio_form.php";
			</script>';

}
elseif(empty($chapa))
{
		echo '<script type="text/javascript"> alert("Favor entrar com uma chapa para registrar o relatório! ");
			window.location="relatorio_form.php";
			</script>';
}
elseif(empty($data))
{
		echo '<script type="text/javascript"> alert("Favor entrar com um data de ínicio registrar o relatório! ");
			window.location="relatorio_form.php";
			</script>';
}
elseif(empty($turno) || $turno == "Selecione")
{
			echo '<script type="text/javascript"> alert("Favor selecionar um turno para registrar o relatório! ");
			window.location="relatorio_form.php";
			</script>';
}

elseif(empty($qntembalada))
{
	$qntembalada = 0;
	$sql = "INSERT INTO mem_relatorio(rel_nome,rel_chapa, rel_turno, rel_data, rel_total_embalado, rel_obersvacao) VALUES ('".$nome."','".$chapa."', '".$turno."', '".$data."', '".$qntembalada."' , '".$observacoes."') ";
			$linha = mysqli_query($con, $sql) OR DIE ("<br /><br />Nao conectou".$sql);
}
elseif(empty($observacoes))
{
	$observacoes = "Não houveram relatos neste turno.";
			$sql = "INSERT INTO mem_relatorio(rel_nome,rel_chapa, rel_turno, rel_data, rel_total_embalado, rel_obersvacao) VALUES ('".$nome."','".$chapa."', '".$turno."', '".$data."', '".$qntembalada."' , '".$observacoes."') ";
			$linha = mysqli_query($con, $sql) OR DIE ("<br /><br />Nao conectou".$sql);
}
else
{
	$sql = "INSERT INTO mem_relatorio(rel_nome,rel_chapa, rel_turno, rel_data, rel_total_embalado, rel_obersvacao) VALUES ('".$nome."','".$chapa."', '".$turno."',  '".$data."', '".$qntembalada."' , '".$observacoes."') ";
	$linha = mysqli_query($con, $sql) OR DIE ("<br /><br />Nao conectou".$sql);
	echo '<script type="text/javascript"> alert("Relatório salvo com sucesso! ");
			window.location="relatorio_form.php";
			</script>';

}
	
?>