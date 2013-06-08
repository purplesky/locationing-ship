<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Xem bản đồ</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAPDUET0Qt7p2VcSk6JNU1sBSM5jMcmVqUpI7aqV44cW1cEECiThQYkcZUPRJn9vy_TWxWvuLoOfSFBw" type="text/javascript"></script>
    <script src="epoly.js" type="text/javascript"></script>
    </head>
<body>
<?php include("header.php"); 
include("body-form2.php");
?><div class="">
<table class="table table-bordered table table-hover" width="98%" border="0" cellpadding="1">
 <tr class="info">
    <td colspan="5" class="info"><font face="Times New Roman, Times, serif" color="#FF0000" size="+2"><b>XEM BẢN ĐỒ HÀNH TRÌNH</b></font></td>
    <td colspan="5" class="info" ><b><right>MAP API GOOGLE</right></b></td>
  </tr>
  <tr class="success">
    <td colspan="2"><input type="text" id="startpoint" name="matau" placeholder="Nhập mã tàu cần xem" value="BTh001">
</td>
    <td colspan="2" class="info" ><b><right><div class="input-append">
    <?php ;
$matau=$_POST["matau"];
		$load="SELECT * FROM  dvtb_chitiet";
		echo $load;
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($load);
		$row = mysql_fetch_array($rs);
?>
  <input class="span2" name = "toadohientai" id="appendedInputButton endpoint" type="text" placeholder="Tọa độ hiện tại" value="<?php echo $row["TOADOX"];?>"><button class="btn" type="submit" >XEM NÀO</button></td>
    <td colspan="3" class="info"><div id="distance">Miles: 0.00</div></font></td>
    <td colspan="3" class="info" ><b><right><div id="step">&nbsp;</div></right></b></td>
  </tr><tr>
  <div id="map" style="width: 950px; height: 350px"></div></tr>
    
 <!--MAP HERE-->
</div>
    <form class="form-search" onsubmit="start();return false" action="#">
  <div class="input-append">
    <input type="text" size="80" maxlength="200" id="endpoint" value="Hollywood Hills Rd, 90046@34.11327,-118.39089" class="span2 search-query" >
    <button type="submit" class="btn" value="Start">Search</button>
  </div>
  </form>
</body>
</html>