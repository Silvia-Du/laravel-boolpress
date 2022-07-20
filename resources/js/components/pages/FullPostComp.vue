<template>
  <div class="post pb-5">
    <div class="container-fluid jumbo debug"></div>

    <div v-if="post != null" class="container pt-5 main-content">
        <div class="row">
            <div v-if="!typePosts" class="col-8 px-2">

                <div class="img debug mb-3"></div>
                <p class="category">{{ post.category.name }}</p>
                <h3>{{ post.title }}</h3>
                <p>---- {{ beautifyDate }}-----</p>
                <p>{{ post.content }}</p>
                <h5>Lorem ipsum dolor sit amet consectetur adipisicing.</h5>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam incidunt ab ex ullam ut quasi odio eum nam ipsa totam.</p>

                <h5 v-for="(tag, index) in post.tags" :key="`tag${index}`" class="d-inline mr-2 mb-2">
                    <span class="badge badge-light">{{ tag.name }}</span>
                </h5>

                <div class="py-4">
                    <h5>Post a comment</h5>
                    <FormCommentComp :idPost="post.id" />
                </div>
            </div>

            <!-- v-else -->
            <div v-else class="col-8 mb-4 px-0">
                <p class="back-btn py-2 px-3" @click="typePosts = null">
                <!-- <i class="fa-solid fa-arrow-left"></i> -->
                Back to post</p>
                <h5 class="d-inline ml-5">
                    {{ type == 'category'? `Selezione per categoria: ${typeName}`: `Selezione per tag: ${typeName}` }}
                </h5>

                <div v-for="(post, index) in typePosts" :key="`${index}`"
                class="preview debug d-flex mb-3">
                    <div class="img debug d-flex flex-column">img</div>
                    <!-- post-data -->
                    <div class="text p-2">
                        <p class="category">{{ post.category }}</p>
                        <h4 class="title">{{ post.title }}</h4>
                        <p class="content">{{ shortifyContent(post.content) }}</p>
                        <button type="button" class="btn sd_btn mb-2">Read More</button>
                        <p class="date">{{ beautifyDate }}</p>
                        <span>{{ post.likes }}like</span>
                        <span>-Messaggi</span>

                    </div>
                </div>
            </div>

            <AsideBarComp @categoryPack="getPostsByType" />

        </div>





    </div>
  </div>
</template>

<script>

import AsideBarComp from '../partials/AsideBarComp.vue';
import FormCommentComp from '../partials/FormCommentComp.vue';
// import {shortifyContent} from '../../data/config';
export default {
    name:'FullPostComp',

    components:{
        AsideBarComp,
        FormCommentComp
    },

    data(){
        return{
            apiUrl: '/api/posts',
            post: null,
            type: '',
            typeName: '',
            typePosts: null,

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
            axios.get(this.apiUrl + '/' + this.$route.params.slug)
            .then(response =>{
                this.post = response.data;
            })
        },

        getPostsByType(object, data){
            //reset
            this.type = '';
            this.typeNme = '';
            this.typePosts= null;
            //valorizzazione
            this.type = data;
            this.typeName = object.name;
            console.log(object.name);
            this.typePosts = object.posts;
        },

        shortifyContent(text){
            return text.substring(1, 100)+ '...';
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

.back-btn{
    font-size: 0.9rem;
    display: inline-block;
    cursor: pointer;
    &:hover{
        color: rgb(48, 48, 48);
    }
    border-radius: 50%;
}

 .preview{
    box-shadow: 0 0 1px 0px gray;
    min-height: 240px;
    background-color: whitesmoke;
    .img{
        width: 380px;
        height: 100%;
    }
    .category{
        color: cadetblue;
        font-size: 0.7rem;
        font-weight: bolder;
    }
    .content{
        color: gray;
    }
    .title{
        text-transform: uppercase;
    }

}


</style>
