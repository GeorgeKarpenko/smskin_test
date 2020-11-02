<template>
    <div>
        <h1>Главная страница</h1>
        <Articles 
            :articles="articles"
        />
    </div>
</template>


<script>
    import Articles from '../Components/Articles.vue'
    import {mapGetters, mapActions} from 'vuex'
    export default {
        components: {
            Articles
        },
        created () {
            if (!this.articles.length){
                this.last_articles()
            }
        },
        computed: {
            ...mapGetters('articles', {
                articles: 'last_articles'
            })
        },
        methods: {
            ...mapActions('articles', {
                last_articles: 'last_articles'
            }),
        }
    }
</script>