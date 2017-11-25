<?php
session_start();

include_once("conexao.php");

$descricao = $_POST['tpm_descricao'];

$sql = "INSERT INTO tipo (tipo_descricao) VALUES ('$descricao');";


$execute = mysql_query($sql);

if (mysql_affected_rows() != 0 ){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_tipoMusica.php'>
				<script type=\"text/javascript\">
					alert(\"Tipo de Música cadastrado com Sucesso.\");
				</script>
			";
		}
		 else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_tipoMusica.php'>
				<script type=\"text/javascript\">
					alert(\"Tipo de Música não foi cadastrado com Sucesso.\");
				</script>
			";
}

?>
