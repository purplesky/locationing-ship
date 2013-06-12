<?php
  include '../../core/registration/RegistrationService.php';
  /**
   * import infomation a ship
   */
  $action       = $_POST['action'];
  $shipid       = $_POST['shipid'];
  $password     = $_POST['password'];
  $ime          = $_POST['shipime'];
  $shipname     = $_POST['shipname'];
  $shipavt      = $_POST['shipavt'];
  $shiptype     = $_POST['shiptype'];
  $long         = $_POST['long'];
  $wide         = $_POST['wide'];
  $weight       = $_POST['weight'];
  $capacity     = $_POST['capacity'];
  $province     = $_POST['province'];
  $yearbuilding = $_POST['yearbuil']; 
  $unit         = $_POST['unit'];
  $ownname      = $_POST['ownname'];
  $birthyear    = $_POST['birhyear'];
  $hometown     = $_POST['hometown'];
  $phone        = $_POST['phone'];
  
  /**
   * Mapping Registration
   */
  if($action=='register'){
    registrationInfomation();
  }
  if($action=='updater'){
    updateRegistrationInfomation();
  }
  if($action=='delete'){
    deleteRegistration();
  }
  
  function registrationInfomation(){
    $registration = new RegistrationService;
    $result = array();
    $result = $registration->addShipInfomation($shipid, $password, $ime, $shipname, $shipavt, $shiptype, $long, $wide, $weight,
                                     $capacity, $province, $yearbuilding, $unit, $ownname, $birthyear, $hometown, $phone);
    echo $result;
  }
  
  function updateRegistrationInfomation(){
    $registration = new RegistrationService;
    $result = array();
    $result = $registration->updateShipInfomation($shipid, $password, $ime, $shipname, $shipavt, $shiptype, $long, $wide, $weight,
                                     $capacity, $province, $yearbuilding, $unit, $ownname, $birthyear, $hometown, $phone);
    echo $result;
  }
  
  function deleteRegistration(){
    $registration = new RegistrationService;
    $result = array();
    $result = $registration->deleteShip($shipid);
    echo $result;
  }
?>