<?php
  include '../../core/login/LoginService.php';
  function getShipID(){
    return $_POST['shipcode'];
  }
  function getShipPass(){
    return $_POST['shippass'];
  }
  function check(){
    $login = new LoginService;
    $shipid = getShipID();
    $shippass = getShipPass();
    $result = array();
    $result = $login->checkLogin($shipid, $shippass);
    $json = json_encode($result);
    echo $json;
  }
  check();
?>