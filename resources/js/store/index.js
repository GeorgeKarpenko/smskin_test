import Vue from 'vue';
import Vuex from 'vuex';

import nav from './modules/nav';
import articles from './modules/articles.js';

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules:{
        nav,
        articles
    }
});