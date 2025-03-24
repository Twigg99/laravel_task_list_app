<template>
  <aside class="sidebar">
    <nav>
      <h2>Organiser</h2>
      <hr class="organiserSeparator">
   
        <ChevronLeftCircle class="chevron-icon" />
      
      <ul>
        <li><router-link to="/">All Tasks</router-link></li>
      </ul>
    </nav>
  </aside>
</template>
<script setup>
import { Home, List, Plus, ChevronLeftCircle } from "lucide-vue-next";
</script>
<style>
.sidebar {
  width: 250px;
  height: 100%;
  background: #f0fcff;
  display: flex;
  justify-content: center;
  position: fixed;
  top: 0;
  left: 0;
}
nav ul {
  list-style: none;
  padding: 0;
  width: 200px;
  display: flex;
  justify-content: center;
}
nav ul li {
  margin-bottom: 10px;
}
.active {
  background-color: #df57bc; /* Highlighted Section */
  color: white;
  border-radius: 8px;
}

.organiserSeparator {
  border: 1px solid #df57bc;
}

.sidebar a:hover {
  background: #f6828c; /* Light pink hover effect */
  transition: 0.3s ease-in-out;
}

.chevron-icon {
  width: 20px;
  height: 20px;
  cursor: pointer;
  color: #000000; /* Matches your theme */
  transition: transform 0.3s ease-in-out;
}

.chevron-icon:hover {
  color: #f6828c; /* Lighter hover effect */
  transform: scale(1.1);
}
</style>
