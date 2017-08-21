<?php
session_start();
include_once("seguranca.php");
include_once("conexao.php");
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

<title>Admin ATOS</title>

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

<?php
  include_once("menu_admin.php");
  $resultado = mysql_query("SELECT * FROM usuarios ORDER BY 'id'");
  $linhas = mysql_num_rows($resultado);
  
?>

<div class="container theme-showcase" role="main">

<div class="page-header">
<h1>Lista de usuários</h1>
</div>
<div class="row">
<div class="col-md-12">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Nivel de Acesso</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
          while ($linhas = mysql_fetch_array($resultado) ) {
                echo "<tr>";
                  echo "<td>".$linhas['id'] ."</td>";
                  echo "<td>".$linhas['nome'] ."</td>";
                  echo "<td>".$linhas['email'] ."</td>";
                  echo "<td>".$linhas['nivel_acesso_id'] ."</td>";
                  echo "<td><button type='button' class='btn btn-default btn-lg'>
                         <span class='glyphicon glyphicon-wrench' aria-hidden='true'></span></button>

                         <button type='button' class='btn btn-default btn-lg'>
                         <span class='glyphicon glyphicon-floppy-remove' aria-hidden='true'></span></button>
                         </td>";
                echo "</tr>";
          }
      ?>

    </tbody>
  </table>
</div>
</div>
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
