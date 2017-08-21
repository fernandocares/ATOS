<?php
ob_start();

if( ($_SESSION['id_usuario']=="") || ($_SESSION['nome_usuario']=="") ||
    ($_SESSION['nivel_usuario']=="") || ($_SESSION['email_usuario']=="") ||
    ($_SESSION['senha_usuario']=="") ) {

                $_SESSION['loginErro'] = "Você não está logado, por favor faça login!";

                //redirecona o usuário para a tela de loginErro
                header("Location: login.php");
    }

?>
