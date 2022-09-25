import $ from 'jquery';
import 'slick-carousel';

const ProductBlock = class ProductBlock {
    constructor() {}
    slideProduct() {
        // $('.product_block__slider--main').slick({
        //     slidesToShow: 1,
        //     slidesToScroll: 1,
        //     arrows: false,
        //     fade: true,
        //     asNavFor: '.product_block__slider--dot'
        // });
        // $('.product_block__slider--dot').slick({
        //     slidesToShow: 3,
        //     slidesToScroll: 1,
        //     asNavFor: '.product_block__slider--main',
        //     dots: true,
        //     centerMode: true,
        //     focusOnSelect: true
        // });
    }
    init() {
        this.slideProduct();
    }
}

export default ProductBlock;