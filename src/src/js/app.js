import * as globalFunctions from './modules/functions.js';
globalFunctions.isWebp();

import Vue from 'vue/dist/vue.js';

// document.addEventListener("DOMContentLoaded", function () {
//     new SlideMenu(document.getElementById('example-menu'));
// });
import $ from 'jquery';
import SlimSelect from 'slim-select';

import ProdBlock from '../blocks/modules/main_product/main_product.js';
import HeaderBlock from '../blocks/modules/header/header.js';
import FooterBlock from '../blocks/modules/footer/footer.js';
import TextBlock from '../blocks/modules/text_page/text_page.js';
import MapBlock from '../blocks/modules/map_block/map_block.js';
import AboutBlock from '../blocks/modules/about_block/about_block.js';
import RevBlock from '../blocks/modules/rev_block/rev_block.js';
import WorkBlock from '../blocks/modules/work_slider/work_slider.js';
import PrevBlock from '../blocks/modules/prev_block/prev_block.js';
import ContactsBlock from '../blocks/modules/contacts/contacts.js';
import ExpBlock from '../blocks/modules/exp_block/exp_block.js';
import ServBlock from '../blocks/modules/page_service/page_service.js';
import ProductBlock from '../blocks/modules/product_block/product_block.js';
import FixedBlock from '../blocks/modules/fixed_panel/fixed_panel.js';
import Calculator from '../blocks/modules/calc/calc.js';



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
        textBlock: new TextBlock(),
        mapBlock: new MapBlock(),
        aboutBlock: new AboutBlock(),
        revBlock: new RevBlock(),
        workBlock: new WorkBlock(),
        prevBlock: new PrevBlock(),
        headerBlock: new HeaderBlock(),
        prodBlock: new ProdBlock(),
        contactsBlock: new ContactsBlock(),
        expBlock: new ExpBlock(),
        servBlock: new ServBlock(),
        productBlock: new ProductBlock(),
        fixedBlock: new FixedBlock(),
        calculator: new Calculator(),
    }),
    watch: {
        'firstBlock.index'(newValue) {
            document.querySelector('.slider-progress').querySelector('.progress.isInProgress').classList.remove('isInProgress');
            setTimeout(() => {
                document.querySelector('.slider-progress').querySelector('.progress').classList.add('isInProgress');
            }, 400);
            console.log('firstBlock.index');
        }
    },
    mounted() {   
        window.addEventListener('resize', () => {
            this.sizes.window = window.innerWidth;
            
        });
        this.isLoaded = true;
        setTimeout(() => {
            this.headerBlock.init();
            this.mapBlock.init();
            this.footerBlock.init();
            this.textBlock.init();
            this.aboutBlock.init();
            this.revBlock.init();
            this.workBlock.init();
            this.prevBlock.init();
            this.prodBlock.init();
            this.contactsBlock.init();
            this.expBlock.init();
            this.servBlock.init();
            this.productBlock.init();
            this.fixedBlock.init();
            this.calculator.init();

            const allSelects = document.querySelectorAll("select");
            allSelects.forEach(function (el) {
                new SlimSelect({
                    select: el,
                    showSearch: false
                });
            });
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


$(function () {
    
    $('.berocket_single_filter_widget').wrapAll('<div class="filter_block_mobile">');
    
    $('.flex-control-thumbs').wrapAll('<div class="flex_thumb_item">');   
    $('#order_review_heading, #order_review, .cart_totals').wrapAll('<div class="block_right_status"><div class="block_right_status--item">');
    if (document.querySelector('.form-row.place-order')) {
        $('.block_right_status--item').append('<div class="here_will_be_button"></div>')
        $('.form-row.place-order').appendTo('.here_will_be_button');
    }
    
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

    
})
