import Vue from 'vue'
import Vuex from 'vuex'
import CustomerList from "./modules/customers";
import VendorList from "./modules/vendors";
Vue.use(Vuex);

const store = new Vuex.Store({

    modules: {
        customerList: CustomerList,
        vendorList  : VendorList
    },
    state: {},

    getters: {},

    mutations: {},

    actions: {}

});


export default store;