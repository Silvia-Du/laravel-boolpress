<template>
  <div class="post">
    <div class="container-fluid jumbo debug"></div>

    <div v-if="post != null" class="container pt-5">
        <div class="row">
            <div class="col-8">

                <h3>{{ post.title }}</h3>
                <p>---- {{ beautifyDate }}-----</p>
            </div>
            <div class="col-4 debug">

            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    name:'FullPostComp',

    data(){
        return{
            post: null,
            apiUrl: '/api/posts',
            post: null
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
                console.log(this.post);
            })
        },
    },

    mounted(){
        this.getPost();
    }

}
</script>

<style lang="scss" scoped>

.jumbo{
    height: 30vh;
}

</style>
