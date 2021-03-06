/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('course-component', require('./components/course/CourseComponent.vue').default);
import CKEditor from '@ckeditor/ckeditor5-vue';
import axios from "axios";
import Toasted from 'vue-toasted';
import VueSweetalert2 from 'vue-sweetalert2';
 
Vue.use(VueSweetalert2);
Vue.use(Toasted);
Vue.use( CKEditor );




const app = new Vue({
    el: '#app',
    data: {
            message:'Hello World!',
            age:21
    },
});

