<?php
session_start();
include_once("seguranca.php");
include_once("conexao.php");
include_once("menu_admin.php");

$sql = mysql_query("SELECT * FROM nivel_acesso ORDER BY 'id'");
$resultado = mysql_num_rows($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="Admin ATOS">
<meta name="author" content="WeizenSolutions">
<link rel="icon" href="../../favicon.ico">

<title>Atos</title>

<!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap theme -->
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="bootstrap/css/theme.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="bootstrap/js/ie-emulation-modes-warning.js"></script>

</head>

    <body class="container">

        <h1>Cadastro de Músicas</h1>
        <form id="frmCadUser" name="frmCadUser" method="post" action="cad_usuarios.php">

          <div class="form-group">
            <label for="lblNomeCompleto">Nome completo: </label>
            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Ex: João Da Silva">
          </div>
          <div class="form-group">
            <label for="lblEmail">Email: </label>
            <input type="email" class="form-control" id="user_email" name="user_email">
          </div>

          <div class="form-group">
            <label for="lblNomeUsuario">Nome de usuário: </label>
            <input type="text" class="form-control" id="user_nickname" name="user_nickname" placeholder="Ex: nomedeusuario">
          </div>
          <div class="form-group">
            <label for="lblSenha">Senha: </label>
            <input type="password" class="form-control" id="user_senha" name="user_senha">
          </div>

          <div class="form-group">
            <label for="lblNivelAcesso">Nível de Acesso: </label>
            <!-- <input type="text" class="form-control" id="user_nivel"> -->
            <select class="form-control" name="user_nivel">
                <?php
                    while ($resultado = mysql_fetch_array($sql) ) {
                          echo "<option value='".$resultado['id']."'>".$resultado['nome_nivel']."</option>";
                    }
                ?>
            </select>
          </div>
          <input name="bt_cad" id="bt_cad" type="submit" value="Cadastrar" class="btn btn-success"/>
          <input name="bt_limpar" id="bt_limpar" type="reset" value="Limpar" class="btn btn-danger"/>
    </form>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="bootstrap/js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
