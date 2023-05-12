<template>
  <div>
    <TableDaftarAccount
      :data="accountStore.items"
      :isLoading="accountStore.isLoading"
    />
  </div>
</template>

<script setup>
import { onMounted, onUnmounted } from 'vue'
import { useAccountStore } from '../../stores/account'
import TableDaftarAccount from './component/Table.vue'

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
