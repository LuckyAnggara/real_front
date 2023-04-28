<template>
  <section class="py-6">
    <div class="mx-auto">
      <div class="relative overflow-hidden bg-white dark:bg-gray-800 rounded-lg">
        <div class="flex flex-col px-4 py-3 justify-end items-end">
          <div class="flex flex-shrink-0 flex-row justify-end">
            <NormalButton @click="showActionMenu = true" @blur="showActionMenu = false">
              Actions
              <EllipsisVerticalIcon class="ml-2 w-5 h-5" />
            </NormalButton>

            <DropdownMenu :show="showActionMenu" />
          </div>
          <small class="mt-4 text-xs">Berdasarkan data tanggal 26 April 2023</small>
        </div>
        <div class="overflow-x-auto p-5">
          <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400 sm:table-auto border-collapse dark:border-gray-700 border sm:overflow-hidden overflow-x-auto"
          >
            <thead class="text-xs text-white uppercase bg-secondary dark:bg-primary dark:text-black">
              <tr>
                <th scope="col" class="px-4 py-3">Kode Akun</th>
                <th scope="col" class="px-4 py-3">Lock</th>
                <th scope="col" class="px-4 py-3">Nama Akun</th>
                <th scope="col" class="px-4 py-3">Kategori</th>
                <th scope="col" class="px-4 py-3">Pajak</th>
                <th scope="col" class="px-4 py-3 text-end">Saldo (IDR)</th>
              </tr>
            </thead>
            <tbody class="text-xs">
              <tr v-for="data in data" :key="data.id" class="border-b uppercase">
                <th scope="row" class="flex items-center px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                  {{ data.account_no }}
                </th>
                <td class="px-4 py-2">
                  <span v-if="data.lock_status == true"><LockClosedIcon class="h-5 w-5 mr-2" /></span>
                  <span v-else>-</span>
                </td>
                <td class="px-4 py-2">
                  <span class="bg-primary-100 text-black dark:text-white rounded dark:bg-primary-900 dark:text-primary-300">
                    {{ data.name }}
                  </span>
                </td>
                <td class="px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white">{{ data.detail.name }}</td>
                <td class="px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white">{{ data.tax?.name }}</td>
                <td class="px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                  <div :class="[showClassBalance(data)]" class="flex justify-end font-bold">
                    {{ IDRCurrency.format(showBalance(data)) }}
                  </div>
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
import { LockClosedIcon } from '@heroicons/vue/20/solid'
import NormalButton from '../../../components/buttons/NormalButton.vue'
import DropdownMenu from '../../../components/DropdownMenu.vue'
import { IDRCurrency } from '../../../utilities/formatter'

import { ref } from 'vue'

const showActionMenu = ref(false)

function showBalance(data) {
  if (data.detail.header.type == 'DEBIT') {
    if (data.balance < 0) {
      return data.balance
    } else {
      return data.balance
    }
  } else {
    if (data.balance < 0) {
      return -data.balance
    } else {
      return data.balance
    }
  }
}

function showClassBalance(data) {
  if (data.detail.header.type == 'DEBIT') {
    if (data.balance < 0) {
      return 'text-red-500'
    } else {
      return ''
    }
  } else {
    if (data.balance < 0) {
      return ''
    } else {
      return 'text-red-500'
    }
  }
}

const props = defineProps({
  data: {
    type: Object,
    default: {},
  },
})
</script>
