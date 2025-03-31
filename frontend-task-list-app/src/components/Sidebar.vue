<template>
  <aside class="sidebar"  :class="['sidebar', { collapsed: isCollapsed }]">
    <ChevronLeftCircle class="chevron-icon" @click="collapseSidebar" :class="['chevron-icon', { rotated: isCollapsed }]"/>
    <nav>
      <h2>Organiser</h2>
      <hr class="organiserSeparator">
   
      
      <ul class="navigationList">
        <li><router-link to="/" class="iconSidebar"><ClipboardList ></ClipboardList><span v-if="!isCollapsed">All Tasks</span><span v-if="!isCollapsed"><TrashIcon></TrashIcon></span></router-link></li>
        <li><router-link to="/holiday" class="iconSidebar"><Plane></Plane><span v-if="!isCollapsed">Holidays</span><span v-if="!isCollapsed"><TrashIcon></TrashIcon></span></router-link></li>
      </ul>
      <button class="addSectionButton"><CirclePlus></CirclePlus><span v-if="!isCollapsed">Add New Section</span></button>
    </nav>
  </aside>
</template>
<script setup>
import { ChevronLeftCircle, CirclePlus, ClipboardList, TrashIcon, Plane } from "lucide-vue-next";
import { ref } from "vue";

const isCollapsed = ref(false);


const collapseSidebar = () => {
  isCollapsed.value = !isCollapsed.value;
};


</script>
<style>

.iconSidebar {
  display: flex;
  width: 100%;
  justify-content: space-evenly;
}


</style>
