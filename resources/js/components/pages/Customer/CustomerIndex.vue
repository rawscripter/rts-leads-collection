<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-5 d-flex justify-content-between">

                    <router-link :to="{name:'customer-create'}" class="btn btn-primary">
                        New Lead
                    </router-link>
                    <div class="d-flex align-items-center">
                        <label for="filter_by_feedback">
                            Filter By Feedback:
                            <select v-model="filter" id="filter_by_feedback">
                                <option value="" selected>All</option>
                                <option value="-1">Already Have Camera</option>
                                <option value="0">Not Interested</option>
                                <option value="1">Interested</option>
                                <option value="2">Highly Interested</option>
                                <option value="3">Urgent</option>
                            </select>
                        </label>
                        <div class="ml-3">
                            <a :href="exportServerRequestUrl" class="btn btn-primary" target="_blank">Export Data</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <v-server-table :url="serverRequestUrl" ref="myTable"
                            :columns="columns"
                            :options="options">
                <span slot="feedback" class="d-flex" slot-scope="{row}">
                    <span>{{ row.feedback_text }}</span>
                </span>
                <span slot="action" class="d-flex" slot-scope="{row}">
                    <router-link :to="{name:'customer-edit',params:{customer:row.id}}" tag="span" class="btn btn-sm">
                        <i class="flaticon-edit-1 text-success"></i>
                    </router-link>
                    <span class="btn btn-sm" @click="deleteCustomerRecord(row.id)">
                        <i class="flaticon2-trash text-danger"></i>
                    </span>
                </span>
            </v-server-table>
        </div>
    </div>
</template>

<script>
export default {
    name: "CustomerIndex",
    data() {
        return {
            filter: '',
            columns: [
                'id',
                'name',
                'organization',
                'phone',
                'address',
                'feedback',
                'created_at',
                'user.name',
                'action'
            ],
            options: {
                headings: {
                    id: 'ID',
                    'user.name': 'Added By',
                    organization: 'Shop / Company'
                },
                perPage: 10,
                perPageValues: [10, 20, 25, 50, 100],
                sortable: ['id'],
                filterable: ['id', 'name', 'phone', 'address'],
                responseAdapter: function (resp) {
                    return {
                        data: resp.data.customers,
                        count: resp.data.total,
                    }
                }
            },
        }
    },
    computed: {
        serverRequestUrl() {
            return '/customers/json/data?feedback=' + this.filter;
        },
        exportServerRequestUrl() {
            return '/export/customers?feedback=' + this.filter;
        },
    },
    methods: {
        deleteCustomerRecord(id) {
            let vm = this;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    vm.callDeleteAction(id);
                }
            })
        },
        callDeleteAction(id) {
            axios.post(`/customer/${id}/delete`)
                .then(res => {
                    if (res.data.success) {
                        toastr.success('Record Deleted Successfully.');
                        this.$refs.myTable.refresh();
                    }
                })
                .catch(err => console.error(err));
        }
    }
}
</script>

<style>
.page-link {
    cursor: pointer !important;
}

.VueTables__limit-field {
    position: absolute;
    right: 15px;
    top: -5px;
}

.form-group.form-inline.pull-left.VueTables__search {
    width: 50% !important;
    float: right !important;
    right: 0;
}

.form-group.form-inline.pull-left.VueTables__search {
    width: 50% !important;
    float: left !important;
}
select#filter_by_feedback {
    padding: 3px;
    border: 1px solid #dadada;
    border-radius: 10px;
}
</style>
