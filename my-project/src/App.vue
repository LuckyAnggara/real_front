<script setup>
import LayoutFull from './layouts/LayoutFull.vue'
import LayoutContent from './layouts/LayoutContent.vue'
import { computed, onMounted } from 'vue'

import { useRoute } from 'vue-router'

const route = useRoute()

const layoutFull = computed(() => {
  if (route.meta.layout === 'layout-full') return true
  return false
})
</script>

<template>
  <component :is="layoutFull == true ? LayoutFull : LayoutContent">
    {{ layout }}
    <router-view />
  </component>
  <!-- </TransitionSlide> -->
</template>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
