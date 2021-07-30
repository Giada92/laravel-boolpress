<template>
    <div>
        <!-- Heder della pagina -->
        <Header />
        <!-- /Heder della pagina -->

        <!-- Elenco Articoli -->
        <Main />
        <!-- /Elenco Articoli -->
    </div>
</template>

<script>
import Header from './components/Header';
import Main from './components/Main';


export default {
    name: 'App',
    components: {
        Header,
        Main
    }
}
</script>

<style lang="scss" scoped>

body {
    background-color: lightgrey;
}
    
</style>