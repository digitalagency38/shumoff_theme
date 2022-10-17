import Vue from 'vue/dist/vue.js';
import $ from 'jquery';


const Calculator = class Calculator {
    constructor() {
        if (!document.querySelector('#calculator')) return;
        this.app = new Vue({
            el: '#calculator',
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
            }),
            watch: {
                selectedBrand: function(newValue, oldValue) {
                    if (newValue === oldValue) return;
                    this.selectedModel = "";
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
                    this.selectedBody = this.availableBodies[0];
                },
                selectedBody: function(newValue, oldValue) {
                    if (newValue === oldValue) return;
                    this.splitProductsByArea(this.selectedProducts);
                    this.reloadAreas(this.effect);
                },                 
            },
            async mounted() {
                this.setApiParams();
                await this.getProducts().then(result => {
                    this.products = result;
                });
                this.models = loadModels();
                this.filterBrands();
                this.getNonce();
            },
            computed: {
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
                },
                setModels(models) {
                    this.models = models;
                },
                basicAuth(key, secret) {
                    let hash = btoa(key + ':' + secret);
                    return "Basic " + hash;
                },
                setApiParams() {
                    this.url = document.querySelector('[data-site-url]').dataset.siteUrl;
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
                   
                }
            }
        });
    }
    
    init() {
        if (!document.querySelector('#calculator')) return;
        console.log(this.app.message);
    }
}

export default Calculator;