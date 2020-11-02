import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [
    {
        name:'index',
        path:'/',
        component: () => import('./Pages/Index'), 
    },
    {
        name:'articles',
        path:'/articles',
        component: () => import('./Pages/Articles/Index'), 
    },
    {
        name: 'article',
        path: '/articles/:slug',
        component: () => import('./Pages/Articles/Show'),
    },
    // {
    //     path: '*',
    //     component: NotFoundComponent
    // }
];

export const router = new VueRouter({
    routes,
    mode:'history'
});