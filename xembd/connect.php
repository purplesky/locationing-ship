<?php
    $myhost="localhost";
    $taikhoan="root";
	$matkhau="";
	$cosodulieu="dvtb";
    mysql_connect($myhost,$taikhoan,$matkhau) or die ("Khong the ket noi den CSDL ");
	mysql_select_db ($cosodulieu) or die ("Khong tim thay <b>$cosodulieu</b> tren localhost");
?>