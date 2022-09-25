import $ from 'jquery';
import 'slick-carousel';

const PrevBlock = class PrevBlock {
    constructor() {}
    sliderText() {
        if ( window.matchMedia('(max-width : 1024px)').matches ) {
            $('.js_sl5').slick({
                infinite: true,
                dots: true,
                prevArrow: $('.prev_prev'),
                nextArrow: $('.prev_next'),
                variableWidth: true
            });
        };
    }
    init() {
        this.sliderText();
    }
}

export default PrevBlock;