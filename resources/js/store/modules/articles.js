export default{
    namespaced:true,
    state:{
        articles: {
            data:[]
        },
        last_articles: []
    },
    getters:{
        articles(state){
            return state.articles;
        },
        last_articles(state){
            return state.last_articles;
        },
        articleSlug: state => (slug) => {
            return state.articles.data.find(article => article.slug == slug)
        }
    },
    mutations:{
        articles(state, payload){
            state.articles = payload
        },
        last_articles(state, payload){
            state.last_articles = payload
        },
        notice(state, payload){
            state.articles.data.forEach(article => {
                if (article.id == payload.id){
                    article[payload.notice] += 1
                }
            })
        }
    },
    actions:{
        async articles(context, payload){
            const { data } = await axios.get(`/api/articles?page=${payload}`)
            context.commit('articles', data)
        },
        async last_articles(context){
            const { data } = await axios.get('/api/last/articles')
            context.commit('last_articles', data)
        },
        async article(context, payload){
            const { data } = await axios.get(`/api/articles/${payload}`)
            context.commit('articles', {data: [data]})
        },
        async notice(context, payload){
            context.commit('notice', payload)
            await axios.get(`/api/articles/${payload.notice}/${payload.id}`)
        },
        async comment(context, payload){
            const { data } = await axios.post('/api/comment/store', payload)
            return data
        }
        
    }
}