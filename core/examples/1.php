<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>HỆ THỐNG QUẢN LÝ TÀU BIỂN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 350px;
        padding: 19px 29px 29px;
        margin: 0 auto 10px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 5px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 14px;
        height: auto;
        margin-bottom: 14px;
        padding: 7px 9px;
      }

    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body background="../../img/BG.png" >
  <?php 
$host="localhost"; // luôn luôn là localhost 
$username="root"; // user của mysql 
$password=""; // Mysql password 
$db_name="dvtb"; // tên database 
$tbl_name="dvtb_quanly"; // tên table 
// kết nối cơ sở dữ liệu 
mysql_connect("$host", "$username", "$password")or die("Không thể kết nối"); 
mysql_select_db("$db_name")or die("cannot select DB"); 
// username và password được gửi từ form đăng nhập 
$tklg=$_GET['myusername'];
$mklg=$_GET['mypassword'];
// Xử lý để tránh MySQL injection 
$myusername = stripslashes($myusername); 
$mypassword = stripslashes($mypassword); 
$myusername = mysql_real_escape_string($myusername); 
$mypassword = mysql_real_escape_string($mypassword); 
$sql="SELECT * FROM $tbl_name WHERE MATAU='$tklg' and MATKHAU='$mklg'";
$result=mysql_query($sql); 
$count=mysql_num_rows($result); 
// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count 
if($count==1){ 
// Lúc này nó sẽ tự động gửi đến trang thông báo đăng nhập thành công 
$bienthongbao="Đăng nhập thành công!"; 
} 
else { 
$bienthongbao="Đăng nhập không thành công!"; 
} 
?>
<div align="center">
    <div class="container" >

      <form class="form-signin" action=''>
        <h2 class="form-signin-heading"><FONT FACE='Times New Roman' COLOR='BLUE'size='4'>HỆ THỐNG QUẢN LÝ TÀU BIỂN</font></h2>
        <input type="text" name="myusername" id="myusername" class="input-block-level" placeholder="Tài khoản">
        <input type="password" name="mypassword" id="mypassword" class="input-block-level" placeholder="Mật khẩu">
        <div align="right">
		<div align="left" class="text-success">
		<?php
		echo $bienthongbao;
		?>
		</div>
		<button class="btn btn" type="submit">Đăng nhập</button></div>
		
      </form>

    
</div>	<!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
