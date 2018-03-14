import Translations from './lang/locales.js'
import Vue from 'vue'
import VueI18n from 'vue-i18n'
import VueRouter from 'vue-router'

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

new Vue({
    el: '#root',
    i18n: i18n
})

const homeComponent = {
    template: '<div>{{ message }}</div>',
    data: () => ({
        message: 'this is the home screen'
    })
}
const featureComponent = {
    template: '<div>{{ message }}</div>',
    data: () => ({
        message: 'this is the feature screen'
    })
}


import advancedFeatureComponent from './components/AdvancedFeature'

console.log('import of advanced feature component', advancedFeatureComponent)
console.log('require of advanced feature component', require('./components/AdvancedFeature'))


import fithComponentDefault, * as fithComponentWhole from './components/FithComponent.js'

console.log('fith component default', fithComponentDefault)

new Vue({
    el: '#app',
    router: new VueRouter({
        mode: 'history',
        routes: [
            {
                path: '/bartero/home',
                component: homeComponent
            },
            {
                path: '/bartero/feature',
                component: featureComponent
            },
            {
                path: '/bartero/advanced-feature',
                component: () => new Promise(function(resolve) {
                    resolve(advancedFeatureComponent)
                })
            },
            {
                path: '/bartero/another-advanced-feature',
                component: require('./components/AnotherAdvancedFeature')
            },
            {
                path: '/bartero/super-advanced-feature',
                component: function(resolve) {
                    require(['./components/SuperAdvancedFeature'], function(component) {
                        resolve(component)
                    })
                }
            },
            {
                path: '/bartero/another-super-advanced-feature',
                component: function(resolve) {
                    require(['./components/AnotherSuperAdvancedFeature.vue'], function(component) {
                        resolve(component)
                    })
                }
            }
        ]
    }),
    template: '<div>' +
              '<div>{{ title }}</div>' +
              '<div><router-link to="/bartero/home">home</router-link></div>' +
              '<div><router-link to="/bartero/feature">feature</router-link></div>' +
              '<div><router-link to="/bartero/advanced-feature">Advanced feature</router-link></div>' +
              '<div><router-link to="/bartero/another-advanced-feature">Another advanced feature</router-link></div>' +
              '<div><router-link to="/bartero/super-advanced-feature">Super advanced feature</router-link></div>' +
              '<div><router-link to="/bartero/another-super-advanced-feature">Another super advanced' +
              ' feature</router-link></div>' +
              '<router-view></router-view>' +
              '</div>',
    data() {
        return {title: 'hot links'}
    }
})
