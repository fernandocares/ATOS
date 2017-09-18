<?php
session_start();

include_once("destroi_dados.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Área de Login Atos</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


    <div class="container">

      <form class="form-signin" method="POST" action="valida_login.php">
        <h2 class="form-signin-heading" align="center">Por favor faça login:</h2>

        <label for="inputUsuario" class="sr-only">Email address</label>
        <input type="text" name="usuario" class="form-control" placeholder="Nome de usuário" required autofocus><br />

        <label for="inputSenha" class="sr-only">Password</label>
        <input type="password" name="senha" class="form-control" placeholder="Senha" required>

        <button class="btn btn-lg btn-info btn-block" type="submit">Login</button>
      </form>
      <p class="text-center text-danger">
              <?php
                if(isset($_SESSION['loginErro'])){
                  echo $_SESSION['loginErro'];
                  unset($_SESSION['loginErro']);
                }

              ?>
      </p>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
