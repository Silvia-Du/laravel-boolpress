<template>
  <div>
    <HeaderComp />

    <main>
        <router-view></router-view>
    </main>

    <FooterComp />
  </div>
</template>

<script>

//import components

import HeaderComp from './components/partials/HeaderComp';
import FooterComp from './components/partials/FooterComp';

export default {
    name: 'App',

    components: {
        HeaderComp,
        FooterComp
    },

    data(){
        return{

        }
    },

    methods: {

    },

    mounted(){
    }
}
</script>

<style>

</style>
