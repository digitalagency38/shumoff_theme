import $ from 'jquery';

const ServBlock = class ServBlock {
    constructor() {}
    tabsBlock() {
        var slideEl = $(".review__block");
        var slideBt = $(".review__btn");
        $(".review__btn:first-child").addClass("isActive");
        slideBt.click(function () {
            slideBt.removeClass("isActive");
            slideBt.removeClass("isActive");
            $(this).addClass("isActive");
            slideEl.hide();
            $("." + this.id).show();
        });
    }
    accordBlock() {
        $('.rev_accord__title').on('click', function(){
            $(this).toggleClass('isActive');
            if($(this).hasClass('isActive')) {
                $(this).parent().find('.rev_accord__body').show(400);
            } else {
                $(this).parent().find('.rev_accord__body').hide(400);
            }
        });
    }
    init() {
        this.tabsBlock();
        this.accordBlock();
    }
}

export default ServBlock;