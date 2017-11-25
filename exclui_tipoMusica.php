<?php
session_start();

include_once("conexao.php");

$id = $_POST['exclui_id'];

$sql = "DELETE FROM tipo WHERE tipo_id='$id';";


$execute = mysql_query($sql);

if (mysql_affected_rows() != 0 ){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_tipoMusica.php'>
				<script type=\"text/javascript\">
					alert(\"Tipo de Música deletada com Sucesso.\");
				</script>
			";
		}
		 else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_tipoMusica.php'>
				<script type=\"text/javascript\">
					alert(\"Tipo de Música não foi deletada com Sucesso.\");
				</script>
			";
}

?>
