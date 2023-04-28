<template>
  <div class="mt-24" v-if="accountStore.isLoading">
    <Loader> <span class="text-black dark:text-white">Loading</span> </Loader>
  </div>
  <div v-else>
    <DaftarAccount :data="accountStore.responses" />
  </div>
</template>

<script setup>
import { onMounted } from 'vue'
import { useAccountStore } from '../../stores/account'
import Loader from '../../components/Loader.vue'
import DaftarAccount from './component/Table.vue'

const accountStore = useAccountStore()

onMounted(() => {
  accountStore.getData()
})
</script>
