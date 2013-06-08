<?php
include("connect.php");
include("header.php");
mysql_query("SET NAMES utf8");
// username và password được gửi từ form đăng nhập 
$matau=$_POST['matau'];
$ime=$_POST["ime"];
$tentau=$_POST["tentau"];
$hinhanh=$_POST["hinhanh"];
$loaitau=$_POST["loaitau"];
$dai=$_POST["dai"];
$rong=$_POST["rong"];
$taitrong=$_POST["taitrong"];
$congsuat=$_POST["congsuat"];
$tinh=$_POST["tinh"];
$namdongtau=$_POST["namdongtau"];
$donviquanly=$_POST["donviquanly"];
$tenchu=$_POST["hotenchutau"];
$matkhau=$_POST["matkhau"];
$namsinh=$_POST["namsinh"];
$quequan=$_POST["quequan"];
$dienthoai=$_POST["dienthoai"];
// Xử lý để tránh MySQL injection 
$myusername = stripslashes($myusername); 
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername); 
$mypassword = mysql_real_escape_string($mypassword); 
$sql="SELECT * FROM dvtb_chung WHERE MATAU='".$matau."'";
$result=mysql_query($sql);
 if(mysql_num_rows($result) == 1 )
 {
	 echo"<meta charset='utf-8'>";
	 echo" <div class='alert fade in'>";
            echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            echo" <strong>Hệ thống DVTB: </strong> Mã tàu này đã tồn tại trong CSDL!.";
          echo" </div>";
 	 
 }
 else
 {
	 $LENHNAP="INSERT INTO dvtb_chung (MATAU, IMTAU, TENTAU, HINHANH, LOAITAU, DAI, RONG, TAITRONG, CONGSUAT, TINH, NAMDONGTAU, DONVIQUANLY) 				VALUES ('$matau', '$ime', '$tentau', '$hinhanh', '$loaitau', '$dai', '$rong','$taitrong', '$congsuat',  '$tinh', '$namdongtau',		'$donviquanly')";
	 $querythemquanly="INSERT INTO dvtb_quanly (MATAU, MATKHAU, QUYENXEM) VALUES ('$matau', '$matkhau', 'User')";
	$qrquanlytv=" INSERT INTO dvtb_quanlytv (MATAU, HOTEN,NAMSINH, QUEQUAN, DIENTHOAI, BOPHAN) VALUES ('$matau', '$tenchu', '$namsinh', '$quequan', '$dienthoai', 'Chủ tàu')";
	$query4=mysql_query($qrquanlytv);
	 $query3=mysql_query($querythemquanly);
  	$query2=mysql_query($LENHNAP);
	echo"<meta charset='utf-8'>";
	echo" <div class='alert fade in'>";
            echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            echo" <strong>Hệ thống DVTB: </strong> Đã đăng kiểm thông tin tàu cho $tenchu.";
          echo" </div>";
 }
?>