<?php
  include '../../core/include/connect.php';
  include '../../core/include/ServiceAll.php';
/**
 * Registration Service Class
 */
class RegistrationService extends ServiceAll {
  
  public function categoryShip(){
    $sql = "SELECT * FROM dvtb_loaitau";
    mysql_query("SET NAMES utf8");
    $sqlResult = mysql_query($sql);
    $listCate = array();
    while ($result = mysql_fetch_array($sqlResult)) {
      $cate = array('result' => array(
                     'id'    => $result['ID'],
                     'name'  => $result['LOAITAU']));
      array_push($listCate, $cate);
    }
    return $listCate;
  }
  
  public function getListShipRegistered($start, $limit){
    $sql = "SELECT dvtb_chung.*, dvtb_quanlytv.*, dvtb_quanly.*, dvtb_tauonline.* FROM dvtb_chung 
            INNER JOIN dvtb_quanlytv ON dvtb_chung.MATAU = dvtb_quanlytv.MATAU 
            INNER JOIN dvtb_quanly ON dvtb_chung.MATAU = dvtb_quanly.MATAU where dvtb_tauonline.TRANGTHAI='Yes'LIMIT $start, $limit";
    mysql_query("SET NAMES utf8");
    $sqlResult = mysql_query($sql);
    $listData  = array();
    while ($result = mysql_fetch_array($sqlResult)) {
      $data = array($result['MATAU'], 'show',
                    $result['TENTAU'], 'show',
                    $result['LOAITAU'], 'hide',
                    $result['TAITRONG'], 'show',
                    $result['CONGSUAT'], 'show',
                    $result['NAMDONGTAU'], 'show',
                    $result['DONVIQUANLY'], 'show',
                    $result['HOTEN'], 'show',
                    $result['IMTAU'], 'hide',
                    $result['DAI'], 'hide',
                    $result['RONG'], 'hide',
                    $result['HINHANH'], 'hide',
                    $result['MATKHAU'], 'hide',
                    $result['QUEQUAN'], 'hide',
                    $result['DIENTHOAI'], 'hide',
                    $result['NAMSINH'], 'hide');
      array_push($listData, $data);
    }
    return $listData;
  }
  /**
   * 
   */
  public function getNumShipRegisterd(){
    $sql = "SELECT dvtb_chung . * , dvtb_quanlytv . * FROM dvtb_chung INNER JOIN dvtb_quanlytv ON dvtb_chung.MATAU = dvtb_quanlytv.MATAU";
    return array('total' => mysql_num_rows(mysql_query($sql)));
  }
  
  /**
   * @param $shipid
   */
  private function checkShipExist($shipid){
    $shipid = parent::breakSqlInjection($shipid);
    $sql="SELECT * FROM dvtb_chung WHERE MATAU='$shipid'";
    $result = mysql_query($sql);
    $numShip = mysql_num_rows($result);
    if($numShip===1){
      return TRUE;
    }else{
      return FALSE;
    }
  }
  
