<?php
  $conectar = @mysql_connect("localhost", "root", "") or die ("Erro na conexão com servidor!");
  mysql_select_db("atosdb");
  mysql_set_charset('utf8');
?>
