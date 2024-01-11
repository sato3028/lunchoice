<script setup>
import { ref, watchEffect } from 'vue';

const props = defineProps({
  cartItems: Object
});

const totalAmount = ref(0);

watchEffect(() => {
  totalAmount.value = Object.values(props.cartItems).reduce((total, item) => {
    return total + item.quantity * item.price;
  }, 0);
});
</script>

<template>
  <div>合計金額: {{ totalAmount }}</div>
</template>
