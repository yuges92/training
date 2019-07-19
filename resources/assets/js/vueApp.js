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

Vue.component('class-component', require('./components/classes/ClassComponent.vue').default);
Vue.component('assignment-component', require('./components/assignment/AssignmentComponent.vue').default);
Vue.component('referralcode-component', require('./components/ReferralCode/ReferralCodeComponent.vue').default);
Vue.component('loader', require('./components/Loader.vue').default);

import CKEditor from '@ckeditor/ckeditor5-vue';
import axios from "axios";
import Toasted from 'vue-toasted';
import VueSweetalert2 from 'vue-sweetalert2';
import vSelect from 'vue-select'
import Multiselect from 'vue-multiselect'



Vue.use(VueSweetalert2);
Vue.use(Toasted);
Vue.use( CKEditor );
Vue.component('v-select', vSelect);
Vue.component('multiselect', Multiselect);


//global methods and attributes
Vue.mixin({
    methods: {
        alertSuccess: function(message){
            Vue.toasted.show(
                '<i class="fas fa-check-circle fa-3x"></i> '+message,
                {
                  type: "success",
                  duration: 4000,
                  className: "py-3"
                }
              );
        },
        alertFailed: function (message){
            Vue.toasted.show(
                '<i class="fas fa-exclamation-circle fa-3x"></i>'+message,
                {
                  type: "error",
                  duration: 4000,
                  className: "py-3"
                }
              );
        }
    },
    });



const app = new Vue({
    el: '#app',


});

