<template>
  <Transition name="fade" mode="out-in">
    <div
      v-show="show"
      class="fixed sm:absolute px-8 sm:p-0 right-0 sm:inset-auto sm:top-8 bottom-0 w-full h-fit ease-in-out transition-all z-50 my-4 sm:w-56 text-base list-none rounded dark:border-gray-700 sm:shadow-md dark:bg-gray-800 sm:border-gray-200 sm:border"
    >
      <div
        class="bg-white rounded-md shadow-md py-2 dark:divide-gray-600 divide-gray-300 divide-y border-gray-200 border sm:border-none sm:border-transparent"
      >
        <slot></slot>
      </div>
    </div>
  </Transition>
</template>

<script setup>
const props = defineProps({
  show: {
    type: Boolean,
    default: false,
  },
})
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
