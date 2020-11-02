export default{
    namespaced:true,
    state:{
        nav:{
            information: {
                name:'Главная'
            },
            contact: {
                name:'Контакты'
            },
            seminars: {
                name:'Семинары',
            },
            services: {
                name:'Услуги',
            },
            specialists: {
                name:'Специалисты',
            },
            specialties: {
                name:'Специальности',
            },
            onlineLessons: {
                name:'Занятия',
            },
            newsletters: {
                name:'Новости',
            },
            users: {
                name:'Пользователи',
            },
            applications: {
                name:'Записи',
            }
        }
    },
    getters:{
        nav(state){
            return state.nav;
        },
        navOfHome(state){
            let nav;
            nav = JSON.parse(JSON.stringify(state.nav))
            delete nav.home;
            return nav;
        },
    },
    mutations:{ 
    },
    action:{
    }
}