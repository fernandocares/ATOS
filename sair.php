<?php

  session_start();
  session_destroy();

  //remove todos os dados das variáveis globais
  unset( $_SESSION['nome_usuario'],
         $_SESSION['id_usuario'],
         $_SESSION['nivel_usuario'],
         $_SESSION['email_usuario'],
         $_SESSION['senha_usuario'] ) ;

 header("Location: login.php");

?>
