<?php
session_start();

include_once("conexao.php");

$desc = $_POST['culto_desc'];
$data = $_POST['culto_data'];
$musica1 = $_POST['culto_musica1'];
$musica2 = $_POST['culto_musica2'];
$musica3 = $_POST['culto_musica3'];
$musica4 = $_POST['culto_musica4'];

$sql = "INSERT INTO culto ( data , descricao, musica1, musica2, musica3, musica4) VALUES ('$data' , '$desc', '$musica1', '$musica2' , '$musica3' , '$musica4' );";


$execute = mysql_query($sql);

if (mysql_affected_rows() != 0 ){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/admin.php'>
				<script type=\"text/javascript\">
					alert(\"Culto cadastrado com Sucesso.\");
				</script>
			";
		}
		 else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/admin.php'>
				<script type=\"text/javascript\">
					alert(\"Culto não foi cadastrado com Sucesso.\");
				</script>
			";
}

?>
