import Glide from '@glidejs/glide';
// import lightGallery from 'lightgallery';
// import lgAutoplay from 'lg-autoplay';

const ProductPage = class ProductPage {
    constructor() {
        if (document.querySelector('.product__gallery--slide')) {
            this.gallery = new Glide('.product__gallery.glide', {
                type: 'slider',
                startAt: 0,
                perView: 1,
                gap: 0
            });
        }
        if (document.querySelector('.product__thumbnails--slide')) {
            this.thumbs = new Glide('.product__thumbnails.glide', {
                type: 'slider',
                startAt: 0,
                perView: 2,
                gap: 17
            });
        }
    }
    initGallerySlider() {
        if (document.querySelector('.product__gallery--slide')) {
            this.gallery.mount();
            // lightGallery(document.querySelector('#lightgallery'), {});
        }

        if (document.querySelector('.product__thumbnails--slide')) {

            this.thumbs.mount();
            this.gallery.on(['run'], () => {
                console.log(this.gallery.index);
                this.thumbs.go(`=${this.gallery.index}`);
            });
            this.thumbs.on(['run'], () => {
                console.log(this.thumbs.index);
                this.gallery.go(`=${this.thumbs.index}`);
            })
        }

    }
    init() {
        this.initGallerySlider();
    }
}

export default ProductPage;