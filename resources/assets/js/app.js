require('./bootstrap');

window.Vue = require('vue');

import { DeleteModal, Modal, ToggleSwitch } from "@dymantic/vuetilities";
import { ImageUpload } from "@dymantic/imagineer";
import { VueForm } from "@dymantic/vue-forms";
import { Wysiwyg } from "@dymantic/trix-vue-wysiwyg";

Vue.component('modal', Modal);
Vue.component('vue-form', VueForm);
Vue.component('wysiwyg-editor', Wysiwyg);
Vue.component('toggle-switch', ToggleSwitch);
Vue.component('image-upload', ImageUpload);
Vue.component('school-search', require('./components/SchoolSearch'));
Vue.component('school-preview', require('./components/SchoolPreview'));
Vue.component('school-form', require('./components/SchoolForm'));
Vue.component('school-page', require('./components/SchoolPage'));
Vue.component('add-school', require('./components/AddSchoolButton'));
Vue.component('faqs-index', require('./components/FaqsIndex'));
Vue.component('faq-form', require('./components/FaqForm'));
Vue.component('faq-page', require('./components/FaqPage'));
Vue.component('delete-modal', DeleteModal);

Vue.component('info-links-index', require('./components/InfoLinks/InfoLinksIndex'));
Vue.component('info-link-form', require('./components/InfoLinks/InfoLinkForm'));
Vue.component('info-link', require('./components/InfoLinks/InfoLink'));

window.eventHub = new Vue();

const app = new Vue({
    el: '#app'
});

window.initMaps = (ev) => eventHub.$emit('maps-loaded');

document.body.addEventListener('keyup', (ev) => {
    switch (ev.keyCode) {
        case 27:
            eventHub.$emit('KEY_ESC');
            break;
        default:
            break;
    }
}, false);
