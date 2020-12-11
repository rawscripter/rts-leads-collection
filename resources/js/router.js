import Vue from 'vue';
import VueRouter from 'vue-router';
import AdminDashboard from "./components/pages/AdminDashboard";
import AdminUsers from "./components/pages/AdminUsers";
import CustomerIndex from "./components/pages/Customer/CustomerIndex";
import CustomerCreate from "./components/pages/Customer/CustomerCreate";
import CustomerEdit from "./components/pages/Customer/CustomerEdit";

Vue.use(VueRouter);

const routes = [
    {path: '/', component: AdminDashboard, name: 'home'},
    {path: '/dashboard', component: AdminDashboard, name: 'dashboard'},
    {path: '/customers', component: CustomerIndex, name: 'customers'},
    {path: '/customer/create', component: CustomerCreate, name: 'customer-create'},
    {path: '/customer/:customer/edit', component: CustomerEdit, name: 'customer-edit'},
];


const router = new VueRouter({
    routes,
    mode: 'history',
    hashbang: true
});

export default router;
