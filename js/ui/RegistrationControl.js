/**
 * @author nbchicong
 */
$(function(){
  $('.nav-list li').removeClass('active');
  $('.nav-list li:eq(1)').addClass('active');
  var btnCommon = '#btn-';
  var txtCommon = '#txt-';
  var tblCommon = '#tbl-';
  var url = {
    action: geturl('process/registration/RegistrationProcess')
  };
  var obj = {table: tblCommon+'data-list-ship'};
  var btn = {
    add: btnCommon+'add-new',
    save: btnCommon+'save',
    del: btnCommon+'delete'
  };
  var cbx = {type: '#cbx-ship-type'};
  var txt = {
    code: txtCommon+'ship-code',
    ime:  txtCommon+'ship-ime',
    name: txtCommon+'ship-name',
    longs:txtCommon+'ship-long',
    width:txtCommon+'ship-width',
    capacity: txtCommon+'ship-capacity',
    weight:   txtCommon+'ship-weight',
    unit: txtCommon+'ship-unit',
    avt:  txtCommon+'ship-avt',
    yearbuild:txtCommon+'year-build',
    owner:txtCommon+'ship-owner',
    pass: txtCommon+'owner-password',
    hometown: txtCommon+'owner-hometown',
    phone:txtCommon+'owner-phone',
    birthyear:txtCommon+'owner-birthyear'
  };
  var modal = {
    add: '#modal-add-ship'
  };
  var loadCategoryType = function(){
    var dt = {'action': 'loadcategoryshiptype'};
    $.postJSON(url.action, dt, function(type){
      var __html = '';
      for (var i=0; i < type.length; i++) {
        var __item = type[i].result;
        __html += '<option value='+__item.id+'>'+__item.name+'</option>';
      };
      $(cbx.type).html(__html);
    });
  }
  var loadDataListShip= function(table){
    var start = 0;
    var limit = 11;
    var total = 92;
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
      renderDataTable(table, true, __header, data, importDataToPopup);
      $('#loading-mask').hide();
      $('#loading').hide();
    });
  };
  var importDataToPopup = function(data){
    $(txt.ime).attr('disabled','disabled').addClass('disabled');
    $(txt.longs).attr('disabled','disabled').addClass('disabled');
    $(txt.width).attr('disabled','disabled').addClass('disabled');
    $(txt.avt).attr('disabled','disabled').addClass('disabled');
    $(txt.pass).attr('disabled','disabled').addClass('disabled');
    $(txt.hometown).attr('disabled','disabled').addClass('disabled');
    $(txt.phone).attr('disabled','disabled').addClass('disabled');
    $(txt.birthyear).attr('disabled','disabled').addClass('disabled');
    $(txt.code).val(data.children(':eq(1)').text());
    $(txt.name).val(data.children(':eq(2)').text());
    $(txt.capacity).val(data.children(':eq(5)').text());
    $(txt.weight).val(data.children(':eq(4)').text());
    $(txt.unit).val(data.children(':eq(7)').text());
    $(txt.yearbuild).val(data.children(':eq(6)').text());
    $(txt.owner).val(data.children(':eq(8)').text());
    showPopup(modal.add);
  }
  $(btn.add).click(function(){
    showPopup(modal.add);
  });
  loadCategoryType();
  loadDataListShip(obj.table);
});
