<template>
    <div>
        <Article
            v-if="article"
            :article="article"
        />
        <Form
            v-if="article"
            :article_id="article.id"
        />
    </div>
</template>


<script>
    import Article from '../../Components/Article.vue'
    import Form from '../../Components/Form.vue'
    import { mapActions } from 'vuex'
    export default {
        components: {
            Article,
            Form
        },
        created () {
            if (!this.article){
                this.method_article(this.$route.params.slug)
            }
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