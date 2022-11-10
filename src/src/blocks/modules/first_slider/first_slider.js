import $ from 'jquery';
import 'slick-carousel';

const FirstBlock = class FirstBlock {
    constructor() {
        this.slider = null;
        this.index = 0;
    }
    initSlider() {
        return new Promise((resolve, reject) => {
            if (document.querySelector('.js_sl6')) {
                this.slider = $('.js_sl6').not('.slick-initialized').slick({
                    infinite: true,
                    slidesToShow: 1,
                    fade: true,
                    cssEase: 'linear',
                    swipe: false,
                    slidesToScroll: 1,
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 4000,
                    speed: 400,
                    prevArrow: $('.first_slider__arrow--left'),
                    nextArrow: $('.first_slider__arrow--right')
                });
                this.index = 1;
                resolve(this.slider);
            } else {
                reject('Слайдер не инициализирован');
            }
        })
    }
    init() {
        this.initSlider().then(slider => {
            $(slider[0]).on('beforeChange', (event, slick, currentSlide, nextSlide) =>{
                this.index = currentSlide + 1;
                console.log(this.index);
            }).find('.progress').addClass('isInProgress');;
        });


        // On swipe event
        // $('.your-element').on('swipe', function(event, slick, direction){
        //     console.log(direction);
        //     // left
        // });
        
        // // On edge hit
        // $('.your-element').on('edge', function(event, slick, direction){
        //     console.log('edge was hit')
        // });
        
        // // On before slide change
        // $('.your-element').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        //     console.log(nextSlide);
        // });
    }
}

export default FirstBlock;