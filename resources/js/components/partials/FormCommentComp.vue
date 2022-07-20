<template>
    <form

     @submit.prevent="sendComment"
    >
        <div class="mb-3">
            <div class="mb-3">
            <input v-model="title" type="text" class="form-control" id="title" placeholder="Titolo commento">
        </div>
        </div>
        <div class="mb-3" >
            <textarea v-model="content"
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

        <button type="submit"  class="btn sd_btn">Submit</button>
    </form>
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
            content: '',
            apiUrl: 'http://127.0.0.1:8000/api/posts/comment',
            // agreement: true,

             errors:{
                name: null,
                surname: null,
                email: null,
                title: null,
                comment: null,
            },

            sending: false,
            success:false
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
            .then(response =>{
                this.sending = true;
                console.log(response.data);
                if(!response.data.success){
                    this.errors = response.data.errors;
                    console.log(this.errors);
                }else{
                    this.success = true;
                    this.errors = {};
                    this.name= '';
                    this.surname= '';
                    this.title='';
                    this.eMail= '';
                    this.content= '';
                }
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
