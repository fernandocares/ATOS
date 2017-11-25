<?php
session_start();
include_once("seguranca.php");
include_once("conexao.php");
include_once("menu_admin.php");

$sql = mysql_query("SELECT * FROM musica ORDER BY 'musica_id'");
$resultado = mysql_num_rows($sql);

$sql2 = mysql_query("SELECT * FROM musica ORDER BY 'musica_id'");
$resultado = mysql_num_rows($sql);

$sql3 = mysql_query("SELECT * FROM musica ORDER BY 'musica_id'");
$resultado = mysql_num_rows($sql);

$sql4 = mysql_query("SELECT * FROM musica ORDER BY 'musica_id'");
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
        <h1 align="center">Cadastro Novo Culto</h1>
        <form id="frmCadTipoMusica" class="form-horizontal" name="frmCadTipoMusica" method="post" action="insere_culto.php">
          <br>
          <br>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="lblTitulo">Data: </label>

            <div class="col-sm-4">
              <input type="date" class="form-control" name="culto_data" placeholder="Ex: Debaixo dos meus pés" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="lblTitulo">Descrição: </label>

            <div class="col-sm-4">
              <input type="text" class="form-control" name="culto_desc" placeholder="Culto de Celebração" required>
            </div>
          </div>

          <div class="form-group">

            <label class="col-sm-2 control-label" for="lblAutor">Musica 1: </label>

            <div class="col-sm-4">
              <select class="form-control" name="culto_musica1" required>
                  <?php
                      while ($row = mysql_fetch_array($sql) ) {
                            echo "<option value='".$row['musica_id']."'>".$row['musica_titulo']."</option>";
                      }
                  ?>
              </select>
            </div>
          </div>

          <div class="form-group">

            <label class="col-sm-2 control-label" for="lblAutor">Musica 2: </label>

            <div class="col-sm-4">
              <select class="form-control" name="culto_musica2" required>
                  <?php
                      while ($row2 = mysql_fetch_array($sql2) ) {
                            echo "<option value='".$row2['musica_id']."'>".$row2['musica_titulo']."</option>";
                      }
                  ?>
              </select>
            </div>
          </div>

          <div class="form-group">

            <label class="col-sm-2 control-label" for="lblAutor">Musica 3: </label>

            <div class="col-sm-4">
              <select class="form-control" name="culto_musica3" required>
                  <?php
                      while ($row3 = mysql_fetch_array($sql3) ) {
                            echo "<option value='".$row3['musica_id']."'>".$row3['musica_titulo']."</option>";
                      }
                  ?>
              </select>
            </div>
          </div>

          <div class="form-group">

            <label class="col-sm-2 control-label" for="lblAutor">Musica 4: </label>

            <div class="col-sm-4">
              <select class="form-control" name="culto_musica4" required>
                  <?php
                      while ($row4 = mysql_fetch_array($sql4) ) {
                            echo "<option value='".$row4['musica_id']."'>".$row4['musica_titulo']."</option>";
                      }
                  ?>
              </select>
            </div>
          </div>

          <div class="container col-sm-7" align="center">
              <button id="bt_gravar" type="submit" class="btn btn-success" >Gravar</button>
              <input name="bt_limpar" id="bt_limpar" type="reset" value="Limpar" class="btn btn-danger"/>
          </div>

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
