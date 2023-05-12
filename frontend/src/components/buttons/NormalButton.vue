<template>
  <button
    :class="[
      `bg-${bgColor}-700 hover:bg-${bgColor}-800 dark:bg-${bgColor}-600 dark:hover:bg-${bgColor}-700 focus:ring-${bgColor}-300 dark:focus:ring-${bgColor}-800`,
    ]"
    class="hover:scale-105 duration-75 ease-linear text-white inline-flex items-center focus:ring-4 focus:outline-none font-medium rounded-md text-sm px-5 py-2.5 text-center"
  >
    <slot></slot>
  </button>
</template>

<script setup>
const props = defineProps({
  bgColor: {
    type: String,
    default: 'primary',
  },
})
</script>
