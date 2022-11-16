import Glide from '@glidejs/glide';

const RevBlock = class RevBlock {
    constructor() {
      this.slider = null;
      this.index = 0;
    }
    initSlider() {
      this.slider = new Glide('.rev_block__slider--js.glide', {
        perView: 3,
        swipeThreshold: false,
        dragThreshold: false,
        gap: 20,
        breakpoints: {
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
    }
    init() {
      if (!document.querySelector('.rev_block__slider--js.glide')) return;
      this.initSlider();
      console.log(this.slider);
    }
}

export default RevBlock;