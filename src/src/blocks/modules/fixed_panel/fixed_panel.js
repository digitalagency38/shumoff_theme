import $ from 'jquery';

const FixedBlock = class FixedBlock {
    constructor() {}
          
    PanelClick() {
        $('.fixed_panel__menu').on('click', function(){
            $(".burger-btn").click();
          });
        }
    init() {
        this.PanelClick();
    }
}

export default FixedBlock;