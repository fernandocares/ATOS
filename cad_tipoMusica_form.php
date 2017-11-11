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

  <body>
        <div class="container theme-showcase" role="main">
        <h1 align="center">Cadastro de Tipos de Música</h1>
        <form id="frmCadTipoMusica" class="form-horizontal" name="frmCadTipoMusica" method="post" action="cad_tipoMusica.php">
            <div class="form-group">
              <label for="lblNomeCompleto">Descricão: </label>
              <input type="text" class="form-control" name="tpm_descricao" placeholder="Ex: Lenta/Rápida/Emotiva" required>
            </div>
            <input name="bt_cad" id="bt_cad" type="submit" value="Cadastrar" class="btn btn-success"/>
            <input name="bt_limpar" id="bt_limpar" type="reset" value="Limpar" class="btn btn-danger"/>
        </form>
  </div>


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
