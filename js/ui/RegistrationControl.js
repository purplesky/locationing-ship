/**
 * @author nbchicong
 */
$(function(){
  $('.nav-list li').removeClass('active');
  $('.nav-list li:eq(1)').addClass('active');
  var btnCommon = 'btn-';
  var txtCommon = 'txt-';
  var tblCommon = 'tbl-';
  var url = {
    action: geturl('process/registration/RegistrationProcess'),
  };
  var obj = {
    table: '#'+tblCommon+'data-list-ship'
  }
  function loadDataListShip(table){
    var start = 0;
    var limit = 11;
    var total = 92;
    var forward = 'Trang trước';
    var next = 'Trang sau';
    var dt = {
      'action' : 'getlistshipregistered',
      'start'  : start || 0,
      'limit'  : limit || 30
    };
    $.postJSON(url.action, dt, function(data){
      total = data.length;
      $('#loading-mask').show();
      $('#loading-msg').text('Loading data...');
      $('#loading').show();
      var __header = ['Mã tàu','Tên tàu','Loại tàu','Tải trọng','Công suất','Năm đóng tàu','Đơn vị quản lý','Chủ tàu'];
      renderDataTable(table, true, __header, data);
      $('#loading-mask').hide();
      $('#loading').hide();
    });
    
    console.log(total);
  }
  loadDataListShip(obj.table);
});
