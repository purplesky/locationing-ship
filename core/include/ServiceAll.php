<?php
include 'connect.php';
class ServiceAll {
  private $str = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
  public function encript($data){
    $privatedata = '';
    $data = str_replace('.', '', $data);
    $arr = str_split($data);
    for ($i=0; $i < count($arr); $i++) {
      $key = $str[rand(0, (count($str) - 1))];
      $privatedata .= $arr[$i].$key;
    }
    return $privatedata;
  }
  public function decript($data){
    
  }
  public function lockSession($shipcode){
    $shipcode = stripslashes($shipcode);
    $shipcode = mysql_real_escape_string($shipcode);
    $session_sql = mysql_query("SELECT `MATAU` FROM `dvtb_quanly` WHERE `MATAU`='$shipcode'");
    $row = mysql_fetch_array($session_sql);
    return $row['MATAU'];
  }
}

?>