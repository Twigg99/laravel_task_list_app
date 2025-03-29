import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from './components/Dashboard.vue';
import Holiday from './components/Holiday.vue';

const routes = [
  { path: '/', component: Dashboard },
  { path: '/holiday', component: Holiday },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
