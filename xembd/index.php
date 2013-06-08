

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../assets/css/docs.css" rel="stylesheet">
    <link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
    <script src="../assets/js/bootstrap-affix.js"></script>

    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="../apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="../apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="../apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
<!--  thu  -->
<SCRIPT language=JavaScript><!-- Begin//Animated Window- By Rizwan Chand (rizwanchand@hotmail.com)//Modified by DD for NS compatibility//Visit http://www.dynamicdrive.com for this scriptfunction expandingWindow(website) {var windowprops='width=100,height=100,scrollbars=yes,status=yes,resizable=yes'var heightspeed = 2; // vertical scrolling speed (higher = slower)var widthspeed = 7;  // horizontal scrolling speed (higher = slower)var leftdist = 10;    // distance to left edge of windowvar topdist = 10;     // distance to top edge of windowif (window.resizeTo&&navigator.userAgent.indexOf("Opera")==-1) {var winwidth = window.screen.availWidth - leftdist;var winheight = window.screen.availHeight - topdist;var sizer = window.open("","","left=" + leftdist + ",top=" + topdist +","+ windowprops);for (sizeheight = 1; sizeheight < winheight; sizeheight += heightspeed)sizer.resizeTo("1", sizeheight);for (sizewidth = 1; sizewidth < winwidth; sizewidth += widthspeed)sizer.resizeTo(sizewidth, sizeheight);sizer.location = website;}elsewindow.open(website,'mywindow');}//  End --></SCRIPT>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Google Maps</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAPDUET0Qt7p2VcSk6JNU1sBSM5jMcmVqUpI7aqV44cW1cEECiThQYkcZUPRJn9vy_TWxWvuLoOfSFBw" type="text/javascript"></script>
    <script src="epoly.js" type="text/javascript"></script>
  </head>
  <body onunload="GUnload()">
  <?php include("body-form2.php"); ?>
    <table class="table-bordered" ><tr>
    <div id="controls">
    </div>
    <div>    <form class="form-search" onsubmit="start();return false" action="#" >
  <div class="input-append">
  <input type="text" placeholder="Nhập mã tàu cần xem">
 
  <input type="text" size="80" maxlength="50" id="startpoint" value="268 Nguyen Thong Phu Hai Phan Thiet Binh Thuan" class="span3" >
     <?php ;
$matau=$_POST["matau"];
		$load="SELECT * FROM  dvtb_chitiet";
		
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($load);
		$row = mysql_fetch_array($rs);
?>
    <input type="text" size="80" maxlength="200" id="endpoint" value="<?php echo $row["TOADOX"];?>" class="span3" >
    <button type="submit" class="btn" value="Start">XEM HÀNH TRÌNH</button>
  </div>
  </form></div>
  <div><div class="">
<table class="table table-bordered table table-hover" width="98%" border="0" cellpadding="1">
 <tr class="info">
    <td colspan="5" class="info"><font face="Times New Roman, Times, serif" color="#FF0000" size="+2"><b>XEM BẢN ĐỒ HÀNH TRÌNH</b></font></td>
    </div>

