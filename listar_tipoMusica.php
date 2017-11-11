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

<title>ATOS</title>

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

<script src="controller/tipoMusicaController.js"></script>

</head>

<body>

<?php
  include_once("menu_admin.php");
  $resultado = mysql_query("SELECT * FROM tipo ORDER BY 'tipo_id'");
  $linhas = mysql_num_rows($resultado);
?>

<div class="container theme-showcase" role="main">

  <h1 align="center">Lista de Tipos de Música</h1>


<div class="container">
  </br>
  </br>

  <table id="listagem" class="table table-striped table-bordered" >
    <thead>
      <tr>
          <th>Id</th>
          <th>Descrição</th>
          <th>Ações</th>
      </tr>
      </thead>
      <tfoot>
          <tr>
            <th>Id</th>
            <th>Descrição</th>
            <th>Ações</th>
          </tr>
      </tfoot>
      <tbody>
      <?php
          while ($linhas = mysql_fetch_array($resultado) ) {
                echo "<tr>";
                  echo "<td>".$linhas['tipo_id'] ."</td>";
                  echo "<td>".$linhas['tipo_descricao'] ."</td>";
                  ?>
                        <td>
                          <div align="center">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalNovo">Novo</button>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"
                                data-whatever=" <?php echo $linhas['tipo_id'];  ?>" data-whateverdescricao=" <?php echo $linhas['tipo_descricao'];  ?>" >Editar</button>
                               <button type='button' class='btn btn-primary btn-sm' data-toggle="modal" data-target="#modalExcluir"
                               data-whateverexcluir=" <?php echo $linhas['tipo_id'];  ?>" >Excluir</button>
                          </div>
                         </td>

                <?php
                echo "</tr>";
          }
      ?>

    </tbody>
  </table>

  <!-- modal  INSERIR -->
  <div class="modal fade" id="modalNovo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="tituloModal">Novo Tipo de Música</h3>
      </div>
      <div class="modal-body">
        <form id="frmCadTipoMusica" name="frmCadTipoMusica" method="post" action="cad_tipoMusica.php">
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Descrição:</label>
                <input type="text" class="form-control" name="tpm_descricao" placeholder="Ex: Lenta/Rápida/Emotiva" required>
              </div>
          <input name="bt_cad" id="bt_cad" type="submit" value="Cadastrar" class="btn btn-success"/>
          <input name="bt_limpar" id="bt_limpar" type="reset" value="Limpar" class="btn btn-danger"/>
        </form>
      </div>
      </div>
    </div>
  </div>
  </div>
<!-- modal  -->

<!-- modal  Editar -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 alig="center">Editar Tipo de Música</h3>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmEdtTipoMusica" name="frmEdtTipoMusica" method="post" action="edita_tipoMusica.php">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">ID:</label>
            <input type="text" class="form-control" name="id" id="recipient-name" readonly>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Descrição do Tipo:</label>
            <textarea class="form-control" name="descricao" id="descricao"></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal  -->

<!-- modal  EXCLUIR -->
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title" id="tituloModal">Deletar</h3>
    </div>
    <div class="modal-body">
      <form id="frmExcluirTipoMusica" name="frmExcluirTipoMusica" method="post" action="exclui_tipoMusica.php">
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">Deseja realmente excluir este registro?</label>
              <input type="hidden" class="form-control" id="id-tipo" name="exclui_id" value="">
            </div>
        <input name="bt_exclui" id="bt_exclui" type="submit" value="Excluir" class="btn btn-danger"/>
      </form>
    </div>
    </div>
  </div>
</div>
</div>
<!-- modal  -->


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

<!-- SCRIPT DA MODAL EDITAR -->
<script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var recipient = button.data('whatever')
      var recipientdescricao = button.data('whateverdescricao')

      var modal = $(this)
      //modal.find('#tituloModal').text('Editar Tipo de Música: ' + recipient)
      modal.find('#recipient-name').val(recipient)
      modal.find('#descricao').val(recipientdescricao)
  })
</script>
<!-- SCRIPT DA MODAL EDITAR -->

<!-- SCRIPT DA MODAL NOVO -->
<script type="text/javascript">
  $('#modalNovo').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  //var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  //modal.find('.modal-body input').val(recipient)
})
</script>
<!-- SCRIPT DA MODAL NOVO -->

<!-- SCRIPT DA MODAL EXCLUIR -->
<script type="text/javascript">
  $('#modalExcluir').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whateverexcluir') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#id-tipo').val(recipient)
})
</script>
<!-- SCRIPT DA MODAL EXCLUIR -->
</body>
</html>
