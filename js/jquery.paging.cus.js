(function($){
  $.fn.paging = function(config){
    var defaults = {
      pathname:location.pathname,
      type:'link',
      totalName:'total',
      total:10,
      limitName:'limit',
      limit:10,
      startName:'start',
      start:0,
      forward:"Trang trước",
      next:"Trang sau"
    };
    var o = $.extend(defaults, config);
    return this.each(function(){
      var $this = $(this);
      var pagination = '<div id="page" class="pagination"></div>';
      $this.append(pagination);
      var $pagination = $('#page');
      var num_of_page = (o.total / o.limit) > Math.floor(o.total / o.limit)? Math.floor(o.total / o.limit)+1:(o.total / o.limit);
      var __start = (o.start / o.limit) > Math.floor(o.start / o.limit)? Math.floor(o.start / o.limit)+1:(o.start / o.limit);
      var __url = o.pathname;
      var limitParam = '&'+o.limitName+'='+o.limit;
      var groupParam = (!!o.group && !!o.groupName)?'&'+o.groupName+'='+o.group:'';
      var __html = '<ul>';
      var __form = '<ul>';
      if((__start+1) > 1){
        var __herf =(__url +groupParam+'&'+o.startName+'='+(__start*o.limit - o.limit))+limitParam;
        __html += '<li id="pag-forward"><a href="'+__herf+'" taget="_top">'+o.forward+'</a></li>';
        
        __form += '<li>';
        __form += '<form style="display: none;" id="forward" METHOD="POST" action="'+(__url+groupParam+'&'+o.startName+'='+(__start*o.limit - o.limit))+limitParam+'"><input style="display:none" type="text" name="'+o.keywordName+'" value="'+o.keyword+'"/>'+'<input style="display: none;" type="submit" name="submit" value="'+o.forward+'"/></form>';
        __form += '<a href="javascript:;" class="form-link">'+o.forward+'</a>';
        __form += '</li>';
        
      } else {
        __html += '<li id="pag-forward" class="disabled"><a href="javascript:;">'+o.forward+'</a></li>';
        __form += '<li id="pag-forward" class="disabled"><a href="javascript:;">'+o.forward+'</a></li>';
      }
      if(num_of_page>10 && __start > 5){
       __html += '<li class="disabled"><a href="javascript:;">...</a></li>';
       __form += '<li class="disabled"><a href="javascript:;">...</a></li>';
      }
      var __sumPage = num_of_page < 10 ? num_of_page : 10;
      for(var i = 0 ; i< __sumPage ;i++){
        var numOfPage = __start>4?(__start-5 + i):__start+i;
        if(num_of_page > 10 && __start > (num_of_page-5)){
          numOfPage = i+(num_of_page-5 < __start ? num_of_page-10:__start);
        }
        if(__start < 5 && num_of_page>10){
          numOfPage = i;
        }
        if(num_of_page < 10){
          numOfPage = i;
        }
        if(numOfPage === __start){
          __html += '<li class="active"><a href="javascript:;">'+(numOfPage+1)+'</a></li>';
          __form += '<li class="active"><a href="javascript:;">'+(numOfPage+1)+'</a></li>';
        } else {
          var __herf =(__url+groupParam+'&'+o.startName+'='+(numOfPage*o.limit))+limitParam;
          __html += '<li class="pag-page"><a taget="_top" href="'+__herf+'">'+(numOfPage+1)+'</a></li>';
          
          __form += '<li>';
          __form += '<form style="display: none;" id="'+(numOfPage+1)+'" METHOD="POST" action="'+(__url+groupParam+'&'+o.startName+'='+(numOfPage*o.limit))+limitParam+'"><input style="display:none" type="text" name="'+o.keywordName+'" value="'+o.keyword+'"/>'+'<input style="display: none;" type="submit" name="submit" value="'+(numOfPage+1)+'"/></form>';
          __form += '<a href="javascript:;" class="form-link">'+(numOfPage+1)+'</a>';
          __form += '</li>';
        }
      }
//      for(var i = 0 ; i< 5;i++){
//        
//        if(i === __start){
//          __html += '<li class="currentpage">'+(i+1)+'</li>';
//          __form += '<li class="currentpage">'+(i+1)+'</li>';
//        } else {
//          var __herf =(__url+groupParam+'&'+o.startName+'='+(i*o.limit))+limitParam;
//          __html += '<li class="pag-page"><a taget="_top" href="'+__herf+'">'+(i+1)+'</a></li>';
//          
//          __form += '<li>';
//          __form += '<form METHOD="POST" action="'+(__url+groupParam+'&'+o.startName+'='+(i*o.limit))+limitParam+'"><input style="display:none" type="text" name="'+o.keywordName+'" value="'+o.keyword+'"/>'+'<input type="submit" name="submit" value="'+(i+1)+'"/></form>';
//          __form += '</li>';
//        }
//      }
      if(num_of_page>10 && __start < (num_of_page-5)){
       __html += '<li class="disabled"><a href="javascript:;">...</a></li>';
       __form += '<li class="disabled"><a href="javascript:;">...</a></li>';
      }
      if((__start+1) < num_of_page){
        var __herf =(__url+groupParam+'&'+o.startName+'='+(__start*o.limit + o.limit))+limitParam;
        __html += '<li id="pag-next"><a href="'+__herf+'" taget="_top">'+o.next+'</a></li>';
        
        __form += '<li>';
        __form += '<form style="display: none;" METHOD="POST" id="next" action="'+(__url+groupParam+'&'+o.startName+'='+(__start*o.limit + o.limit))+limitParam+'"><input style="display:none" type="text" name="'+o.keywordName+'" value="'+o.keyword+'"/>'+'<input style="display: none;" type="submit" name="submit" value="'+o.next+'"/></form>';
        __form += '<a href="javascript:;" class="form-link">'+o.next+'</a>';
        __form += '</li>';
      } else {
        __html += '<li id="pag-next" class="disabled"><a href="javascript:;">'+o.next+'</a></li>';
        __form += '<li id="pag-next" class="disabled"><a href="javascript:;">'+o.next+'</a></li>';
      }
      __html +='</ul>';
      __form +='</ul>';
      if(o.type==='form'){
        $pagination.append(__form);
        $('.form-link').click(function(){
          $(this).prev('form').children('input[type=submit]').click();
        });
      }
      if(o.type==='link'){
        $pagination.append(__html);
      }
      __html = '';
    });
  }
})(jQuery);
