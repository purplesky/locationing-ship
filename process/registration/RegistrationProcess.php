<?php
  include '../../core/registration/RegistrationService.php';
  /**
   * import infomation a ship
   */
  $action       = $_POST['action'];
  /**
   * Mapping Registration
   */
  if($action=='register'){
    setShipInfomation();
    registrationInfomation();
  }
  if($action=='updater'){
    setShipInfomation();
    updateRegistrationInfomation();
  }
  if($action=='delete'){
    setShipId();
    deleteRegistration();
  }
  if($action=='getlistshipregistered'){
    $start = $_POST['start'];
    $limit = $_POST['limit'];
    getListData($start, $limit);
  }
  function setShipId(){
    $shipid       = $_POST['shipid'];
  }
  function setShipInfomation(){
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
  }
  function getListData($start, $limit){
    $registration = new RegistrationService;
    $result = array();
    $result = $registration->getListShipRegistered($start, $limit);
    echo json_encode($result);
  }
  function registrationInfomation(){
    $registration = new RegistrationService;
    $result = array();
    $result = $registration->addShipInfomation($shipid, $password, $ime, $shipname, $shipavt, $shiptype, $long, $wide, $weight,
                                     $capacity, $province, $yearbuilding, $unit, $ownname, $birthyear, $hometown, $phone);
    echo json_encode($result);
  }
  
  function updateRegistrationInfomation(){
    $registration = new RegistrationService;
    $result = array();
    $result = $registration->updateShipInfomation($shipid, $password, $ime, $shipname, $shipavt, $shiptype, $long, $wide, $weight,
                                     $capacity, $province, $yearbuilding, $unit, $ownname, $birthyear, $hometown, $phone);
    echo json_encode($result);
  }
  
  function deleteRegistration(){
    $registration = new RegistrationService;
    $result = array();
    $result = $registration->deleteShip($shipid);
    echo json_encode($result);
  }
?>