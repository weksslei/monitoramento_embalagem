<?php
include "conecta_mysql.php";// conecta ao banco

session_start();
$sql = 'UPDATE mem_usuarios SET usu_logado  = "sim", usu_log_ini = NOW() WHERE
 usu_cbd = '.$_SESSION["cod_usuario"] ;
$linhas=mysqli_query($con, $sql)or die ("Erro ao atualizar o estatus <br />".$sql);
				if($linhas) {
			echo  '<script type="text/javascript"> alert("Sucesso ! ");
						window.location="paginainicial.php";
					</script>';
					} else {
			echo "Erro ao atualizar : " . mysqli_error($con);
					}
				
				
$sql_maq = "UPDATE mem_maquinas SET maq_monitor = 'ocupado',maq_em_uso = 'n' WHERE maq_saida = 'livre' AND   maq_nome = '".$_SESSION["maq"]."'";
$li=mysqli_query($con, $sql_maq)or die ("Erro ao atualizar o estatus da maquina <br />".$sql);



mysqli_close($con);

?>