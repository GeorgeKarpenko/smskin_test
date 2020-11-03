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
        path: '/articles',
        component: () => import('./Pages/Articles'),
        children: [
            {
                name:'articles',
                path:'',
                component: () => import('./Pages/Articles/Index'), 
            },
            {
                name: 'article',
                path: ':slug',
                component: () => import('./Pages/Articles/Show'),
            },
        ]
    },
    // {
    //     path: '*',
    //     component: () => import('./Pages/NotFoundComponent'), // 404
    // }
];

export const router = new VueRouter({
    routes,
    mode:'history'
});