<?php
  session_start();
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  include_once("conexao.php");

  $query = mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario' AND senha= '$senha' LIMIT 1");
  $resultado = mysql_fetch_assoc($query);
  //echo "Bem-Vindo ".$resultado['nome'];

  if(empty($resultado)){
       //Mensagem de login inválido
       $_SESSION['loginErro'] = "Usuário ou senha inválidos! Tente novamente.";
       //$_GLOBALS['loginErro']= "Usuário ou senha inválidos";

       header("Location: login.php");
  }else{
    //defineis os valores atribuidos na sessao do usuario;
    $_SESSION['nome_usuario'] =   $resultado['nome'];
    $_SESSION['id_usuario'] =   $resultado['id'];
    $_SESSION['nivel_usuario'] =   $resultado['nivel_acesso_id'];
    $_SESSION['email_usuario'] =   $resultado['email'];
    $_SESSION['senha_usuario'] =   $resultado['senha'];

    switch ($_SESSION['nivel_usuario']) {
      case 1:
        header("Location: admin.php");
        break;
      case 2:
          header("Location: usuario.php");
          break;

      default:
        break;
    }

  }

?>
