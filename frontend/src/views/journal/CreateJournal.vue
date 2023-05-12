<template>
  <div>
    <div class="mt-6 w-full h-screen mx-auto overflow-hidden bg-white dark:bg-gray-800 rounded-lg">
      <div class="py-8 px-6">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Jurnal Baru</h2>
        <form action="#" class="flex flex-col space-y-4">
          <div class="flex space-x-6">
            <div class="w-72">
              <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Transaksi</label>
              <input
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Isi dengan Nomor Transaksi jika ada"
              />
            </div>
            <div class="w-72">
              <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
              <vue-tailwind-datepicker
                :auto-apply="true"
                :shortcuts="false"
                :formatter="formatter"
                v-model="dateValue"
                placeholder="Pilih tanggal"
                as-single
                input-classes="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              />
            </div>
          </div>
          <div class="">
            <div class="w-96">
              <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes</label>
              <input
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Isi dengan catatan untuk mempermudah pencarian"
                required=""
              />
            </div>
          </div>
        </form>
      </div>

      <!-- Start coding here -->
      <div class="overflow-x-auto px-6 flex flex-col space-y-4 h-full">
        <div class="flex justify-end">
          <NormalButton @click="journalStore.addData"> Add product </NormalButton>
        </div>

        <table class="text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-4 py-3 w-fit">Nama Akun</th>
              <!-- <th scope="col" class="px-4 py-3">Deskripsi</th> -->
              <th scope="col" class="px-4 py-3 w-72">Debit</th>
              <th scope="col" class="px-4 py-3 w-72">Kredit</th>
              <th scope="col" class="px-4 py-3 w-12">
                <span class="sr-only">Actions</span>
              </th>
            </tr>
          </thead>
          <tbody class="">
            <tr v-for="(data, index) in journalStore.currentData" :key="index" class="border-b dark:border-gray-700">
              <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <SelectSearch
                  :debounce-timing="10"
                  @search="(event) => searchData(event)"
                  v-model="data.account_no"
                  :data="dataAccount"
                  :loading-state="accountStore.isLoading"
                  v-slot="slot"
                >
                  <span>{{ slot.item.account_no }}</span> - <span>{{ slot.item.name }}</span>
                </SelectSearch>
              </td>
              <!-- <td class="px-4 py-3">IDR</td> -->
              <td class="px-4 py-3">
                <InputCurrency
                  v-model="data.debit"
                  :options="{ currency: 'IDR' }"
                  :custom-class="`bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500`"
                />
              </td>
              <td class="px-4 py-3">
                <InputCurrency
                  v-model="data.kredit"
                  :options="{ currency: 'IDR' }"
                  :custom-class="`bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500`"
                />
              </td>
              <td class="px-4 py-3">
                <TrashIcon @click="destroyData(index)" class="h-5 w-5 hover:scale-110 cursor-pointer hover:text-red-500 duration-500 ease-in-out transform" />
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr class="font-semibold text-gray-900 dark:text-white">
              <th scope="row" class="px-6 py-3 text-base">Tidak Balance</th>
              <td class="px-6 py-3">{{ totalDebit }}</td>
              <td class="px-6 py-3">{{ totalKredit }}</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import { TrashIcon } from '@heroicons/vue/24/outline'

import { useAccountStore } from '../../stores/account'
import { useJournalStore } from '../../stores/journal'
import SelectSearch from '../../components/SelectSearch.vue'
import InputCurrency from '../../components/InputCurrency.vue'
import NormalButton from '../../components/buttons/NormalButton.vue'
import { computed, nextTick, onMounted, ref } from 'vue'

const accountStore = useAccountStore()
const journalStore = useJournalStore()

const dataAccount = ref([])

const formatter = ref({
  date: 'DD MMM YYYY',
  month: 'MMM',
})

const dateValue = ref('')

function destroyData(index) {
  journalStore.currentData.splice(index, 1)
}
async function getData(query = '') {
  await accountStore.getData(query, 0)
  nextTick()
  dataAccount.value = accountStore.items
}
function searchData(query) {
  dataAccount.value = accountStore.items.filter((account) => {
    const queryLowerCase = query.toLowerCase()
    return account.name.toLowerCase().includes(queryLowerCase) || account.account_no.toLowerCase().includes(queryLowerCase)
  })
}

const totalDebit = computed(() => {
  return journalStore.currentData.reduce((acc, curr) => acc + curr.debit, 0)
})

const totalKredit = computed(() => {
  return journalStore.currentData.reduce((acc, curr) => acc + curr.kredit, 0)
})

onMounted(() => {
  getData('', 0)
})
</script>
