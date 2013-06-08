<?php
include("connect.php");
// username và password được gửi từ form đăng nhập 
$tklg=$_POST['myusername'];
$mklg=$_POST['mypassword'];
// Xử lý để tránh MySQL injection 
$myusername = stripslashes($myusername); 
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername); 
$mypassword = mysql_real_escape_string($mypassword); 
$sql="SELECT * FROM dvtb_quanly WHERE MATAU='$tklg' and MATKHAU='$mklg'";
//echo $sql;
$result=mysql_query($sql); 
$count=mysql_num_rows($result); 
//secho $count;
// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count 
if($count==1){ 
// Lúc này nó sẽ tự động gửi đến trang thông báo đăng nhập thành công 
header("Location:/quanlytaubien/quanlytaubien/docs/trogiup/#myModal");
} 
else { 
echo"<meta charset='utf-8'>";
echo "<font  color='#CC0000'><b><center><p> Đăng nhập không thành công!</p></center></b></font>"; 
}
?>