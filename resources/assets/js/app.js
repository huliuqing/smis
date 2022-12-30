/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import App from "../../views/App.vue";
import SmisBootstrap from './smisMain'
import VueRouter from "vue-router"

import Auth from './auth'
import routes from "./routes"

require('./bootstrap');

window.Vue = require('vue')

Vue.use(VueRouter)
Vue.use(SmisBootstrap)


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

console.log(routes)

const router = new VueRouter({
    linkActiveClass: 'nav-item active',
    routes
})

router.beforeEach(Auth.guard)

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
});
