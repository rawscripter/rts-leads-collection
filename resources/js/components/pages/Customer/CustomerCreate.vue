<template>

    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-body">
                    <h3>Add New Lead</h3>
                    <br>

                    <loading :active.sync="isLoading"
                             :can-cancel="true"
                             :loader="'dots'"
                             :is-full-page="false"></loading>
                    <form action="" v-on:submit.prevent="addNewCustomer">
                        <div class="form-group">
                            <label for="name"> Name <small>(Required)</small></label>
                            <input type="text" id="name" v-model="customer.name" class="form-control" required
                                   placeholder="Customer Name">
                        </div>

                        <div class="form-group">
                            <label for="company">Shop / Company Name <small>(if any)</small></label>
                            <input type="text" id="company" v-model="customer.organization" class="form-control"
                                   placeholder="Shop / Company Name">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number <small>(if any)</small></label>
                            <input type="text" id="phone" v-model="customer.phone" class="form-control"
                                   placeholder="Phone Number">
                        </div>

                        <div class="form-group">
                            <label for="email">Email <small>(if any)</small></label>
                            <input type="email" id="email" v-model="customer.email" class="form-control"
                                   placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="address">Address <small>(Required)</small></label>
                            <input type="text" id="address" v-model="customer.address" class="form-control"
                                   placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="feedback">FeedBack <small>(Required)</small></label>
                            <select name="" v-model="customer.feedback" id="feedback" class="form-control">
                                <option value="-1">Already Have Camera</option>
                                <option value="0">Not Interested</option>
                                <option value="1">Interested</option>
                                <option value="2">Highly Interested</option>
                                <option value="3">Urgent</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment <small>(Required)</small></label>
                            <textarea name="" id="comment" v-model="customer.comment" cols="10" rows="5"
                                      class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-success rounded-0">Add New Customer</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CustomerCreate",
    data() {
        return {
            isLoading: false,
            customer: {
                name: null,
                organization: null,
                address: null,
                phone: null,
                email: null,
                feedback: 1,
                comment: null,
            }
        }
    },
    methods: {
        addNewCustomer() {
            this.isLoading = true;
            axios.post(`/customer/store`, this.customer)
                .then(res => {
                    if (res.data.success) {
                        toastr.success('Record added successfully.');
                        this.$router.push({name: 'customers'})
                    } else {
                        toastr.error('Somethings is wrong.')
                    }
                    this.isLoading = false;
                })
                .catch(err => toastr.error('Somethings is wrong.'))
        }
    }
}
</script>

<style scoped>

</style>
