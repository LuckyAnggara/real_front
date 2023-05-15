<template>
  <div class="flex flex-col items-center relative">
    <div v-show="!showSelected" class="relative w-full">
      <input
        disabled
        :value="selected?.account_no + ` - ` + selected?.name"
        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
      />
      <button @click="clear()" class="absolute top-0 right-0 p-2.5 text-sm font-medium dark:text-white rounded-r-lg text-black">
        <XMarkIcon class="h-5 w-5" />
        <span class="sr-only">Delete</span>
      </button>
    </div>

    <div v-show="showSelected" class="w-full">
      <input
        @click="open()"
        v-model="query"
        @input="search"
        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
      />
      <button class="absolute top-0 right-0 p-2.5 text-sm font-medium dark:text-white rounded-r-lg text-black">
        <ChevronDownIcon @click="open()" v-if="!show" class="h-5 w-5" />
        <ChevronUpIcon @click="close()" v-else class="h-5 w-5" />
      </button>
    </div>
    <div
      tabindex="0"
      v-show="show"
      @mouseleave="close()"
      class="duration-300 transform-all absolute shadow z-50 top-12 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 block w-full py-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
    >
      <div v-if="loadingState">
        <div class="py-2 block">
          <loader custom-class="h-6 w-6" />
        </div>
      </div>
      <div v-else-if="data.length < 1">
        <div class="py-2 block text-center">
          <span> Tidak ada data </span>
        </div>
      </div>
      <div v-else class="flex flex-col w-full overflow-auto max-h-60 scroll-smooth will-change-scroll">
        <div v-for="(item, index) in data" :key="index">
          <!-- <div> -->
          <div @click="selectedOption(item)" :class="classOption(item, index)" :aria-selected="focusedOptionIndex === index" :title="item.name">
            <div class="flex w-full items-center px-2 py-2 pl-2 hover:dark:text-black">
              <div class="w-full items-center flex">
                <div class="mx-2">
                  <slot :item="item"></slot>
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
import { XMarkIcon, ChevronDownIcon, ChevronUpIcon } from '@heroicons/vue/24/outline'
import { computed, nextTick, onMounted, reactive, ref, watch } from 'vue'
import Loader from '../components/Loader.vue'
import useDebouncedRef from '../utilities/helper'

const props = defineProps({
  modelValue: String,
  data: {
    type: Object,
    default: [],
    required: true,
  },
  loadingState: {
    type: Boolean,
    default: false,
    required: true,
  },
  debounceTiming: {
    type: Number,
    default: 400,
  },
})

const emit = defineEmits(['search'])

const show = ref(false)
const showSelected = ref(true)
const filter = ref('')
const selected = ref(null)
const focusedOptionIndex = ref(null)

function cek() {
  console.info('aaaaa')
}

function clear() {
  showSelected.value = true
  selected.value = null
  query.value = ''
  open()
}

function close() {
  show.value = false
  query.value = ''
}

function isChoose() {
  show.value = false
  showSelected.value = false
  query.value = ''
}

function selectedOption(value) {
  selected.value = value
  isChoose()
}

async function open() {
  show.value = true
  filter.value = ''
  query.value = ''
}

function classOption(id, index) {
  const isSelected = selected.value ? id == selected.value.id : false
  const isFocused = index == focusedOptionIndex.value
  return {
    'cursor-pointer w-full hover:bg-blue-50 ': true,
    'bg-blue-100 ': isSelected,
    'bg-blue-50 dark:text-black': isFocused,
  }
}

const query = useDebouncedRef('', props.debounceTiming)

watch(query, (newQuery) => {
  emit('search', newQuery)
})
</script>
