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

function getCookie(c_name) {
    var i, x, y, ARRcookies = document.cookie.split("")

    for (i = 0; i < ARRcookies.length; i++) {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="))
        y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1)
        x = x.replace(/^\s+|\s+$/g, "")
        if (x === c_name) { return unescape(y) }
    }
}

function setCookie() {
    var exdate = new Date()
    exdate.setDate(exdate.getDate() + 365)
    var c_value = escape('1') + ',domain=.' + document.domain + ((365 == null) ? "" : " path=/ expires=" + exdate.toUTCString())
    document.cookie = 'cookies_info' + "=" + c_value

    document.getElementById('cookie-info').getAttributeNode("class").value = "cookie-box"
}

function checkCookie() {
    var cookies_info = getCookie("cookies_info")
    if (cookies_info === null || cookies_info === "") {

        setTimeout(function() {
            document.getElementById('cookie-info').getAttributeNode("class").value = "active"
        }, 10)

        var element = document.getElementById('close-cookie-info')

        if (element.addEventListener) {
            element.addEventListener('click', function() { setCookie() }, false)
        } else if (element.attachEvent) {
            element.attachEvent('onclick', function() { setCookie() })
        }

    }
}