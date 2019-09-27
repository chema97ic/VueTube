
require('./bootstrap');

window.Vue = require('vue');

require('./components/subscribe-button');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
});
