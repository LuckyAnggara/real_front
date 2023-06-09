import { defineStore } from 'pinia'
import axiosIns from '../services/axios'

// ITEM STORE
export const useAccountHeaderStore = defineStore('accountHeader', {
  state: () => {
    return {
      responses: {},
      isLoading: false,
    }
  },
  getters: {},
  actions: {
    async getData(page = '') {
      this.isLoading = true
      try {
        const response = await axiosIns.get(`/account-header`)
        this.responses = response.data
      } catch (error) {
        alert(error)
      }
      this.isLoading = false
    },
  },
})
