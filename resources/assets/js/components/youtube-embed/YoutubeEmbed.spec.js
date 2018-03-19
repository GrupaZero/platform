import test from 'ava'
import {vueMount} from '../../utils/test'
import YoutubeEmbed from './YoutubeEmbed.vue'

test.serial('Should render thumbnail image', t => {
    t.plan(3)

    const wrapper = vueMount(YoutubeEmbed, {
        propsData: {
            videoId: 'aP_-P_BS6KY'
        }
    })

    t.true(wrapper.isVueComponent)
    t.false(wrapper.data().queuedToPlay)
    t.snapshot(wrapper.html())
})

test.serial('Should render youtube video inside iframe element', t => {
    t.plan(3)

    const wrapper = vueMount(YoutubeEmbed, {
        propsData: {
            videoId: 'aP_-P_BS6KY'
        }
    })

    t.true(wrapper.isVueComponent)
    wrapper.vm.play()
    wrapper.update()
    t.true(wrapper.data().queuedToPlay)
    t.snapshot(wrapper.html())
})