<template>
  <section class="py-6">
    <div class="mx-auto">
      <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
        <div class="flex flex-col px-4 py-3 justify-end items-end">
          <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end">
            <NormalButton @click="showActionMenu = true" @blur="showActionMenu = false">
              Actions
              <EllipsisVerticalIcon class="ml-2 w-5 h-5" />
            </NormalButton>

            <DropdownMenu :show="showActionMenu" />
          </div>
          <small>Berdasarkan data tanggal 26 April 2023</small>
        </div>
        <div class="overflow-x-auto p-5">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-auto border-collapse">
            <thead class="text-xs text-white uppercase bg-secondary dark:bg-primary dark:text-black">
              <tr>
                <!-- <th scope="col" class="p-4">
                  <div class="flex items-center">
                    <input
                      id="checkbox-all"
                      type="checkbox"
                      class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    />
                    <label for="checkbox-all" class="sr-only">checkbox</label>
                  </div>
                </th> -->
                <th scope="col" class="px-4 py-3">Kode Akun</th>
                <th scope="col" class="px-4 py-3">Nama Akun</th>
                <th scope="col" class="px-4 py-3">Pajak</th>
                <th scope="col" class="px-4 py-3 text-end">Saldo (IDR)</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="data in data" :key="data.id" class="border-b">
                <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ data.account_no }}
                </th>
                <td class="px-4 py-2">
                  <span class="bg-primary-100 text-black dark:text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                    {{ data.name }}
                  </span>
                </td>
                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"></td>
                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <div class="flex justify-end">95</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { EllipsisVerticalIcon } from '@heroicons/vue/24/outline'
import NormalButton from '../../components/buttons/NormalButton.vue'
import DropdownMenu from '../../components/DropdownMenu.vue'

import { ref } from 'vue'

const showActionMenu = ref(false)
const props = defineProps({
  data: {
    type: Array,
    default: [],
  },
})
</script>
