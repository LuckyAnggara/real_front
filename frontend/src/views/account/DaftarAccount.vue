<template>
  <div>
    <TableDaftarAccount
      :data="accountStore.responses"
      :isLoading="accountStore.isLoading"
    />
  </div>
</template>

<script setup>
import { onMounted } from 'vue'
import { useAccountStore } from '../../stores/account'
import TableDaftarAccount from './component/Table.vue'

const accountStore = useAccountStore()

onMounted(() => {
  accountStore.getData()
})
</script>
