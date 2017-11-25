<?php
session_start();

include_once("conexao.php");
include_once("seguranca.php");

$id = trim($_POST['edt_musica_id']);
$titulo = $_POST['edt_titulo'];
$autor = $_POST['edt_autor'];
$tipo = $_POST['edt_tipo'];
$sentimento  = $_POST['edt_sentimento'];
$tom = $_POST['edt_tom'];
$letra = $_POST['edt_letra'];
$cifra = $_POST['edt_cifra'];

$sql = "UPDATE musica SET  musica_cifra='$cifra' , musica_letra='$letra' , musica_sentimento='$sentimento', musica_titulo='$titulo' , musica_tom='$tom' , musica_autor='$autor' , musica_tipo='$tipo' WHERE musica_id='$id' ;";
$execute = mysql_query($sql);

if (mysql_affected_rows() != 0 ){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/cad_musicas_form.php'>
				<script type=\"text/javascript\">
					alert(\"Música atualizada com Sucesso.\");
				</script>
			";
		}
		 else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/cad_musicas_form.php'>
				<script type=\"text/javascript\">
					alert(\"Música não foi atualizada com Sucesso.\");
				</script>
			";
}

?>
