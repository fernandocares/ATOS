<?php
session_start();

include_once("conexao.php");

$nome = $_POST['user_name'];
$email = $_POST['user_email'];
$usuario = $_POST['user_nickname'];
$senha  = $_POST['user_senha'];
$nivel = $_POST['user_nivel'];

$sql = "UPDATE usuarios SET nome='$nome', email='$email' , usuario='$usuario' , senha='$senha', nivel_acesso_id='$nivel');";
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
