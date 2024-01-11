<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import Total from '@/Components/Total.vue';

const props = defineProps({
  menus: Array
});
const quantity = ref({});
const cartItems = ref({});

function addToCart(menuId) {
  const selectedQuantity = quantity.value[menuId] || 1;
  const menu = props.menus.find(menu => menu.id === menuId);
  if (!menu) {
    console.error('Menu not found');
    return;
  }

  const menuPrice = menu.price;
  cartItems.value[menuId] = {
    quantity: selectedQuantity,
    price: menuPrice,
  };

  router.post('/reservations/add-to-cart', { menuId, quantity: selectedQuantity });
}
</script>

<template>
  <div>
    <h2>メニュー一覧</h2>
    <div v-for="menu in menus" :key="menu.id">
      {{ menu.name }}
      <input type="number" v-model="quantity[menu.id]" min="1">
      <button @click="addToCart(menu.id)">カートに追加</button>
    </div>

    <Total :cartItems="cartItems" />
  </div>
</template>