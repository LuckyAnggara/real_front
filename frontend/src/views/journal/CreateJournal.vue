<template>
  <div>
    <SelectSearch v-model="accountStore.selected" :data="accountStore.items" :loading-state="accountStore.isLoading" v-slot="slot">
      <span>{{ slot.item.account_no }}</span> - <span>{{ slot.item.name }}</span>
    </SelectSearch>
  </div>
</template>

<script setup>
import { useAccountStore } from '../../stores/account'
import SelectSearch from '../../components/SelectSearch.vue'
import { onMounted } from 'vue'
const accountStore = useAccountStore()

onMounted(() => {
  accountStore.getData()
})
</script>
