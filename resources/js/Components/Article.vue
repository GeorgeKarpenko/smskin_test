<template>
    <span>
        <h1>{{ article.title }}</h1>
        <b-img :src="article.cover" alt="cover_art_image" class="rounded-0 w-100"></b-img>
        <div>{{ article.body }}</div>
        <div class="bd-example">
            <span
                v-for="tag in article.tags"
                :key="tag.id"
                :to="tag.slug"
                class="tag tag-pill tag-default"
            >
                <a :href="tag.url">{{ tag.label }}</a>
            </span>
        </div>
        <p>
            <b-icon
                v-if="like" icon="suit-heart-fill"
                aria-hidden="true"
            ></b-icon>
            <b-icon
                v-else 
                v-on:click="noticeLike"
                icon="suit-heart"
                aria-hidden="true"
            ></b-icon>
            {{ article.number_of_likes }}
            <b-icon v-if="view" icon="eye-fill" aria-hidden="true"></b-icon>
            <b-icon v-else icon="eye" aria-hidden="true"></b-icon>
            {{ article.number_of_views }}
        </p>
    </span>
</template>


<script>
import { mapActions } from 'vuex'
export default {
    props:{
        article:{
            type: Object,
            default: null,
        }
    },
    data(){
        return{
            like: false,
            view: false,
            time_view: null
        }
    },
    created(){
        const v = this
        v.time_view = setTimeout(function(){
            v.notice(
                {
                    notice: 'number_of_views',
                    id: v.article.id
                })
            v.view = true
        },5000)
    },
    computed:{
        number_of_likes(){
            return {
                notice: 'number_of_likes',
                id: this.article.id
            }
        }
    },
    destroyed () {
        this.time_view = clearTimeout(this.time_view)
    },
    methods: {
        ...mapActions('articles', {
            notice: 'notice',
            comment: 'comment'
        }),
        noticeLike(){
            this.notice(this.number_of_likes)
            this.like = true
        }
    }
}
</script>

<style scoped>
.tag {
    display: inline-block;
    padding: 0.25em 0.4em;
    font-size: 75%;
    font-weight: bold;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    margin: 3px;
}
.tag-pill {
    padding-right: 0.6em;
    padding-left: 0.6em;
    border-radius: 10rem;
}
.tag-default {
    background-color: #818a91;
}
.tag a{
    color: #fff;
}
.bd-example{
    margin: -3px;
}
</style>