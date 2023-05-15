import { createApp } from 'vue'
import { createPinia } from 'pinia'
import './style.css'
import App from './App.vue'
import router from './router/index'
import axiosIns from './services/axios'
import vSelect from 'vue-select'
import VueTailwindDatepicker from 'vue-tailwind-datepicker'
import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css'

import 'vue-multiselect/dist/vue-multiselect.css'
import 'vue-search-select/dist/VueSearchSelect.css'
// import 'vue-select/dist/vue-select.css'

const pinia = createPinia()
const app = createApp(App)

app.component('v-select', vSelect)

app.use(router)
app.use(VueTailwindDatepicker)
app.use(pinia)
app.use(Toast)

app.mount('#app')
