import $ from 'jquery';

const FooterBlock = class FooterBlock {
    constructor() {}
    slideUp() {
      $('#up_button').click( function () {
        $('body, html').animate({
          scrollTop: 0
        }, 400);
        return false;
      });
    }
    openedMenu() {
      $('.footer__menu--tit').on('click', function () {
        $(this).toggleClass('isOpened')
        $(this).parent().find('ul').toggleClass('isOpened')
      })
    }
    appendInfo() {
      $(window).resize(function(){
        if (window.matchMedia("(min-width: 1024px)").matches) {
          $('.footer__cont').insertAfter($('.footer__logo'));
        }
        if (window.matchMedia("(max-width: 1023px)").matches) {
          $('.footer__cont').appendTo($('.footer__append'));
        }
      });
      $(window).trigger('resize');
      if (window.matchMedia("(min-width: 1024px)").matches) {
        $('.footer__cont').insertAfter($('.footer__logo'));
      }
      if (window.matchMedia("(max-width: 1023px)").matches) {
        $('.footer__cont').appendTo($('.footer__append'));
      }
    }
    init() {
        this.slideUp();
        this.openedMenu();
        this.appendInfo();
    }
}

export default FooterBlock;