const HeaderBlock = class HeaderBlock {
    constructor() {
      this.isBurgerOpened = false;
      this.isCategoriesOpened = false;
    }
    catalogClick() {
      this.isCategoriesOpened = !this.isCategoriesOpened;
    }
    burgCatClick() {
      console.log(123123123);
      this.isBurgerOpened = !this.isBurgerOpened;
      this.isCategoriesOpened = false;
    }
    init() {
      console.log(123123123123123);
    }
}

export default HeaderBlock;