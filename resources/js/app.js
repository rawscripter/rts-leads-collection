import Vue from "vue";

require('./bootstrap');

window.Vue = require('vue');


import {ServerTable} from "vue-tables-2";

Vue.use(ServerTable);

import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);

import axios from 'axios';
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)


import VuePageTransition from 'vue-page-transition'

Vue.use(VuePageTransition)


import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

Vue.component('loading', Loading);

import router from "./router";

Vue.component('app', require('./components/App.vue').default);
const app = new Vue({
    el: '#app',
    router
});
