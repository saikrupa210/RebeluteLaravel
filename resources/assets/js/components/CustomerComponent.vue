<template>
    <div>

        <div v-if= "validate" class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Thank You</strong> tou have added the customer sucessfully
        </div>

        <form class="form-horizontal" method="post" >
            <fieldset>

                <!-- Form Name -->
                <legend>Customer Form</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Customer Name">Customer Name</label>
                    <div class="col-md-4">
                        <input id="Customer Name" name="cname" v-model="customer.cname" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>


                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="caddress">Address</label>
                    <div class="col-md-4">
                        <textarea class="form-control" id="caddress" name="caddress" v-model="customer.caddress"></textarea>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cphone">Phone Number</label>
                    <div class="col-md-4">
                        <input id="cphone" name="cphone" type="text" v-model="customer.cphone" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Select Multiple -->
                <div class="form-group">
                    <label class="col-md-4 control-label selectpicker " for="vname">Vendor name</label>
                    <div class="col-md-4">
                        <select id="vname" name="vname" class="form-control" multiple="multiple" v-model="customer.vlist">
                            <option disabled value="">Please select one</option>
                            <option v-for="vl in vendorList.list " :value="vl.id" >{{ vl.vname }}</option>
                        </select>
                        <span class="help-block"> Use control to select the multiple option</span>
                    </div>
                </div>
                <!-- CSRF -->
                <input type="hidden" name="_token" :value="csrf">
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="sbtbtn"></label>
                    <div class="col-md-4">
                        <button  type ="button"id="sbtbtn" name="sbtbtn" @click.prevent="saveEdits" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </fieldset>
        </form>

        <br/> <br/> <br/><br/> <br/> <br/><br/>
        <div v-if= "validate1" class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Thank You</strong> tou have added the vendor sucessfully
        </div>


        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>Vendor Form</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="vname">Vendor Name</label>
                    <div class="col-md-4">
                        <input  name="vname" type="text" placeholder=""  v-model="vendor.vname" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label"  for="vaddress">Vendor Address</label>
                    <div class="col-md-4">
                        <input id="vaddress" name="vaddress" type="text" v-model="vendor.vaddress" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cid">Customer Name</label>
                    <div class="col-md-4">
                        <select id="cid" name="cid" class="form-control" v-model="vendor.clist">
                            <option disabled value="">Please select one</option>
                            <option v-for="cl in customerList.list " :value="cl.id" >{{ cl.cname }}</option>
                        </select>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
                    <div class="col-md-4">
                        <button id="singlebutton" type="button" name="singlebutton" @click.prevent="saveVendors" class="btn btn-primary">Save</button>
                    </div>
                </div>

            </fieldset>
        </form>


    </div>
</template>

<script>
    import ExampleComponent from './ExampleComponent'
    import { mapActions, mapState } from 'vuex'
    export default {
        name: "customer-component",

        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                customer:{
                    cname:'',

                    cid:'',

                    caddress:'',

                    cphone:'',

                    vlist:[]
                },
                vendor:{
                   vname  :'',

                    vid   :'',

                vaddress  :'',

                    clist:[]
                },
                validate : 0,
                validate1 : 0
            }
        },

        components:{
            ExampleComponent
        },

        methods:{

            /**
             *  Create a new customer
             */

            saveEdits() {

                console.log('in save method');
                   console.log(this.customer);
                   this.saveCustomer(this.customer)
                        .then(rsp => {
                            this.validate = true;
                            this.resetData();
                        })
                        .catch(err => {
                            if (err.response.status == 422) {
                                console.log("error occured");
                            }
                        });

            },

            saveVendors() {

                console.log('in save method');
                   console.log(this.vendor);
                   this.saveVendor(this.vendor)
                        .then(rsp => {
                            this.validate1 = true;
                            this.resetVendorData();
                        })
                        .catch(err => {
                            if (err.response.status == 422) {
                                console.log("error occured");
                            }
                        });

            },

            /**
             * resetting the data used
             */
            resetData() {
               this.customer.vlist =[];
                this.customer.cname = '';
                this.customer.caddress = '';
                this.customer.cid = '';
                this.customer.cphone = '';
            },

            //resetting the data used .
            resetVendorData() {
              this.vendor ={
                  vname  :'',

                  vid   :'',

                  vaddress  :'',

                  clist:[]
              },
              this.validate1 = false
            },

            ...mapActions(['loadCustomers','loadVendors','saveCustomer','saveVendor'])

        },
        computed: {

            ...mapState([ 'customerList','vendorList']),

        },
        created(){

               this.loadVendors()
               this.loadCustomers()

        },


    }
</script>

<style scoped>

</style>