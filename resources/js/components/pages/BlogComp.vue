<template>
  <div>
    <div v-if="!posts" class="container d-flex justify-content-center align-items-center py-5">

        <LoaderComp />
    </div>
    <div v-else class="container py-5 text-center">
        <h1 class="mb-4">Funny Development</h1>

        <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus eum nisi commodi officia aperiam? Distinctio, delectus labore. Voluptates assumenda culpa, iure eos reiciendis suscipit modi in obcaecati nulla, accusamus, quisquam adipisci recusandae at sequi? Fugiat, tempore commodi. Aliquid maiores ipsum, rerum soluta deserunt et ullam vel aliquam voluptatibus vero velit cupiditate eius, aspernatur sint tenetur ducimus. Rem vero voluptates beatae saepe quod facilis minima quia, culpa possimus esse repellat maxime doloribus placeat ipsam. Sint nostrum laboriosam dignissimos ut omnis sunt odio expedita esse inventore! Neque, vitae porro modi libero fugit nemo dolores provident, ex facere eligendi magnam dolorem at consequatur.</p>

        <div class="blog-section row py-5 px-2">
            <h2 class="w-100 mb-5">Post dedicati</h2>
            <PostComp
                v-for="post in posts" :key="post.id" :postItem="post"
             />
        </div>
        <button type="button" class="btn btn-dark"
        @click="getPosts(pagination.current_p -1)" :disabled="pagination.current_p == 1">Back </button>
        <button v-for="i in pagination.last_p" :key="`pag${i}`"
        type="button" class="btn btn-dark mr-1"
        @click="getPosts(i)" :disabled="pagination.current_p == i">{{ i }}</button>
        <button type="button" class="btn btn-dark"
        @click="getPosts(pagination.current_p +1)" :disabled="pagination.current_p == pagination.last_p">Next</button>

    </div>
  </div>
</template>

<script>


import PostComp from '../partials/PostComp.vue';
import LoaderComp from '../partials/LoaderComp.vue';

export default {
    name: 'BlogComp',


    components:{
        PostComp,
        LoaderComp
    },

    data(){
        return{
            postApiUrl: 'http://127.0.0.1:8000/api/posts',
            posts: null,
            pagination: {
                current_p: null,
                last_p: null,
            }
        }
    },

    methods: {
        getPosts(page){
            console.log(page);
            axios.get(this.postApiUrl+"?page="+page)
            .then(response =>{
                this.posts = response.data.data;
                // console.log(response.data);

                this.pagination ={
                    current_p : response.data.current_page,
                    last_p : response.data.last_page,
                }
                console.log(this.pagination);
            })
        }
    },

    mounted(){
        this.getPosts(1);
    }


}
</script>

<style lang="scss" scoped>

</style>
