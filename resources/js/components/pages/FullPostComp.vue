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
            <div class="col-4 px-2">
                <!-- about -->
                <router-link :to="{name: 'about'}">

                    <div class="about text-center py-3 px-2 mb-3">
                        <p class="mb-2">About me</p>
                        <div class="img-little debug mb-2"></div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis voluptates dignissimos, minus maxime id ipsum itaque cupiditate magni earum soluta.</p>
                        <h5>View more</h5>
                    </div>
                </router-link>

                <!--all tags -->
                <div class="tags text-center py-3 px-2 mb-3">
                    <p class="mb-2">Tags</p>

                    <span v-for="tag in tags" :key="tag.id"
                     class="sd_badge text-uppercase m-1">{{ tag.name }}</span>

                </div>
                <!-- all categories -->
                <div class="categories text-center py-3 px-2 mb-3">
                    <p class="mb-2">Categories</p>

                    <span @click="getPostByCat(category.slug)"
                    v-for="category in categories" :key="category.id"
                     class="sd_badge text-uppercase m-1">{{ category.name }}</span>

                </div>
                <!-- back to posts -->
                <div class="categories text-center py-3 px-2">
                    <p class="mb-2">Resta collegato</p>

                    social icons

                </div>
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
            post: null,
            categories: null,
            tags: null
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

        getCatAndTags(){
            axios.get(this.apiUrl+'/get-data')
            .then(response =>{
                console.log(response);
                this.categories = response.data.categories;
                this.tags = response.data.tags;

            })
        },

        getPostByCat(slug){
            axios.get(this.apiUrl +'/post-by-cat/'+ slug)
            .then(response =>{
                console.log(response.data);

            })
        }
    },

    mounted(){
        this.getPost();
        this.getCatAndTags();
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

.main-content{

    .img-little{
        height: 150px;
    }

    .tags, .categories, .about{
        border: 1px solid gray;
        .sd_badge{
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            background-color: rgb(231, 216, 216);
            font-size: 0.8rem;
            cursor: pointer;
        }
    }

    a{
        color: rgb(36, 36, 36);
        &:hover{
            text-decoration: none;
        }
        .about{
            cursor: pointer;
        }
    }
}


</style>
