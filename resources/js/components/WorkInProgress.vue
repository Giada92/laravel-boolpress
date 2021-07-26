<template>
    <div class="container text-center my-5">
        <h1>{{ title }}</h1>
        <h2>{{ subtitle }}</h2>
    </div>
</template>

<script>
export default {
    name: 'WorkInProgress',
    props: {
        title :{
            type: String
        },
        subtitle :{
            type: String
        }
    }
}
</script>

<style lang="scss" scoped>
h1 {
        color: red;
    }
</style>