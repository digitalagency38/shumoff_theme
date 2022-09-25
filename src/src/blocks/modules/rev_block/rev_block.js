import $ from 'jquery';
import 'slick-carousel';

const RevBlock = class RevBlock {
    constructor() {}
    sliderText() {
        $('.js_sl3').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            prevArrow: $('.rev_prev'),
            nextArrow: $('.rev_next'),
            responsive: [
              {
                breakpoint: 1180,
                settings: {
                  slidesToShow: 2
                }
              },
              {
                breakpoint: 840,
                settings: {
                  slidesToShow: 1
                }
              }
            ]
          });
    }
    init() {
        this.sliderText();
    }
}

export default RevBlock;