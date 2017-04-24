import test from 'ava'
import Vue from 'vue'
import sinion from 'sinon'
import CookieLaw from './CookieLaw.vue'

test.serial('Should hide cookies info after accept', t => {
    t.plan(2)

    // Mocking
    let CookiesMock = sinion.mock(CookieLaw._getCookiesInstance())

    CookiesMock
        .expects('get')
        .once()
        .withArgs('cookies_policy')
        .returns(false)
    CookiesMock
        .expects('set')
        .once()
        .withArgs('cookies_policy', 'accepted', {expires: 365})

    let N = Vue.extend(CookieLaw)
    let vm = new N({propsData: {policyUrl: 'url'}})

    t.is(vm.isOpen, true)

    vm.accept()

    t.is(vm.isOpen, false)

    CookiesMock.verify()

})