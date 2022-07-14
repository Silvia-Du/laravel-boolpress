<template>
  <div>
    <div class="container pt-5 text-center">
        <h1 class="mb-4">Funny Development</h1>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus eum nisi commodi officia aperiam? Distinctio, delectus labore. Voluptates assumenda culpa, iure eos reiciendis suscipit modi in obcaecati nulla, accusamus, quisquam adipisci recusandae at sequi? Fugiat, tempore commodi. Aliquid maiores ipsum, rerum soluta deserunt et ullam vel aliquam voluptatibus vero velit cupiditate eius, aspernatur sint tenetur ducimus. Rem vero voluptates beatae saepe quod facilis minima quia, culpa possimus esse repellat maxime doloribus placeat ipsam. Sint nostrum laboriosam dignissimos ut omnis sunt odio expedita esse inventore! Neque, vitae porro modi libero fugit nemo dolores provident, ex facere eligendi magnam dolorem at consequatur.</p>

        <div class="blog-section"></div>

    </div>
  </div>
</template>

<script>
export default {
    name: 'BlogComp',

    data(){
        return{
            postApiUrl: 'http://127.0.0.1:8000/api/posts',
        }
    },

    methods: {
        getPosts(){

            axios.get(this.postApiUrl)
            .then(response =>{
                console.log(response.data);
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
