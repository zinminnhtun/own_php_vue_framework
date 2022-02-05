import axios from "axios";

const sleep = ms => new Promise(resolve => setTimeout(resolve, ms))
export default {
    state: {
        data: [
            {id: 1, name: "I love you"},
            {id: 2, name: "I love you,baby"},
        ],
        loading: false,
    },
    getters: {
        name(state) {
            // let s =state.data;
            // s=s.map(e=>e.name)
            // return s;
            return state.data.map(e => e.name);
        },
    },
    mutations: {
        set(state, data) {
            state.data = data;
        },
        setLoading(state, loading) {
            state.loading = loading;
        },
    },
    actions: {
        async get({commit}) {
            commit('setLoading', true);
            await axios
                .get("http://localhost:8000/api/all")
                .then(res => commit('set', res.data))
                .catch(err => console.log(err));
            sleep(1000);
            commit('setLoading', false);
        },
    }
}