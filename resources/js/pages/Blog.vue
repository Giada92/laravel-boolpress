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

        <!-- Paginazione -->
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous"
                        @click="getPosts(current_page - 1)"
                        v-show="current_page > 1">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"
                    v-for="n in last_page" :key="n">
                        <a class="page-link" href="#"
                        @click="getPosts(n)">{{n}}</a>
                    </li>
                    <li class="page-item">
                        <button class="page-link" aria-label="Next"
                        @click="getPosts(current_page + 1)"
                        v-show="current_page < last_page">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- /Paginazione -->
    </main>
</template>

<script>
import Card from '../components/Card.vue';

export default {
    name: 'Blog',
    components: {
        Card
    },
    data(){
        return{
            posts: [],
            current_page: 1,
            last_page: 1
        }
    },
    methods: {
        getPosts: function(page = 1){
            axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
            .then((res)=> {
                    //console.log(res.data);
                    this.posts = res.data.data;
                    this.current_page = res.data.current_page;
                    this.last_page = res.data.last_page;
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