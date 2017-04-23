import test from 'ava'
import {vueMount} from '../../utils/test'
import Bluebird from 'bluebird'
import Clients from './Clients.vue'

/** @TODO Gitlab setup */
/** @TODO Simple tests for other components */
/** @TODO Production build with cache buster ? */

test.beforeEach(() => {
    axiosMock.reset()
    axiosMock.delayResponse = 0
})

test.serial('Init state without clients', t => {
    t.plan(1)

    axiosMock.onGet('/oauth/clients').reply(200, [])

    const wrapper = vueMount(Clients)

    return Bluebird
        .delay()
        .then(() => {
            t.snapshot(wrapper.html())
        })

})

test.serial('Should render OAuth clients table', t => {
    t.plan(3)

    axiosMock.onGet('/oauth/clients')
        .reply(200, [
            {id: 1, name: 'OAuth Client 1'},
            {id: 2, name: 'OAuth Client 2'}
        ])

    const wrapper = vueMount(Clients)
    t.is(0, wrapper.find('tr').length) // Before rendering

    return Bluebird
        .delay()
        .then(() => {
            t.snapshot(wrapper.html())
            t.is(3, wrapper.find('tr').length) // 2 clients + header
        })

})

test.serial('Should render OAuth clients table after 100 ms delay', t => {
    t.plan(3)

    axiosMock.delayResponse = 100

    axiosMock.onGet('/oauth/clients')
        .reply(200, [
            {id: 1, name: 'OAuth Client 1'},
            {id: 2, name: 'OAuth Client 2'}
        ])

    const wrapper = vueMount(Clients)
    t.is(0, wrapper.find('tr').length) // Before rendering

    return Bluebird
        .delay(105)
        .then(() => {
            t.snapshot(wrapper.html())
            t.is(3, wrapper.find('tr').length) // 2 clients + header
        })

})
