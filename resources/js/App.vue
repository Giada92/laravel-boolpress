<template>
    <div>
        <!-- Heder della pagina -->
        <Header />
        <!-- /Heder della pagina -->

        <!-- Elenco Articoli -->
        <!-- <Main /> -->
        <router-view></router-view>
        <!-- /Elenco Articoli -->

        <!-- Footer -->
        <Footer />
        <!-- /Footer -->
    </div>
</template>

<script>
import Header from './components/Header';
/* import Main from './components/Main'; */
import Footer from './components/Footer';


export default {
    name: 'App',
    components: {
        Header,
        /* Main, */
        Footer
    }
}
</script>

<style lang="scss" scoped>

body {
    background-color: lightgrey;
}
    
</style>