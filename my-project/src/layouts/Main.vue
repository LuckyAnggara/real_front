<template>
  <div
    class="p-4 lg:ml-64 sm:ml-16 bg-gray-200 dark:bg-gray-900 transition-all ease-in-out"
  >
    <router-view v-slot="{ Component }">
      <transition name="slide-down-fade">
        <component :is="Component" />
      </transition>
    </router-view>
  </div>
</template>
<script setup></script>

<style scoped>
.slide-down-fade-enter-from {
  opacity: 0;
  transform: translateX(-30px);
}
.slide-down-fade-enter-active {
  transition: all 1s ease;
}
</style>
