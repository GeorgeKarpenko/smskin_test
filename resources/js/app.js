require('./bootstrap');

window.Vue = require('vue');

import {store} from './store/';
import {router} from './routers.js';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.component('App', require('./Pages/App.vue').default);

const app = new Vue({
    el: '#app',
    store,
    router
});
