
import Glide from '@glidejs/glide';

const ExpBlock = class ExpBlock {
    constructor() {
      this.slider = null;
      this.index = 0;
    }
    initSlider() {
      this.slider = new Glide('.exp_block__slider--js.glide', {
        perView: 6,
        gap: 20,
        breakpoints: {
          1024: {
              perView: 4,
          },
            860: {
                perView: 2,
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
      if (!document.querySelector('.exp_block__slider--js.glide')) return;
      this.initSlider();
      console.log(this.slider);
    }
}

export default ExpBlock;