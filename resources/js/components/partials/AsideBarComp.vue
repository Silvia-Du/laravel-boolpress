<template>
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
            @click="getSelectedPosts(tag.slug, 'tag')"
                class="sd_badge text-uppercase m-1">{{ tag.name }}</span>

        </div>
        <!-- all categories -->
        <div class="categories text-center py-3 px-2 mb-3">
            <p class="mb-2">Categories</p>

            <span
            @click="getSelectedPosts(category.slug, 'cat')"
            v-for="category in categories" :key="category.id"
                class="sd_badge text-uppercase m-1">{{ category.name }}</span>

        </div>
        <!-- social icons -->
        <div class="categories text-center py-3 px-2">
            <p class="mb-2">Resta collegato</p>

            social icons

        </div>
    </div>
</template>

<script>
export default {
    name: 'AsideBarComp',


    data(){
        return{

            apiUrl: '/api/posts',
            categories: null,
            tags: null,
        }
    },

    methods: {

         getCatAndTags(){
            axios.get(this.apiUrl+'/get-data')
            .then(response =>{
                this.categories = response.data.categories;
                this.tags = response.data.tags;

            })
        },


        getSelectedPosts(slug, type){
            axios.get(this.apiUrl + '/by-type/'+ slug +'/'+ type)
            .then(response =>{
                // console.log(response.data);
                if(response.data.category){
                    this.$emit('categoryPack', response.data.category, 'category');
                }
                if(response.data.tag){
                    this.$emit('categoryPack', response.data.tag, 'tag');
                }
            })

        }

    },

    mounted(){

        this.getCatAndTags();

    }
}
</script>

<style lang="scss" scoped >

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

</style>
