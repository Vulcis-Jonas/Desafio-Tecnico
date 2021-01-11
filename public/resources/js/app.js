const btnSelectTypeRule =  $('.radio-group > input');
const btnSelectContent =  $('.navbar-vertical > a');

const toggleRule = function (element) {

    if ($(element).css('display') === 'none') {
        $('.toggle-item-rule').fadeOut(0);
        $(element).fadeIn(300);
        return;
    }
}

const toggleContent = function (element) {

    if ($(element).css('display') === 'none') {
        $('.toggle-item-content').fadeOut(0);
        $(element).fadeIn(300);
        return;
    }
}


$(btnSelectTypeRule[0]).on( "click", function() {
    toggleRule('.input-date-rule');
});

$(btnSelectTypeRule[1]).on( "click", function() {
    $('.toggle-item-rule').fadeOut(100);
});
$(btnSelectTypeRule[2]).on( "click", function() {
    toggleRule('.custom-checkbox');
});

$(btnSelectContent[0]).on( "click", function() {
    toggleContent('.form-create-rule');
});
$(btnSelectContent[1]).on( "click", function() {
    toggleContent('.list-rules');
});
$(btnSelectContent[2]).on( "click", function() {
    toggleContent('.form-list-times');
});
