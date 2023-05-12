<template>
  <input ref="inputRef" v-model="formattedValue" :class="customClass" type="text" />
</template>

<script>
import { useCurrencyInput } from 'vue-currency-input'
export default {
  props: {
    modelValue: Number,
    options: Object,
    customClass: String,
  },
  setup(props) {
    const { inputRef, formattedValue } = useCurrencyInput(props.options)
    return { inputRef, formattedValue }
  },
}
</script>
