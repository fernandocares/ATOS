<?php
session_start();

include_once("conexao.php");

$nome = $_POST['user_name'];
$email = $_POST['user_email'];
$usuario = $_POST['user_nickname'];
$senha  = $_POST['user_senha'];
$nivel = $_POST['user_nivel'];

$sql = "INSERT INTO usuarios (nome, email, usuario, senha, nivel_acesso_id) VALUES ( '$nome' , '$email' , '$usuario' , '$senha', '$nivel');";
$execute = mysql_query($sql);

if (mysql_affected_rows() != 0 ){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_usuarios.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário cadastrado com Sucesso.\");
				</script>
			";
		}
		 else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/atos/listar_usuarios.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi cadastrado com Sucesso.\");
				</script>
			";
}

?>
