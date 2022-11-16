import Vue from 'vue/dist/vue.js';

const MainWork = class MainWork {
    constructor() {}
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