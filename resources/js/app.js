require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

import router from './router'

window.Vue = Vue;
Vue.use(VueRouter);

// Vue.component('example-component', require('./components/userlist.vue').default);

const app = new Vue({
    el: '#app',
    router
});
