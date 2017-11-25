<?php
session_start();

include_once("conexao.php");

$titulo = $_POST['musica_titulo'];
$autor = $_POST['musica_autor'];
$tipo = $_POST['musica_tipo'];
$sentimento  = $_POST['musica_sentimento'];
$tom = $_POST['musica_tom'];
$letra = $_POST['musica_letra'];
$cifra = $_POST['musica_cifra'];

$sql = "INSERT INTO musica (musica_cifra, musica_letra, musica_sentimento, musica_titulo, musica_tom, musica_autor, musica_tipo ) VALUES ( '$cifra' , '$letra' , '$sentimento' , '$titulo', '$tom' , '$autor','$tipo');";
$execute = mysql_query($sql);

if (mysql_affected_rows() != 0 ){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/cad_musicas_form.php'>
				<script type=\"text/javascript\">
					alert(\"Música cadastrada com Sucesso.\");
				</script>
			";
		}
		 else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/cad_musicas_form.php'>
				<script type=\"text/javascript\">
					alert(\"Música não foi cadastrada com Sucesso.\");
				</script>
			";
}

?>
