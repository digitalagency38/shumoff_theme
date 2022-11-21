const MainWork = class MainWork {
    constructor() {
        this.ITEMS_COUNT_PER_CLICK = 6;
        this.vievedItems = 6;
        this.itemsCount = 1000000;
    }
    showMore() {
        this.vievedItems = this.vievedItems + this.ITEMS_COUNT_PER_CLICK;
        this.itemsCount = document.querySelectorAll('.main_work__slid').length;

        document.querySelectorAll('.main_work__slid').forEach((item, key)=>{
            if (key < this.itemsCount) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        })
    }
    init() {}
}

export default MainWork;