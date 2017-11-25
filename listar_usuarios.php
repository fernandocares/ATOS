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
  $resultado = mysql_query("SELECT * FROM usuarios ORDER BY 'usuario_id'");
  $linhas = mysql_num_rows($resultado);

  $sql = mysql_query("SELECT * FROM nivel_acesso ORDER BY 'id'");
  $resultado_combo =  mysql_num_rows($sql);
?>

<div class="container theme-showcase" role="main">
<h1 align="center">Lista de Usuários</h1>

<div class="container">
  <table id="listagem" class="table table-striped table-bordered">
    <thead>
      <tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Nivel de Acesso</th>
          <th>Ações</th>
      </tr>
      </thead>
      <tfoot>
          <tr>
            <<th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Nivel de Acesso</th>
            <th>Ações</th>
          </tr>
      </tfoot>
      <tbody>
      <?php
          while ($linhas = mysql_fetch_array($resultado) ) {
                echo "<tr>";
                  echo "<td>".$linhas['id'] ."</td>";
                  echo "<td>".$linhas['nome'] ."</td>";
                  echo "<td>".$linhas['email'] ."</td>";
                  echo "<td>".$linhas['nivel_acesso_id'] ."</td>";
                  ?>
                        <td>
                          <div align="center">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalNovo">Novo</button>
                                <button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='edita_usuarios_form.php?id='+ <?php echo $linhas['id'] ?> ">Editar</span></button>

                               <button type='button' class='btn btn-primary btn-sm' data-toggle="modal" data-target="#modalExcluir"
                               data-whateverexcluir=" <?php echo $linhas['id'];  ?>" >Excluir</button>
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
        <h3 class="modal-title" id="tituloModal">Novo Usuário</h3>
      </div>
      <div class="modal-body">
        <form  method="post" action="insere_usuarios.php">
                <div class="form-group">
                  <label for="lblNomeCompleto">Nome completo: </label>
                  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Ex: João Da Silva" required>
                </div>
                <div class="form-group">
                  <label for="lblEmail">Email: </label>
                  <input type="email" class="form-control" id="user_email" name="user_email">
                </div>

                <div class="form-group">
                  <label for="lblNomeUsuario">Nome de usuário: </label>
                  <input type="text" class="form-control" id="user_nickname" name="user_nickname" placeholder="Ex: nomedeusuario" required>
                </div>
                <div class="form-group">
                  <label for="lblSenha">Senha: </label>
                  <input type="password" class="form-control" id="user_senha" name="user_senha" required>
                </div>

                <div class="form-group">
                  <label for="lblNivelAcesso">Nível de Acesso: </label>
                  <!-- <input type="text" class="form-control" id="user_nivel"> -->
                  <select class="form-control" name="user_nivel" required>
                      <?php
                          while ($resultado_combo = mysql_fetch_array($sql) ) {
                                echo "<option value='".$resultado_combo ['id']."'>".$resultado_combo ['nome_nivel']."</option>";
                          }
                      ?>
                  </select>
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

<!-- modal  EXCLUIR -->
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title" id="tituloModal">Deletar</h3>
    </div>
    <div class="modal-body">
      <form id="frmExcluirTipoMusica" name="frmExcluirTipoMusica" method="post" action="exclui_usuarios.php">
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

<!-- SCRIPT DA MODAL NOVO -->
<script type="text/javascript">
  $('#modalNovo').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var modal = $(this)
})
</script>
<!-- SCRIPT DA MODAL NOVO -->

<!-- SCRIPT DA MODAL EXCLUIR -->
<script type="text/javascript">
  $('#modalExcluir').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipient = button.data('whateverexcluir')
  var modal = $(this)
  modal.find('#id-tipo').val(recipient)
})
</script>
<!-- SCRIPT DA MODAL EXCLUIR -->

</body>
</html>
