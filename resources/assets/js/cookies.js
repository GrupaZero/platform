function addLoadEvent() {
    var oldonload = window.onload

    if (typeof window.onload !== 'function') {
        window.onload = checkCookie
    } else {
        window.onload = function() {
            if (oldonload) { oldonload() }
            checkCookie()
        }
    }
}

addLoadEvent()

function getCookie(cname) {
    var name = cname + "="
    var decodedCookie = decodeURIComponent(document.cookie)
    var ca = decodedCookie.split(';')
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1)
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length)
        }
    }
    return ""
}

function setCookie() {
    var exdate = new Date()
    var c_value = escape('1') + ',domain=.' + document.domain

    exdate.setDate(exdate.getDate() + 365)
    c_value += (" path=/ expires=" + exdate.toUTCString())
    document.cookie = 'cookies_info' + "=" + c_value

    document.getElementById('cookie-info').getAttributeNode("class").value = "cookie-box"
}

function checkCookie() {
    var cookies_info = getCookie("cookies_info")
    var element = document.getElementById('close-cookie-info')

    if (cookies_info === null || cookies_info === "" || (typeof cookies_info === 'undefined' && typeof element !== 'undefined')) {

        setTimeout(function() {
            document.getElementById('cookie-info').getAttributeNode("class").value = "active"
        }, 10)

        if (element.addEventListener) {
            element.addEventListener('click', function() { setCookie() }, false)
        } else if (element.attachEvent) {
            element.attachEvent('onclick', function() { setCookie() })
        }

    }
}