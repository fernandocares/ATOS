<?php
  session_start();
  include_once("seguranca.php");
  echo "Bem-Vindo usuário: ".$_SESSION['nome_usuario'];

 ?>
