import SignUp from './views/SignUp.vue';
import Home from './views/Home.vue';
import Login from './views/Login.vue';
import Profile from './views/Profile.vue';
import AddCompany from './views/AddCompany.vue';
import ListCompanies from './views/ListCompanies.vue';
import EditCompany from './views/EditCompany.vue';

import { createRouter,createWebHistory } from 'vue-router';

const routes = [
    {
        name:'Home',
        component: Home,
        path: '/dashboard'
    },
    {
        name:'SignUp',
        component: SignUp,
        path: '/'
    },
    {
        name:'Login',
        component: Login,
        path: '/login'
    },
    {
        name:'Profile',
        component: Profile,
        path: '/profile'
    },
    {
        name:'AddCompany',
        component: AddCompany,
        path: '/addCompany'
    },
    {
        name:'EditCompany',
        component: EditCompany,
        path: '/editCompany/:id'
    },
    {
        name:'ListCompanies',
        component: ListCompanies,
        path: '/listCompanies'
    }
];

const router = createRouter({
    history:createWebHistory(),
    routes
});

export default router;