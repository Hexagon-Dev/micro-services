require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue');

import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import RouterLink from 'vue-router'
import useLink from 'vue-router'
import axios from 'axios';
import {routes} from './routes';
import VModal from 'vue-js-modal';

import App from './component/App.vue';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VModal, {
    dialog: true,
});

const router = new VueRouter({
    mode: 'history',
    routes: routes,
    linkActiveClass: 'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium'
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App)
});
