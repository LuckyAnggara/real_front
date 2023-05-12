<template>
  <section class="py-6">
    <div class="mx-auto">
      <div
        class="relative overflow-hidden bg-white dark:bg-gray-800 rounded-lg"
      >
        <div class="flex flex-col px-4 py-3 justify-end items-end">
          <div class="flex flex-shrink-0 flex-row justify-end relative">
            <NormalButton
              @click="showActionMenu = true"
              @blur="showActionMenu = false"
            >
              Actions
              <EllipsisVerticalIcon class="ml-2 w-5 h-5" />
            </NormalButton>

            <DropdownMenu :show="showActionMenu">
              <ul class="py-1 font-light text-black dark:text-white">
                <li>
                  <a
                    @click="showCreateModal = true"
                    class="cursor-pointer py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white flex"
                  >
                    <PlusIcon class="w-4 mr-2" />
                    Buat Akun Baru</a
                  >
                </li>
                <li>
                  <router-link to="/jurnal-umum-baru">
                    <a
                      class="py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white flex"
                    >
                      <PlusIcon class="w-4 mr-2" />
                      Buat Jurnal Baru</a
                    ></router-link
                  >
                </li>
              </ul>
              <ul class="py-1 font-light text-black dark:text-white">
                <li>
                  <a
                    href="#"
                    class="py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white flex"
                  >
                    <Cog8ToothIcon class="w-4 mr-2" />
                    Pengaturan</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white flex"
                  >
                    <PencilSquareIcon class="w-4 mr-2" />
                    Atur Saldo Awal</a
                  >
                </li>
              </ul>
              <ul class="py-1 font-light text-black dark:text-white">
                <li>
                  <a
                    href="#"
                    class="py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white flex"
                  >
                    <ArrowDownTrayIcon class="w-4 mr-2" />
                    Export</a
                  >
                </li>
              </ul>
            </DropdownMenu>
          </div>
        </div>
        <div class="overflow-x-auto p-5">
          <small class="mt-4 text-xs text-end block mb-2"
            >Berdasarkan data tanggal 26 April 2023</small
          >
          <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400 sm:table-auto border-collapse dark:border-gray-700 border sm:overflow-hidden overflow-x-auto"
          >
            <thead
              class="text-xs text-white uppercase bg-secondary dark:bg-primary dark:text-black"
            >
              <tr>
                <th scope="col" class="px-4 py-3">Kode Akun</th>
                <th scope="col" class="px-4 py-3">Lock</th>
                <th scope="col" class="px-4 py-3">Nama Akun</th>
                <th scope="col" class="px-4 py-3">Kategori</th>
                <th scope="col" class="px-4 py-3">Pajak</th>
                <th scope="col" class="px-4 py-3 text-end">Saldo (IDR)</th>
              </tr>
            </thead>
            <tbody class="text-base">
              <tr v-if="isLoading">
                <th
                  scope="row"
                  colspan="6"
                  class="px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white text-center"
                >
                  <Loader>
                    <span class="text-gray-800 dark:text-white"
                      >Fetch Data ...</span
                    >
                  </Loader>
                </th>
              </tr>
              <tr
                v-else
                v-for="data in data"
                :key="data.id"
                class="border-b uppercase"
                :class="[data.header == true ? 'font-bold' : '']"
              >
                <th
                  scope="row"
                  class="flex items-center px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white"
                >
                  {{ data.account_no }}
                </th>
                <td class="px-4 py-2">
                  <!-- <span v-if="data.lock_status == true"><LockClosedIcon class="h-5 w-5 mr-2" /></span>
                  <span v-else>-</span> -->
                </td>
                <td class="px-4 py-2">
                  <span
                    class="bg-primary-100 text-black dark:text-white rounded dark:bg-primary-900 dark:text-primary-300"
                  >
                    <span v-show="data.level == 2" class="mr-1"> - </span>
                    <span>
                      {{ data.name }}
                    </span>
                  </span>
                </td>
                <td
                  class="px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white"
                >
                  {{ data.category.name }}
                </td>
                <td
                  class="px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white"
                >
                  {{ data.tax?.name }}
                </td>
                <td
                  class="px-4 py-2 text-gray-900 whitespace-nowrap dark:text-white"
                >
                  <div
                    :class="[showClassBalance(data)]"
                    class="flex justify-end"
                  >
                    {{ IDRCurrency.format(showBalance(data)) }}
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <Teleport to="body">
      <!-- use the modal component, pass in the prop -->
      <CreateModal :show="showCreateModal" @close="showCreateModal = false">
      </CreateModal>
    </Teleport>
  </section>
</template>

<script setup>
import {
  EllipsisVerticalIcon,
  PlusIcon,
  Cog8ToothIcon,
  PencilSquareIcon,
  ArrowDownTrayIcon,
} from '@heroicons/vue/24/outline'

import { LockClosedIcon } from '@heroicons/vue/20/solid'
import NormalButton from '../../../components/buttons/NormalButton.vue'
import DropdownMenu from '../../../components/DropdownMenu.vue'
import CreateModal from './CreateModal.vue'
import Loader from '../../../components/Loader.vue'
import { IDRCurrency } from '../../../utilities/formatter'

import { ref } from 'vue'

const showActionMenu = ref(false)
const showCreateModal = ref(false)

function showBalance(data) {
  if (data.category.type == 'DEBIT') {
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
  if (data.category.type == 'DEBIT') {
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
  isLoading: {
    type: Boolean,
    default: false,
  },
})
</script>
