<template>
    <div>
        <h1>Главная страница</h1>
        <Loader v-if="loader" />
        <Articles 
            v-else
            :articles="articles"
        />
    </div>
</template>


<script>
    import Articles from '../Components/Articles'
    import Loader from '../Components/Loader'
    import {mapGetters, mapActions} from 'vuex'
    export default {
        data () {
            return {
                loader: true
            }
        },
        components: {
            Articles,
            Loader
        },
        async mounted () {
            if (!this.articles.length){
                await this.last_articles()
            }
            this.loader = false
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