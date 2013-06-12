<?php include "../core/include/connect.php"; ?>
<div id="management-info">
  <div id="out-to-sea" class="alert alert-error">
    <i class="icon-warning-sign"></i> Tàu đang trên biển
    <span class="badge badge-important pull-right">
      <?php
        $sql = "SELECT * FROM dvtb_tauonline";
        $result = mysql_query($sql);
        $dem = mysql_num_rows($result);
        echo $dem;
      ?>
    </span>
  </div>
  <div id="under-control" class="alert alert-success">
    <i class="icon-facetime-video"></i> Tàu thuộc quyền kiểm soát 
    <span class="badge badge-success pull-right">
      <?php
        $sql = "SELECT * FROM dvtb_chung";
        $result = mysql_query($sql);
        $dem = mysql_num_rows($result);
        echo $dem;
      ?>
    </span>
  </div>
  <div id="transfer-signal" class="alert alert-success">
    <i class="icon-resize-small"></i> Tàu đang truyền tín hiệu 
    <span class="badge badge-success pull-right"> 
      <?php
        $sql = "SELECT * FROM dvtb_lichtrinh";
        $result = mysql_query($sql);
        $dem = mysql_num_rows($result);
        echo $dem;
      ?>
    </span>
  </div>
  <div id="user-online" class="alert alert-info">
    <i class="icon-user"></i> Người dùng online 
    <span class="badge badge-info pull-right"> 
      <?php/*
        * Khong connect duoc, m dua len host thi mo 2 nut comment ra cho no chay, voi xoa so 0 o duoi di
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
        echo $user;
        */
      ?>
      0
    </span>
  </div>
  <br class="clearfix" />
</div>