<tr> 
<td>
    <div id="map" style="width: 930px; height: 380px"></div>
 
    <div id="step">&nbsp;</div>
    <div id="distance">Dặm: 0.00</div>

    <script type="text/javascript">
    //<![CDATA[
    if (GBrowserIsCompatible()) {
 
      var map = new GMap2(document.getElementById("map"));
      map.addControl(new GMapTypeControl());
      map.setCenter(new GLatLng(0,0),2);
      var dirn = new GDirections();
      var step = 5; // metres
      var tick = 100; // milliseconds
      var poly;
      var poly2;
      var lastVertex = 0;
      var eol;
      var car = new GIcon();
          car.image="caricon.png"
          car.iconSize=new GSize(32,18);
          car.iconAnchor=new GPoint(16,9);
      var marker;
      var k=0;
      var stepnum=0;
      var speed = "";   

      function updatePoly(d) {
        // Spawn a new polyline every 20 vertices, because updating a 100-vertex poly is too slow
        if (poly2.getVertexCount() > 20) {
          poly2=new GPolyline([poly.getVertex(lastVertex-1)]);
          map.addOverlay(poly2)
        }

        if (poly.GetIndexAtDistance(d) < lastVertex+2) {
           if (poly2.getVertexCount()>1) {
             poly2.deleteVertex(poly2.getVertexCount()-1)
           }
           poly2.insertVertex(poly2.getVertexCount(),poly.GetPointAtDistance(d));
        } else {
          poly2.insertVertex(poly2.getVertexCount(),poly.getVertex(lastVertex++));
        }
      }

      function animate(d) {
        if (d>eol) {
          document.getElementById("step").innerHTML = "<b>Xong! Điểm cuối cùng của tàu ở vị trí B </b>";
          document.getElementById("distance").innerHTML =  "Miles: "+(d/1609.344).toFixed(2);
          return;
        }
        var p = poly.GetPointAtDistance(d);
        if (k++>=180/step) {
          map.panTo(p);
          k=0;
        }
        marker.setPoint(p);
        document.getElementById("distance").innerHTML =  "Miles: "+(d/1609.344).toFixed(2)+speed;
        if (stepnum+1 < dirn.getRoute(0).getNumSteps()) {
          if (dirn.getRoute(0).getStep(stepnum).getPolylineIndex() < poly.GetIndexAtDistance(d)) {
            stepnum++;
            var steptext = dirn.getRoute(0).getStep(stepnum).getDescriptionHtml();
            document.getElementById("step").innerHTML = "<b>Tiếp theo:<\/b> "+steptext;
            var stepdist = dirn.getRoute(0).getStep(stepnum-1).getDistance().meters;
            var steptime = dirn.getRoute(0).getStep(stepnum-1).getDuration().seconds;
            var stepspeed = ((stepdist/steptime) * 2.24).toFixed(0);
            step = stepspeed/2.5;
            speed = "<br>Tốc độ: " + stepspeed +" mph";
          }
        } else {
          if (dirn.getRoute(0).getStep(stepnum).getPolylineIndex() < poly.GetIndexAtDistance(d)) {
            document.getElementById("step").innerHTML = "<b>Next: Arrive at your destination<\/b>";
          }
        }
        updatePoly(d);
        setTimeout("animate("+(d+step)+")", tick);
      }

      GEvent.addListener(dirn,"load", function() {
        document.getElementById("controls").style.display="none";
        poly=dirn.getPolyline();
        eol=poly.Distance();
        map.setCenter(poly.getVertex(0),17);
        map.addOverlay(new GMarker(poly.getVertex(0),G_START_ICON));
        map.addOverlay(new GMarker(poly.getVertex(poly.getVertexCount()-1),G_END_ICON));
        marker = new GMarker(poly.getVertex(0),{icon:car});
        map.addOverlay(marker);
        var steptext = dirn.getRoute(0).getStep(stepnum).getDescriptionHtml();
        document.getElementById("step").innerHTML = steptext;
        poly2 = new GPolyline([poly.getVertex(0)]);
        map.addOverlay(poly2);
        setTimeout("animate(0)",2000);  // Allow time for the initial map display
      });

      GEvent.addListener(dirn,"error", function() {
        alert("Location(s) not recognised. Code: "+dirn.getStatus().code);
      });

      function start() {
        var startpoint = document.getElementById("startpoint").value;
        var endpoint = document.getElementById("endpoint").value;
        dirn.loadFromWaypoints([startpoint,endpoint],{getPolyline:true,getSteps:true});
      }

    }

    // This Javascript is based on code provided by the
    // Community Church Javascript Team
    // http://www.bisphamchurch.org.uk/   
    // http://econym.org.uk/gmap/

    //]]>
    </script>
    </td>
    </tr>
    </table>
    
  </body>

</html>




