/**
 * @author nbchicong
 */
$(function(){
  var btnCommon = 'btn-';
  var txtCommon = 'txt-';
  var btn = {
    login: '#'+btnCommon+'login'
  };
  var url = geturl('process/login/LoginProcess');
  var txt = {
    code: '#'+txtCommon+'ship-code',
    secr: '#'+txtCommon+'ship-pass',
    stts: '#login-status'
  };
  // Validate
  $(txt.code).keyup(function(){
    if(checkEmpty($(this))){
      $(txt.stts).text(dvtb.resource.login.emptyCode);
      $(txt.stts).parent().show();
      return false;
    }else{
      $(txt.stts).parent().hide();
      return true;
    }
  });
  $(txt.secr).keyup(function(){
    if(checkEmpty($(this))){
      $(txt.stts).text(dvtb.resource.login.emptyPass);
      $(txt.stts).parent().show();
      return false;
    }else{
      $(txt.stts).parent().hide();
      return true;
    }
  });
  // Login Submit
  $(btn.login).click(function(){
    var dt = {
      shipcode: $(txt.code).val(),
      shippass: $(txt.secr).val()
    };
    $.postJSON(url, dt, function(data){
      if(!!data){
        if (data.status=='SUCCESS'){
          dvtb.member = data.code;
          window.location.href = geturl(data.file);
        }
        if (data.status=='FAILED'){
          $(txt.stts).text(dvtb.resource.login.errorLogin);
          $(txt.stts).parent().show();
          return false;
        }
      }else{
        $(txt.stts).text(dvtb.resource.login.error);
        $(txt.stts).parent().show();
      }
    });
  });
});
