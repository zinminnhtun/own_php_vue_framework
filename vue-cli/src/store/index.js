import {createLogger, createStore} from 'vuex'
import User from './modules/User'
export default createStore({
    namespaced:true,
    plugins:[createLogger],
    state: {
    },
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        User
    }
});