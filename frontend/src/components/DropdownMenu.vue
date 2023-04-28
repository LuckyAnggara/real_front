<template>
  <Transition name="fade" mode="out-in">
    <div
      v-show="show"
      class="fixed px-8 sm:p-0 right-0 sm:inset-auto sm:top-52 bottom-0 w-full h-fit ease-in-out transition-all z-50 my-4 sm:w-56 text-base list-none rounded dark:border-gray-700 sm:shadow-md dark:bg-gray-800 sm:border-gray-200 sm:border"
    >
      <div class="bg-white rounded-md shadow-md py-2 dark:divide-gray-600 divide-gray-300 divide-y border-gray-200 border sm:border-none sm:border-transparent">
        <ul class="py-1 font-light text-black dark:text-white">
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
        <ul class="py-1 font-light text-black dark:text-white">
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
        <ul class="py-1 font-light text-black dark:text-white">
          <li>
            <a href="#" class="py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white flex">
              <ArrowDownTrayIcon class="w-4 mr-2" />
              Export</a
            >
          </li>
        </ul>
      </div>
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
