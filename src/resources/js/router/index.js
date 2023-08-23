import { createRouter, createWebHistory } from 'vue-router'
import HomeComponent from '../components/HomeComponent.vue'

const env = import.meta.env
env.BASE_URL = 'spa/vue/'

export default createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent,
        },
        {
            path: '/tasks',
            name: 'task.list',
            component: () => import('../components/TaskListComponent.vue'),
        },
        {
            path: '/tasks/:taskId',
            name: 'task.detail',
            component: () => import('../components/TaskDetailComponent.vue'),
            props: true,
        },
        {
            path: '/tasks/create',
            name: 'task.create',
            component: () => import('../components/TaskCreateComponent.vue'),
        },
        {
            path: '/tasks/:taskId/edit',
            name: 'task.edit',
            component: () => import('../components/TaskEditComponent.vue'),
            props: true,
        },
    ]
})
