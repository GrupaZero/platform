import test from 'ava'
import Vue from 'vue'
import sinion from 'sinon'
import PrivacyInfo from './PrivacyInfo'
import Cookies from 'js-cookie'

test.serial('Should hide cookies info after accept', t => {
    t.plan(2)


    // Mocking
    let PrivacyInfoMock = sinion.mock(Cookies)

    PrivacyInfoMock
        .expects('get')
        .once()
        .withArgs('cookies_policy')
        .returns(false)
    PrivacyInfoMock
        .expects('set')
        .once()
        .withArgs('cookies_policy', 'accepted', {expires: 365})

    let N = Vue.extend(PrivacyInfo)
    let vm = new N({propsData: {privacyPolicyUrl: 'url'}})

    t.is(vm.toShow, true)

    vm.accept()

    t.is(vm.toShow, false)

    PrivacyInfoMock.verify()

})
