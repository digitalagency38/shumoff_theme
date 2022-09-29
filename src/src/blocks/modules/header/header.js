import $ from 'jquery';
import SlideMenu from '@grubersjoe/slide-menu';

const HeaderBlock = class HeaderBlock {
    constructor() {}
    burgerBlock() {
        $(window).resize(function(){
              if (window.matchMedia("(min-width: 991px)").matches) {
                $('.menu-top-wrap').insertAfter($('.fidex-panel'));
                $('.site-content-wrap').append($('.site-content-left'));
              }
          
          
            if (window.matchMedia("(max-width: 990px)").matches) {
              $('.burger-wrap .burger-body').append($('.menu-top-wrap'));
              $('.burger-wrap .burger-body').append($('.site-content-left'));
            } else {
              $('#menu').append($('.menu-top-wrapper'));
              $('.menu-left-wrapper-wr').append($('.menu-left-wrapper'));
            }
        });
        $(window).trigger('resize');
          
        function burg(){
            var burgerWr = $('.burger-wrap'),
              burgerBtn = $('.burger-btn'),
              burgerBody = $('.burger-body'),
              burgerCloseBtn = $('.burger-close-btn');
            
            burgerBtn.on('click', function(){
              $(burgerWr).addClass('opened');
              $('html').addClass('owh');
            });
            
            burgerCloseBtn.on('click', function(){
              $(burgerWr).removeClass('opened');
              $('html').removeClass('owh');
            })
        }
          
        burg();
          
          
        $(document).on('click', function(e){
            if( $(e.target).closest('.burger-btn').length || $(e.target).closest('.burger-body').length || $(e.target).closest('.fixed_panel__menu').length) 
            return
            
            $('.burger-wrap').removeClass('opened');
            $('html').removeClass('owh');
        });
    }
    catalogClick() {
        $('.header__cat-btn').on('click', function(){
            $('.isOpen').toggleClass('isHide');
            $('.isClose').toggleClass('isHide');
            $('.header__cat').toggleClass('isOpened');
        })
    }
    burgCatClick() {
      $('.burger-body__catalog').on('click', function(){
        $(this).toggleClass('isOpened');
        $('.burger-body__cat-block').toggleClass('isOpened');
      })
    }
    init() {
        this.burgerBlock();
        this.catalogClick();
        this.burgCatClick();
    }
}

export default HeaderBlock;