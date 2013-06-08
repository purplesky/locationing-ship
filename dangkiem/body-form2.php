<!-- BẮT ĐẦU THANH NAVBAR
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse " >
            <ul class="nav">
               <div  align="center"> <a  class="brand" href="#"><font face="Times New Roman, Times, serif" color="White"><marquee>HỆ THỐNG QUẢN LÝ - ĐỊNH VỊ TÀU BIỂN</marquee></font></a>    
            </ul>
          </div>
        </div>   
      </div>
    </div>

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
$dem= mysql_num_rows($result); echo $dem ?></font> tàu thuộc quyền kiểm soát</a></li></li>
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
          <li><a href="../tdtt"><i class="icon-signal"></i> THEO DÕI THỜI TIẾT</a></li>
          <li><a href="../tdtt"><i class="icon-signal"></i> SAO LƯU PHỤC HỒI DỮ LIỆU</a></li>
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
   
      <div class="span11 ">
     <!-- <div class="hero-unit  ">-->
<div class="center"><br><p><table class="table table-bordered"  bgcolor="#0066FF" width="98%" border="0" cellpadding="0">
<tr class="warning">
    <td align=""><center><font face="Times New Roman, Times, serif" color="#FF0000" size="+2"><b>HỆ THỐNG QUẢN LÝ - ĐỊNH VỊ TÀU BIỂN</b></font></center></td>
  </tr>
   </div> 
   </div> 
   </div>
   <div class="container-fluid">
   <div class="container"> 
    <!-- BẮT ĐẦU MENU TRÁI
    ================================================== -->
     <div class="row">
      <div class="span3 bs-docs-sidebar">
</div></div>
 
   
   


