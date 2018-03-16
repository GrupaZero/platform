import VueRouter from 'vue-router'
import Vue from 'vue'
import VueI18n from 'vue-i18n'
import AdminPackage from '@gzero/admin-module-test'
import Translations from './lang/locales'

require('./bootstrap')
require('./common')

Vue.use(VueI18n)
Vue.use(VueRouter)

const i18n = new VueI18n({
    locale: document.documentElement.lang,
    fallbackLocale: 'en',
    messages: Translations
})

const router = new VueRouter({
    mode: 'history',
    base: '/spa-demo/',
    linkActiveClass: 'active',
    routes: []
})

const app = new Vue({
    el: '#app',
    i18n: i18n,
    router: router,
    components: {
        'admin-panel': require('./components/AdminPanel')
    },
    data() {
        return {
            title: 'Admin Panel',
            titlePrefix: 'Panel',
            apps: []
        }
    },
    created: function() {
        const homeComponent = {
            template: '<div>{{ message }}</div>',
            data: () => ({
                message: 'this is the home screen'
            })
        }

        this.registerLauncher(
                {
                    path: '/home',
                    label: 'Home'
                }, homeComponent)

        AdminPackage.register(this)

    },
    methods: {
        updateTitle: function(title) {
            window.document.title = title
        },
        registerLauncher: function(manifest, component, children = []) {
            const path = manifest.path
            const label = manifest.label

            router.addRoutes([
                {
                    path,
                    component,
                    children
                }
            ])
            this.apps.push({
                path,
                label
            })
        }
    }
})

/**
 * Re-setting window title on each navigation
 */
router.afterEach((to, from) => { // eslint-disable-line no-unused-vars
    let component = to.matched[0].components.default
    let name = app.$data['title']
    if (component.hasOwnProperty('methods') && component.methods.hasOwnProperty('getName')) {
        name = app.$data['titlePrefix'] + ' :: ' + component.methods.getName()
    }
    app.updateTitle(name)
})
