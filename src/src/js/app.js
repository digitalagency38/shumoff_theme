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
import MainWork from '../blocks/modules/main_work/main_work.js';
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
        mainWork: new MainWork(),
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
            new WOW().init();
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



// Sticky Plugin v1.0.4 for jQuery
// =============
// Author: Anthony Garand
// Improvements by German M. Bravo (Kronuz) and Ruud Kamphuis (ruudk)
// Improvements by Leonardo C. Daronco (daronco)
// Created: 02/14/2011
// Date: 07/20/2015
// Website: http://stickyjs.com/
// Description: Makes an element on the page stick on the screen as you scroll
//              It will only set the 'top' and 'position' of your element, you
//              might need to adjust the width in some cases.




$(function () {
    
    $('.berocket_single_filter_widget').wrapAll('<div class="filter_block_mobile">');
    
    $('#order_review_heading, #order_review, .cart_totals').wrapAll('<div class="block_right_status"><div class="block_right_status--item">');
    $('.block_right_status').append('<div class="sticky_bottom"></div>');
    // $('.block_right_status').prepend('<div class="sticky_top"></div>');

    (function (factory) {
        if (typeof define === 'function' && define.amd) {
            // AMD. Register as an anonymous module.
            define(['jquery'], factory);
        } else if (typeof module === 'object' && module.exports) {
            // Node/CommonJS
            module.exports = factory(require('jquery'));
        } else {
            // Browser globals
            factory(jQuery);
        }
    }(function ($) {
        var slice = Array.prototype.slice; // save ref to original slice()
        var splice = Array.prototype.splice; // save ref to original slice()
    
      var defaults = {
          topSpacing: 0,
          bottomSpacing: 0,
          className: 'is-sticky',
          wrapperClassName: 'sticky-wrapper',
          center: false,
          getWidthFrom: '',
          widthFromWrapper: true, // works only when .getWidthFrom is empty
          responsiveWidth: false,
          zIndex: 'inherit'
        },
        $window = $(window),
        $document = $(document),
        sticked = [],
        windowHeight = $window.height(),
        scroller = function() {
          var scrollTop = $window.scrollTop(),
            documentHeight = $document.height(),
            dwh = documentHeight - windowHeight,
            extra = (scrollTop > dwh) ? dwh - scrollTop : 0;
    
          for (var i = 0, l = sticked.length; i < l; i++) {
            var s = sticked[i],
              elementTop = s.stickyWrapper.offset().top,
              etse = elementTop - s.topSpacing - extra;
    
            //update height in case of dynamic content
            s.stickyWrapper.css('height', s.stickyElement.outerHeight());
    
            if (scrollTop <= etse) {
              if (s.currentTop !== null) {
                s.stickyElement
                  .css({
                    'width': '',
                    'position': '',
                    'top': '',
                    'z-index': ''
                  });
                s.stickyElement.parent().removeClass(s.className);
                s.stickyElement.trigger('sticky-end', [s]);
                s.currentTop = null;
              }
            }
            else {
              var newTop = documentHeight - s.stickyElement.outerHeight()
                - s.topSpacing - s.bottomSpacing - scrollTop - extra;
              if (newTop < 0) {
                newTop = newTop + s.topSpacing;
              } else {
                newTop = s.topSpacing;
              }
              if (s.currentTop !== newTop) {
                var newWidth;
                if (s.getWidthFrom) {
                    padding =  s.stickyElement.innerWidth() - s.stickyElement.width();
                    newWidth = $(s.getWidthFrom).width() - padding || null;
                } else if (s.widthFromWrapper) {
                    newWidth = s.stickyWrapper.width();
                }
                if (newWidth == null) {
                    newWidth = s.stickyElement.width();
                }
                s.stickyElement
                  .css('width', newWidth)
                  .css('position', 'fixed')
                  .css('top', newTop)
                  .css('z-index', s.zIndex);
    
                s.stickyElement.parent().addClass(s.className);
    
                if (s.currentTop === null) {
                  s.stickyElement.trigger('sticky-start', [s]);
                } else {
                  // sticky is started but it have to be repositioned
                  s.stickyElement.trigger('sticky-update', [s]);
                }
    
                if (s.currentTop === s.topSpacing && s.currentTop > newTop || s.currentTop === null && newTop < s.topSpacing) {
                  // just reached bottom || just started to stick but bottom is already reached
                  s.stickyElement.trigger('sticky-bottom-reached', [s]);
                } else if(s.currentTop !== null && newTop === s.topSpacing && s.currentTop < newTop) {
                  // sticky is started && sticked at topSpacing && overflowing from top just finished
                  s.stickyElement.trigger('sticky-bottom-unreached', [s]);
                }
    
                s.currentTop = newTop;
              }
    
              // Check if sticky has reached end of container and stop sticking
              var stickyWrapperContainer = s.stickyWrapper.parent();
              var unstick = (s.stickyElement.offset().top + s.stickyElement.outerHeight() >= stickyWrapperContainer.offset().top + stickyWrapperContainer.outerHeight()) && (s.stickyElement.offset().top <= s.topSpacing);
    
              if( unstick ) {
                s.stickyElement
                  .css('position', 'absolute')
                  .css('top', '')
                  .css('bottom', 0)
                  .css('z-index', '');
              } else {
                s.stickyElement
                  .css('position', 'fixed')
                  .css('top', newTop)
                  .css('bottom', '')
                  .css('z-index', s.zIndex);
              }
            }
          }
        },
        resizer = function() {
          windowHeight = $window.height();
    
          for (var i = 0, l = sticked.length; i < l; i++) {
            var s = sticked[i];
            var newWidth = null;
            if (s.getWidthFrom) {
                if (s.responsiveWidth) {
                    newWidth = $(s.getWidthFrom).width();
                }
            } else if(s.widthFromWrapper) {
                newWidth = s.stickyWrapper.width();
            }
            if (newWidth != null) {
                s.stickyElement.css('width', newWidth);
            }
          }
        },
        methods = {
          init: function(options) {
            return this.each(function() {
              var o = $.extend({}, defaults, options);
              var stickyElement = $(this);
    
              var stickyId = stickyElement.attr('id');
              var wrapperId = stickyId ? stickyId + '-' + defaults.wrapperClassName : defaults.wrapperClassName;
              var wrapper = $('<div></div>')
                .attr('id', wrapperId)
                .addClass(o.wrapperClassName);
    
              stickyElement.wrapAll(function() {
                if ($(this).parent("#" + wrapperId).length == 0) {
                        return wrapper;
                }
    });
    
              var stickyWrapper = stickyElement.parent();
    
              if (o.center) {
                stickyWrapper.css({width:stickyElement.outerWidth(),marginLeft:"auto",marginRight:"auto"});
              }
    
              if (stickyElement.css("float") === "right") {
                stickyElement.css({"float":"none"}).parent().css({"float":"right"});
              }
    
              o.stickyElement = stickyElement;
              o.stickyWrapper = stickyWrapper;
              o.currentTop    = null;
    
              sticked.push(o);
    
              methods.setWrapperHeight(this);
              methods.setupChangeListeners(this);
            });
          },
    
          setWrapperHeight: function(stickyElement) {
            var element = $(stickyElement);
            var stickyWrapper = element.parent();
            if (stickyWrapper) {
              stickyWrapper.css('height', element.outerHeight());
            }
          },
    
          setupChangeListeners: function(stickyElement) {
            if (window.MutationObserver) {
              var mutationObserver = new window.MutationObserver(function(mutations) {
                if (mutations[0].addedNodes.length || mutations[0].removedNodes.length) {
                  methods.setWrapperHeight(stickyElement);
                }
              });
              mutationObserver.observe(stickyElement, {subtree: true, childList: true});
            } else {
              if (window.addEventListener) {
                stickyElement.addEventListener('DOMNodeInserted', function() {
                  methods.setWrapperHeight(stickyElement);
                }, false);
                stickyElement.addEventListener('DOMNodeRemoved', function() {
                  methods.setWrapperHeight(stickyElement);
                }, false);
              } else if (window.attachEvent) {
                stickyElement.attachEvent('onDOMNodeInserted', function() {
                  methods.setWrapperHeight(stickyElement);
                });
                stickyElement.attachEvent('onDOMNodeRemoved', function() {
                  methods.setWrapperHeight(stickyElement);
                });
              }
            }
          },
          update: scroller,
          unstick: function(options) {
            return this.each(function() {
              var that = this;
              var unstickyElement = $(that);
    
              var removeIdx = -1;
              var i = sticked.length;
              while (i-- > 0) {
                if (sticked[i].stickyElement.get(0) === that) {
                    splice.call(sticked,i,1);
                    removeIdx = i;
                }
              }
              if(removeIdx !== -1) {
                unstickyElement.unwrap();
                unstickyElement
                  .css({
                    'width': '',
                    'position': '',
                    'top': '',
                    'float': '',
                    'z-index': ''
                  })
                ;
              }
            });
          }
        };
    
      // should be more efficient than using $window.scroll(scroller) and $window.resize(resizer):
      if (window.addEventListener) {
        window.addEventListener('scroll', scroller, false);
        window.addEventListener('resize', resizer, false);
      } else if (window.attachEvent) {
        window.attachEvent('onscroll', scroller);
        window.attachEvent('onresize', resizer);
      }
    
      $.fn.sticky = function(method) {
        if (methods[method]) {
          return methods[method].apply(this, slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method ) {
          return methods.init.apply( this, arguments );
        } else {
          $.error('Method ' + method + ' does not exist on jQuery.sticky');
        }
      };
    
      $.fn.unstick = function(method) {
        if (methods[method]) {
          return methods[method].apply(this, slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method ) {
          return methods.unstick.apply( this, arguments );
        } else {
          $.error('Method ' + method + ' does not exist on jQuery.sticky');
        }
      };
      $(function() {
        setTimeout(scroller, 0);
        if (document.querySelector('.block_right_status--item') && window.innerWidth > 1023) {
            setTimeout(() => {
                $(".block_right_status").sticky({topSpacing:0});
                $('.block_right_status').on('sticky-bottom-reached', function() { console.log("Bottom reached"); });
            }, 500)
        }
      });
    }));
    
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
