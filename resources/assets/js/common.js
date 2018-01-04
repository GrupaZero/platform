/**
 * Serialize form to object
 * @returns {{}} serialized form object
 */
$.fn.serializeObject = function() {
    var o = {}
    var a = this.serializeArray()

    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]]
            }
            o[this.name].push(this.value || '')
        } else {
            o[this.name] = this.value || ''
        }
    })
    return o
}

/*Loading object*/
window.Loading = {
    loadingContainer: '.loading',
    loadingMinHeight: 200,
    start: function(container) {
        var me = this
        var destHtml = $(container)
        var loading = $(me.loadingContainer)

        if (destHtml.length > 0) {
            loading.css('top', destHtml.offset().top + 'px')
            loading.css('left', destHtml.offset().left + 'px')
            loading.css('width', destHtml.outerWidth() + 'px')
            loading.css('height', destHtml.outerHeight() + 'px')
        }
    },
    stop: function() {
        $(this.loadingContainer).removeAttr('style')
    }
}

/**
 * Function sets form validation errors in form
 *
 * @param {string} fieldName name of the field with errors occurred
 * @param {string} message  error message to append
 *
 * @return {void}
 */
window.setFormValidationErrors = function(fieldName, message) {
    var field = $('input[name=' + fieldName + ']').parent('.form-group') // get the field

    if (field.hasClass('has-error')) { // if already has error, then set new message
        field.find('.help-block').text(message)
    } else { // append error with html
        field.addClass('has-error').append('<p class="help-block">' + message + '</p>')
    }
}

/**
 * Function appends global messages in to the content container
 *
 * @param {string} code code of the message, eg. 'error', 'success', 'warning'
 * @param {string} message message to append
 *
 * @return {void}
 */
window.setGlobalMessage = function(code, message) {
    $('#content').prepend('<div class="message-box"><div class="alert alert-' + code + ' alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>' + message + '</div></div>')
}

/**
 * Function removes form validation errors
 *
 * @return {void}
 */
window.clearFormValidationErrors = function() {
    var error = $(".form-group.has-error")

    error.removeClass('has-error')
    error.find('.help-block').remove()
}

/**
 * Function hides global messages after 5 second delay
 *
 * @return {void}
 */
window.hideMessages = function() {
    setTimeout(window.clearMessages, 5000)
}

/**
 * Function fades outs and removes global messages
 *
 * @return {void}
 */
window.clearMessages = function() {
    var alert = $("div.message-box div.alert")

    alert.fadeOut("slow", function() {
        alert.remove()
    })

    $("div.message-box").slideToggle("slow", function() {
        $(this).remove()
    })
}

$(function() {
    var lang = $('html').attr('lang')

    // Expand parent of an active element
    $(".nav-stacked li.active").parents('li').addClass('active').has('ul').children('ul').addClass('collapse in')
    // Loading on form submit actions
    $('form').submit(function() {
        window.Loading.start('#main-container')
    })
    // Responsive pagination
    $(".pagination").rPage()
    // Colorbox
    $('img.colorbox').click(function() {
        $(this).colorbox({
            href: $(this).parent('a').attr('href'),
            rel: $(this).parent('a').attr('rel'),
            maxWidth: "95%",
            maxHeight: "95%"
        })
    })
    $('a.colorbox').colorbox({
        rel: $(this).attr('rel'),
        maxWidth: "95%",
        maxHeight: "95%"
    })
    $('a.colorbox-iframe').colorbox({
                iframe: true,
                innerWidth: 640,
                innerHeight: 360
            }
    )
    // Load translation files
    if (lang !== 'en') {
        $.getScript('/js/vendor/jquery-colorbox/i18n/jquery.colorbox-' + lang + '.js')
    }
})