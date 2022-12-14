import $ from 'jquery';

const FixedBlock = class FixedBlock {
    constructor() {}
          
    PanelClick() {
        console.log('asdasdasdasd');
        $('.fixed_panel__menu').on('click', function(){
            console.log('tratatata');
            $(".burger-btn").click();
          });
        }
    init() {
        console.log('asdasdasdasd');
        this.PanelClick();
    }
}

export default FixedBlock;