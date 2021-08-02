<template>
  <div class="container my-5" v-if="!loader">
      <h2>{{post.title}}</h2>
      <!-- Stampo la categoria -->
      <div v-if="post.category != null">
          <span class="badge badge-dark mr-2 mb-3">
          <h4>{{ post.category.name }}</h4> 
          </span>
      </div>
      <p v-else>Nessuna categoria associata</p>
      <!-- /Stampo la categoria -->

      <!-- Stampo in pagina i tag -->
      <div class="mt-5" v-if="post.tags != null">
          <span class="badge badge-info mr-2" 
            v-for="tag in post.tags" :key="tag.id">
          <h4>{{ tag.name }}</h4> 
          </span>
      </div>
      <p v-else>Nessun tag associato</p>
      <!-- /Stampo in pagina i tag -->
      <p class="my-5">{{ post.content }}</p>
      <router-link :to="{ name: 'blog'}">Torna agli articoli</router-link>
  </div>
  <Loader v-else />
</template>

<script>
import Loader from '../components/Loader';

export default {
    name:'SingoloPost',
    components: {
        Loader
    },
    data(){
        return{
            post: [],
            loader: true,
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
        this.loader = false;
    }
}
</script>

<style>

</style>