<template>
  <aside class="sidebar"  :class="['sidebar', { collapsed: isCollapsed }]">
    <ChevronLeftCircle class="chevron-icon" @click="collapseSidebar" :class="['chevron-icon', { rotated: isCollapsed }]"/>
    <nav>
      <h2>Organiser</h2>
      <hr class="organiserSeparator">
   
      
      <ul class="navigationList">
        <li><router-link to="/">All Tasks</router-link></li>
        <li><router-link to="/holiday">Holidays</router-link></li>
      </ul>
      <button class="addSectionButton"><CirclePlus></CirclePlus><span v-if="!isCollapsed">Add New Section</span></button>
    </nav>
  </aside>
</template>
<script setup>
import { Home, List, Plus, ChevronLeftCircle, CirclePlus } from "lucide-vue-next";
import { ref } from "vue";

const isCollapsed = ref(false);


const collapseSidebar = () => {
  isCollapsed.value = !isCollapsed.value;
};


</script>
<style>
</style>
