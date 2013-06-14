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
      $('#loading-mask').show();
      $('#loading-msg').text('Loading data...');
      $('#loading').show();
      var __header = ['Mã tàu','Tên tàu','Loại tàu','Tải trọng','Công suất','Năm đóng tàu','Đơn vị quản lý','Chủ tàu'];
      renderDataTable(obj.table, true, __header, data);
      $('#loading-mask').hide();
      $('#loading').hide();
    });
  }
  loadDataListShip(obj.table);
});
