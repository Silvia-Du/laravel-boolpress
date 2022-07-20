<template>
    <div >
        <div class="mb-3">
            <div class="mb-3">
            <input v-model="title" type="text" class="form-control" id="title" placeholder="Titolo commento">
        </div>
        </div>
        <div class="mb-3" >
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
          <input v-model="name" type="text" class="form-control" id="name" placeholder="Your Full name">
        </div>
        <div class="mb-3">
          <input v-model="surname" type="text" class="form-control" id="surname" placeholder="Your Full name">
        </div>

        <!-- <div class="mb-3 form-check">
          <input v-model="agreement" type="checkbox" class="form-check-input" id="agreement">
          <label class="form-check-label text-gray" for="agreement">Save my name and e-mail in this browser for the next time I comment.</label>
        </div> -->
        <button @click="sendComment"  class="btn sd_btn">Submit</button>
    </div>
</template>

<script>
export default {
    name:'FormCommentComp',

    props:{
        idPost: Number,
    },

    data(){
        return{
            name: '',
            surname: '',
            title:'',
            eMail: '',
            comment: '',
            apiUrl: 'http://127.0.0.1:8000/api/posts/comment',
            // agreement: true,

             errors:{
                comment: null,
                email: null,
                full_name: null
            },
        }
    },

    methods: {
        sendComment(){
            // preventDefault(e);
            console.log('invio form');
            axios.post(this.apiUrl,{
                user:{

                    'name': this.name,
                    'surname': this.surname,
                    'email': this.eMail,
                },
                comment:{

                    'title': this.title,
                    'content': this.content,
                    'post_id' :this.idPost
                }
            }
            )
            .then(r=>{
                console.log(r);
            })
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
