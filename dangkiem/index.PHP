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
    <td colspan="9" class="info"><font face="Times New Roman, Times, serif" color="#FF0000" size="+2"><b>THÔNG TIN ĐĂNG KIỂM</b></font></td>
    
    <!-- bắt đầu Form -->
    
    <form action="add.php" method="post">
    
    <!-- bắt đầu dòng 1 -->
    	<div class="input-prepend">
  			<span class="add-on">*</span>
  			<input class="span1" id="prependedInput" name="matau" type="text" placeholder="Mã tàu">
		</div>
        &nbsp &nbsp
        <div class="input-prepend">
  			<span class="add-on">*</span>
  			<input class="span2" id="prependedInput" name="ime" type="text" placeholder="IME tàu">
		</div>
        &nbsp 
        <div class="input-prepend">
  			<span class="add-on">*</span>
  			<input class="span2" id="prependedInput" name="tentau" type="text" placeholder="Tên tàu">
		</div>
        &nbsp 	
        <?php include("connect.php"); 
                        			$sql2="SELECT LOAITAU FROM dvtb_loaitau";
									mysql_query("SET NAMES utf8");
                        			$result2=mysql_query($sql2);
									$demkhoa=mysql_num_rows($result2);  
        					echo "<select name='loaitau'>";
							for($i==0;$i<$demkhoa;$i++)
							{
									$RSS=mysql_fetch_array($result2);
                        			$kn= $RSS['LOAITAU']; 
									echo"<option>$kn</option>";
							}
        					echo"</select>";				
									?>   &nbsp &nbsp &nbsp
  			<input class="span1" id="prependedInput" name="dai" type="text" placeholder="Dài"> &nbsp  &nbsp
  			<input class="span1" id="prependedInput" name="rong" type="text" placeholder="Rộng">
            <div class="input-prepend">
            <!-- bắt đầu dòng 2-->
  			<span class="add-on">*</span>
  			<input class="span2" id="prependedInput" name="congsuat" type="text" placeholder="Công suất">
		</div>
        &nbsp  
        <div class="input-prepend">
  			<span class="add-on">*</span>
  			<input class="span2" id="prependedInput" name="taitrong" type="text" placeholder="Tải trọng">
		</div>
        &nbsp &nbsp 
        <div class="input-prepend">
  			<span class="add-on">*</span>
  			<input class="span2" id="prependedInput" name="donviquanly" type="text" placeholder="Đơn vị quản lý">
		</div>
        &nbsp &nbsp
  			<input class="span2" id="prependedInput" name="hinhanh" type="text" placeholder="Hình ảnh tàu">
		 &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp 
  			<input class="span1" id="prependedInput" name="namdongtau" type="text" placeholder="Năm đóng"> 
            
        <!-- bắt đầu dòng 3 -->
        	 <div class="input-prepend">
  			<span class="add-on">*</span>
  			<input class="span2" id="prependedInput" name="hotenchutau" type="text" placeholder="Họ tên chủ tàu">
            </div>
        &nbsp
  			<input class="span3" id="prependedInput" name="quequan" type="text" placeholder="Quê quán">
        &nbsp  
  			<input class="span2" id="prependedInput" name="dienthoai" type="text" placeholder="Điện thoại">
        &nbsp 
  			<input class="span1" id="prependedInput" name="namsinh" type="text" placeholder="Năm sinh">  &nbsp &nbsp &nbsp
  			<input class="span2" id="prependedInput" name="matkhau" type="password" placeholder="Mật khẩu"> 
        <!-- bắt đầu các button --> 
        <!-- bắt đầu nút Đăng kiểm -->
        	<div>
        		<button class="btn btn-primary" name="btn" value="dangkiem" type="submit">Đăng kiểm</button>
        	
        <!-- bắt đầu nút Cập nhật -->
        	
        		<button class="btn btn-warning" name="btn" value="capnhat" type="submit">Cập nhật thông tin</button>
        	
        <!-- bắt đầu nút Xóa thông tin -->
        	
        		<button class="btn btn-danger" name="btn" value="xoa" type="submit">Xóa thông tin</button>
        	</div>
   
    </form>
    <!--Hết Form -->
    <br>
    
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