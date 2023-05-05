import { defineStore } from 'pinia'
import axiosIns from '../services/axios'

// ITEM STORE
export const useAccountStore = defineStore('accountStore', {
  state: () => {
    return {
      responses: {},
      isLoading: false,
      searchState: '',
      currentLimit: 5,
    }
  },
  getters: {
    items(state) {
      return state.responses.data ?? []
    },
    searchQuery(state) {
      if (state.searchName == '' || null) {
        return ''
      }
      return '&name=' + state.searchName
    },
  },
  actions: {
    async getData() {
      this.isLoading = true
      try {
        const response = await axiosIns.get(`/account-detail?limit=${this.currentLimit}${this.searchState}`)
        this.responses = response.data
      } catch (error) {
        alert(error)
      }
      this.isLoading = false
    },
  },
})
