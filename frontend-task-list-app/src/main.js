import { createApp } from 'vue';
import './style.css'
import App from './App.vue';
import router from './router'; // Import Vue Router

const app = createApp(App);
app.use(router); // Register Vue Router
app.mount('#app');
