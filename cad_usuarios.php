<?php
session_start();

include_once("conexao.php");

$nome = $_POST['user_name'];
$email = $_POST['user_email'];
$usuario = $_POST['user_nickname'];
$senha  = $_POST['user_senha'];
$nivel = $_POST['user_nivel'];


$sql = "INSERT INTO usuarios (nome , email, usuario, senha, nivel_acesso_id) VALUES ( '$nome' , '$email' , '$usuario' , '$senha', '$nivel');";
$execute = mysql_query($sql);

if($execute == false){
    $_SESSION['insertReport'] = "Erro ao cadastrar, tente novamente!";
    header("Location: cad_usuarios_form.php");
}else{
    $_SESSION['insertReport'] = "Cadastro feito com sucesso!";
    header("Location: listar_usuarios.php");
}

?>
