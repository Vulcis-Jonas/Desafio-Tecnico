const btnSelectTypeRule =  $('.radio-group > input');

const toggleRule = function (element) {
    if ($(element).css('display') === 'none') {
        $('.toggle-item-rule').removeClass('ocult');
        $('.toggle-item-rule').fadeOut(0);
        $(element).fadeIn(300);
        return;
    }
}

$(btnSelectTypeRule[0]).on( "click", function() {
    toggleRule('.input-date-rule');
    console.log('0');
});

$(btnSelectTypeRule[1]).on( "click", function() {
    $('.toggle-item-rule').fadeOut(100);
    console.log('1');
});
$(btnSelectTypeRule[2]).on( "click", function() {
    toggleRule('.custom-checkbox');
    console.log('2');
});

// Configuração para a seleção de datas
$('.timepicker').timepicker({
    timeFormat: 'HH:mm:ss',
    interval: 60,
    minTime: '08',
    maxTime: '18',
    defaultTime: '08',
    startTime: '8',
    dynamic: true,
    dropdown: true,
    scrollbar: true
});

// Agrupa os valores de um formulario
$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

$('.btn-form-submit').on( 'click', function() {
    let temp = $('.timepicker');
    var login_form = $('.form-create-rule');
    var form_data = JSON.stringify(login_form.serializeObject());
    let time1 = parseInt(temp[0].value);
    let time2 = parseInt(temp[1].value);
    console.log(form_data);
    if ( time1 >  time2 ) {
        console.log('invalid')
    } else {
        console.log('valid')
    }
});

