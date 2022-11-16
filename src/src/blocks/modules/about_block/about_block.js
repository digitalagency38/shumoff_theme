import Glide from '@glidejs/glide';

const AboutBlock = class AboutBlock {
    constructor() {
      this.slider = null;
      this.thumbs = null;
      this.index = 0;
    }
    initSlider() {
      this.slider = new Glide('.about_block__slider--js.glide', {
        perView: 1,
        gap: 0,
      }).mount();
      this.slider.on(['run'], () => {
        this.index = this.slider.index;
      })
    }
    init() {
      if (!document.querySelector('.about_block__slider--js.glide')) return;
      this.initSlider();
      console.log(this.slider);
    }
}

export default AboutBlock;