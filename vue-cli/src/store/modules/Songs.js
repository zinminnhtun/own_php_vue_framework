import axios from "axios";

const sleep = ms => new Promise(resolve => setTimeout(resolve, ms))
export default {
    state: {
        songs: [],
        loading: false,
    },
    getters: {
        songNames(state) {
            // let s =state.songs;
            // s=s.map(e=>e.name)
            // return s;
            return state.songs.map(e => e.name);
        },
    },
    mutations: {
        set(state, songs) {
            state.songs = songs;
        },
        setLoading(state, loading) {
            state.loading = loading;
        },
    },
    actions: {
        async get({commit}) {
            commit('setLoading', true);
            await axios
                .get("http://localhost:8000/api/songs")
                .then(res => commit('set', res.data))
                .catch(err => console.log(err));
            sleep(1000);
            commit('setLoading', false);
        },
    }
}