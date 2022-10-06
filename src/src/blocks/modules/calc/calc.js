import Vue from 'vue/dist/vue.js';


const Calculator = class Calculator {
    constructor() {
        this.app = new Vue({
            el: '#calculator',
            data: () => ({
                models: [],
            })
        })
    }
    
    setModels(models) {
        this.models = models;
    }

    init() {
        console.log('calculator inited', this.app.message);
    }
}

export default Calculator;