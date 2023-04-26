<template>
  <Transition name="fade" mode="out-in">
    <div
      v-show="show"
      class="fixed top-56 ease-in-out transition-all z-20 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-300 dark:border-gray-700 shadow-md dark:bg-gray-800 dark:divide-gray-600 border-gray-200 border"
    >
      <ul class="py-1 font-light text-black dark:text-white" aria-labelledby="dropdown">
        <li>
          <a href="#" class="py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white flex">
            <PlusIcon class="w-4 mr-2" />
            Buat Akun Baru</a
          >
        </li>
        <li>
          <a href="#" class="py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white flex">
            <PlusIcon class="w-4 mr-2" />
            Buat Jurnal Baru</a
          >
        </li>
      </ul>
      <ul class="py-1 font-light text-black dark:text-white" aria-labelledby="dropdown">
        <li>
          <a href="#" class="py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white flex">
            <Cog8ToothIcon class="w-4 mr-2" />
            Pengaturan</a
          >
        </li>
        <li>
          <a href="#" class="py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white flex">
            <PencilSquareIcon class="w-4 mr-2" />
            Atur Saldo Awal</a
          >
        </li>
      </ul>
      <ul class="py-1 font-light text-black dark:text-white" aria-labelledby="dropdown">
        <li>
          <a href="#" class="py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white flex">
            <ArrowDownTrayIcon class="w-4 mr-2" />
            Export</a
          >
        </li>
      </ul>
    </div>
  </Transition>
</template>

<script setup>
import { EllipsisVerticalIcon, PlusIcon, Cog8ToothIcon, PencilSquareIcon, ArrowDownTrayIcon } from '@heroicons/vue/24/outline'
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
