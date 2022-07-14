<template>
  <div class="col-4 mb-3 px-2">
    <div class="box p-2">

        <div class="img-box">
            img {{ postItem.title }}
        </div>
        <h4 class="mb-3">{{ postItem.title }}</h4>
        <p>{{ postItem.content }}</p>
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
    }
}

</style>
