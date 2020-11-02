<template>
    <span>
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

            <b-button type="submit" variant="primary">Отправить</b-button>
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
        article_id:{
            type: Number
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
                article_id: this.article_id
            },
            errors:{},
            data: ''
        }
    },
    methods: {
        ...mapActions('articles', {
            comment: 'comment'
        }),
        onSubmit(evt) {
            this.errors = {}
            evt.preventDefault()
            this.comment(this.form)
                .then((data) => {
                    this.data = data.message
                    this.form = {
                        subject:'',
                        body:'',
                        article_id: this.article_id
                    }
                    this.showModal()
                })
                .catch(err => {
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