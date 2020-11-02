<template>
    <span>
        <b-card
            v-for="article in articles"
            :key="article.id"
            no-body
            class="overflow-hidden my-3"
        >
            <b-row no-gutters>
            <b-col md="3">
                <b-card-img :src="article.cover_art_image" alt="cover_art_image" class="rounded-0"></b-card-img>
            </b-col>
            <b-col md="9">
                <b-card-body :title="article.title">
                    <b-card-text>
                        {{ article.description }}
                        <router-link :to="{ name: 'article', params: { slug: article.slug }}">Читать дальше</router-link>
                    </b-card-text>
                </b-card-body>
            </b-col>
            </b-row>
        </b-card>
    </span>
</template>


<script>
export default {
    props:{
        articles:{
            type: Array,
            default: [],
        }
    }
}
</script>