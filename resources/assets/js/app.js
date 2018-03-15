import Translations from './lang/locales.js'
import Vue from 'vue'
import VueI18n from 'vue-i18n'
import VueRouter from 'vue-router'

import AdminPackage from '@gzero/admin-module-test'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
require('./common')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.use(VueI18n)
Vue.use(VueRouter)

const i18n = new VueI18n({
    locale: document.documentElement.lang,
    fallbackLocale: 'en',
    messages: Translations
})

/**
 * Laravel Passport
 */
Vue.component(
        'passport-clients',
        require('./components/passport/Clients.vue')
)

Vue.component(
        'passport-authorized-clients',
        require('./components/passport/AuthorizedClients.vue')
)

Vue.component(
        'passport-personal-access-tokens',
        require('./components/passport/PersonalAccessTokens.vue')
)

Vue.component(
        'cookie-law',
        require('./components/cookie-law/CookieLaw.vue')
)

// new Vue({
//     el: '#root',
//     i18n: i18n
// })


const router = new VueRouter({
    mode: 'history',
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
                    path: 'home',
                    label: 'Home'
                }, homeComponent)

        AdminPackage.register(this)
    },
    methods: {
        updateTitle: function(title) {
            window.document.title = title
        },
        registerLauncher: function(manifest, component, children = []) {
            const path = '/spa-demo/' + manifest.path
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

window.app = app

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
