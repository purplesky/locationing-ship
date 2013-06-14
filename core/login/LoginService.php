<?php
  include '../../core/include/connect.php';
  include '../../core/include/ServiceAll.php';
  /**
   * Login Service Class
   * return ship id if logged
   */
class LoginService extends ServiceAll {
  /**
   * @param $shipid
   */
  private function checkShipID($shipid){
    $shipid = stripslashes($shipid);
    $shipid = mysql_real_escape_string($shipid);
    $sql = "SELECT `MATAU` FROM `dvtb_quanly` WHERE `MATAU`='$shipid'";
    $result = mysql_query($sql);
    $ROW = mysql_num_rows($result);
    $DATA = mysql_fetch_array($result);
    if($ROW===1){
      return $DATA['MATAU'];
    }else {
      return 'ERROR-CODE';
    }
  }
  /**
   * @param $shipid
   * @param $pass
   */
  public function checkPass($shipid,$pass){
    $pass = stripslashes($pass);
    $pass = mysql_real_escape_string($pass);
    $sql = "SELECT `MATAU` FROM `dvtb_quanly` WHERE `MATAU`='$shipid' AND `MATKHAU`='$pass'";
    $result = mysql_query($sql);
    $ROW = mysql_num_rows($result);
    $DATA = mysql_fetch_array($result);
    if($ROW===1){
      return $DATA['MATAU'];
    }else {
      return 'ERROR-PASS';
    }
  }
  /**
   * @param $shipid
   * @param $pass
   */
  public function checkLogin($shipid, $pass){
    session_start();
    $id = $this->checkShipID($shipid);
    $reid = $this->checkPass($shipid, $pass);
    if($id === $reid){
      $_SESSION['LOGIN_CODE'] = $reid;
      $result = array('status' => 'SUCCESS',
                    'code'  => $reid,
                    'file'   => 'page/locationing-ship');
      return $result;
    }else{
      $result = array('status' => 'FAILED');
      return $result;
    }
  }
}
?>