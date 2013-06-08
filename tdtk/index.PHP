<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php include("header.php"); 
include("body-form2.php");
?><div class="">
<table class="table table-bordered table table-hover" width="98%" border="0" cellpadding="1">
 <tr class="info">
    <td colspan="5" class="info"><font face="Times New Roman, Times, serif" color="#FF0000" size="+2"><b>THỐNG KÊ THEO DÕI</b></font></td>
    <td colspan="5" class="info" ><b><right>DANH SÁCH TÀU THUỘC QUYỀN KIỂM SOÁT</right></b></td>
  </tr>
  
  <tr class="success">
    <td bgcolor="#3399FF">STT</td>
    <td>MÃ TÀU</td>
    <td>TÊN TÀU</td>
    <td>LOẠI TÀU</td>
    <td>TẢI TRỌNG</td>
    <td>CÔNG SUẤT</td>
    <td>NĂM ĐÓNG TÀU</td>
    <td>ĐƠN VỊ QUẢN LÝ</td>
    <td>CHỦ TÀU</td>
  </tr>
  <?php 
  		include("connect.php");
		$sodong=3;
		$p=$_GET["p"];
		if($p==0)
		{
			$sttbd=0;
			}
			else
			$sttbd=$p*$sodong;
		$load="select * from dvtb_chung limit $sttbd,$sodong ";
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($load);
  		$n=0;
		while($row = mysql_fetch_array($rs,MYSQL_ASSOC))
		{
			$n++
            ?>
            <tr>
    <td><?php echo $n; ?></td>
    <td><?php echo $row["MATAU"];?></td>
    <td><?php echo $row["TENTAU"]; ?></td>
    <td><?php echo $row["LOAITAU"]; ?></td>
    <td><?php echo $row["TAITRONG"]; ?></td>
    <td><?php echo $row["CONGSUAT"] ;?></td>
    <td><?php echo $row["NAMDONGTAU"]; ?></td>
    <td><?php echo $row["DONVIQUANLY"]; ?></td>
    <td><?php echo $row["HOTEN"]; ?></td>
  </tr>
 <?php  }

echo "</table>";
$load="select MATAU from dvtb_chung ";
$rs=mysql_query($load);
$num_rs=mysql_num_rows($rs);
$k=0;
for($i=0;$i<$num_rs;$i=$i+$sodong)
	{
		
		echo "<a href=index.php?p=$k> $k </a> - ";
		$k++;
		}
		mysql_close();
?>
</div>
</body>
</html>