/**
 * Module representing the customers state
 */
let CustomerList = {

    state: {
        list: []
    },

    getters: {},

    mutations: {

        /**
         * Add/Replace a plan set in the list
         *
         * @param state
         * @param policy
         */
        setCustomer(state, customer) {

            let i = state.list.findIndex(ip => ip.id == customer.id);
            if (i > -1) {
                state.list.splice(i, 1, customer);
            } else {
                state.list.push(customer);
            }
        },


        /**
         * set the customers list
         */
        setCustomerList(state, payload) {

            state.list = payload ;

        },
    },

    actions: {

        /**
         * Load all customers
         * @param commit
         * @param routeParams
         */
        loadCustomers( { commit }) {
            return axios.get('api/home/customers')
                .then(rsp => commit('setCustomerList', rsp.data));
        },

        /**
         * Create an customer
         * @param commit
         */
        saveCustomer( { commit }, data) {

            if(data.cname !='') {

                return axios.post('api/home/addCustomer',data).then(function (response) {
                        commit('setCustomer', response.data);
                        return response.data;

                    }).catch(function (response) {
                        console.log(response);
                    });
            }

        },


    }

}

export default CustomerList