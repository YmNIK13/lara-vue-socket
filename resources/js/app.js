/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

window.io = require('socket.io-client');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('table-prop-component', require('./components/table/TablePropComponent').default);
Vue.component('table-ajax-component', require('./components/table/TableAjaxComponent').default);

Vue.component('chart-line-component', require('./components/chart/ChartLineComponent').default);
Vue.component('chart-pie-component', require('./components/chart/ChartPieComponent').default);
Vue.component('chart-line-dynamic-component', require('./components/chart/ChartLineDynamicComponent').default);
Vue.component('chart-socket-component', require('./components/chart/ChartSocketComponent').default);

Vue.component('chat-socket-component', require('./components/chat/ChatSocketComponent').default);
Vue.component('chat-private-socket-component', require('./components/chat/ChatPrivateSocketComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
