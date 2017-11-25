<?php
session_start();

include_once("conexao.php");
include_once("seguranca.php");

$id = trim($_POST['edt_id']);
$nome = trim($_POST['edt_name']);
$email = trim($_POST['edt_email']);
$usuario = trim($_POST['edt_nickname']);
$senha  = trim($_POST['edt_senha']);
$nivel = trim($_POST['edt_nivel']);

$sql = "UPDATE usuarios SET nome='$nome', email='$email' , usuario='$usuario' , senha='$senha', nivel_acesso_id='$nivel' WHERE id='$id' ;";
$execute = mysql_query($sql);

if (mysql_affected_rows() != 0 ){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_usuarios.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário atualizado com Sucesso.\");
				</script>
			";
		}
		 else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_usuarios.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi atualizado com Sucesso.\");
				</script>
			";
}

?>
