import Glide from '@glidejs/glide';

const WorkBlock = class WorkBlock {
    constructor() {
      this.slider = null;
      this.index = 0;
    }
    initSlider() {
      this.slider = new Glide('.work_slider__slider--js.glide', {
        perView: 2,
        swipeThreshold: false,
        dragThreshold: false,
        gap: 20,
        breakpoints: {
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
      if (!document.querySelector('.work_slider__slider--js.glide')) return;
      this.initSlider();
      console.log(this.slider);
    }
}

export default WorkBlock;