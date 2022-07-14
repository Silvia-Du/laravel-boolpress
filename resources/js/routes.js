//importo vue
import Vue from 'vue';

//importo il router
import VueRouter from 'vue-router';

//gli dico d usarlo
Vue.use(VueRouter);

//creo il router
const router = new Router({
    mode: 'history'
});

//lo esporto
export default router;



