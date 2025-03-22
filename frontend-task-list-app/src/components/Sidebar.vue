<template>
  <aside class="sidebar">
    <nav>
      <ul>
        <li><router-link to="/">All Tasks</router-link></li>

      </ul>
    </nav>
  </aside>
</template>
<script setup>
</script>
<style>
.sidebar {
    width: 250px;
    height: 100%;
    background: #f4f4f4;
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
}</style>