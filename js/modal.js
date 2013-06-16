/**
 * @author ChiCong
 */
(function($){
  $.fn.popup = function(options){
    var defaults = {
      mark: true,
      toolbar: true,
    };
    var options = $.extend(defaults, options);
    var show = function(){
      var $this = $(this), that = this,
          e = $.Event('show'),
          top = $('table[id*=tbl]').offset().top;
      this.isShow = true;
      $this.trigger(e);
      markAnimation();
      $this.css({
        'top': top
      }).show().animate({
        'right': '0px'
      },500);
    };
    var hide = function(){
      var e = $.Event('hide');
      this.isShow = false;
      $(this).trigger(e);
      this.width = $(this).width();
      $(this).animate({
        'right': this.width+50
      },200).hide();
      markAnimation();
    };
    var markAnimation = function(){
      this.mark = $('div[id*=mark]');
      options.mark?function(){
        this.isShow?this.mark.fadeIn(200):this.mark.hide();
      }:function(){
        this.mark.hide();
      };
    };
    return this.each(function(){
      var $this = $(this),
          $close = $this.find('span[class*=modal-close]');
      $close.click(function(){
        hide();
      });
    });
  }
})(jQuery);
