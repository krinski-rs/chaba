$(document).ready(function() {
    $('.disabled').on('click',function(event) {
        event.preventDefault();
        return false;
    });
});

function tt_confirm(message, ok_callback, cancel_callback) {
    var modal = $('<div>');
    $(modal).html(message);
    $(modal).dialog({
        resizable: false,
        height: 160,
        modal: true,
        buttons: {
            "OK": function() {
                $(this).dialog('close');
                if (typeof ok_callback == 'function') {
                    ok_callback();
                }
            },
            "Cancelar": {
                click: function() {
                    $(this).dialog('close');
                    if (typeof cancel_callback == 'function') {
                        cancel_callback();
                    }
                },
                class: 'cancelar',
                text: 'Cancelar'
            }
        }
    });
}

function tt_alert(message) {
    var modal = $('<div>');
    $(modal).html(message);
    $(modal).dialog({
        resizable: false,
        height: 160,
        modal: true,
        buttons: {
            "OK": function() {
                $(this).dialog('close');
            }
        }
    });
}

function elementDisable() {
    $(':input').prop('disabled',true);
    $('button').prop('disabled',true);
}

function elementEnable() {
    $(':input').prop('disabled',false);
    $('button').prop('disabled',false);
}

//block screen functions
$(document).ajaxSend(function(event, jqxhr, settings){
    if (settings.type == "POST" || settings.type == "DELETE" || settings.type == "PUT")
        showOverlay();
});

$(document).ajaxComplete(function(event, jqxhr, settings){
    if (settings.type == "POST" || settings.type == "DELETE" || settings.type == "PUT")
        hideOverlay();
});

function showOverlay() {
    $('#overlay').fadeIn(300);
}

function hideOverlay() {
    $('#overlay').fadeOut(300);
}