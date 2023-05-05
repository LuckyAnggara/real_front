import { defineStore } from 'pinia'
import axiosIns from '../services/axios'

// ITEM STORE
export const useAccountStore = defineStore('accountStore', {
  state: () => {
    return {
      responses: {},
      isLoading: false,
      query: '',
      currentLimit: 5,
      selected: '',
    }
  },
  getters: {
    items(state) {
      return state.responses.data ?? []
    },
    searchQuery(state) {
      if (state.query == '' || null) {
        return ''
      }
      return '&name=' + state.query
    },
  },
  actions: {
    async getData(query = '') {
      this.query = query
      this.isLoading = true
      try {
        const response = await axiosIns.get(`/account-detail?limit=${this.currentLimit}${this.searchQuery}`)
        this.responses = response.data
      } catch (error) {
        alert(error)
      }
      this.isLoading = false
    },
  },
})
