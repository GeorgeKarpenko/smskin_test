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
        <b-form  @submit="onSubmit" class="mb-5">
            
            <b-form-group
                id="subject-group"
                label="Тема сообщения"
                label-for="subject"
            >
                <b-form-input
                    id="subject"
                    v-model="form.subject"
                    type="text"
                    :state="errors.subject ? false : null"
                    :aria-describedby="errors.subject ? 'input-1-help input-1-feedback' : ''"
                ></b-form-input>
                <b-form-invalid-feedback  v-if="errors.subject" id="input-1-feedback" class="text-left">
                    <ul>
                        <li v-for="(item, index) in errors.subject" :key="index">
                        {{ item }}
                        </li>
                    </ul>
                </b-form-invalid-feedback>
            </b-form-group>
            
            <b-form-group
                id="body-group"
                label="Текст сообщения"
                label-for="body"
            >
                <b-form-textarea
                    id="body"
                    v-model="form.body"
                    rows="3"
                    max-rows="6"
                    :state="errors.body ? false : null"
                    :aria-describedby="errors.body ? 'input-1-help input-1-feedback' : ''"
                ></b-form-textarea>
                <b-form-invalid-feedback>
                    <ul>
                        <li v-for="(item, index) in errors.body" :key="index">
                        {{ item }}
                        </li>
                    </ul>
                </b-form-invalid-feedback>
            </b-form-group>
            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
        <b-modal ref="my-modal" hide-footer title="Валидация прошла успешно">
            <div class="d-block text-center">
                <h3>{{ data }}</h3>
            </div>
            <b-button class="mt-3" variant="outline-danger" block @click="hideModal">Закрыть</b-button>
        </b-modal>
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
            time_view: null,
            form:{
                subject:'',
                body:'',
                article_id: this.article.id
            },
            errors:{},
            data: ''
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
        },
        onSubmit(evt) {
            this.errors = {}
            evt.preventDefault()
            this.comment(this.form)
                .then((data) => {
                    console.log(data)
                    this.data = data.message
                    this.showModal()
                })
                .catch(err => {
                    console.warn(err.response.data)
                    this.errors = err.response.data.errors;
                })
        },
        showModal() {
            this.$refs['my-modal'].show()
        },
        hideModal() {
            this.$refs['my-modal'].hide()
        },
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