<?php
   session_start();
   require_once 'conexao.php';
   include_once("seguranca.php");
   include_once("conexao.php");
   include_once("menu_admin.php");

   $id = trim($_REQUEST['id']);
   $rs = mysql_query("SELECT * FROM musica WHERE musica_id=".$id);

   $row = mysql_fetch_array($rs);

   $titulo = $row['musica_titulo'];
   $autor = $row['musica_autor'];
   $tipo = $row['musica_tipo'];
   $sentimento=  $row['musica_sentimento'];
   $tom = $row['musica_tom'];
   $letra  = $row['musica_letra'];
   $cifra = $row['musica_cifra'];

   require_once 'conexao.php';

   $sql_tipo = mysql_query("SELECT * FROM tipo ORDER BY 'tipo_id'");
   $rs_tipo = mysql_num_rows($sql_tipo);

   $sql_autor =  mysql_query("SELECT * FROM autor ORDER BY 'autor_id'");


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

        <h1>Editar Músicas</h1>
    <form id="frmNovaMusica" class="form-horizontal" name="frmNovaMusica" method="post" action="edita_musica.php">

            <div class="form-group">
              <label class="col-sm-2 control-label" for="lblId">Id: </label>

              <div class="col-sm-1">
                <input type="text"  readonly class="form-control" name="edt_musica_id" value="<?php echo $id?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="lblTitulo">Título: </label>

              <div class="col-sm-4">
                <input type="text" class="form-control" name="edt_titulo" value="<?php echo $titulo?>" required>
              </div>
            </div>

            <div class="form-group">

              <label class="col-sm-2 control-label" for="lblAutor">Autor: </label>

              <div class="col-sm-4">
                <select class="form-control" name="edt_autor" required>
                    <?php
                        while ($row_autor = mysql_fetch_array($sql_autor) ) {
                              echo "<option value='".$row_autor['autor_id']."'>".$row_autor['autor_nome']."</option>";
                        }
                    ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="lblTipo">Tipo: </label>
              <div class="col-sm-3">
              <select class="form-control" name="edt_tipo" required>
                  <?php
                      while ($resultado2 = mysql_fetch_array($sql_tipo) ) {
                            echo "<option value='".$resultado2['tipo_id']."'>".$resultado2['tipo_descricao']."</option>";
                      }
                  ?>
              </select>
            </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="lblIntencao">Sentimento: </label>

              <div class="col-sm-6">
                <input type="text" class="form-control" name="edt_sentimento" value="<?php echo $sentimento?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="lblTom">Tom: </label>

              <div class="col-sm-3">
                <select class="form-control" name="edt_tom" >
                      <option value="C">C</option>
                      <option value="Cm">Cm</option>
                      <option value="C#">C#</option>
                      <option value="C#m">C#m</option>
                      <option value="D">D</option>
                      <option value="Dm">Dm</option>
                      <option value="D#">D#</option>
                      <option value="D#m">D#m</option>
                      <option value="E">E</option>
                      <option value="Em">Em</option>
                      <option value="F">F</option>
                      <option value="Fm">Fm</option>
                      <option value="F#">F#</option>
                      <option value="F#m">F#m</option>
                      <option value="G">G</option>
                      <option value="Gm">Gm</option>
                      <option value="G#">G#</option>
                      <option value="G#m">G#m</option>
                      <option value="A">A</option>
                      <option value="Am">Am</option>
                      <option value="A#">A#</option>
                      <option value="A#m">A#m</option>
                      <option value="B">B</option>
                      <option value="Bm">Bm</option>

                </select>
              </div>
            </div>

             <div class="form-group">
               <label class="col-sm-2 control-label" for="lblLetra">Letra: </label>

                <div class="col-sm-5">
                  <textarea class="form-control" name="edt_letra" rows="5" required ><?php echo $letra?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="lblCifra">Cifra: </label>

                <div class="col-sm-5">
                  <textarea class="form-control" name="edt_cifra" rows="5" required ><?php echo $cifra?></textarea>
                </div>
              </div>

              <div class="container col-sm-7" align="center">
                <input name="bt_cad" id="bt_cad" type="submit" value="Atualizar" class="btn btn-success"/>
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
