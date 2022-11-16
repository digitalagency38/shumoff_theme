import Glide from '@glidejs/glide';

const ProdBlock = class ProdBlock {
    constructor() {
        this.slider = null;
        this.index = 0;
    }
    initSlider() {
        
        document.querySelector('.main_product__bottom--js.glide .catalog__wrapper').classList.add('glide__track');
        document.querySelector('.main_product__bottom--js.glide .catalog__wrapper').dataset.glideEl = 'track';
        document.querySelector('.main_product__bottom--js.glide .catalog__wrapper_in').classList.add('glide__slides');

        setTimeout(() => {
            this.slider = new Glide('.main_product__bottom--js.glide', {
                perView: 4,
                swipeThreshold: false,
                dragThreshold: false,
                gap: 20,
                breakpoints: {
                    1360: {
                        perView: 3,
                    },
                    1024: {
                        perView: 2,
                    },
                    860: {
                        perView: 1,
                        swipeThreshold: 100,
                        dragThreshold: 100,
                        gap: 16,
                    }
                }
            }).mount();
            this.slider.on(['run'], () => {
                this.index = this.slider.index;
            })
            console.log(this.slider);
        }, 0)
    }
    changeSlide(pattern) {
        this.slider.go(pattern)
    }
    init() {
        if (!document.querySelector('.work_slider__slider--js.glide')) return;
        this.initSlider();
        
    }
}

export default ProdBlock;