<template>
  <div>
    <a>aaaaaaaaa</a>
    <div class="flex flex-col items-center">
      <div class="w-full md:w-1/2 flex flex-col items-center h-64">
        <div class="w-full px-4">
          <div class="flex flex-col items-center relative">
            <div class="w-full">
              <div @click="open()" class="my-2 p-1 bg-white flex border border-gray-200 rounded transition ease-in duration-100">
                <input v-model="accountStore.searchState" @input="search" class="p-1 px-2 appearance-none outline-none w-full text-gray-800" />
                <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                  <button @click="show = !show" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="100%"
                      height="100%"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <polyline x-show="!isOpen()" points="18 15 12 20 6 15"></polyline>
                      <polyline x-show="isOpen()" points="18 15 12 9 6 15"></polyline>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div v-show="show" class="shadow bg-white top-0 z-40 w-full left-0 rounded max-h-select overflow-y-auto">
              <div v-if="accountStore.isLoading">
                <div class="py-2 block">
                  <loader custom-class="h-6 w-6" />
                </div>
              </div>
              <div v-else class="flex flex-col w-full">
                <div v-for="(item, index) in accountStore.items" :key="index">
                  <!-- <div> -->
                  <div @click="onOptionClick(index)" :class="classOption(item, index)" :aria-selected="focusedOptionIndex === index">
                    <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                      <div class="w-full items-center flex">
                        <div class="mx-2 -mt-1">
                          <span>{{ item.account_no }}</span> - <span>{{ item.name }}</span>
                          <div class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500" x-text="option.email"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, nextTick, onMounted, reactive, ref } from 'vue'
import Loader from '../../components/Loader.vue'
import _ from 'lodash'
import { debounce } from '../../utilities/helper'

import { useAccountStore } from '../../stores/account'

const accountStore = useAccountStore()

const show = ref(false)
const filter = ref('')
const selected = ref(null)
const focusedOptionIndex = ref(null)

function close() {
  show.value = false
  filter.value = selectedName()
  focusedOptionIndex.value = selected.value ? focusedOptionIndex.value : null
}

async function open() {
  show.value = true
  await nextTick()
  if (accountStore.items.length < 1) {
    accountStore.getData()
  }
  filter.value = ''
}

function isOpen() {
  return show.value === true
}

function selectedName() {
  return selected.value ? selected.value.name.first + ' ' + selected.value.name.last : filter.value
}

function classOption(id, index) {
  const isSelected = selected.value ? id == selected.value.login.uuid : false
  const isFocused = index == focusedOptionIndex.value
  return {
    'cursor-pointer w-full border-gray-100 border-b hover:bg-blue-50': true,
    'bg-blue-100': isSelected,
    'bg-blue-50': isFocused,
  }
}

function onOptionClick(index) {
  focusedOptionIndex.value = index
  selectOption()
}
function selectOption() {
  if (!isOpen()) {
    return
  }
  focusedOptionIndex.value = focusedOptionIndex.value ?? 0

  const selected = filteredOptions.value[focusedOptionIndex.value]

  console.info(selected)

  if (selected.value.login.uuid == selected.login.uuid) {
    filter.value = ''
    selected.value = null
  } else {
    selected = selected.value
    filter = selectedName()
  }

  close()
}
function focusPrevOption() {
  if (!isOpen()) {
    return
  }
  const optionsNum = Object.keys(filteredOptions()).length - 1
  if (focusedOptionIndex.value > 0 && focusedOptionIndex.value <= optionsNum) {
    focusedOptionIndex.value--
  } else if (focusedOptionIndex.value == 0) {
    focusedOptionIndex.value = optionsNum
  }
}
function focusNextOption() {
  const optionsNum = Object.keys(filteredOptions()).length - 1
  if (!isOpen()) {
    open()
  }
  if (focusedOptionIndex.value == null || focusedOptionIndex.value == optionsNum) {
    focusedOptionIndex.value = 0
  } else if (focusedOptionIndex.value >= 0 && focusedOptionIndex.value < optionsNum) {
    focusedOptionIndex.value++
  }
}

function search() {
  debounce(function () {
    console.info('bb')
    // accountStore.getData()
  }, 1000)
}

onMounted(() => {})
</script>
