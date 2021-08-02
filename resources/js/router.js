import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import Blog from './pages/Blog';
import About from './pages/About';
import SingoloPost from './pages/SingoloPost';


const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { 
            path: '/', 
            name: 'home',
            component: Home 
        },
        { 
            path: '/blog', 
            name: 'blog',
            component: Blog 
        },
        { 
            path: '/chi-siamo', 
            name: 'about',
            component: About 
        },
        {
            path: '/post/:slug',
            name: 'singolo-post',
            component: SingoloPost
        }
    ]
  });

export default router;