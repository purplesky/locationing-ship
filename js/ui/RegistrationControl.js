/**
 * @author nbchicong
 */
$(function(){
  $('.nav-list li').removeClass('active');
  $('.nav-list li:eq(1)').addClass('active');
  var btnCommon = 'btn-';
  var txtCommon = 'txt-';
  var tblCommon = 'tbl-';
  var start = 0;
  var limit = 12;
  var url = {
    action: geturl('process/registration/RegistrationProcess'),
  };
  var obj = {
    table: '#'+tblCommon+'data-list-ship'
  }
  function loadDataListShip(table){
    var dt = {
      'action' : 'getlistshipregistered',
      'start'  : start || 0,
      'limit'  : limit || 30
    };
    $.postJSON(url.action, dt, function(data){
      var __html = '';
      console.log(data);
      for (var i=0; i < data.length; i++) {
        var __item = data[i].data;
        __html += '<tr><td>'+(i+1)+'</td><td>'+__item.code+'</td><td>'+__item.shipname+'</td><td>'+
                  __item.shiptype+'</td><td>'+__item.weight+'</td></td>'+__item.capacity+'</td><td>'+
                  __item.yearbuild+'</td><td>'+__item.unit+'</td><td>'+__item.ownname+'</td></tr>';
      };
      $(table).children('tbody').html(__html);
    });
  }
  loadDataListShip(obj.table);
});
