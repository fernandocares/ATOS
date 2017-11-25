<!-- Inicio do menu -->
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="admin.php">ATOS</a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
      <li><a href="sair.php">Sair</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Usuários <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="listar_usuarios.php">Listar e Cadastrar</a></li>
      <!--<li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li class="dropdown-header">Nav header</li>
          <li><a href="#">Separated link</a></li>
          <li><a href="#">One more separated link</a></li>
      -->
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Músicas <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="cad_musicas_form.php">Listar e Cadastrar</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="listar_tipoMusica.php">Tipos de Música</a></li>
        </ul>
      </li>

    </ul>
  </div><!--/.nav-collapse -->
</div>
</nav>
  <!-- Fim do menu fixo -->
