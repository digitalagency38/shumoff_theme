import * as globalFunctions from './modules/functions.js';
globalFunctions.isWebp();

import Vue from 'vue/dist/vue.js';

document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById('example-menu')) {
        new SlideMenu(document.getElementById('example-menu'));
    }
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
import ContactsBlock from '../blocks/modules/contacts/contacts.js';
import ExpBlock from '../blocks/modules/exp_block/exp_block.js';
import ServBlock from '../blocks/modules/page_service/page_service.js';
import ProductBlock from '../blocks/modules/product_block/product_block.js';
import FixedBlock from '../blocks/modules/fixed_panel/fixed_panel.js';
// import Calculator from '../blocks/modules/calc/calc.js';



window.app = new Vue({
    el: '#app',
    data: () => ({
        message: 'Calculator inited',
        models: [],
        url: '',
        wooClientKey: 'ck_a942f49a79ed49679c1688d561f4db349b5487dd',
        wooClientSecret: 'cs_cdc1f129e2de70b47b1f196f785820632210e30a',
        authHeader: '',
        perPage: 1000,
        products: [],
        areas: [],
        brands: [],
        selectedBrand: "",
        selectedModel: "",
        selectedBody: "",
        uniqueModels: [],
        effect: "max",
        nonce: null,
        isMounted: false,
        isLoaded: false,
        sizes: {
            tablet: 1024,
            mobile: 768,
            window: window.innerWidth
        },
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
        get: loadPortfolioGetParams()
        // calculator: new Calculator(),
    }),
    watch: {
        'firstBlock.index'(newValue) {
            document.querySelector('.slider-progress').querySelector('.progress.isInProgress').classList.remove('isInProgress');
            setTimeout(() => {
                document.querySelector('.slider-progress').querySelector('.progress').classList.add('isInProgress');
            }, 400);
            console.log('firstBlock.index');
        },
        selectedBrand: function(newValue, oldValue) {
            if (newValue === oldValue) return;
            if (this.selectedModel !== "Все") {
                this.selectedModel = "";
            }
            this.selectedModel = this.get.type ? this.get.type : this.selectedModel;
            const selectedModels = this.models.filter(model => model.brand === newValue);



            this.uniqueModels = [];
            let isModelIncluded = false;
            selectedModels.map(model => {
                
                this.uniqueModels.map(uModel => {
                    if (uModel.name === model.name) {
                        uModel.bodies.push(model.body);
                        isModelIncluded = true;
                    }
                    return uModel;
                });
                if (!isModelIncluded) {
                    this.uniqueModels.push({
                        name: model.name,
                        bodies: [model.body]
                    })
                }
                isModelIncluded = false;
                return model;
            });
            console.log(this.uniqueModels);
        },
        selectedModel: function(newValue, oldValue) {
            if (newValue === oldValue) return;
            // this.selectedBody = this.availableBodies[0];
        },
    },
    mounted() {   
        window.addEventListener('resize', () => {
            this.sizes.window = window.innerWidth;
            
        });
        this.isLoaded = true;
        setTimeout(async () => {
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
            // this.calculator.init();

            const allSelects = document.querySelectorAll("select");
            allSelects.forEach(function (el) {
                new SlimSelect({
                    select: el,
                    showSearch: false
                });
            });

            this.setApiParams();
            await this.getProducts().then(result => {
                this.products = result;
                
            });
            this.models = loadModels();
            this.filterBrands();
            this.getNonce();
            this.isMounted = true;
        }, 0);
            
        
    },
    methods: {
        setEffect(effect) {
            if (effect === this.effect) return;
            this.effect = effect;
            this.reloadAreas(this.effect);
        },
        filterBrands() {
            let uniqueBrands = [];
            this.models.map(model => {
                if (!uniqueBrands.includes(model.brand)) {
                    uniqueBrands.push(model.brand);
                    this.brands.push({
                        name: model.brand,
                        models: this.models.filter(item => item.brand === model.brand)
                    })
                }
                return model;
            })
            console.log(uniqueBrands);
            this.selectedBrand = 'Все';
            this.selectedModel = 'Все';
        },
        setModels(models) {
            this.models = models;
        },
        basicAuth(key, secret) {
            let hash = btoa(key + ':' + secret);
            return "Basic " + hash;
        },
        setApiParams() {
            if (document.querySelector('[data-site-url]')) {
                this.url = document.querySelector('[data-site-url]').dataset.siteUrl;
            }
            this.authHeader = this.basicAuth(this.wooClientKey, this.wooClientSecret);
            console.log(this.url, this.authHeader);
        },
        getProductsThatHasArea(products) {
            let filteredProducts = [];
            products.map(product => {
                if ('attributes' in product) {
                    product.attributes.map(attribute => {
                        if (attribute.name === 'Область применения') {
                            filteredProducts.push(product);
                        };
                        return attribute;
                    })
                };
                return product;
            });
            return filteredProducts;
        },
        createAreasArray(filterProducts) {
            this.areas = [];
            let areaNames = [];
            filterProducts.map(product => {
                if ('attributes' in product) {
                    product.attributes.map(attribute => {
                        if (attribute.name === 'Область применения') {
                            attribute.options.map(option => {
                                if (!areaNames.includes(option)) {
                                    areaNames.push(option);
                                    this.areas = [
                                        ...this.areas,
                                        {
                                            name: option,
                                            isSelected: true,
                                            isOpened: false,
                                            weight: +product.weight,
                                            price: product.sale_price !== "" ? +product.sale_price : +product.price,
                                            products: [
                                                product
                                            ]
                                        }
                                    ]
                                } else {
                                    this.areas.map(item => {
                                        console.log('item', item.name, option);
                                        if (item.name === option) {
                                            item.weight += +product.weight;
                                            item.price += product.sale_price !== "" ? +product.sale_price : +product.price;
                                            item.products.push(product);
                                        }
                                        return item;
                                    })
                                }
                            });
                        };
                        return attribute;
                    })
                };
                return product;
            });
        },
        async splitProductsByArea(products) {
            let filteredProducts = await this.getProductsThatHasArea(products);
            this.createAreasArray(filteredProducts);
        },
        async getProducts() {        
            try {
                const response = await fetch(`${this.url}/wp-json/wc/v3/products?per_page=${this.perPage}`, {
                    headers: {"Authorization": this.authHeader}
                });
                const products = response.json();
                return products;
            }
            catch (error) {
                console.log(error);
            }
        },
        reloadAreas(effect) {
            let prods = [];
            this.products.filter(product => {
                product.attributes.map(attr => {
                    if (attr.name === "Эффект" && JSON.stringify(attr.options).includes(this.effect)) {
                        console.log('123123123123')
                        prods.push(product);
                    }
                    return attr;
                })
            });
            this.splitProductsByArea(prods);
        },
        getNonce() {
            if (!document.querySelector("[data-nonce]")) return;
            this.nonce = document.querySelector("[data-nonce]").dataset.nonce;
            console.log(this.nonce);
        },
        addToCart() {
            console.log(this.areas);
            this.areas.map(area => {
                area.products.map(product => {
                    console.log(product);
                    $.ajax({
                        type: 'POST',
                        url: `${this.url}/wp-json/wc/store/cart/add-item`,
                        dataType: 'json',
                        headers: {
                          'X-WC-Store-API-Nonce': this.nonce
                        },
                        data: {
                          id : product.id,
                          quantity: 1,
                          variation: [
                            {
                                attribute: "size",
                                value: '1 шт',
                            }
                          ],
                        },
                        success: function(result) {
                            console.log(result);
                        }
                    });
                    return product;
                });
                return area;
            })
           
        },
        clearFilter() {
            this.get.vendor = "Все";
            this.get.type = "Все";
            this.selectedModel = "Все";
            this.selectedBrand = "Все";
        }
    },
    computed: {
        isMobile: function () {
            return this.sizes.window < this.sizes.mobile;
        },
        isTablet: function () {
            return this.sizes.window < this.sizes.tablet && this.sizes.window > this.sizes.mobile;
        },
        selectedProducts() {
            let products = [];
            this.products.map(product => {
                if ('attributes' in product) {
                    product.attributes.map(attribute => {
                        if (attribute.name === 'Тип кузова') {
                            attribute.options.map(opt => {
                                console.log(opt, this.selectedBody)
                                if (opt === this.selectedBody) {
                                    products.push(product);
                                }
                            })
                        };
                        return attribute;
                    })
                };
                return product;
            });
            console.log('products', products);
            return products;
        },
        selectedAreas() {
            return this.areas.filter(area => area.isSelected === true);
        },
        availableBodies() {
            let bodies = []
            let selectedModel = this.uniqueModels.filter(model => model.name === this.selectedModel);
            selectedModel.map(model => {
                bodies = [
                    ...model.bodies
                ];
                return model;
            })

            return bodies;
        },
        total() {
            let total = {
                price: 0,
                weight: 0
            }
            this.selectedAreas.map(area => {
                total.price += +area.price;
                total.weight += +area.weight;
                return area;
            });
            return total;
        }
    },
});


$(function () {
    
    $('.berocket_single_filter_widget').wrapAll('<div class="filter_block_mobile">');
    
    $('.flex-control-thumbs').wrapAll('<div class="flex_thumb_item">');   
    $('#order_review_heading, #order_review, .cart_totals').wrapAll('<div class="block_right_status"><div class="block_right_status--item">');
    $('.block_right_status').prepend('<div class="sticky_top"></div>');
    $('.block_right_status').append('<div class="sticky_bottom"></div>');
    
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
