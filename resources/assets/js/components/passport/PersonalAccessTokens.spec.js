import test from 'ava'
import {vueMount} from '../../utils/test'
import Bluebird from 'bluebird'
import PersonalAccessTokens from './PersonalAccessTokens.vue'

test.beforeEach(() => {
    axiosMock.reset()
    axiosMock.delayResponse = 0
})

test.serial('Init state without personal access tokens', t => {
    t.plan(1)

    axiosMock.onGet('/oauth/scopes').reply(200, [])
    axiosMock.onGet('/oauth/personal-access-tokens').reply(200, [])

    const wrapper = vueMount(PersonalAccessTokens)

    return Bluebird
    .delay()
    .then(() => {
        t.snapshot(wrapper.html())
    })

})

test.serial('Should render OAuth personal access tokens table', t => {
    t.plan(3)

    axiosMock.onGet('/oauth/scopes')
    .reply(200, [
        {id: 1},
        {id: 2}
    ])

    axiosMock.onGet('/oauth/personal-access-tokens')
    .reply(200, [
        {id: 1, name: 'OAuth Token 1'},
        {id: 2, name: 'OAuth Token 2'}
    ])

    const wrapper = vueMount(PersonalAccessTokens)
    t.is(0, wrapper.find('tr').length) // Before rendering

    return Bluebird
    .delay()
    .then(() => {
        t.snapshot(wrapper.html())
        t.is(3, wrapper.find('tr').length) // 2 tokens + header
    })

})

test.serial('Should render OAuth personal access tokens table after 100 ms delay', t => {
    t.plan(3)

    axiosMock.delayResponse = 100

    axiosMock.onGet('/oauth/scopes')
    .reply(200, [
        {id: 1},
        {id: 2}
    ])

    axiosMock.onGet('/oauth/personal-access-tokens')
    .reply(200, [
        {id: 1, name: 'OAuth Token 1'},
        {id: 2, name: 'OAuth Token 2'}
    ])

    const wrapper = vueMount(PersonalAccessTokens)
    t.is(0, wrapper.find('tr').length) // Before rendering

    return Bluebird
    .delay(105)
    .then(() => {
        t.snapshot(wrapper.html())
        t.is(3, wrapper.find('tr').length) // 2 tokens + header
    })

})
