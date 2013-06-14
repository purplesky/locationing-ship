<div class="container login-page">
  <div class="login-form">
    <legend>Đăng nhập hệ thống</legend>
    <div class="alert alert-error hide">
      <a class="close" data-dismiss="alert" href="#">×</a><span id="login-status"> </span>
    </div>
    <form method="POST" action="" accept-charset="UTF-8">
      <div class="input-prepend">
        <span class="add-on">TÊN ĐĂNG NHẬP</span>
        <input type="text" id="txt-ship-code" class="input-xlarge" value="" name="username" placeholder="Tên đăng nhập">
      </div>
      <div class="input-prepend">
        <span class="add-on">MẬT KHẨU</span>
        <input type="password" id="txt-ship-pass" class="input-xlarge" value="" name="password" placeholder="Mật khẩu">
      </div>
      <div class="control-group">
        <label class="checkbox">
          <input type="checkbox" name="remember" value="true"> Ghi nhớ tôi
        </label>
        <div class="controls">
          <button type="reset" name="reset" class="btn btn-large"><i class="icon-refresh"> </i> Xóa trắng</button>
          <button type="button" id="btn-login" name="submit" class="btn btn-primary btn-large"><i class="icon-play-circle icon-white"> </i> Đăng nhập</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript" src="../js/ui/LoginControl.js"></script>
