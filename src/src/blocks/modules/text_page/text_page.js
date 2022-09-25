import $ from 'jquery';
import 'slick-carousel';

const TextBlock = class TextBlock {
    constructor() {}
    sliderText() {
        $('.js_sl1').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            prevArrow: $('.js_sl1_prev'),
            nextArrow: $('.js_sl1_next'),
          });
    }
    init() {
        this.sliderText();
    }
}

export default TextBlock;