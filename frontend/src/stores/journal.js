import { defineStore } from 'pinia'
import axiosIns from '../services/axios'

// ITEM STORE
export const useJournalStore = defineStore('journalStore', {
  state: () => {
    return {
      responses: {},
      currentData: [
        {
          account_no: null,
          debit: 0,
          kredit: 0,
        },
      ],
      currentForm: {
        account_no: null,
        debit: 0,
        kredit: 0,
      },
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
    addData() {
      this.currentData.push({
        account_no: null,
        debit: 0,
        kredit: 0,
      })
    },
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
    validateData() {
      for (const item of this.currentData) {
        if (item.account_no === null) {
          return false
        }
      }

      return true
    },
  },
})
