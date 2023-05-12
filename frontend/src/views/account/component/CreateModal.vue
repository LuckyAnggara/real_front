<template>
  <!-- Main modal -->
  <Transition name="modal">
    <div
      v-show="show"
      class="modal-mask overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full"
    >
      <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div
          class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5"
        >
          <!-- Modal header -->
          <div
            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600"
          >
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              Tambah Akun
            </h3>
            <button
              @click="emit('close')"
              class="text-gray-400 bg-transparent hover:bg-red-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
            >
              <svg
                aria-hidden="true"
                class="w-5 h-5"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <form @submit.prevent="submit()">
            <div class="flex flex-col space-y-4">
              <div>
                <label
                  for="category_id"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Kategori Akun*</label
                >
                <select
                  required
                  name="category_id"
                  v-model="form.category_id"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                >
                  <optgroup
                    v-for="item in accountHeaderStore.responses"
                    :key="item.id"
                    :label="item.name"
                  >
                    <option
                      v-for="child in item.child"
                      :value="child.id"
                      :key="child.id"
                    >
                      {{ child.account_no }} - {{ child.name }}
                    </option>
                  </optgroup>
                </select>
              </div>
              <div>
                <label
                  for="name"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Nama Akun*</label
                >
                <input
                  required
                  name="name"
                  v-model="form.name"
                  type="text"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Isi dengan nama akun"
                />
              </div>
              <div>
                <label
                  for="child"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Anak Akun Dari</label
                >
                <input
                  type="number"
                  name="child"
                  v-model="form.parent_no"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Isi dengan nomor akun induk, jika akun ini adalah anak akun"
                />
              </div>
              <div>
                <label
                  for="balance"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Saldo Awal</label
                >
                <input
                  type="number"
                  name="balance"
                  v-model="form.balance"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Isi dengan nomor akun induk, jika akun ini adalah anak akun"
                />
              </div>
              <div>
                <label
                  for="tax_id"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Pajak</label
                >
                <select
                  name="tax_id"
                  v-model="form.tax_id"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                >
                  <option value="">Tidak ada Pajak</option>
                  <option
                    v-for="tax in taxStore.responses"
                    :value="tax.id"
                    :key="tax.id"
                  >
                    {{ tax.name }}
                  </option>
                </select>
              </div>
              <div class="sm:col-span-2">
                <label
                  for="description"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Description</label
                >
                <textarea
                  id="description"
                  rows="4"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Isi penjelasan dari akun"
                ></textarea>
              </div>
            </div>
            <div class="mt-4 space-x-4 flex items-center justify-end">
              <NormalButton
                type="button"
                @click="emit('close')"
                :bg-color="'red'"
              >
                <XMarkIcon class="mr-2 h-5 w-5" /> Cancel
              </NormalButton>

              <NormalButton type="submit">
                <PlusIcon class="mr-2 h-5 w-5" /> Submit
              </NormalButton>
            </div>
          </form>
        </div>
      </div>
    </div>
  </Transition>
</template>

<script setup>
import { PlusIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import { ref, onMounted, onUnmounted, nextTick } from 'vue'
import VueMultiselect from 'vue-multiselect'
import { useAccountHeaderStore } from '../../../stores/accountHeader'
import { useTaxStore } from '../../../stores/tax'
import { useAccountStore } from '../../../stores/account'
import NormalButton from '../../../components/buttons/NormalButton.vue'

const props = defineProps({
  show: {
    type: Boolean,
    default: false,
  },
})
const emit = defineEmits(['close'])

const selected = ref(null)
const options = ['list', 'of', 'options']

const form = ref({})

const accountHeaderStore = useAccountHeaderStore()
const accountStore = useAccountStore()
const taxStore = useTaxStore()

async function submit() {
  await accountStore.store(form.value)
}

onMounted(() => {
  accountHeaderStore.getData()
  taxStore.getData()
})
onUnmounted(() => {
  // form.value = {}
})
</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  transition: opacity 0.3s ease;
}

.modal-enter-from {
  opacity: 0;
}

.modal-leave-to {
  opacity: 0;
}

.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
