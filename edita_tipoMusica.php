<?php
session_start();

include_once("conexao.php");

$id_update =  $_POST['id'];
$descricao_update = $_POST['descricao'];

$sql_update = "UPDATE tipo SET tipo_descricao='$descricao_update' WHERE tipo_id ='$id_update';";


$execute = mysql_query($sql_update);

if (mysql_affected_rows() != 0 ){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_tipoMusica.php'>
				<script type=\"text/javascript\">
					alert(\"Tipo de Música atualizado com Sucesso.\");
				</script>
			";
		}
		 else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_tipoMusica.php'>
				<script type=\"text/javascript\">
					alert(\"Tipo de Música não foi atualizdo com Sucesso.\");
				</script>
			";
}

?>
