<?php
session_start();
include_once("seguranca.php");
include_once("conexao.php");
include_once("menu_admin.php");

$sql = mysql_query("SELECT * FROM musica ORDER BY 'musica_id'");
$resultado = mysql_num_rows($sql);

$sql2 = mysql_query("SELECT * FROM tipo ORDER BY 'tipo_id'");
$resultado2 = mysql_num_rows($sql2);

$sql_autor = mysql_query("SELECT * FROM autor ORDER BY 'autor_id'");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="bootstrap/js/angular.min.js"></script>

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

      <h1 align="center">Músicas</h1>
<div class="container" align="center">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#listagem" aria-controls="listagem" role="tab" data-toggle="tab">Listagem</a></li>
        <li role="presentation"><a href="#cadastro" aria-controls="cadastro" role="tab" data-toggle="tab">Novo</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="listagem">

              <br>
              <br>

              <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Tipo</th>
                        <th>Sentimento</th>
                        <th>Tom</th>
                        <th>Letra</th>
                        <th>Cifra</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Tipo</th>
                        <th>Sentimento</th>
                        <th>Tom</th>
                        <th>Letra</th>
                        <th>Cifra</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                  <?php
                      while ($linhas = mysql_fetch_array($sql) ) {
                            echo "<tr>";
                              echo "<td>".$linhas['musica_id'] ."</td>";
                              echo "<td>".$linhas['musica_titulo'] ."</td>";
                              echo "<td>".$linhas['musica_autor'] ."</td>";
                              echo "<td>".$linhas['musica_tipo'] ."</td>";
                              echo "<td>".$linhas['musica_sentimento'] ."</td>";
                              echo "<td>".$linhas['musica_tom'] ."</td>";
                              echo "<td>".$linhas['musica_letra'] ."</td>";
                              echo "<td>".$linhas['musica_cifra'] ."</td>";

                              ?>
                                    <td>
                                      <div align="center">
                                           <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='edita_musicas_form.php?id='+ <?php echo $linhas['musica_id'] ?> ">Editar</button>
                                           <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='exclui_musica.php?id='+<?php echo $linhas['musica_id'] ?>">Excluir</span> </button>
                                      </div>
                                     </td>

                            <?php
                            echo "</tr>";
                      }
                  ?>

                </tbody>
            </table>
          </div><!-- fecha listagem -->

        <div role="tabpanel" class="tab-pane" id="cadastro">
             <br>

              <form id="frmNovaMusica" class="form-horizontal" name="frmNovaMusica" method="post" action="insere_musica.php">

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="lblTitulo">Título: </label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="musica_titulo" placeholder="Ex: Debaixo dos meus pés" required>
                  </div>
                </div>

                <div class="form-group">

                  <label class="col-sm-2 control-label" for="lblAutor">Autor: </label>

                  <div class="col-sm-4">
                    <select class="form-control" name="musica_autor" required>
                        <?php
                            while ($row_autor = mysql_fetch_array($sql_autor) ) {
                                  echo "<option value='".$row_autor['autor_id']."'>".$row_autor['autor_nome']."</option>";
                            }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="lblTipo" required>Tipo: </label>
                  <!-- <input type="text" class="form-control" id="user_nivel"> -->
                  <div class="col-sm-3">
                  <select class="form-control" name="musica_tipo" required>
                      <?php
                          while ($resultado2 = mysql_fetch_array($sql2) ) {
                                echo "<option value='".$resultado2['tipo_id']."'>".$resultado2['tipo_descricao']."</option>";
                          }
                      ?>
                  </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="lblIntencao">Sentimento: </label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="musica_sentimento" placeholder="Ex: Adoração">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="lblTom" required>Tom: </label>

                  <div class="col-sm-3">
                    <select class="form-control" name="musica_tom">
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
                      <textarea class="form-control" name="musica_letra" rows="5" id="letraId" required></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="lblCifra">Cifra: </label>

                    <div class="col-sm-5">
                      <textarea class="form-control" name="musica_cifra" rows="5" id="cifraId" required></textarea>
                    </div>
                  </div>


                                  <div class="container col-sm-7" align="center">
                                      <button id="bt_gravar" type="submit" class="btn btn-success" >Gravar</button>
                                      <input name="bt_limpar" id="bt_limpar" type="reset" value="Limpar" class="btn btn-danger"/>
                                  </div>
                </form>
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
