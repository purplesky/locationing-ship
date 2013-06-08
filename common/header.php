<?php include 'process/LockSession.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Trang quản trị</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/common/common.js"></script>
    <script type="text/javascript" src="js/common/language-vn.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript" src="js/common/layout.js"></script>
  </head>
  <body>
    <div id="header">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <a class="brand" href="javascript:;"><i class="icon-logo"> </i>Hệ thống định vị tàu biển</a>
          <ul class="nav pull-right">
            <li></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-user icon-white"> </i> <?php echo $login_session; ?> 
                <i class="icon-cog icon-white"> </i><i class="caret"> </i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-info-sign"> </i> User Infomation</a></li>
                <li><a href="#"><i class="icon-lock"> </i> Change Password</a></li>
                <li class="divider"> </li>
                <li><a href="logout.php"><i class="icon-off"> </i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>