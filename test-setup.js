// Setup browser environment
import Translations from './resources/assets/js/lang/locales.js';


require('browser-env')();
const Vue = require('vue');
const axios = require('axios');
const hooks = require('require-extension-hooks');
const MockAdapter = require('axios-mock-adapter');

import VueI18n from 'vue-i18n';

Vue.use(VueI18n);


// Setup Vue.js to remove production tip
Vue.config.productionTip = false;

global.axios = axios;
global.axiosMock = new MockAdapter(axios);

global.$ = global.jQuery = require('jquery');
global.vueTranslations = Translations;

// Setup vue files to be processed by `require-extension-hooks-vue`
hooks('vue').plugin('vue').push();
// Setup vue and js files to be processed by `require-extension-hooks-babel`
hooks(['vue', 'js']).plugin('babel').push();