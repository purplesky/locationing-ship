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
 */
var renderDataTable = function(table, stt, header, data, fn) {
  var __thead = '<tr class="info">';
  var __tbody = '<tr>';
  __thead += stt ? '<th>Stt</th>' : '';
  for (var i = 0; i < (data.length - 1); i++) {
    __tbody += '<tr><td>' + (i + 1) + '</td>';
    for (var k = 0; k < header.length; k++) {
      __thead += i == 0 ? '<th>' + header[k] + '</th>' : '';
      __tbody += '<td>' + data[i][k] + '</td>';
    }
    __tbody += '</tr>';
  }
  __thead += '</tr>';
  $(table).find('thead').html(__thead);
  $(table).find('tbody').html(__tbody);
  var $tr = $(table).find('tbody').children('tr');
  $tr.click(function() {
    fn($(this));
  });
}; 
var showPopup = function(popup){
  var top = $('table[id*=tbl]').offset().top;
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
  var that = $this.parent().parent(),
  width = that.width();
  that.animate({
    'right': -(width+50)
  },{duration: 300}).fadeOut();
  $('#loading-mask').hide();
  setTimeout(function(){
    that.find('input').val('');
  },500);
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
    hidePopup($(this));
  });
});
