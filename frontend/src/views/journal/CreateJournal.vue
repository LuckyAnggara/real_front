<template>
  <div>
    <a>aaaaaaaaa</a>
    <div class="flex flex-col items-center">
      <div class="w-full md:w-1/2 flex flex-col items-center h-64">
        <div class="w-full px-4">
          <div class="flex flex-col items-center relative">
            <div class="w-full">
              <div @click="open()" class="my-2 p-1 bg-white flex border border-gray-200 rounded transition ease-in duration-100">
                <input
                  v-model="filter"
                  @keypress.enter.prevent="selectOption()"
                  @keypress.up.prevent="focusPrevOption()"
                  @keydown.up.prevent="focusNextOption()"
                  class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                />
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
            <div v-show="show" class="h-56 shadow bg-white top-0 z-40 w-full left-0 rounded max-h-select overflow-y-auto">
              <div v-if="isLoading"></div>
              <div v-else class="flex flex-col w-full">
                <div v-for="(option, index) in filteredOptions" :key="index">
                  <!-- <div> -->
                  <div @click="onOptionClick(index)" :class="classOption(option?.login?.uuid, index)" :aria-selected="focusedOptionIndex === index">
                    <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                      <div class="w-6 flex flex-col items-center">
                        <div class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 mt-1 rounded-full">
                          <img class="rounded-full" alt="A" x-bind:src="option.picture.thumbnail" />
                        </div>
                      </div>
                      <div class="w-full items-center flex">
                        <div class="mx-2 -mt-1">
                          <span>{{ option?.name?.first }}</span>
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
import { ModelSelect } from 'vue-search-select'

const item = {
  value: '',
  text: '',
}

const show = ref(false)
const filter = ref('')
const selected = ref(null)
const focusedOptionIndex = ref(null)
const options = ref(null)
const isLoading = ref(false)

function close() {
  show.value = false
  filter.value = selectedName()
  focusedOptionIndex.value = selected.value ? focusedOptionIndex.value : null
}

function open() {
  show.value = true
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
async function fetchOptions() {
  isLoading.value = true
  await fetch('https://randomuser.me/api/?results=5')
    .then((response) => response.json())
    .then((data) => {
      options.value = data
      isLoading.value = false
    })
}
const filteredOptions = computed(() => {
  if (filter.value == '') {
    return options.value?.results
  } else {
    return options.value.results?.filter((option) => {
      return (
        option.name.first.toLowerCase().indexOf(filter.value) > -1 ||
        option.name.last.toLowerCase().indexOf(filter.value) > -1 ||
        option.email.toLowerCase().indexOf(filter.value) > -1
      )
    })
  }
})

function onOptionClick(index) {
  focusedOptionIndex.value = index
  selectOption()
}
function selectOption() {
  if (!isOpen()) {
    return
  }
  focusedOptionIndex.value = focusedOptionIndex.value ?? 0
  const selected = filteredOptions[focusedOptionIndex.value]
  if (selected && selected.value.login.uuid == selected.login.uuid) {
    filter.value = ''
    selected.value = null
  } else {
    selected = selected.value
    filter = selectedName()
  }
  this.close()
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

onMounted(() => {
  fetchOptions()
})
</script>
