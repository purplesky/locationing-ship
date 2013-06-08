<?php
    $myhost="localhost";
    $taikhoan="root";
	$matkhau="";
	$cosodulieu="dvtb";
    mysql_connect($myhost,$taikhoan,$matkhau) or die ("Không thể kết nối đến CSDL ");
	mysql_select_db ($cosodulieu) or die ("Không tìm thấy <b>$cosodulieu</b> trên localhost");
?>