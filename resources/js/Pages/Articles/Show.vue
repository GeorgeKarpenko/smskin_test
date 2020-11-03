<template>
    <div>
        <Loader v-if="loader" />
        <template
            v-else
        >
            <Article
                :article="article"
            />
            <Form
                :article_id="article.id"
            />
        </template>
    </div>
</template>


<script>
    import Article from '../../Components/Article'
    import Form from '../../Components/Form'
    import Loader from '../../Components/Loader'
    import { mapActions } from 'vuex'
    export default {
        data () {
            return {
                loader: true
            }
        },
        components: {
            Article,
            Form,
            Loader
        },
        async mounted () {
            if (!this.article){
                await this.method_article(this.$route.params.slug)
            }
            this.loader = false
        },
        computed: {
            article () {
                return this.$store.getters['articles/articleSlug'](this.$route.params.slug)
            }
        },
        methods: {
            ...mapActions('articles', {
                method_article: 'article'
            }),
        }
    }
</script>