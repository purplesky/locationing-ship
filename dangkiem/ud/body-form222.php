<!-- BẮT ĐẦU THANH NAVBAR
    ================================================== -->
   

<!-- HẾT NAVBAR
================================================== -->

  <div class="container"> 
    <!-- BẮT ĐẦU MENU TRÁI
    ================================================== -->
     <div class="row">
      <div class="span3 bs-docs-sidebar">
      <ul class="nav nav-list bs-docs-sidenav">
      <li><a href="../trogiup"><i class="icon-time"></i><font color="#CC0000"> <?php echo $ngay_gio=date('d/m/Y - g:i s A');?></font></a></li></li>
        <li><a href="../trogiup"><i class="icon-resize-small"></i> Có <font color="#CC0000"><?php include("connect.php"); $sql="SELECT * FROM dvtb_chung";
$result=mysql_query($sql);
$dem= mysql_num_rows($result); echo $dem ?></font> thuộc quyền kiểm soát</a></li></li>
<li><a href="../trogiup"><i class="icon-resize-small"></i> Có <font color="#CC0000"><?php include("connect.php"); $sql="SELECT * FROM dvtb_lichtrinh";
$result=mysql_query($sql);
$dem= mysql_num_rows($result); echo $dem ?></font> tàu đang trên biển</a></li></li>
<li><a href=""><i class="icon-user"></i> Có <font color="#CC0000"><?php
$tg=time();
$tgout=900;
$tgnew=$tg - $tgout;
$conn=mysql_connect("localhost","root","") or die("can't connect");
mysql_select_db("online",$conn);
$sql="insert into useronline(tgtmp,ip,local) values('$tg','$REMOTE_ADDR','$PHP_SELF')";
$query=mysql_query($sql);
$sql="delete from useronline where tgtmp < $tgnew";
$query=mysql_query($sql);
$sql="SELECT DISTINCT ip FROM useronline WHERE local='$PHP_SELF'";
$query=mysql_query($sql);
$user = mysql_num_rows($query);
echo $user ?></font> user đang online.</a></li></li>
        </ul>
        <ul class="nav nav-list bs-docs-sidenav">
          <li><a href="../dangkiem"><i class="icon-tags"></i> QUẢN LÝ ĐĂNG KIỂM</a></li>
          <li><a href="../qllt"><i class="icon-retweet"></i> QUẢN LÝ LỊCH TRÌNH RA VÀO</a></li>
          <li><a href="../tctt"><i class="icon-search"></i> TRA CỨU THÔNG TIN</a></li>
          <li><a href="../xembd"><i class="icon-map-marker"></i> XEM BẢN ĐỒ LỘ TRÌNH</a></li>
          <li><a href="../tdtk"><i class="icon-globe"></i> THỐNG KÊ - THEO DÕI</a></li>
          <li><a href="../dhbao"><i class="icon-fire"></i> ĐIỀU HƯỚNG BÃO</a></li>
          <li><a href="../tdtt"><i class="icon-signal"></i> PHÂN TÍCH THEO DÕI THỜI TIẾT</a></li>
          <li><a href="../trogiup"><i class="icon-question-sign"></i> TRỢ GIÚP - BÁO LỖI</a></li>
        </ul>
      </div>
      <div class="span8">
      <div class="container"> 
    <!-- BẮT ĐẦU MENU TRÁI
    ================================================== -->
     
      <!-- HẾT MENU TRÁI--------->
      
      <!-- BẮT ĐẦU LAYOUT PHẢI CHỨA CONTENT CHO TẤT CẢ NỘI DUNG EVENT-->
	  <div class="span6">
    <div class="container">
    <div class="span11">
   
      <div class="span11 ">
     <!-- <div class="hero-unit  ">-->
<div class="center"><br><p><table class="table table-bordered"  bgcolor="#0066FF" width="98%" border="0" cellpadding="0">
<tr class="warning">
    <td align=""><center><font face="Times New Roman, Times, serif" color="#FF0000" size="+2"><b>ĐĂNG KIỂM THÔNG TIN</b></font></center></td>
  </tr>
  </table>
   </div> 
   </div> 
   </div>
   <div class="container-fluid">
   <div class="container"> 
    <!-- BẮT ĐẦU MENU TRÁI
    ================================================== -->

    <div class="container"> 
    		
    
	<a href="#myModal" role="button" class="btn btn-warning" data-toggle="modal">Cập nhật thông tin</a>
    <table class="table table-bordered table table-hover" width="98%" border="0" cellpadding="1">
  <tr class="warning">
    <td>STT</td>
    <td>MÃ TÀU</td>
    <td>TÊN TÀU</td>
    <td>LOẠI TÀU</td>
    <td>TẢI TRỌNG</td>
    <td>CÔNG SUẤT</td>
    <td >NĂM ĐÓNG TÀU</td>
    <td>ĐƠN VỊ QUẢN LÝ</td>
    <td>CHỦ TÀU</td>
  </tr>
  <?php 
  		include("connect.php");
		$load="select * from dvtb_chung,dvtb_quanlytv limit 0,15";
		mysql_query("SET NAMES utf8");
  		$n=0;
		$acc=mysql_query($load);
		$count = mysql_num_rows($acc);
		$row = mysql_fetch_array($acc);
       for($n==0;$n<=$count;$n++)
        { 
			$n++;
		
?>
    <tr>
    <td><?php echo $n; ?></td>
    <td><?php echo $row["MATAU"] ?></td>
    <td><?php echo $row["TENTAU"] ?></td>
    <td><?php echo $row["LOAITAU"] ?></td>
    <td><?php echo $row["TAITRONG"] ?></td>
    <td><?php echo $row["CONGSUAT"] ?></td>
    <td><?php echo $row["NAMDONGTAU"] ?></td>
    <td><?php echo $row["DONVIQUANLY"] ?></td>
    <td><?php echo $row["HOTEN"] ?></td>
  </tr>
  <?php 
  }
    ?>
</table>
    
	
<div class="footer">
    		Phần mềm định vị tàu biển do sinh viên đại học Phan thiết viết
  		</div>
 
   
   


