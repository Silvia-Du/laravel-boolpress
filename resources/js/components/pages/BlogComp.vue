<template>
  <div>
    <div class="container pt-5 text-center">
        <h1 class="mb-4">Funny Development</h1>

        <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus eum nisi commodi officia aperiam? Distinctio, delectus labore. Voluptates assumenda culpa, iure eos reiciendis suscipit modi in obcaecati nulla, accusamus, quisquam adipisci recusandae at sequi? Fugiat, tempore commodi. Aliquid maiores ipsum, rerum soluta deserunt et ullam vel aliquam voluptatibus vero velit cupiditate eius, aspernatur sint tenetur ducimus. Rem vero voluptates beatae saepe quod facilis minima quia, culpa possimus esse repellat maxime doloribus placeat ipsam. Sint nostrum laboriosam dignissimos ut omnis sunt odio expedita esse inventore! Neque, vitae porro modi libero fugit nemo dolores provident, ex facere eligendi magnam dolorem at consequatur.</p>

        <div class="blog-section row pt-5 px-2">
            <h2 class="w-100 mb-3">Post dedicati a chi vuole imparare</h2>
            <PostComp
                v-for="post in posts" :key="post.id" :postItem="post"
             />
        </div>

    </div>
  </div>
</template>

<script>


import PostComp from '../partials/PostComp.vue';

export default {
    name: 'BlogComp',


    components:{
        PostComp,
    },

    data(){
        return{
            postApiUrl: 'http://127.0.0.1:8000/api/posts',
            posts: null,
            pagination: {
                current_page: null,
                last_page: null,
            }
        }
    },

    methods: {
        getPosts(){

            axios.get(this.postApiUrl)
            .then(response =>{
                this.posts = response.data.data;
                this.pagination ={
                    current_page : response.data.current_page,
                    last_page : response.data.last_page,
                }
                console.log(this.pagination);
            })
        }
    },

    mounted(){
        this.getPosts();
    }


}
</script>

<style lang="scss" scoped>

</style>
