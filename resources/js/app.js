require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'

import QuestionsCreate from './components/questions/QuestionsCreate.vue'

import '../css/app.css';

createApp({
    components: {
        QuestionsCreate
    }
}).use(router).mount('#app')
