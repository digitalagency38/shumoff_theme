import $ from 'jquery';
import 'slick-carousel';

const ProdBlock = class ProdBlock {
    constructor() {}
    sliderProd() {
        $('.js_sl7').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            prevArrow: $('.prod_prev'),
            nextArrow: $('.prod_next'),
            responsive: [
              {
                breakpoint: 1240,
                settings: {
                  slidesToShow: 3,
                }
              },
              {
                breakpoint: 960,
                settings: {
                  slidesToShow: 2,
                }
              },
              {
                breakpoint: 640,
                settings: {
                  slidesToShow: 1,
                }
              }
            ]
          });
    }
    init() {
        this.sliderProd();
    }
}

export default ProdBlock;