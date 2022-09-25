import $ from 'jquery';
import 'slick-carousel';

const RevBlock = class RevBlock {
    constructor() {}
    sliderText() {
      setTimeout(() => {
        $('.js_sl3').slick({
          infinite: false,
          slidesToShow: 3,
          slidesToScroll: 1,
          dots: false,
          prevArrow: $('.rev_prev'),
          nextArrow: $('.rev_next'),
          responsive: [
            {
              breakpoint: 1180,
              settings: {
                variableWidth: false,
                slidesToShow: 2
              }
            },
            {
              breakpoint: 840,
              settings: {
                variableWidth: false,
                slidesToShow: 1
              }
            }
          ]
        });
      }, 1000);
    }
    init() {
        this.sliderText();
    }
}

export default RevBlock;