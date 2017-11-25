<?php
session_start();

include_once("conexao.php");

$id = $_POST['exclui_id'];

$sql = "DELETE FROM usuarios WHERE id= '$id';";


$execute = mysql_query($sql);

if (mysql_affected_rows() != 0 ){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_usuarios.php'>
				<script type=\"text/javascript\">
					alert(\"Usuario deletado com Sucesso.\");
				</script>
			";
		}
		 else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_usuarios.php'>
				<script type=\"text/javascript\">
					alert(\"Usuario deletado com Sucesso.\");
				</script>
			";
}

?>
