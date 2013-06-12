<?php
include 'connect.php';
class ServiceAll {
  private $str = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
  private $asciiArray = array(
    'a' => 97,  'b' => 98,  'c' => 99,  'd' => 100,  'e' => 101,  'f' => 102,  'g' => 103,  'h' => 104,  'i' => 105,  'j' => 106,  'k' => 107,
    'l' => 108,  'm' => 109,  'n' => 110,  'o' => 111,  'p' => 112,  'q' => 113,  'r' => 114,  's' => 115,  't' => 116,  'u' => 117,  'v' => 118,
    'w' => 119,  'x' => 120,  'y' => 121,  'z' => 122,
    'A' => 65,  'B' => 66,  'C' => 67,  'D' => 68,  'E' => 69,  'F' => 70,  'G' => 71,  'H' => 72,  'I' => 73,  'J' => 74,  'K' => 75,  'L' => 76,
    'M' => 77,  'N' => 78,  'O' => 79,  'P' => 80,  'Q' => 81,  'R' => 82,  'S' => 83,  'T' => 84,  'U' => 85,  'V' => 86,  'W' => 87,  'X' => 88,
    'Y' => 89,  'Z' => 90,
    1   => 49,  2   => 50,  3   => 51,  4 => 52,  5  => 53,  6 => 54,  7 => 55,  8 => 56,  9 => 57,  0 => 48
  );
  protected function encrypt($data){
    $privatedata = '';
    $data = str_replace('.', '', $data);
    $arr = str_split($data);
    for ($i=0; $i < count($arr); $i++) {
      $key = $arr[$i];
      $privatedata.=($asciiArray[$key]<100&&$asciiArray[$key]>=10)?$asciiArray[$key]*10:
                    ($asciiArray[$key]<10?$asciiArray[$key]*100:
                    ($asciiArray[$key]>=100?$asciiArray[$key]:'000'));
    }
    return $privatedata;
  }
  protected function decrypt($data){
    
  }
  public function lockSession($shipcode){
    $shipcode = stripslashes($shipcode);
    $shipcode = mysql_real_escape_string($shipcode);
    $session_sql = mysql_query("SELECT `MATAU` FROM `dvtb_quanly` WHERE `MATAU`='$shipcode'");
    $row = mysql_fetch_array($session_sql);
    return $row['MATAU'];
  }
  
  protected function breakSqlInjection($poster) {
    $poster = trim($poster);
    $poster = mysql_real_escape_string($poster);
    if(get_magic_quotes_gpc()){
      $poster = stripslashes($poster);
    }
    $poster = strip_tags($poster);
    $poster = str_replace(array("\n", "'", "‘", "’", "'", "“", "”", "„", "?", '"'), array("", "\’", "\’", "\’", "\’", "\"", "\"", "\"", "\"", "\""), $poster);
    return $poster;
  }
}
?>