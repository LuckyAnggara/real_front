import { defineStore } from 'pinia'
import axiosIns from '../services/axios'

// ITEM STORE
export const useTaxStore = defineStore('tax', {
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
        const response = await axiosIns.get(`/tax`)
        this.responses = response.data
      } catch (error) {
        alert(error)
      }
      this.isLoading = false
    },
  },
})
