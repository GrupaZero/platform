import test from 'ava'
import {vueMount} from '../../utils/test'
import Bluebird from 'bluebird'
import AuthorizedClients from './AuthorizedClients.vue'

test.beforeEach(() => {
    axiosMock.reset()
    axiosMock.delayResponse = 0
})

test.serial('Init state without tokens', t => {
    t.plan(1)

    axiosMock.onGet('/oauth/tokens').reply(200, [])

    const wrapper = vueMount(AuthorizedClients)

    return Bluebird
        .delay()
        .then(() => {
            t.snapshot(wrapper.html())
        })

})

test.serial('Should render OAuth tokens table', t => {
    t.plan(3)

    axiosMock.onGet('/oauth/tokens')
        .reply(200, [
            {id: 1, client: {name: 'OAuth Token 1'}, scopes: ['scope1', 'scope2']},
            {id: 2, client: {name: 'OAuth Token 2'}, scopes: ['scope1', 'scope3']}
        ])

    const wrapper = vueMount(AuthorizedClients)
    t.is(0, wrapper.find('tr').length) // Before rendering

    return Bluebird
        .delay()
        .then(() => {
            t.snapshot(wrapper.html())
            t.is(3, wrapper.find('tr').length) // 2 tokens + header
        })

})

test.serial('Should render OAuth tokens table after 100 ms delay', t => {
    t.plan(3)

    axiosMock.delayResponse = 100

    axiosMock.onGet('/oauth/tokens')
        .reply(200, [
            {id: 1, client: {name: 'OAuth Token 1'}, scopes: ['scope1', 'scope2']},
            {id: 2, client: {name: 'OAuth Token 2'}, scopes: ['scope1', 'scope3']}
        ])

    const wrapper = vueMount(AuthorizedClients)
    t.is(0, wrapper.find('tr').length) // Before rendering

    return Bluebird
        .delay(105)
        .then(() => {
            t.snapshot(wrapper.html())
            t.is(3, wrapper.find('tr').length) // 2 tokens + header
        })

})
