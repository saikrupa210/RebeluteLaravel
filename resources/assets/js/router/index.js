import VueRouter from 'vue-router'
import vue from 'vue'
vue.use(VueRouter)
import app from '../components/App.vue'
const routes = [

    // Route for the customer
    {
        path: '/vue/dash',
        components: app
    },

];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router