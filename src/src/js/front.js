import * as globalFunctions from './modules/functions.js';
globalFunctions.isWebp();

document.addEventListener("DOMContentLoaded", function () {
    if (!document.getElementById('example-menu')) return;
    new SlideMenu(document.getElementById('example-menu'));
});

import Vue from 'vue/dist/vue.js';

import $ from 'jquery';
import SlimSelect from 'slim-select';


import HeaderBlock from '../blocks/modules/header/header.js';
import FirstBlock from '../blocks/modules/first_slider/first_slider.js';
import WorkBlock from '../blocks/modules/work_slider/work_slider.js';
import ProdBlock from '../blocks/modules/main_product/main_product.js';
import RevBlock from '../blocks/modules/rev_block/rev_block.js';
import AboutBlock from '../blocks/modules/about_block/about_block.js';
import FooterBlock from '../blocks/modules/footer/footer.js';
import MapBlock from '../blocks/modules/map_block/map_block.js';


$(function () {

    $('.berocket_single_filter_widget').wrapAll('<div class="filter_block_mobile">');
    
    $('.flex-control-thumbs').wrapAll('<div class="flex_thumb_item">');   
    $('#order_review_heading, #order_review, .cart_totals').wrapAll('<div class="block_right_status"><div class="block_right_status--item">');
    $('.filter_block_mobile').append('<div class="block_back_filter">Фильтры</div>');
    $('.berocket_ajax_group_filter_title').on('click', function () {
        $('.filter_block_mobile').addClass('isOpened');
    })
    $('.block_back_filter').on('click', function () {
        $('.filter_block_mobile').removeClass('isOpened');
    })
    setTimeout( function() {
        $('.berocket_single_filter_widget').wrapAll('<div class="filter_block_mobile--item">');
        $('#customer_details').append($('#payment'));
    }, 0);

    if ( window.matchMedia('(max-width : 1140px)').matches ) {
        $('.product__title').appendTo(".entry-content .single-product .product.type-product");
        $('.product__article').appendTo(".entry-content .single-product .product.type-product");
    } else {
        $('.entry-content .single-product .product.type-product .product__title').appendTo(".product__summary");
        $('.entry-content .single-product .product.type-product .product__article').appendTo(".product__summary");
    };

    // Убавляем кол-во по клику
    $('.product__quantity .product__quantity_minus').click(function() {
        let $input = $(this).parent().find('.qty');
        let count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
    });
    // Прибавляем кол-во по клику
    $('.product__quantity .product__quantity_plus').click(function() {
        let $input = $(this).parent().find('.qty');
        let count = parseInt($input.val()) + 1;
        count = count > parseInt($input.data('max-count')) ? parseInt($input.data('max-count')) : count;
        $input.val(parseInt(count));
    }); 
    
    setTimeout(() => {
        const allSelects = document.querySelectorAll("select");
        allSelects.forEach(function (el) {
            new SlimSelect({
                select: el,
                showSearch: false
            });
        });
    }, 0);
});


// if ('WOW' in window) {
//     new WOW().init();
// }
window.app = new Vue({
    el: '#app',
    data: () => ({
        isLoaded: false,
        sizes: {
            tablet: 1024,
            mobile: 768,
            window: window.innerWidth
        },
        isLoaded: false,
        footerBlock: new FooterBlock(),
        aboutBlock: new AboutBlock(),
        revBlock: new RevBlock(),
        workBlock: new WorkBlock(),
        headerBlock: new HeaderBlock(),
        firstBlock: new FirstBlock(),
        prodBlock: new ProdBlock(),
        mapBlock: new MapBlock(),
    }),
    watch: {
        'firstBlock.index'(newValue) {
            console.log('firstBlock.index changed', $(this.firstBlock.slider[0]).find('.progress'));
            $('.slider-progress').find('.progress.isInProgress').removeClass('isInProgress');
            setTimeout(() => {
                $('.slider-progress').find('.progress').addClass('isInProgress');
            }, 400);
        }
    },
    mounted() {   
        window.addEventListener('resize', () => {
            this.sizes.window = window.innerWidth;
            
        });
        setTimeout(() => {
            this.headerBlock.init();
            this.footerBlock.init();
            this.aboutBlock.init();
            this.revBlock.init();
            this.workBlock.init();
            this.firstBlock.init();
            this.prodBlock.init();
            this.mapBlock.init();
            this.isLoaded = true;
        }, 0);
    },
    computed: {
        isMobile: function () {
            return this.sizes.window < this.sizes.mobile;
        },
        isTablet: function () {
            return this.sizes.window < this.sizes.tablet && this.sizes.window > this.sizes.mobile;
        }
    },
});


