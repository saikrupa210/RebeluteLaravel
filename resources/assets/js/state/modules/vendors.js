/**
 * Module representing the customers state
 */
let VendorList = {

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
        setVendor(state, customer) {

            let i = state.list.findIndex(ip => ip.id == vendor.id);
            if (i > -1) {
                state.list.splice(i, 1, vendor);
            } else {
                state.list.push(vendor);
            }
        },


        /**
         * set the customers list
         */
        setVendorList(state, vendors) {
            state.list = vendors;
            // console.log(this.state.list);
        },
    },

    actions: {

        /**
         * Load all vendors
         * @param commit
         * @param routeParams
         */
        loadVendors( { commit }) {
            return axios.get('api/home/vendors')
                .then(rsp => commit('setVendorList', rsp.data));
        },

        /**
         * Create a vendor
         * @param commit
         *
         */
        saveVendor( { commit }, data) {

            console.log(data);

            if (data.vname != '') {

                return axios.post('api/home/addVendor', data).then(function (response) {
                    commit('setVendor', response.data);
                    return response.data;

                }).catch(function (response) {
                    console.log(response);
                });
            }

        }
    }

}

export default VendorList