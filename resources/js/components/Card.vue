<template>
    <div class="card mb-5" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ item.title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ item.slug }}</h6>
            <p class="card-text">{{ shortText(item.content, 150)}}</p>
            <router-link class="nav-link" :to="{ name: 'singolo-post', params: { slug: item.slug } }">Leggi L'articolo</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: {
        'item': Object,
    },
    methods: {
        shortText: function(string, number = 100) {
            if(string.length > number){
                return string.substr(0, number) + "...";
            }else {
                return string;
            }
        }
    }
}
</script>

<style lang="scss" scoped>


</style>