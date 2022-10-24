import Vue from 'vue/dist/vue.js';
import $ from 'jquery';

const MainWork = class MainWork {
    constructor() {
        if (!document.querySelector('#portfolio')) return;
        this.app = new Vue({
            el: '#portfolio',
            data: () => ({
                brands: [],
                selectedBrand: "",
                selectedModel: "",
                uniqueModels: [],
            }),
            mounted() {
                this.models = loadModels();
                this.filterBrands();
            },
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
                    // this.selectedBody = this.availableBodies[0];
                },              
            },
            methods: {
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
                clearFilter() {
                    this.selectedBrand = "";
                }
            }
        });
    }
    moreBlock() {
        const ITEMS_COUNT_PER_CLICK = 6;

        const showButton = document.querySelector('.main_work__all');
        const items = document.querySelectorAll('.main_work__slid');
        const itemsCount = items.length;
        let i = ITEMS_COUNT_PER_CLICK;

        for (; i < itemsCount; ++i) {
            items[i].style.display = 'none';
        }

        i = ITEMS_COUNT_PER_CLICK;

        const callback = (event) => {
            if (i >= itemsCount) {
            // alert('Больше товаров нет!');
            //showButton.removeEventListener('click', callback);
            showButton.outerHTML = '';
            return;
        }
        
        items[i++].style.display = '';  
        if (i < itemsCount) {
            items[i++].style.display = '';
        }
        };

        if (!showButton) return;

        showButton.addEventListener('click', callback);
  
    }
    init() {
        this.moreBlock();
    }
}

export default MainWork;