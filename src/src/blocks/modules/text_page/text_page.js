// import $ from 'jquery';
// import 'slick-carousel';
import Glide from '@glidejs/glide';

const TextBlock = class TextBlock {
    constructor() {}
    sliderText() {
        if (!document.querySelector('.text_page__slider.glide')) return;
        document.querySelectorAll('.text_page__slider.glide').forEach(slider => {
            new Glide(slider, {
                perView: 1,
                swipeThreshold: false,
                dragThreshold: false,
                gap: 20,
            }).mount();
        });
    }
    init() {
        this.sliderText();
    }
}

export default TextBlock;