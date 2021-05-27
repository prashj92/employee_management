import { createApp } from 'vue';

//Main pages
import App from './views/App.vue';
import router from "./routes.js";
// import VueSimpleAlert from "vue-simple-alert";


createApp(App).use(router).mount('#app');