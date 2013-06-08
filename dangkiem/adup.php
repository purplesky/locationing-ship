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

if($buttonclick=='dangkiem')
{
			if($matau==''||$ime=='')
			{
			echo" <div class='alert fade in'>";
            echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            echo" Bạn chưa nhập mã tàu hoặc ime tàu.";
			echo"<a href='http://localhost/quanlytaubien/quanlytaubien/docs/dangkiem/'>Nhập lại</a>";
          	echo" </div>";
			}
			else
			{
				$sql="SELECT * FROM dvtb_chung WHERE MATAU='".$matau."'";
				$result=mysql_query($sql);
 				if(mysql_num_rows($result) == 1 )
				
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
		else
		{
		echo"<meta charset='utf-8'>";
		echo" <div class='alert fade in'>";
        echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
        echo" Không thể đăng kiểm thông tin";
        echo" </div>";
		}	
			}
}
if($buttonclick=='capnhat')
{

}
if($buttonclick=='xoa')
{

}
      

// kiểm tra xem mã tàu và ime đã nhập chua ?
if($matau==''||$ime=='')
{
			echo" <div class='alert fade in'>";
            echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            echo" Bạn chưa nhập mã tàu hoặc ime tàu.";
			echo"<a href='http://localhost/quanlytaubien/quanlytaubien/docs/dangkiem/'>Nhập lại</a>";
          	echo" </div>";
}
else
{
			$sql="SELECT * FROM dvtb_chung WHERE MATAU='".$matau."'";
			$result=mysql_query($sql);
 			if(mysql_num_rows($result) == 1 )
 			{
	 			echo"<meta charset='utf-8'>";
	 			echo" <div class='alert fade in'>";
            	echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
            	echo" <strong>Hệ thống DVTB: </strong> Mã tàu này đã tồn tại trong CSDL! if 1.";
				echo"<a href='http://localhost/quanlytaubien/quanlytaubien/docs/dangkiem/'>Kiểm lại</a>";
          		echo" </div>";
 			}
 			else
 			{	
				if($buttonclick=="dangkiem")
				
				{
					
					else{
						echo"<meta charset='utf-8'>";
						echo" <div class='alert fade in'>";
						echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
						echo" <strong>Hệ thống DVTB: </strong> Không cập nhật được";
						echo" </div>";
						}
				}
				if($buttonclick=="capnhat")
				{  
					$sql="SELECT * FROM dvtb_chung WHERE MATAU='".$matau."'";
					$result=mysql_query($sql);
 					if(mysql_num_rows($result) == 0 )
					{
						echo"<meta charset='utf-8'>";
						echo" <div class='alert fade in'>";
						echo" <button type='button' class='close' data-dismiss='alert'>×</button>";
						echo" <strong>Mã tàu không tồn tại trong CSDL.</strong>";
						echo" </div>";	
					}
					else
					{
					$updatechung="UPDATE dvtb_chung  SET  `IMTAU` =  '$ime',TENTAU =  '$tentau',HINHANH =  '$hinhanh',`DAI` =  '$dai',`RONG` =  $rong,`TAITRONG` =  '$taitrong',`CONGSUAT` =  '$congsuat',`NAMDONGTAU` =  '$namdongtau' where MATAU=$matau";	
					$updateql = "UPDATE `dvtb_quanly` SET `MATKHAU` = \'$matkhau\', `QUYENXEM` = \'User\' WHERE `MATAU` = \'$matau\'";
	 				$updateqltv = "UPDATE `dvtb_quanlytv` SET `HOTEN` = \'$tenchu\', `NAMSINH` = \'$namsinh\', `QUEQUAN` = \'$quequan\', `DIENTHOAI` = \'$dienthoai\' WHERE `MATAU` = \'$matau\'";
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
				else
				{
					//Delete code here
				}
	 			
 			}
}
echo"</div>";
?>

 
