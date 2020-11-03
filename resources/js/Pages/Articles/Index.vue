<template>
    <div>
        <h1>Каталог статей</h1>
        <Loader v-if="loader" />
        <Articles 
            :articles="articles.data"
        />
        <Pagination 
            :number_of_pages="articles.last_page"
        />
    </div>
</template>


<script>
    import Articles from '../../Components/Articles'
    import Loader from '../../Components/Loader'
    import Pagination from '../../Components/Pagination'
    import {mapGetters, mapActions} from 'vuex'
    export default {
        components: {
            Articles,
            Loader,
            Pagination
        },
        data () {
            return {
                loader: true
            }
        },
        async mounted() {
            await this.method_articles(this.page || 1)
            this.loader = false
        },
        watch: {
            async page () {
                this.loader = true
                await this.method_articles(this.page || 1)
                this.loader = false
            }
        },
        computed: {
            ...mapGetters('articles', {
                articles: 'articles'
            }),
            page () {
                return this.$route.query.page || 1
            }
        },
        methods: {
            ...mapActions('articles', {
                method_articles: 'articles'
            }),
        }
    }
</script>