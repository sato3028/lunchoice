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
  <div id="order_info">
    <div>合計金額: {{ totalAmount }} 円</div>
    <p class="pay_button" @click="addToCart(menu.id)"><button>カートに追加</button></p>
  </div>
</template>
