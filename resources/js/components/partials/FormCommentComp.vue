<template>
    <form>
        <div class="mb-3" @submit.prevent="sendComment">
            <textarea v-model="comment"
            class="form-control"
            name="content" id="content" cols="30" rows="10" placeholder="Write your comment here...">
            </textarea>

            <!-- <p>{{ $message }}</p> -->
        </div>
        <div class="mb-3">
          <input v-model="eMail" type="email" class="form-control" id="email" placeholder="E-mail address">
        </div>

        <div class="mb-3">
          <input v-model="fullName" type="text" class="form-control" id="full_name" placeholder="Your Full name">
        </div>

        <div class="mb-3 form-check">
          <input v-model="agreement" type="checkbox" class="form-check-input" id="agreement">
          <label class="form-check-label text-gray" for="agreement">Save my name and e-mail in this browser for the next time I comment.</label>
        </div>
        <button type="submit" class="btn sd_btn">Submit</button>
    </form>
</template>

<script>
export default {
    name:'FormCommentComp',

    data(){
        return{
            fullName: '',
            eMail: '',
            comment: '',
            agreement: true,
        }
    },

    methods: {
        sendComment(){
            console.log('invio form');
            axios.post()
        }
    },
}
</script>

<style lang="scss" scoped >

.text-gray{
    color: gray;
    font-size: 0.8rem;
}

input{
    font-size: 0.8rem;
    color: gray;
    padding: 10px;

}

.sd_btn{
    font-size: 0.85rem;
    padding: 10px 60px;
}

</style>
