<template>
  <div class="col-4 mb-3 px-2">
    <div class="box p-2">

        <div class="img-box">
            img {{ postItem.title }}
        </div>
        <h4 class="mb-3">{{ postItem.title }}</h4>
        <p>{{ postItem.content }}</p>
        <p class="update">Last update:{{ beautifyDate }}</p>
        <div v-if="postItem.tags.length > 0" class="tags d-flex flex-column align-items-end">
            <h6 v-for="(tag, index) in postItem.tags" :key="`tag${index}`"
            ><span class="badge badge-info">{{ tag.name }}</span></h6>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'PostComp',

    props: {
        postItem: Object,
    },

    computed:{

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
        }
    }
}
</script>

<style lang="scss" scoped>

.col-4{
    .box{
        background-color: whitesmoke;
        border-radius: 5px;
        position: relative;
        .img-box{
            width: 100%;
            height: 200px;
            border: dashed;
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
            bottom: 0;
            left: 10;
            font-size: 0.8rem;
            color: cadetblue;
        }
    }

}

</style>
