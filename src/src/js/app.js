import * as globalFunctions from './modules/functions.js';
globalFunctions.isWebp();

document.addEventListener("DOMContentLoaded", function () {
    new SlideMenu(document.getElementById('example-menu'));
});
import $ from 'jquery';

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


$(function () {
    const footerBlock = new FooterBlock();
    const textBlock = new TextBlock();
    const mapBlock = new MapBlock();
    const aboutBlock = new AboutBlock();
    const revBlock = new RevBlock();
    const workBlock = new WorkBlock();
    const prevBlock = new PrevBlock();
    const headerBlock = new HeaderBlock();
    const firstBlock = new FirstBlock();
    const prodBlock = new ProdBlock();
    const contactsBlock = new ContactsBlock();
    const expBlock = new ExpBlock();
    const servBlock = new ServBlock();
    const productBlock = new ProductBlock();
    const fixedBlock = new FixedBlock();
    
    $('.berocket_single_filter_widget').wrapAll('<div class="filter_block_mobile">');
    $('.filter_block_mobile').append('<div class="block_back_filter">Фильтры</div>');
    $('.berocket_ajax_group_filter_title').on('click', function () {
        $('.filter_block_mobile').addClass('isOpened');
    })
    $('.block_back_filter').on('click', function () {
        $('.filter_block_mobile').removeClass('isOpened');
    })
    setTimeout( function() {
        $('.berocket_single_filter_widget').wrapAll('<div class="filter_block_mobile--item">');
    }, );

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
})
document.addEventListener('DOMContentLoaded', function(){
    const mainWork = new MainWork();
    
    mainWork.init();
});