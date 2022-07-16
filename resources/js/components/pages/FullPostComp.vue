<template>
  <div class="post pb-5">
    <div class="container-fluid jumbo debug"></div>

    <div v-if="post != null" class="container pt-5 main-content">
        <div class="row">
            <div class="col-8 px-2">

                <h3>{{ post.title }}</h3>
                <p>---- {{ beautifyDate }}-----</p>
                <div class="img debug mb-3"></div>
                <p>{{ post.content }}</p>
                <h5>Lorem ipsum dolor sit amet consectetur adipisicing.</h5>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam incidunt ab ex ullam ut quasi odio eum nam ipsa totam.</p>

                <h5 v-for="(tag, index) in post.tags" :key="`tag${index}`" class="d-inline mr-2 mb-2">
                    <span class="badge badge-light">{{ tag.name }}</span>
                </h5>
                <h5>#category->{{ post.category.name }}</h5>
            </div>

            <AsideBarComp @categoryPack="getPostsByType" />

        </div>

    </div>
  </div>
</template>

<script>

import AsideBarComp from '../partials/AsideBarComp.vue';
export default {
    name:'FullPostComp',

    components:{
        AsideBarComp
    },

    data(){
        return{
            apiUrl: '/api/posts',
            post: null,

        }
    },

    computed:{

        //formatter per data
        beautifyDate(){
            const date = new Date(this.post.created_at);
            let day = date.getDate();
            let month = date.getMonth();
            const year = date.getFullYear();

            if(day < 10){
                day = '0'+day;
            }
            if(month < 10){
                month = '0'+month;
            }
            return `${day}/${month}/${year}`;
        },
    },

    methods: {

        getPost(){
            // console.log(this.$route.params.slug);
            axios.get(this.apiUrl + '/' + this.$route.params.slug)
            .then(response =>{
                this.post = response.data;
            })
        },

        getPostsByType(object){
            console.log('sono dentro',object);
        }

    },

    mounted(){
        this.getPost();

    }

}
</script>

<style lang="scss" scoped>

.jumbo{
    height: 40vh;
}
.img{
    height: 400px;
}


</style>