  /**
   * 
   */
  public function addShipInfomation($shipid, $password, $ime, $shipname, $shipavt, $shiptype, 
                          $long, $wide, $weight, $capacity, $province, $yearbuilding, 
                          $unit, $ownname, $birthyear, $hometown, $phone){
    mysql_query("SET NAMES utf8");
    $shipid   = parent::breakSqlInjection($shipid);
    $password = parent::breakSqlInjection($password);
    $shipname = parent::breakSqlInjection($shipname);
    $unit     = parent::breakSqlInjection($unit);
    $ownname  = parent::breakSqlInjection($ownname);
    $hometown = parent::breakSqlInjection($hometown);
    if($this->checkShipExist($shipid)){
      return array("status" => "ERROR-CREATE-EXIST-CODE");
    }else{
      $addShipSQL = "INSERT INTO dvtb_chung (MATAU, IMTAU, TENTAU,HINHANH, LOAITAU, DAI, RONG, TAITRONG, CONGSUAT, TINH, NAMDONGTAU, DONVIQUANLY)
                     VALUES ('$shipid', '$ime', '$shipname', '$shipavt' ,'$shiptype', '$long', '$wide','$weight', '$capacity',  'Bình Thuận', '$yearbuilding','$unit')";
      $addManagerSQL = "INSERT INTO dvtb_quanly (MATAU, MATKHAU, QUYENXEM) VALUES ('$shipid', '$password', 'User')";
      $addMemberSQL = "INSERT INTO dvtb_quanlytv (MATAU, HOTEN,NAMSINH, QUEQUAN, DIENTHOAI, BOPHAN)
                       VALUES ('$shipid', '$ownname', '$birthyear', '$hometown', '$phone', 'Chủ tàu')";
      $addShipQuery = mysql_query($addShipSQL);
      $addManagerQuery = mysql_query($addManagerSQL);
      $addMemberQuery = mysql_query($addMemberSQL);
      if(!$addShipQuery || !$addManagerQuery || !$addMemberQuery){
        return array("status" => "ERROR-NOT-CREATE");
      }else{
        return array("status" => "SUCCESS");
      }
    }
  }
  
  
  /**
   * 
   */
  public function updateShipInfomation($shipid, $password, $ime, $shipname, $shipavt, $shiptype, 
                          $long, $wide, $weight, $capacity, $province, $yearbuilding, 
                          $unit, $ownname, $birthyear, $hometown, $phone){
    mysql_query("SET NAMES utf8");
    $shipid   = parent::breakSqlInjection($shipid);
    $password = parent::breakSqlInjection($password);
    $shipname = parent::breakSqlInjection($shipname);
    $unit     = parent::breakSqlInjection($unit);
    $ownname  = parent::breakSqlInjection($ownname);
    $hometown = parent::breakSqlInjection($hometown);
    if($this->checkShipExist($shipid)){
      $updateShipSQL = "UPDATE dvtb_chung  SET IMTAU = '$ime', TENTAU = '$shipname', HINHANH = '$shipavt', DAI = '$long', RONG = '$wide',
                        TAITRONG = '$weight', CONGSUAT = '$capacity', NAMDONGTAU =  '$yearbuilding', DONVIQUANLY='$unit' WHERE MATAU='$shipid'";
      $updateManagerSQL = "UPDATE dvtb_quanly SET MATKHAU = '$password', QUYENXEM = 'User' WHERE MATAU = '$shipid'";
      $updateMemberSQL = "UPDATE dvtb_quanlytv SET HOTEN = '$ownname', NAMSINH = '$birthyear', QUEQUAN = '$hometown', DIENTHOAI = '$phone' WHERE MATAU = '$shipid'";
      $updateShipQuery = mysql_query($updateShipSQL);
      $updateManagerQuery = mysql_query($updateManagerSQL);
      $updateMemberQuery = mysql_query($updateMemberSQL);
      if(!$updateShipQuery || !$updateManagerQuery || !$updateMemberQuery){
        return array("status" => "ERROR-NOT-UPDATE");
      }else{
        return array("status" => "SUCCESS");
      }
    }else{
      return array("status" => "ERROR-UPDATE-NOT-EXIST");
    }
  }
  
  /**
   * @param $shipid
   */
  public function deleteShip($shipid){
    mysql_query("SET NAMES utf8");
    parent::breakSqlInjection($shipid);
    if($this->checkShipExist($shipid)){
      $delShipSQL = "DELETE FROM dvtb_chung WHERE MATAU='$shipid'";
      $delManagerSQL = "DELETE FROM dvtb_quanly WHERE MATAU='$shipid'";
      $delMemberSQL = "DELETE FROM dvtb_quanlytv WHERE MATAU='$shipid'";
      $delShipQuery = mysql_query($delShipSQL);
      $delManagerQuery = mysql_query($delManagerSQL);
      $delMemberQuery = mysql_query($delMemberSQL);
      if(!$delShipQuery || !$delManagerQuery || !$delMemberQuery){
        return array("status" => "ERROR-NOT-DELETE");
      }else{
        return array("status" => "SUCCESS");
      }
    }else{
      return array("status" => "ERROR-DELETE-NOT-EXIST");
    }
  }
}
?>