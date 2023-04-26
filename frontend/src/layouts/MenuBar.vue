<template>
  <aside
    id="logo-sidebar"
    :class="
      showMenu == false
        ? 'transition-all ease-in-out -translate-x-full bg-white border-r border-gray-300 sm:translate-x-0 lg:w-64 w-16'
        : 'transition-all ease-in-out  bg-white border-r border-gray-300 lg:translate-x-0 w-64'
    "
    class="fixed top-0 left-0 z-40 h-screen pt-20 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar"
  >
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
        <li v-for="menu in listMenu" :key="menu.id">
          <router-link :to="{ name: menu.to }">
            <a
              class="flex items-center text-black hover:text-white dark:hover:text-black dark:text-white hover:bg-secondary dark:hover:bg-primary rounded-lg p-2"
            >
              <component class="h-6 w-6" :is="menu.icon"></component>
              <span
                :class="showMenu == false ? 'hidden lg:flex' : ''"
                class="ml-3 transition-all ease-in-out"
                >{{ menu.name }}</span
              >
            </a>
          </router-link>
        </li>
      </ul>
    </div>
  </aside>
</template>

<script setup>
import { reactive } from 'vue'
import { menu } from '../router/menu'
import { useRoute } from 'vue-router'

const props = defineProps({
  showMenu: {
    type: Boolean,
    default: false,
  },
})
const listMenu = reactive(menu)
const route = useRoute()
</script>
