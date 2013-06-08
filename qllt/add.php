<?php
include("connect.php");
include("header.php");

mysql_query("SET NAMES utf8");
// username và password được gửi từ form đăng nhập 
$buttonclick=$_POST["btn"];
$matau=$_POST['matau'];
$ngdi=$_POST["ngaydi"];
$ngve=$_POST["ngayvedukien"];
$sltv=$_POST["soluongtv"];
$hotentv=$_POST["hotenthuyenvien"];
$namsinhtv=$_POST["namsinhthuyenvien"];
$quequantv=$_POST["quequanthuyenvien"];
$bp=$_POST["bophan"];
// Xử lý để tránh MySQL injection 
$myusername = stripslashes($myusername); 
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername); 
$mypassword = mysql_real_escape_string($mypassword);
echo"<div class='container'>";
$sql="SELECT * FROM dvtb_tauonline WHERE MATAU='".$matau."'";
$result=mysql_query($sql);
$check=mysql_num_rows($result);

		///Kiểm tra lỗi Mã tàu và ime rỗng//
			if($matau==''||$bp==''||$hotentv==''||$namsinhtv==''||$quequantv==''||$ngdi==''||$ngve=='')
			{
			echo" <div class='alert fade in'>";
            echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            echo" Nhập thiếu thông tin !.";
			echo"<a href='http://localhost/quanlytaubien/quanlytaubien/docs/qllt/'>Nhập lại</a>";
          	echo" </div>";
			}
			///Nếu không rỗng thì kiểm tra xem mã tàu đã tồn tại trông csdl chưa? //
			elseif($check==1)
			{
				echo"<meta charset='utf-8'>";
	 			echo" <div class='alert fade in'>";
            	echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            	echo" <strong>Hệ thống phát hiện tàu này đang trên biển, vui lòng kiểm tra lại. !</strong>.";
				echo"<a href='http://localhost/quanlytaubien/quanlytaubien/docs/qllt/'>Kiểm lại</a>";
          		echo" </div>";
			}
			///Đến đây thực hiện lệnh nhập liệu///
			else	
			{	
				$LENHNAP="INSERT INTO dvtb_lichtrinh (MATAU, NGAYDI, NGAYVEDUKIEN) VALUES ('$matau', '$ngdi', '$ngve');";
				$querythemquanly="INSERT INTO dvtb_quanlytv (MATAU, HOTEN, NAMSINH, QUEQUAN, BOPHAN) VALUES ('$matau', '  $hotentv', '$namsinhtv', '$quequantv', '$bp');";
				$qrquanlytv=" INSERT INTO dvtb_tauonline (MATAU, TRANGTHAI) VALUES ('$matau', 'YES')";
				$query4=mysql_query($qrquanlytv);
				$query3=mysql_query($querythemquanly);
				$query2=mysql_query($LENHNAP);
				echo"<meta charset='utf-8'>";
				echo" <div class='alert fade in'>";
				echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
				echo" <strong>Hệ thống DVTB: </strong> Đã đăng kiểm thông tin tàu cho $tenchu.";
				echo" </div>";
			
			}
  
echo"</div>";
?>

 
