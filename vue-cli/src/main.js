import { createApp } from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import store from "./store"
import router from "./router"
import './index.css'

import App from './App.vue'

createApp(App).use(VueAxios, axios).use(store).use(router).mount('#app')
// createApp(App).mount('#app')
