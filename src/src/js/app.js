import * as globalFunctions from './modules/functions.js';
globalFunctions.isWebp();

document.addEventListener("DOMContentLoaded", function () {
    new SlideMenu(document.getElementById('example-menu'));
});
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
import FirstBlock from '../blocks/modules/first_slider/first_slider.js';
import ContactsBlock from '../blocks/modules/contacts/contacts.js';
import ExpBlock from '../blocks/modules/exp_block/exp_block.js';
import ServBlock from '../blocks/modules/page_service/page_service.js';
import MainWork from '../blocks/modules/main_work/main_work.js';
import ProductBlock from '../blocks/modules/product_block/product_block.js';
import FixedBlock from '../blocks/modules/fixed_panel/fixed_panel.js';
import Calculator from '../blocks/modules/calc/calc.js';


$(function () {
    
    window.footerBlock = new FooterBlock();
    window.textBlock = new TextBlock();
    window.mapBlock = new MapBlock();
    window.aboutBlock = new AboutBlock();
    window.revBlock = new RevBlock();
    window.workBlock = new WorkBlock();
    window.prevBlock = new PrevBlock();
    window.headerBlock = new HeaderBlock();
    window.firstBlock = new FirstBlock();
    window.prodBlock = new ProdBlock();
    window.contactsBlock = new ContactsBlock();
    window.expBlock = new ExpBlock();
    window.servBlock = new ServBlock();
    window.productBlock = new ProductBlock();
    window.fixedBlock = new FixedBlock();
    window.calculator = new Calculator();
    console.log(calculator);
    
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




    headerBlock.init();
    mapBlock.init();
    footerBlock.init();
    textBlock.init();
    aboutBlock.init();
    revBlock.init();
    workBlock.init();
    prevBlock.init();
    firstBlock.init();
    prodBlock.init();
    contactsBlock.init();
    expBlock.init();
    servBlock.init();
    productBlock.init();
    fixedBlock.init();
    calculator.init();
})
document.addEventListener('DOMContentLoaded', function(){
    setTimeout(() => {
        const mainWork = new MainWork();
        
        mainWork.init();

        const allSelects = document.querySelectorAll("select");
        allSelects.forEach(function (el) {
            new SlimSelect({
                select: el,
                showSearch: false
            });
        });
    }, 0);
});