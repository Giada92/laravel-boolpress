<template>
    <main class="container my-5">
        <h2 class="text-uppercase text-center">Articoli</h2>
        <div class="row">
            <div class="cards col-12 d-flex justify-content-around flex-wrap">
                    <Card 
                    v-for="post in posts" :key="post.id"
                    :item="post"/>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import Card from './Card.vue';

export default {
    name: 'Main',
    components: {
        Card
    },
    data(){
        return{
            posts: []
        }
    },
    methods: {
        getPosts: function(){
            axios.get('http://127.0.0.1:8000/api/posts')
            .then((res)=> {
                    console.log(res.data);
                    this.posts = res.data;
            })
            .catch((error) => {
                    console.log(error);
            })
        }
    },
    created(){
        this.getPosts();
    }
}
</script>

<style lang="scss" scoped>


</style>