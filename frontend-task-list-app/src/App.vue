<script setup>
import Sidebar from './components/Sidebar.vue';
import { RouterView } from 'vue-router';
</script>

<template>
  <div class="app-container">
    <Sidebar />
    <main>
      <RouterView /> 
    </main>
  </div>
</template>

<style scoped>
.app-container {
  display: flex;
}
main {
  flex: 1;
  padding: 20px;
}
</style>