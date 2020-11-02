<template>
    <div>
        <h1>Каталог статей</h1>
        <Articles 
            :articles="articles.data"
        />
        <Pagination 
            :number_of_pages="articles.last_page"
        />
    </div>
</template>


<script>
    import Articles from '../../Components/Articles.vue'
    import Pagination from '../../Components/Pagination.vue'
    import {mapGetters, mapActions} from 'vuex'
    export default {
        components: {
            Articles,
            Pagination
        },
        created() {
            this.method_articles(this.page || 1)
        },
        watch: {
            page () {
                this.method_articles(this.page || 1)
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