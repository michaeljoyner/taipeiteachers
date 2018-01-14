require('./bootstrap');

window.Vue = require('vue');


Vue.component('modal', require('./components/Modal'));
Vue.component('school-search', require('./components/SchoolSearch'));
Vue.component('school-preview', require('./components/SchoolPreview'));
Vue.component('school-form', require('./components/SchoolForm'));
Vue.component('school-page', require('./components/SchoolPage'));
Vue.component('add-school', require('./components/AddSchoolButton'));

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
