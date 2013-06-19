//>>>>>>>> Declare Object
//>>>>>>>>>>>>>>>>>>>>>>>
var dvtb = {
  resource: {
    login: {},
    message: {},
    define: {}
  },
  owner: {},
  member: '',
  domain : document.location.origin,
  URL : document.URL,
  title : document.title,
  path: window.location.pathname,
  prefix : 'location-ship'
}; 

//>>>>>>>> Declare Function
//>>>>>>>>>>>>>>>>>>>>>>>>>
var emptyFn = function(){};
var isEmpty = function(v){
  return v==''||v==' ';
}
/**
 * Convert Date Time to Long Date
 * Time format hh:mm:ss dd/mm/yyyy
 * @param {Object} strDateTime
 */
var convertDateTimeToLong = function(strDateTime) {
  var strTime = strDateTime.split(" ")[0];
  var strDate = strDateTime.split(" ")[1];
  var stringDateTime = "" + strDate.split("/")[2] + "/"
      + strDate.split("/")[1] + "/" + strDate.split("/")[0] + " "
      + strTime;
  return new Date(stringDateTime).getTime();
};
/**
 * Convert Long to Date Time
 * Time format hh:mm:ss dd/mm/yyyy
 * @param {Object} numLong
 */
var convertLongToDateTime = function(numLong){
  var numLong = parseFloat(numLong);
  return new Date(numLong).toString("HH:mm dd/MM/yyyy");
};
/**
 * @param {Object} path
 */
var geturl = function(path){
  var url = dvtb.domain;
  var pathname = dvtb.path;
  if (pathname.length > 1) {
    var position = pathname.indexOf('/', 1);
    if (position == 0)
      position = pathname.length;
    url += pathname.substr(0, position);
  }
  var prefix = dvtb.prefix || '';
  var ext = dvtb.ext || '.php';
  if(path.indexOf('/')==0){
    return url + path + ext;
    // return url + '/' + prefix + path + ext;
  }else{
    return url + '/' + path + ext;
    //return url + '/' + prefix + '/' + path + ext;
  }
};
/** 
 * @param {Object} that
 */
var checkEmpty = function(that) {
  if (that.val() == '' || that.val() == ' ') {
    return true;
  } else {
    return false;
  }
};
/**
 * @param {Object} table
 * @param Boolean  stt
 * @param {Object} header
 * @param {Object} data
 * @param {Object} fn
 */
var renderDataTable = function(table, stt, header, data, fn) {
  $('#loading-mask').show();
  $('#loading-msg').text('Loading data...');
  $('#loading').show(); 
  var __thead = '<tr class="info">';
  var __tbody = '';
  __thead += stt ? '<th>Stt</th>' : '';
  for (var k = 0; k < header.length; k++) {
    __thead += '<th>' + header[k] + '</th>';
  }
  __thead += '</tr>';
  for (var i=0; i < data.length; i++) {
    __tbody += '<tr data-code="'+Math.floor((Math.random()*10000)*data[i].length)+'">';
    __tbody += stt ? '<td class="show">' + (i + 1) + '</td>' : '';
    var count = 0;
    while(count<data[i].length){
      __tbody += '<td class='+data[i][++count]+'>' + data[i][--count] + '</td>';
      count+=2;
    }
    __tbody += '</tr>';
  };
  $(table).find('thead').html(__thead);
  $(table).find('tbody').html(__tbody);
  $('#loading-mask').hide();
  $('#loading').hide();
  var $tr = $(table).find('tbody').children('tr');
  $tr.click(function() {
    fn($(this));
  });
}; 
var showPopup = function(popup){
  var top = $('.content-cus').offset().top;
  $('#loading-mask').show();
  $(popup).css({
    'top' : top
  }).show().animate({
    right : 0
  }, {
    duration : 300
  }); 
};
var hidePopup = function($this){
  var that = $this,
  width = that.width();
  that.animate({
    'right': -(width+5)
  },{duration: 300}).fadeOut();
  setTimeout(function(){
    $('#loading-mask').hide();
    that.find('input').val('');
    $('button[id*="btn"]').
    removeAttr('disabled').
    removeClass('disabled').show();
  },200);
};
var setMessage = function(message, dest, type){
  $(dest).find('span[data-message]').text(message);
  if(type=='error'){
    $(dest).removeClass('alert-success').addClass('alert-error');
  }else if(type=='success'){
    $(dest).removeClass('alert-error').addClass('alert-success');
  }else{
    $(dest).addClass('alert-warning');
  }
  $(dest).show();
  setTimeout(function(){
    $(dest).fadeOut(2000);
  },3000);
};
(function(){
  /**
   * @param {Object} url
   * @param {Object} data
   * @param {Object} fn
   */
  $.postJSON = function(url, data, fn){
    var __fn = fn || emptyFn;
    $.post(url, data, function(json){__fn(json)}, 'json');
  };
})();
$(function(){
  $('span[class*=modal-close]').click(function(){
    hidePopup($(this).parent().parent());
  });
});
