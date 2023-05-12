import { defineStore } from 'pinia'
import axiosIns from '../services/axios'
import { useToast } from 'vue-toastification'

const toast = useToast()

// ITEM STORE
export const useAccountStore = defineStore('accountStore', {
  state: () => {
    return {
      responses: {},
      isLoading: false,
      query: '',
      currentLimit: 5,
      selected: '',
      isStoreLoading: false,
      isTransactionSuccess: true,
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
    async getData(query = '', currentLimit = this.currentLimit) {
      this.currentLimit = currentLimit
      this.query = query
      this.isLoading = true
      try {
        const response = await axiosIns.get(
          `/account-detail?limit=${this.currentLimit}${this.searchQuery}`
        )
        this.responses = response.data
      } catch (error) {
        alert(error)
      }
      this.isLoading = false
    },
    async store(currentData) {
      this.isStoreLoading = true
      try {
        const response = await axiosIns.post(`/account-detail`, currentData)
        toast.success('Transaksi berhasil di proses', {
          timeout: 3000,
        })
        this.isTransactionSuccess = true
        this.getData()
      } catch (error) {
        console.info(error)
        toast.error(error.message, {
          timeout: 3000,
        })
      } finally {
        this.isStoreLoading = false
      }
    },
  },
})
