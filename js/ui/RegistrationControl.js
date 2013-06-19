/**
 * @author nbchicong
 */
$(function(){
  $('.nav-list li').removeClass('active');
  $('.nav-list li:eq(1)').addClass('active');
  var btnCommon = '#btn-',
      txtCommon = '#txt-',
      tblCommon = '#tbl-',
      url = {
        action: geturl('process/registration/RegistrationProcess')
      },
      obj = {
        table: tblCommon+'data-list-ship',
        popupmsg: '#popup-message',
        contentmsg: '#content-message'
      },
      owner = {},
      btn = {
        add: btnCommon+'add-new',
        save: btnCommon+'save',
        del: btnCommon+'delete'
      },
      cbx = {type: '#cbx-ship-type'},
      txt = {
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
      },
      modal = {
        add: '#modal-add-ship'
      },
      loadCategoryType = function(){
        var dt = {'action': 'loadcategoryshiptype'};
        $.postJSON(url.action, dt, function(type){
          var __html = '';
          for (var i=0; i < type.length; i++) {
            var __item = type[i].result;
            __html += '<option value='+__item.id+'>'+__item.name+'</option>';
          };
          $(cbx.type).html(__html);
        });
      },
      loadDataListShip= function(table){
        var start = 0;
        var limit = 99;
        var total = 92;
        var dt = {
          'action' : 'getlistshipregistered',
          'start'  : start || 0,
          'limit'  : limit || 30
        };
        $.postJSON(url.action, dt, function(data){
          total = data.length;
          var __header = ['Mã tàu','Tên tàu','Loại tàu','Tải trọng','Công suất','Năm đóng tàu','Đơn vị quản lý','Chủ tàu'];
          renderDataTable(table, true, __header, data, importDataToPopup);
        });
      },
      importDataToPopup = function(data){
        owner.uuid = data.children(':eq(1)').text();
        $(txt.ime).attr('disabled','disabled').addClass('disabled').val(data.children(':eq(9)').text());
        $(txt.longs).attr('disabled','disabled').addClass('disabled').val(data.children(':eq(10)').text());
        $(txt.width).attr('disabled','disabled').addClass('disabled').val(data.children(':eq(11)').text());
        $(txt.avt).val(data.children(':eq(12)').text());
        $(txt.pass).val(data.children(':eq(13)').text());
        $(txt.hometown).val(data.children(':eq(14)').text());
        $(txt.phone).val(data.children(':eq(15)').text());
        $(txt.birthyear).val(data.children(':eq(16)').text());
        $(txt.code).attr('disabled','disabled').addClass('disabled').val(data.children(':eq(1)').text());
        $(txt.name).val(data.children(':eq(2)').text());
        $(txt.capacity).val(data.children(':eq(5)').text());
        $(txt.weight).val(data.children(':eq(4)').text());
        $(txt.unit).val(data.children(':eq(7)').text());
        $(txt.yearbuild).val(data.children(':eq(6)').text());
        $(txt.owner).val(data.children(':eq(8)').text());
        $(cbx.type).attr('disabled','disabled').addClass('disabled');
        showPopup(modal.add);
      };
  $(btn.add).click(function(){
    owner.uuid = undefined;
    $(modal.add).find('input').removeAttr('disabled').removeClass('disabled');
    $(btn.del).hide();
    showPopup(modal.add);
  });
  $(btn.save).click(function(){
    var data = {
      'password' : $(txt.pass).val(),
      'shipime'  : $(txt.ime).val(),
      'shipname' : $(txt.name).val(),
      'shipavt'  : $(txt.avt).val(),
      'shiptype' : $(cbx.type).children(':selected').text(),
      'long'     : $(txt.longs).val(),
      'wide'     : $(txt.width).val(),
      'weight'   : $(txt.weight).val(),
      'capacity' : $(txt.capacity).val(),
      'province' : 'Bình Thuận',
      'yearbuil' : $(txt.yearbuild).val(),
      'unit'     : $(txt.unit).val(),
      'ownname'  : $(txt.owner).val(),
      'birhyear' : $(txt.birthyear).val(),
      'hometown' : $(txt.hometown).val(),
      'phone'    : $(txt.phone).val()
    };
    if(!!owner.uuid){
      data.action = 'updater';
      data.shipid = owner.uuid;
    }else{
      data.action = 'register';
      data.shipid = $(txt.code).val();
    }
    $.postJSON(url.action, data, function(jsonback){
      if(!!owner.uuid){
        if(!!jsonback && !!jsonback.status){
          if(jsonback.status=='ERROR-UPDATE-NOT-EXIST'){
            setMessage('Quá trình cập nhật dữ liệu không thành công, không tồn tại mã tàu!', obj.popupmsg, 'error');
          }else if(jsonback.status=='SUCCESS'){
            setMessage('Cập nhật dữ liệu thành công!', obj.contentmsg, 'success');
            loadDataListShip(obj.table);
            hidePopup($(modal.add));
          }
        }else{
          setMessage('Quá trình cập nhật dữ liệu không thành công, không tồn tại mã tàu!', obj.popupmsg, 'error');
        }
      }else{
        if(!!jsonback && !!jsonback.status){
          if(jsonback.status=='ERROR-CREATE-EXIST-CODE'){
            setMessage('Quá trình tạo dữ liệu không thành công, đã tồn tại mã tàu!', obj.popupmsg, 'error');
          }else if(jsonback.status=='SUCCESS'){
            setMessage('Tạo dữ liệu thành công!', obj.contentmsg, 'success');
            loadDataListShip(obj.table);
            hidePopup($(modal.add));
          }
        }else{
          setMessage('Quá trình tạo dữ liệu không thành công, đã tồn tại mã tàu!', obj.popupmsg, 'error');
        }
      };
    });
  });
  $(btn.del).click(function(){
    var data = {
      'action' : 'delete',
      'shipid' : owner.uuid
    };
    $.postJSON(url.action, data, function(jsonback){
      if(!!jsonback && !!jsonback.status){
        if(jsonback.status=='ERROR-DELETE-NOT-EXIST'){
          setMessage('Quá trình xóa dữ liệu không thành công, không tồn tại mã tàu!', obj.popupmsg, 'error');
        }else if(jsonback.status=='SUCCESS'){
          loadDataListShip(obj.table);
          hidePopup($(modal.add));
          setMessage('Xóa dữ liệu thành công!', obj.contentmsg, 'success');
        }
      }else{
        setMessage('Quá trình xóa dữ liệu không thành công, không tồn tại mã tàu!', obj.popupmsg, 'error');
      }
    });
  })
  loadDataListShip(obj.table);
  loadCategoryType();
});
