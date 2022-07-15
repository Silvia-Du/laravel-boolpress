//importo vue
import Vue from 'vue';

//importo il router
import VueRouter from 'vue-router';

//gli dico d usarlo
Vue.use(VueRouter);


//importo i componenti

import HomeComp from './components/pages/HomeComp';
import AboutComp from './components/pages/AboutComp';
import CoursesComp from './components/pages/CoursesComp';
import ContactsComp from './components/pages/ContactsComp';
import BlogComp from './components/pages/BlogComp';
import FullPostComp from './components/pages/FullPostComp';

//creo il router
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass :'active',

    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComp,
        },
        {
            path: '/about',
            name: 'about',
            component: AboutComp,
        },
        {
            path: '/corsi',
            name: 'courses',
            component: CoursesComp,
        },
        {
            path: '/contatti',
            name: 'contacts',
            component: ContactsComp,
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogComp,
        },
        {
            path: '/post-completo/:slug',
            name: 'full-post',
            component: FullPostComp,
        },
    ]
});

//lo esporto
export default router;



