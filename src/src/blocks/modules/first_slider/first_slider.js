import $ from 'jquery';
import 'slick-carousel';

const FirstBlock = class FirstBlock {
    constructor() {}
    sliderFirst() {
        $('.js_sl6').not('.slick-initialized').slick({
            infinite: true,
            slidesToShow: 1,
            fade: true,
            cssEase: 'linear',
            swipe: false,
            slidesToScroll: 1,
            dots: true,
            prevArrow: $('.first_slider__arrow--left'),
            nextArrow: $('.first_slider__arrow--right')
          });
        var time = 5;
        var $bar,
          isPause,
          tick,
          percentTime;
        var helpers = {
        addZeros: function (n) {
                return (n < 10) ? '0' + n : '' + n;
            }
        };
          $('.js_sl6').on('afterChange', function(event, slick, currentSlide){
            $('.slides-numbers .active').html(helpers.addZeros(currentSlide + 1));
          });
      
          var sliderItemsNum = $('.js_sl6').find('.slick-slide').not('.slick-cloned').length;
          $('.slides-numbers .total').html(helpers.addZeros(sliderItemsNum));

          $bar = $('.slider-progress .progress');

        $('.slider-wrapper').on({
            mouseenter: function() {
            isPause = true;
            },
            mouseleave: function() {
            isPause = false;
            }
        })

        function startProgressbar() {
            resetProgressbar();
            percentTime = 0;
            isPause = false;
            tick = setInterval(interval, 10);
        }
        $('.first_slider__arrow--right').on('click', function() {
            resetProgressbar();
            percentTime = 0;
            isPause = false;
            tick = setInterval(interval, 10);
        })
        $('.first_slider__arrow--left').on('click', function() {
            resetProgressbar();
            percentTime = 0;
            isPause = false;
            tick = setInterval(interval, 10);
        })
        function interval() {
            if (isPause === false) {
                percentTime += 1 / (time + 0.1);
                $bar.css({
                    width: percentTime + "%"
                });
                if (percentTime >= 100) {
                    $('.js_sl6').slick('slickNext');
                    startProgressbar();
                }
            }
        }

        function resetProgressbar() {
            $bar.css({
            width: 0 + '%'
            });
            clearTimeout(tick);
        }
        startProgressbar();
    }
    blockRunner() {
        var marquee = $("#marquee"); 
        marquee.css({"overflow": "hidden", "width": "100%"});
        // оболочка для текста ввиде span (IE не любит дивы с inline-block)
        marquee.wrapInner("<span>");
        marquee.find("span").css({ "width": "50%", "display": "inline-block", "text-align":"center" }); 
        marquee.append(marquee.find("span").clone()); // тут у нас два span с текстом
        marquee.wrapInner("<div>");
        marquee.find("div").css("width", "200%");
        var reset = function() {
            $(this).css("margin-left", "0%");
            $(this).animate({ "margin-left": "-100%" }, 12000, 'linear', reset);
        };
        reset.call(marquee.find("div"));
    }
    init() {
        this.sliderFirst();
        this.blockRunner();
    }
}

export default FirstBlock;