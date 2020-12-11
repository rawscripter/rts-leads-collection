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


import * as VueGoogleMaps from 'vue2-google-maps'


Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyDdObl958ollghTOwmrvgHCJRJmWzeKJQ0',
        libraries: 'places', // This is required if you use the Autocomplete plugin
        // OR: libraries: 'places,drawing'
        // OR: libraries: 'places,drawing,visualization'
        // (as you require)

        //// If you want to set the version, you can do so:
        // v: '3.26',
    },

    //// If you intend to programmatically custom event listener code
    //// (e.g. `this.$refs.gmap.$on('zoom_changed', someFunc)`)
    //// instead of going through Vue templates (e.g. `<GmapMap @zoom_changed="someFunc">`)
    //// you might need to turn this on.
    // autobindAllEvents: false,

    //// If you want to manually install components, e.g.
    //// import {GmapMarker} from 'vue2-google-maps/src/components/marker'
    //// Vue.component('GmapMarker', GmapMarker)
    //// then disable the following:
    // installComponents: true,
})


Vue.component('loading', Loading);

import router from "./router";

Vue.component('app', require('./components/App.vue').default);
const app = new Vue({
    el: '#app',
    router
});
