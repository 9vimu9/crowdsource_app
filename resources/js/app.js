require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

import QuestionsCreate from './components/questions/QuestionsCreate.vue'

import '../css/app.css';

createApp({
    components: {
        QuestionsCreate
    }
}).use(router).use(VueToast).mount('#app')
