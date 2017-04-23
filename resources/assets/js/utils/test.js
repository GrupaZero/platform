import Translations from '../lang/locales.js';
import VueI18n from 'vue-i18n';
import {mount} from 'avoriaz';

function vueMount(component, arg) {
    component.i18n = new VueI18n({
        locale: 'en',
        fallbackLocale: 'en',
        messages: Translations
    });
    return mount(component, arg)
}

export {vueMount};