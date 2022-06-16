/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
window.Vue = require('vue').default;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Multiselect from 'vue-multiselect';

import ExampleComponent from "./components/ExampleComponent.vue";
import universityRequestComponent from "./components/universityRequest/universityRequestComponent.vue";
import universityRowComponent from "./components/universityRequest/universityRowComponent.vue";

import englishSchoolRequestComponent from "./components/englishSchoolRequest/englishSchoolRequestComponent.vue";

import englishSchoolRowComponent from "./components/englishSchoolRequest/englishSchoolRowComponent.vue";
import VSelect from '@alfsnd/vue-bootstrap-select'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#crm_app',
    components: {
        Multiselect,
        ExampleComponent,
        universityRequestComponent,
        VSelect,
        universityRowComponent,
        englishSchoolRowComponent,
        englishSchoolRequestComponent


    }
});