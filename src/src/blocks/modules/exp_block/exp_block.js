import $ from 'jquery';
import 'slick-carousel';

const ExpBlock = class ExpBlock {
    constructor() {}
    sliderText() {
        $('.js_sl8').slick({
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
            responsive: [
                {
                  breakpoint: 1280,
                  settings: {
                      slidesToShow: 5
                  }
                },
              {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 3
                }
              },
              {
                breakpoint: 680,
                settings: {
                    slidesToShow: 2
                }
              }
            ]
          });
    }
    init() {
        this.sliderText();
    }
}

export default ExpBlock;