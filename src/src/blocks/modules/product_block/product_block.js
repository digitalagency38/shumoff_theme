import $ from 'jquery';
import 'slick-carousel';

const ProductBlock = class ProductBlock {
    constructor() {}
    slideProduct() {
        setTimeout(() => {
            $('.js_prod_main').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.js_prod_dot'
            });
            $('.js_prod_dot').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.js_prod_main',
                dots: true,
                centerMode: true,
                focusOnSelect: true
            });
        }, 500);
    }
    init() {
        this.slideProduct();
    }
}

export default ProductBlock;