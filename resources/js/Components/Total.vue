<script setup>
import { computed } from 'vue';

const props = defineProps({
  cartItems: {
    type: Array,
    default: () => []
  }
});

const totalAmount = computed(() => {
  try {
    return props.cartItems.reduce((total, item) => {
      if (!item.price || !item.quantity) {
        console.error('無効なアイテムデータ:', item);
        return total;
      }
      return total + item.price * item.quantity;
    }, 0);
  } catch (error) {
    console.error('TotalAmount 計算中のエラー:', error);
    return 0;
  }
});
</script>

<template>
  <div id="total_amount">
    合計金額: {{ totalAmount }} 円
  </div>
</template>
