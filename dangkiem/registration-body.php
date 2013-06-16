<table id="tbl-data-list-ship" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Stt</th>
      <th>Mã tàu</th>
      <th>Tên tàu</th>
      <th>Loại tàu</th>
      <th>Tải trọng</th>
      <th>Công suất</th>
      <th>Năm đóng tàu</th>
      <th>Đơn vị quản lý</th>
      <th>Chủ tàu</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<div id="modal-add-ship" class="modal-right-util">
  <div class="header-modal">
    <span class="label label-inverse modal-close"><i class="icon-remove icon-white"></i></span>
    Thông tin tàu đăng kiểm
  </div>
  <div class="content-modal">
    <div class="toolbar-modal">
      <button id="btn-save" class="btn btn-primary"><i class="icon-ok icon-white"></i> Lưu</button>
      <button id="btn-delete" class="btn btn-danger"><i class="icon-trash icon-white"></i> Xóa</button>
      <div id="popup-message" class="alert alert-success hide">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <span data-message="success"></span>
      </div>
    </div>
    <div class="body-modal form-horizontal">
      <table border="0" class="form-add">
        <colgroup>
          <col style="width: 11%;" />
          <col />
          <col style="width: 8%;" />
          <col />
          <col style="width: 10%;" />
          <col />
          <col style="width: 8%;" />
          <col />
          <col style="width: 10%;" />
          <col />
        </colgroup>
        <tr>
          <td class="tbl-title">Mã tàu</td><td><input class="input-medium" type="text" id="txt-ship-code" /></td>
          <td class="tbl-title">IME</td><td colspan="3"><input class="span12" type="text" id="txt-ship-ime" /></td>
          <td class="tbl-title">Tên tàu</td><td colspan="3"><input class="span12" type="text" id="txt-ship-name" /></td>
        </tr>
        <tr>
          <td class="tbl-title">Loại tàu</td>
          <td>
            <select id="cbx-ship-type" class="span12"></select>
            <!--<input class="input-medium" type="text" id="txt-ship-type"/>-->
          </td>
          <td class="tbl-title">Dài</td><td><input class="input-small" type="text" id="txt-ship-long" /></td>
          <td class="tbl-title">Rộng</td><td><input class="input-large" type="text" id="txt-ship-width" /></td>
          <td class="tbl-title">Công suất</td><td><input class="input-small" type="text" id="txt-ship-capacity" /></td>
          <td class="tbl-title">Tải trọng</td><td><input class="input-mini" type="text" id="txt-ship-weight" /></td>
        </tr>
        <tr>
          <td class="tbl-title">Đơn vị quản lý</td><td colspan="3"><input class="span12" type="text" id="txt-ship-unit"/></td>
          <td class="tbl-title">Hình đại diện</td><td colspan="3"><input class="span12" type="text" id="txt-ship-avt" /></td>
          <td class="tbl-title">Năm sản xuất</td><td><input class="input-mini" type="text" id="txt-year-build" /></td>
        </tr>
        <tr>
          <td class="tbl-title">Họ tên chủ tàu</td><td><input class="input-medium" type="text" id="txt-ship-owner"/></td>
          <td class="tbl-title">Mật khẩu</td><td><input class="input-small" type="password" id="txt-owner-password" /></td>
          <td class="tbl-title">Quê quán</td><td><input class="input-large" type="text" id="txt-owner-hometown" /></td>
          <td class="tbl-title">Điện thoại</td><td><input class="input-small" type="text" id="txt-owner-phone" /></td>
          <td class="tbl-title">Năm sinh</td><td><input class="input-mini" type="text" id="txt-owner-birthyear" /></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="footer-modal">
  </div>
</div>
<div id="pagination">
</div>
<script type="text/javascript" src="../js/ui/RegistrationControl.js"></script>