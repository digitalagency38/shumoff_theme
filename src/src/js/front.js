import * as globalFunctions from './modules/functions.js';
globalFunctions.isWebp();

document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById('example-menu')) {
        new SlideMenu(document.getElementById('example-menu'));
    }
});
import $ from 'jquery';
import Vue from 'vue/dist/vue.js';

import SlimSelect from 'slim-select';


import HeaderBlock from '../blocks/modules/header/header.js';
import FirstBlock from '../blocks/modules/first_slider/first_slider.js';
import WorkBlock from '../blocks/modules/work_slider/work_slider.js';
import ProdBlock from '../blocks/modules/main_product/main_product.js';
import RevBlock from '../blocks/modules/rev_block/rev_block.js';
import AboutBlock from '../blocks/modules/about_block/about_block.js';
import FooterBlock from '../blocks/modules/footer/footer.js'; 
import MapBlock from '../blocks/modules/map_block/map_block.js';


// Убавляем кол-во по клику
$(document).on('click', '.product__quantity .product__quantity_minus', function() {
    console.log(123123);
    let $input = $(this).parent().find('.qty');
    let count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
});
// Прибавляем кол-во по клику
$(document).on('click', '.product__quantity .product__quantity_plus', function() {
    console.log(123123);
    let $input = $(this).parent().find('.qty');
    let count = parseInt($input.val()) + 1;
    count = count > parseInt($input.data('max-count')) ? parseInt($input.data('max-count')) : count;
    $input.val(parseInt(count));
}); 

// TODO нужно оптимизировать футер

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
            this.firstBlock.init();
            this.workBlock.init();
            this.prodBlock.init();
            this.footerBlock.init();
            this.aboutBlock.init();
            this.revBlock.init();
            this.mapBlock.init();

            const allSelects = document.querySelectorAll("select");
            allSelects.forEach(function (el) {
                new SlimSelect({
                    select: el,
                    showSearch: false
                });
            });
            new WOW().init();
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


