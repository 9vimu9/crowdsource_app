require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'

import QuestionsCreate from './components/questions/QuestionsCreate.vue'


createApp({
    components: {
        QuestionsCreate
    }
}).use(router).mount('#app')
