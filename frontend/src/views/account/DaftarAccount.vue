<template>
  <div class="mt-24" v-if="accountStore.isLoading">
    <Loader> <span class="text-black dark:text-white">Loading</span> </Loader>
  </div>
  <div v-else>
    <DaftarAccount :data="accountStore.items" />
  </div>
</template>

<script setup>
import { onMounted, onUnmounted } from 'vue'
import { useAccountStore } from '../../stores/account'
import Loader from '../../components/Loader.vue'
import DaftarAccount from './component/Table.vue'

const accountStore = useAccountStore()

onMounted(() => {
  accountStore.$patch({
    currentLimit: 0,
  })
  accountStore.getData()
})

onUnmounted(() => {
  accountStore.$patch({
    currentLimit: 5,
  })
})
</script>
