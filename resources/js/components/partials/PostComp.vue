<template>
    <div class="col-4 mb-3 px-2">
        <router-link :to="{name: 'full-post', params:{slug: postItem.slug}}">
            <div class="box p-3 debug">

                <div class="img-box mb-3">

                </div>


                    <h5 class="mb-3 mx-2">{{ shortifyContent(postItem.title) }}</h5>
                    <p class="mb-5">{{ shortifyContent(postItem.content) }}</p>

                    <p class="update mb-0">Last update:{{ beautifyDate }}</p>
                    <p class="likes mb-0">{{ postItem.likes }} Likes</p>
                    <p class="views mb-0">{{ postItem.views }} Views</p>
                    <!-- tags in absolute -->
                    <div v-if="postItem.tags.length > 0" class="tags d-flex flex-column align-items-end">
                        <h6 v-for="(tag, index) in postItem.tags" :key="`tag${index}`">
                            <span class="badge badge-info">{{ tag.name }}</span>
                        </h6>
                    </div>

            </div>
        </router-link>
  </div>

</template>

<script>
export default {
    name: 'PostComp',

    props: {
        postItem: Object,
    },

    computed:{

        //formatter per data
        beautifyDate(){
            const date = new Date(this.postItem.updated_at);
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

        //porzionatore di testo
        shortifyContent(text){
            return text.substring(1, 40)+ '...';
        }
    },
}
</script>

<style lang="scss" scoped>

.col-4{
    a{
        text-decoration: none;
        color: rgb(34, 34, 34);
    }
    .box{
        background-color: whitesmoke;
        border-radius: 5px;
        position: relative;
        .img-box{
            width: 100%;
            height: 200px;
            border: dashed;
            background-color: rgba(46, 42, 42, 0.288);
            border-color: cadetblue;
            color: cadetblue;
        }
        .tags{
            position: absolute;
            right: 11px;
            top: 10px;
        }
        .update{
            position: absolute;
            bottom: 5px;
            left: 10px;
            font-size: 0.8rem;
            color: cadetblue;
        }
        .likes{
            position: absolute;
            bottom: 5px;
            right: 10px;
            font-size: 0.9rem;
        }
        .views{
            position: absolute;
            bottom: 5px;
            right: 23%;
            font-size: 0.9rem;
        }
    }

}

</style>
