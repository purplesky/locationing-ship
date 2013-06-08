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
  prefix : 'locationing-ship'
}; 

//>>>>>>>> Declare Function
//>>>>>>>>>>>>>>>>>>>>>>>>>
dvtb.emptyFn = function(){};
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
(function(){
  /**
   * @param {Object} url
   * @param {Object} data
   * @param {Object} callback
   */
  $.postJSON = function(url, data, callback){
    var __callback = callback || dvtb.emptyFn;
    $.post(url, data, function(json){__callback(json)}, 'json');
  };
})();
