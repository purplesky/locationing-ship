<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng kiểm thông tin</title>
</head>

<body>
<?php include("header.php"); 
include("body-form2.php");
?><div class="">
<table class="table table-bordered table table-hover" width="98%" border="0" cellpadding="1">
 <tr class="warning">
    <td colspan="9" class="info"><font face="Times New Roman, Times, serif" color="#FF0000" size="+2"><b>DANH SÁCH TÀU ĐANG TRÊN BIỂN</b></font></td>
    
    <!-- bắt đầu Form -->
    
    <form action="add.php" method="post">
    
    <!-- bắt đầu dòng 1 -->
  			<?php include("connect.php"); 
                        			$sql2="SELECT MATAU FROM dvtb_chung";
									mysql_query("SET NAMES utf8");
                        			$result2=mysql_query($sql2);
									$demkhoa=mysql_num_rows($result2);  
        					echo "<select name='matau'>";
							for($i==0;$i<$demkhoa;$i++)
							{
									$RSS=mysql_fetch_array($result2);
                        			$kn= $RSS['MATAU']; 
									echo"<option>$kn</option>";
							}
        					echo"</select>";				
									?> 
        &nbsp &nbsp&nbsp &nbsp 
        	<input class="span3" id="prependedInput" name="ngaydi" type="text" value="<?php echo $ngay_gio=date('d/m/Y - g:i s A');?>" placeholder="Ngày đi ">
		
        &nbsp &nbsp &nbsp &nbsp
        <input class="span3" id="prependedInput" name="ngayvedukien" type="text" value="" placeholder="Ngày về dự kiến "> 
        &nbsp &nbsp &nbsp &nbsp &nbsp
  			<input class="span1" id="prependedInput" name="soluongtv" type="text" placeholder="Số lượng tv">
       <!--Dòng 2-->
  			<input class="span3" id="prependedInput" name="hotenthuyenvien" type="text" placeholder="Họ và Tên thuyền viên"> &nbsp  &nbsp 
  			<input class="span1" id="prependedInput" name="namsinhthuyenvien" type="text" placeholder="Năm sinh"> &nbsp  &nbsp 
            <input class="span3" id="prependedInput" name="quequanthuyenvien" type="text" placeholder="Quê quán"> &nbsp  &nbsp 
            <input class="span2" id="prependedInput" name="bophan" type="text" placeholder="Bộ phận">  &nbsp  
            <button class="btn btn-warning" name="btn" value="dangkiem" type="submit">Xuất bến</button>
        <!-- bắt đầu các button --> 
        <!-- bắt đầu nút Đăng kiểm -->
        	
   
    </form>
    <!--Hết Form -->
   
    
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
		$load="SELECT dvtb_quanlytv . * , dvtb_chung . * FROM dvtb_quanlytv INNER JOIN dvtb_chung ON dvtb_quanlytv.MATAU = dvtb_chung.MATAU
LIMIT 0 , 30";
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
  <?php }
    ?>
</table>
</div>
</body>
</html>