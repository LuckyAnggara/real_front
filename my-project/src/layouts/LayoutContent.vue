<template>
  <div class="bg-gray-100 relative">
    <NavBar @showMenu="showMenu = !showMenu" @hideMenu="showMenu = false" />

    <MenuBar :show-menu="showMenu" />

    <Main />
  </div>
</template>

<script setup>
import NavBar from './NavBar.vue'
import MenuBar from './MenuBar.vue'
import Main from './Main.vue'
import { ref } from 'vue'

const showMenu = ref(false)

function show() {
  showMenu.value = true
}
</script>
