<template>
  <div class="p-4 lg:ml-64 sm:ml-16 bg-gray-200 dark:bg-gray-900 transition-all ease-in-out h-screen relative">
    <transition name="slide-down-fade">
      <div class="bg-white rounded-md w-full mt-16 relative">
        <span class="p-4 text-black text-2xl block"> {{ route.meta.title }} </span>
      </div>
    </transition>
    <router-view v-slot="{ Component }">
      <transition name="slide-down-fade">
        <component class="" :is="Component" />
      </transition>
    </router-view>
  </div>
</template>
<script setup>
import { useRoute } from 'vue-router'

const route = useRoute()
</script>

<style scoped>
.slide-down-fade-enter-from {
  opacity: 0;
  transform: translateX(-30px);
}
.slide-down-fade-enter-active {
  transition: all 1s ease;
}
</style>
