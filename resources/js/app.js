import './bootstrap';
import 'vuetify/styles' // Global CSS has to be imported
import { createApp } from 'vue'
import { createVuetify } from 'vuetify'
import App from './App.vue'
import router from "./router.js"
import { VDataTable } from 'vuetify/labs/VDataTable'

const app = createApp(App)
const vuetify = createVuetify({
  components: {
    VDataTable,
  },
})

app.use(router)
app.use(vuetify)
app.mount('#app')