import { createRouter, createWebHistory } from 'vue-router'

import QuestionsCreate from '../components/questions/QuestionsCreate.vue'

const routes = [
    {
        path: '/questions/create',
        name: 'questions.create',
        component: QuestionsCreate
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})
