<?php
  include '../core/include/connect.php';
  include '../core/include/ServiceAll.php';
  session_start();
  $shipcode = $_SESSION['LOGIN_CODE'];
  $service = new ServiceAll;
  $login_session = $service->lockSession($shipcode);
  if (!isset($login_session)) {
    header("location: login.php");
  }
?>