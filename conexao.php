<?php
  $conectar = @mysql_connect("mysql796.umbler.com:41890", "fernandomaster", "devianart123") or die ("Erro na conexão com servidor!");
  mysql_select_db("atosdb");
  mysql_set_charset('utf8');
?>
