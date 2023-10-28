import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ProjectCreate from '../views/ProjectCreate.vue'
import ProjectEdit from '../views/ProjectEdit.vue'
import Login from '../views/Login.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/home',
      name: 'home',
      component: HomeView
    },
    {
      path: '/projects',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/ProjectsView.vue')
    },
    {
      path: '/projects/create',
      name: 'projectCreate',
      component: ProjectCreate
    },
    {
      path: '/projects/:id/edit',
      name: 'projectEdit',
      component: ProjectEdit
    },
    {
      path: '/',
      name: 'login',
      component: Login
    }
  ]
})

export default router
