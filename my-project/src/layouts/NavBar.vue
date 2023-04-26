<template>
  <nav
    class="fixed w-full z-50 bg-white border-gray-300 dark:border-gray-700 border-b px-4 lg:px-4 py-2.5 dark:bg-gray-800"
  >
    <div class="flex flex-wrap justify-between items-center">
      <div
        class="justify-start items-center hidden sm:flex transition-all ease-in-out -translate-x-full sm:translate-x-0"
      >
        <a href="https://flowbite.com" class="flex mr-4">
          <img
            src="https://flowbite.s3.amazonaws.com/logo.svg"
            class="mr-3 h-8"
            alt="FlowBite Logo"
          />
          <span
            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
            >Flowbite</span
          >
        </a>
      </div>

      <div
        class="justify-start items-center flex sm:hidden transition-all ease-in-out translate-x-0 sm:-translate-x-full"
      >
        <button
          @blur="emit('hideMenu')"
          @click="emit('showMenu')"
          class="text-black hover:text-white dark:hover:text-black dark:text-white hover:bg-secondary dark:hover:bg-primary rounded-lg text-sm p-2.5"
        >
          <!-- Icon -->
          <Bars3Icon class="h-8 w-8" />
        </button>
      </div>

      <div class="flex items-center lg:order-2 justify-end">
        <!-- Dark Mode Button -->
        <button
          @click="toggleDark()"
          type="button"
          class="text-black hover:text-white dark:hover:text-black dark:text-white hover:bg-secondary dark:hover:bg-primary rounded-lg text-sm p-2.5"
        >
          <svg
            :class="isDark ? 'hidden' : ''"
            class="w-6 h-6"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
            ></path>
          </svg>
          <svg
            :class="!isDark ? 'hidden' : ''"
            class="w-6 h-6"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
              fill-rule="evenodd"
              clip-rule="evenodd"
            ></path>
          </svg>
        </button>

        <!-- Apps -->
        <button
          @blur="showAppMenu = false"
          @click="showAppMenu = !showAppMenu"
          class="text-black hover:text-white dark:hover:text-black dark:text-white hover:bg-secondary dark:hover:bg-primary rounded-lg text-sm p-2.5"
        >
          <!-- Icon -->
          <svg
            class="w-6 h-6"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
            ></path>
          </svg>
        </button>
        <!-- Dropdown menu -->
        <Transition name="fade" mode="out-in">
          <div
            v-show="showAppMenu"
            class="fixed top-14 ease-in-out transition overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-gray-50 rounded divide-y divide-gray-300 shadow-lg dark:bg-gray-700 dark:divide-gray-600"
          >
            <div
              class="block py-2 px-4 text-base font-medium text-center text-black bg-gray-50 dark:bg-gray-700 dark:text-white"
            >
              Apps
            </div>
            <div class="grid grid-cols-3 gap-4 p-4">
              <a
                href="#"
                class="text-black hover:text-white dark:hover:text-black dark:text-white hover:bg-secondary dark:hover:bg-primary rounded-lg text-sm p-2.5"
              >
                <svg
                  class="mx-auto mb-1 w-7 h-7"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
                <div class="text-sm">Sales</div>
              </a>
            </div>
          </div>
        </Transition>
        <button
          @click="showUserMenu = !showUserMenu"
          @blur="showUserMenu = false"
          class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
        >
          <img
            class="w-8 h-8 rounded-full"
            src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
            alt="user photo"
          />
        </button>
        <!-- Dropdown menu -->
        <Transition name="fade" mode="out-in">
          <div
            v-show="showUserMenu"
            class="fixed top-14 ease-in-out transition-all z-20 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
          >
            <div class="py-3 px-4">
              <span
                class="block text-sm font-semibold text-gray-900 dark:text-white"
                >Neil sims</span
              >
              <span
                class="block text-sm font-light text-black truncate dark:text-gray-600"
                >name@flowbite.com</span
              >
            </div>
            <ul
              class="py-1 font-light text-black dark:text-gray-600"
              aria-labelledby="dropdown"
            >
              <li>
                <a
                  href="#"
                  class="block py-2 px-4 text-sm hover:bg-secondary dark:hover:bg-gray-600 dark:text-gray-600 dark:hover:text-white"
                  >My profile</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="block py-2 px-4 text-sm hover:bg-secondary dark:hover:bg-gray-600 dark:text-gray-600 dark:hover:text-white"
                  >Account settings</a
                >
              </li>
            </ul>
            <ul
              class="py-1 font-light text-black dark:text-gray-600"
              aria-labelledby="dropdown"
            >
              <li>
                <a
                  href="#"
                  class="flex items-center py-2 px-4 text-sm hover:bg-secondary dark:hover:bg-gray-600 dark:hover:text-white"
                  ><svg
                    class="mr-2 w-5 h-5 text-black"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                  My likes</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex items-center py-2 px-4 text-sm hover:bg-secondary dark:hover:bg-gray-600 dark:hover:text-white"
                  ><svg
                    class="mr-2 w-5 h-5 text-black"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"
                    ></path>
                  </svg>
                  Collections</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex justify-between items-center py-2 px-4 text-sm hover:bg-secondary dark:hover:bg-gray-600 dark:hover:text-white"
                >
                  <span class="flex items-center">
                    <svg
                      class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                    Pro version
                  </span>
                  <svg
                    class="w-5 h-5 text-black"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </a>
              </li>
            </ul>
            <ul
              class="py-1 font-light text-black dark:text-gray-600"
              aria-labelledby="dropdown"
            >
              <li>
                <a
                  href="#"
                  class="block py-2 px-4 text-sm hover:bg-secondary dark:hover:bg-gray-600 dark:hover:text-white"
                  >Sign out</a
                >
              </li>
            </ul>
          </div>
        </Transition>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { Bars3Icon } from '@heroicons/vue/24/outline'
import { useDark, useToggle } from '@vueuse/core'
import { ref } from 'vue'

const emit = defineEmits(['showMenu', 'hideMenu'])

const isDark = useDark()
const toggleDark = useToggle(isDark)
const showAppMenu = ref(false)
const showUserMenu = ref(false)
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
