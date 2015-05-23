/**
 * Serialize form to object
 * @returns {{}}
 */
$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
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

/*Loading object*/
var Loading = {
    loadingContainer: '.loading',
    loadingMinHeight: 200,
    start: function(container) {
        var me = this;
        var destHtml = $(container);
        if (destHtml.length > 0) {
            var loading = $(me.loadingContainer);
            loading.css('top', destHtml.offset().top + 'px');
            loading.css('left', destHtml.offset().left + 'px');
            loading.css('width', destHtml.width() + 'px');
            loading.css('height', destHtml.height() + 'px');
        }
    },
    stop: function() {
        var me = this;
        $(me.loadingContainer).removeAttr('style');
    }
};

/**
 * Function sets form validation errors in form
 *
 * @param fieldName name of the field with errors occurred
 * @param message  error message to append
 *
 */
function setFormValidationErrors(fieldName, message) {
    var field = $('input[name=' + fieldName + ']').parent('.form-group'); // get the field
    if (field.hasClass('has-error')) { // if already has error, then set new message
        field.find('.help-block').text(message);
    } else { // append error with html
        field.addClass('has-error').append('<p class="help-block">' + message + '</p>');
    }
}

/**
 * Function appends global messages in to the content container
 *
 * @param code code of the message, eg. 'error', 'success', 'warning'
 * @param message message to append
 *
 */
function setGlobalMessage(code, message) {
    $('#content').prepend('<div class="message-box"><div class="alert alert-' + code + ' alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + message + '</div></div>');
}

/**
 * Function removes form validation errors
 */
function clearFormValidationErrors() {
    var error = $(".form-group.has-error");
    error.removeClass('has-error');
    error.find('.help-block').remove();
}

/**
 * Function hides global messages after 5 second delay
 *
 */
function hideMessages() {
    setTimeout(clearMessages, 5000);
}

/**
 * Function fades outs and removes global messages
 */
function clearMessages() {
    var alert = $("div.message-box div.alert");
    alert.fadeOut("slow", function() {
        alert.remove();
    });
    $("div.message-box").slideToggle("slow", function() {
        $(this).remove()
    });
}
