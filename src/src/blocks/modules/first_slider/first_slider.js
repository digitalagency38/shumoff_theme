import Glide from '@glidejs/glide';

const FirstBlock = class FirstBlock {
    constructor() {
        this.slider = null;
        this.index = 0;
    }
    initSlider() {
        this.slider = new Glide('.first_slider__sl--js.glide', {
            autoplay: 4000,
            animationDuration: 400,
            hoverpause: false,
        }).mount();
    }
    changeSlide(pattern) {
        this.slider.go(pattern);
    }
    init() {
        if (!document.querySelector('.first_slider__sl--js.glide')) return;
        
        this.initSlider();
        this.slider.on(['run'], () => {
            this.index = this.slider.index + 1;
        });
        this.index = 1;
    }
}

export default FirstBlock;