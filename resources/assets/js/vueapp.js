import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import Welcome from './components/Welcome'
import Page from './components/Page'
import ValidationForm from './components/ValidationForm'
import Listing from './components/Listing'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: 'home',
            name: 'welcome',
            component: Welcome,
            props: { title: "This is the SPA home" }
        },
        {
            path: 'spa-page',
            name: 'page',
            component: Page,
            props: {
                title: "This is the SPA Second Page",
                author : {
                    name : "Fisayo Afolayan",
                    role : "Software Engineer",
                    code : "Always keep it clean"
                }
            }
        },
        {
            path: 'form-validation-vue',
            name: 'form-validation-vue',
            component: ValidationForm,
            props: {
            }
        },
        {
            path: 'listing',
            name: 'listing',
            component: Listing,                        
        },
    ],
})
const app = new Vue({
    el: '#app',
    components: { App },
    router,
});