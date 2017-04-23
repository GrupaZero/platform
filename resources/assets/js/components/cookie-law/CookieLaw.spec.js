import test from 'ava'
import sinion from 'sinon'
import {vueMount} from '../../utils/test'
import Bluebird from 'bluebird'
import CookieLaw from './CookieLaw.vue'

test.serial('Should display cookies law info', t => {
    t.plan(1)

    CookieLaw.methods._getCookiesInstance = {
        get: sinion.stub(),
        set: sinion.stub()
    }


    const wrapper = vueMount(CookieLaw, {
        propsData: { policyUrl: 'xxx' }
    })

    return Bluebird
    .delay()
    .then(() => {
        t.snapshot(wrapper.html())
    })

})