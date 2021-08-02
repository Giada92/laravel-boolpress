<template>
  <div class="container my-5">
      <h2>{{post.title}}</h2>
      <p>{{ post.content }}</p>
  </div>
</template>

<script>
export default {
    name:'SingoloPost',
    data(){
        return{
            post: [],
        }
    },
    methods: {
        getPost: function(slug){
            axios.get(`http://127.0.0.1:8000/api/posts/${slug}`)
            .then((res)=> {
                    //console.log(res.data);
                    this.post = res.data;
            })
            .catch((error) => {
                    console.log(error);
            })
        }

    },
    created(){
        //console.log(this.$route.params.slug);
        this.getPost(this.$route.params.slug);
    }
}
</script>

<style>

</style>