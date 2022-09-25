import $ from 'jquery';
import 'slick-carousel';

const WorkBlock = class WorkBlock {
    constructor() {}
    sliderText() {
        $('.js_sl4').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: false,
            prevArrow: $('.work_prev'),
            nextArrow: $('.work_next'),
            responsive: [
              {
                breakpoint: 1023,
                settings: {
                    variableWidth: true
                }
              }
            ]
          });
    }
    init() {
        this.sliderText();
    }
}

export default WorkBlock;