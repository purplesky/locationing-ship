<?php
include("connect.php");
include("header.php");

mysql_query("SET NAMES utf8");
// username và password được gửi từ form đăng nhập 
$buttonclick=$_POST["btn"];
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
echo"<div class='container'>";
$sql="SELECT * FROM dvtb_chung WHERE MATAU='".$matau."'";
$result=mysql_query($sql);
$check=mysql_num_rows($result);
if($buttonclick=='dangkiem')
{			///Kiểm tra lỗi Mã tàu và ime rỗng//
			if($matau==''||$ime=='')
			{
			echo" <div class='alert fade in'>";
            echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            echo" Bạn chưa nhập mã tàu hoặc ime tàu.";
			echo"<a href='http://localhost/quanlytaubien/quanlytaubien/docs/dangkiem/'>Nhập lại</a>";
          	echo" </div>";
			}
			///Nếu không rỗng thì kiểm tra xem mã tàu đã tồn tại trông csdl chưa? //
			elseif($check==1)
			{
				echo"<meta charset='utf-8'>";
	 			echo" <div class='alert fade in'>";
            	echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            	echo" <strong>Mã tàu này đã tồn tại trong CSDL!</strong>.";
				echo"<a href='http://localhost/quanlytaubien/quanlytaubien/docs/dangkiem/'>Kiểm lại</a>";
          		echo" </div>";
			}
			///Đến đây thực hiện lệnh nhập liệu///
			else	
			{	
				$LENHNAP="INSERT INTO dvtb_chung (MATAU, IMTAU, TENTAU,HINHANH, LOAITAU, DAI, RONG, TAITRONG, CONGSUAT, TINH, NAMDONGTAU, DONVIQUANLY) VALUES ('$matau', '$ime', '$tentau', '$hinhanh' ,'$loaitau', '$dai', '$rong','$taitrong', '$congsuat',  'Bình Thuận', '$namdongtau','$donviquanly')";
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
}
if($buttonclick=='capnhat')
{
			if($matau=='')
			{
			echo" <div class='alert fade in'>";
            echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            echo" Cần chọn mã tàu để cập nhật thông tin !";
			echo"<a href='http://localhost/quanlytaubien/quanlytaubien/docs/dangkiem/'>Nhập lại</a>";
          	echo" </div>";
			}
			///Nếu không rỗng thì kiểm tra xem mã tàu đã tồn tại trông csdl chưa? //
			elseif($check==0)
			{
				echo"<meta charset='utf-8'>";
	 			echo" <div class='alert fade in'>";
            	echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            	echo" <strong>Mã tàu này không tồn tại trong CSDL!</strong>.";
				echo"<a href='http://localhost/quanlytaubien/quanlytaubien/docs/dangkiem/'>Kiểm lại</a>";
          		echo" </div>";
			}
			///Đến đây thực hiện lệnh nhập liệu///
			else	
			{	
				$updatechung="UPDATE dvtb_chung  SET  IMTAU =  '$ime',TENTAU =  '$tentau',HINHANH =  '$hinhanh',DAI =  '$dai',RONG =  '$rong', TAITRONG =  '$taitrong',CONGSUAT =  '$congsuat',NAMDONGTAU =  '$namdongtau' where MATAU='$matau'";	
					$updateql = "UPDATE dvtb_quanly SET MATKHAU = '$matkhau', QUYENXEM = 'User' WHERE MATAU = '$matau'";
	 				$updateqltv = "UPDATE dvtb_quanlytv SET HOTEN = '$tenchu', NAMSINH = '$namsinh', QUEQUAN = '$quequan', DIENTHOAI = '$dienthoai' WHERE MATAU = '$matau'";
				$query4=mysql_query($updatechung);
	 			$query3=mysql_query($updateql);
  				$query2=mysql_query($updateqltv);
				echo"<meta charset='utf-8'>";
				echo" <div class='alert fade in'>";
            	echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            	echo" <strong>Đã cập nhật thông tin tàu $tentau.</strong>";
          		echo" </div>";	
			}
}
if($buttonclick=='xoa')
{
			if($matau=='')
			{
			echo" <div class='alert fade in'>";
            echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            echo" Cần chọn mã tàu cần xóa thông tin !";
			echo"<a href='http://localhost/quanlytaubien/quanlytaubien/docs/dangkiem/'>Nhập lại</a>";
          	echo" </div>";
			}
			///Nếu không rỗng thì kiểm tra xem mã tàu đã tồn tại trông csdl chưa? //
			elseif($check==0)
			{
				echo"<meta charset='utf-8'>";
	 			echo" <div class='alert fade in'>";
            	echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            	echo" <strong>Mã tàu này không tồn tại trong CSDL!</strong>.";
				echo"<a href='http://localhost/quanlytaubien/quanlytaubien/docs/dangkiem/'>Kiểm lại</a>";
          		echo" </div>";
			}
			///Đến đây thực hiện lệnh nhập liệu///
			else	
			{	
				$updatechung="delete  from dvtb_chung where MATAU='$matau'";	
					$updateql = "delete  from dvtb_quanly where MATAU='$matau'";
	 				$updateqltv = "delete from dvtb_quanlyltv where MATAU='$matau'";
				$query4=mysql_query($updatechung);
	 			$query3=mysql_query($updateql);
  				$query2=mysql_query($updateqltv);
				echo"<meta charset='utf-8'>";
				echo" <div class='alert fade in'>";
            	echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            	echo" <strong>Đã xóa hết thông tin của tàu $tentau.</strong>";
          		echo" </div>";	
			}
}
  
echo"</div>";
?>

 
