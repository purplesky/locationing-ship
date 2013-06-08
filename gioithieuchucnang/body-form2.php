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
               <div  align="center"> <a  class="brand" href="#"><font face="Times New Roman, Times, serif">HỆ THỐNG QUẢN LÝ - ĐỊNH VỊ TÀU BIỂN</font></a>    
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
   
      <div class="span11 ">
     <!-- <div class="hero-unit  ">-->
<div class="center"><table class="table table-bordered"  bgcolor="#0066FF" width="98%" border="0" cellpadding="0">
<tr class="warning">
    <td align=""><center><font face="Times New Roman, Times, serif" color="#FF0000" size="+2"><b>HỆ THỐNG QUẢN LÝ - ĐỊNH VỊ TÀU BIỂN</b></font></center></td>
  </tr>
  </table>
<div class="accordion" id="accordion2">
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                      Quản lý đăng kiểm
                    </a>
                  </div>
                  <div id="collapseOne" class="accordion-body collapse in">
                    <div class="accordion-inner">
                      <p class="text-error">Ở chức năng này cho phép cơ quan chủ quản có thể <strong>Thêm</strong>, <strong>Xóa</strong> ,<strong>Sửa</strong> thông tin của các tàu thuộc quyền kiểm soát của mình.<br>
                      - Khi đóng mới một tàu thì chủ tàu có trách nhiệm đăng ký với đồn biên phòng thong tin của tàu mình, từ thông tin đó đòn biên phòng cung cấp cho chủ tàu một mã tàu và một mật khẩu để đăng nhập hệ thống bằng chức năng đăng kiểm mới.tất cả thông tin có được sẽ được phân loại và lưu xuống 2 bảng chính trong CSDL.<br>
                      - Khi chủ thể một tàu không còn muốn sở hữu tàu của mình nữa và bán cho người khác trách nhiệm trước tiên là 2 bên đến biên phòng đăng ký chuyển nhượng thay đôi thông tin chủ thể.trách nhiệm còn lại biên phòng thực hiện chức năng Sửa thông tin cho phù hợp và dễ kiểm soát.<br>
- Khi một tàu nào đã hết khả năng hoạt động và không thể bán.Đồn biên phòng thực hiện thao tác Xóa thông tin của tàu đó trong CSDL.</p>

                    </div>
                  </div>
                </div>
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                      Quản lý lịch trình ra vào
                    </a>
                  </div>
                  <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                      Thống kê theo dõi
                    </a>
                  </div>
                  <div id="collapseThree" class="accordion-body collapse">
                    <div class="accordion-inner">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
              </div>
            </div>

<!--Trợ giúp thêm-->
<!-- Button to trigger modal -->
<a href="#myModal" role="button" class="btn" data-toggle="modal">Test play</a>
 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><font color="#0099FF">HỆ THỐNG QUẢN LÝ - ĐỊNH VỊ TÀU BIỂN</font></h3>
  </div>
  <div class="modal-body">
<div class=" controls-row">
  <input class="span1"  id="disabledInput" type="email" placeholder="Mã tàu" disabled="disabled">
  <input class="span5" type="text" placeholder=".span5">
  <input class="span1" type="text" placeholder=".span1">
  <input class="span4" type="text" placeholder=".span4">
  <input class="span2" type="text" placeholder=".span2">
  <input class="span3" type="text" placeholder=".span3">
  <input class="span3" type="text" placeholder=".span3">
  <input class="span2" type="text" placeholder=".span2">
  <input class="span4" type="text" placeholder=".span4">
  <input class="span1" type="text" placeholder=".span1">
  <input class="span5" type="email" required>
</div>
  </div>
  		<div class="modal-footer">
    		<button class="btn" data-dismiss="modal" aria-hidden="true">Hủy</button>
    		<button class="btn btn-primary">Cập nhật</button>
  		</div>
</div>
<!--Hết trợ giúp thêm-->

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
 
   
   


