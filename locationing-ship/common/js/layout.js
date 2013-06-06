/**
 * @author nbchicong
 * File: layout.js
 */
$(function(){
  var mngInfo = {
    out: '#out-to-sea',
    ctrl: '#under-control',
    transfer: '#transfer-signal',
    user: '#user-online'
  };
  var dvtb = {
    domain: document.location.origin,
    URL: document.URL,
    title: document.title,
    prefix: 'locationing-ship'
  };
  var customIcons = {
    vantaibien : {
      icon : dvtb.domain+'/'+dvtb.prefix+'/images/maker/maker3.png',
      //shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
    },
    tauchuyendung : {
      icon : dvtb.domain+'/'+dvtb.prefix+'/images/maker/maker4.png',
      //shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
    },
    danhbat : {
      icon : dvtb.domain+'/'+dvtb.prefix+'/images/maker/maker5.png',
      //shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
    }
  }; 
  var changeStatusOn = function() {
    $(mngInfo.out).find('span').removeClass('badge-important').addClass('badge-warning');
    $(mngInfo.ctrl).find('span').removeClass('badge-success').addClass('badge-warning');
    $(mngInfo.transfer).find('span').removeClass('badge-success').addClass('badge-warning');
    $(mngInfo.user).find('span').removeClass('badge-info').addClass('badge-warning');
  }; 
  var changeStatusOff = function() {
    $(mngInfo.out).find('span').removeClass('badge-warning').addClass('badge-important');
    $(mngInfo.ctrl).find('span').removeClass('badge-warning').addClass('badge-success');
    $(mngInfo.transfer).find('span').removeClass('badge-warning').addClass('badge-success');
    $(mngInfo.user).find('span').removeClass('badge-warning').addClass('badge-info');
  }; 
  setInterval(function() {
    var now = new Date();
    var year = 2013;
    var second = now.getSeconds();
    year = now.getFullYear();
    if (second % 2 == 0) {
      changeStatusOn();
    } else {
      changeStatusOff();
    }
    $('#htdvtb-year').text(year);
  }, 1000); 
  
  // set map size =============
  $('#htdvtb-map').css({"width":"1026px","height":"550px"});
  // import htdvtb map ========
  //---------------------------
  
  function bindInfoWindow(marker, map, infoWindow, html) {
    google.maps.event.addListener(marker, 'click', function() {
      infoWindow.setContent(html);
      infoWindow.open(map, marker);
    });
  }
  function downloadUrl(url, callback) {
    var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };
    request.open('GET', url, true);
    request.send(null);
  }
  function doNothing() {}
  
  function load() {
    var map = new google.maps.Map(document.getElementById("htdvtb-map"), {
      center : new google.maps.LatLng(10.933156767704759, 108.12957173407925),
      zoom : 12,
      mapTypeId : 'roadmap'
    });
    var infoWindow = new google.maps.InfoWindow;
    // Change this depending on the name of your PHP file
    downloadUrl("phpsqlajax_genxml2.php", function(data) {
      var xml = data.responseXML;
      var markers = xml.documentElement.getElementsByTagName("marker");
      for (var i = 0; i < markers.length; i++) {
        var name = markers[i].getAttribute("name");
        var lng = markers[i].getAttribute("lng");
        var lat = markers[i].getAttribute("lat");
        var address = markers[i].getAttribute("address");
        var type = markers[i].getAttribute("type");
        var huonggio = markers[i].getAttribute("huonggio");
        var nhietdo = markers[i].getAttribute("nhietdo");
        var point = new google.maps.LatLng(parseFloat(markers[i].getAttribute("lat")), parseFloat(markers[i].getAttribute("lng")));
        var html = "<b>MÃ TÀU: </b>" + name + " <br/><b>Kinh độ: </b>" + lng + " <br/><b>Vĩ độ: </b>" + lat + "<br/><b>Loại tàu: </b>" + type + "<br/><b>Nhiệt độ: </b>" + nhietdo;
        var icon = customIcons[type] || {};
        var marker = new google.maps.Marker({
          map : map,
          position : point,
          icon : icon.icon,
          shadow : icon.shadow
        });
        bindInfoWindow(marker, map, infoWindow, html);
      }
    });
  }
  load();
});
