<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $data = "dvtb";
  mysql_connect($host, $user, $pass) or die("Can't connect Database!");
  mysql_select_db($data) or die("Not found Database <b>$data</b>!");
?>