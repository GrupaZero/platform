import test from 'ava';
import {mount} from 'avoriaz';
import Bluebird from 'bluebird';
import VueI18n from 'vue-i18n';
import Clients from './Clients.vue'

/** @TODO ESLint for ava and source code */
/** @TODO Travis & Gitlab setup */
/** @TODO Simple tests for other components */
/** @TODO Simple tests for ES6 class with sinon mock */
/** @TODO Code auto completion ? */
/** @TODO Production build with cache buster ? */

/** @TODO extend mount to use i18n? */
Clients.i18n = new VueI18n({
    locale: 'en',
    fallbackLocale: 'en',
    messages: vueTranslations
});


test.beforeEach(t => {
    axiosMock.reset();
});

test.serial('Init state without clients', t => {
    t.plan(1);

    axiosMock.onGet('/oauth/clients').reply(200, []);

    const wrapper = mount(Clients);

    /** @TODO Change to promise **/
    return Bluebird.fromCallback((callback) => {
            setImmediate(() => {
                t.snapshot(wrapper.html());
                return callback();
            })
        }
    );

});

test.serial('Should render OAuth clients table', t => {
    t.plan(3);

    axiosMock.onGet('/oauth/clients')
        .reply(200, [
            {id: 1, name: 'OAuth Client 1'},
            {id: 2, name: 'OAuth Client 2'}
        ]);

    const wrapper = mount(Clients);
    t.is(0, wrapper.find('tr').length); // Before rendering

    /** @TODO Change to promise */
    return Bluebird.fromCallback((callback) => {
            setImmediate(() => {
                t.snapshot(wrapper.html());
                t.is(3, wrapper.find('tr').length); // 2 clients + header
                return callback();
            })
        }
    );

});