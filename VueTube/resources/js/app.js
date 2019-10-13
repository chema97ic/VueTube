
require('./bootstrap');

window.Vue = require('vue');

Vue.config.ignoredElements = ['video-js'];

require('./components/subscribe-button');
require('./components/channel-uploads');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
});
