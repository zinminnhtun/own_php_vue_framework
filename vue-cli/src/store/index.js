import {createLogger, createStore} from 'vuex'
import Songs from './modules/Songs'
export default createStore({
    namespaced:true,
    plugins:[createLogger],
    state: {
    },
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        Songs
    }
});