<?php
session_start();
include_once("conexao.php");

$id = trim($_POST['exclui_id']);

$sql = "DELETE FROM musica WHERE musica_id= '$id';";


$execute = mysql_query($sql);

if (mysql_affected_rows() != 0 ){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/cad_musicas_form.php'>
				<script type=\"text/javascript\">
					alert(\"Música deletada com Sucesso.\");
				</script>
			";
		}
		 else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/cad_musicas_form.php'>
				<script type=\"text/javascript\">
					alert(\"Música não foi deletada com sucesso.\");
				</script>
			";
}

?>
