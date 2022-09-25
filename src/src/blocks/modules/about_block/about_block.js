import $ from 'jquery';
import 'slick-carousel';

const AboutBlock = class AboutBlock {
    constructor() {}
    sliderText() {
        $('.js_sl2').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            adaptiveHeight: true,
            prevArrow: $('.js_sl1_prev'),
            nextArrow: $('.js_sl1_next'),
            asNavFor: '.slider-nav',
            responsive: [
              {
                breakpoint: 1023,
                settings: {
                    adaptiveHeight: true
                }
              }
            ]
          });
        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.js_sl2',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            accessibility: false
        });
    }
    init() {
        this.sliderText();
    }
}

export default AboutBlock;