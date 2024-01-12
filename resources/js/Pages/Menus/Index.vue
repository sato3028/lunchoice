<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import Total from '@/Components/Total.vue';

import Header_Component from '@/Layouts/Header.vue';

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
  <Header_Component />

  <div id="content_area">
    <div id="step">
          <h2>メニュー一覧</h2>
    </div>
    <div class="store_content">
          <div v-for="menu in menus" :key="menu.id" class="item">
              <img src="https://placehold.jp/100x100.png" alt="">
              <div class="item_info">
                  <div class="item_name">{{ menu.name }}</div>
                  <div class="item_control">
                      <p class="price">¥700</p>
                      <!--<input type="number" v-model="quantity[menu.id]" min="1">-->
                      <select class="quantity">
                          <option value="" selected></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                      </select>
                  </div>
              </div>
          </div>
    </div>
    <div id="order_info">
      <Total :cartItems="cartItems" />
    </div>
  </div>
  <!--
    <div>
      <h2>メニュー一覧</h2>
      <div v-for="menu in menus" :key="menu.id">
      {{ menu.name }}
      <input type="number" v-model="quantity[menu.id]" min="1">
      <button @click="addToCart(menu.id)">カートに追加</button>
      </div>

      <Total :cartItems="cartItems" />
    </div>
  -->
</template>

<style>
html,
body {
height: 100%;
}

header {
background-color: #fff;
color: #fff;
text-align: center;
font-weight: bold;
font-size: 24px;
padding: 20px;
filter: drop-shadow(0px 3px 5px rgba(0, 0, 0, 0.2));
}
header .logo img {
max-height: 54px;
}

#content_area {
margin: 0 auto;
max-width: 780px;
}
#content_area #step {
font-size: 24px;
text-align: center;
margin: 60px 0;
}

#order_info {
position: fixed;
bottom: 0;
left: 0;
background-color: #707070;
color: #fff;
padding: 24px 20px;
width: 100%;
box-sizing: border-box;
display: flex;
justify-content: space-between;
align-items: center;
}
#order_info .pay_button button {
box-sizing: border-box;
width: 140px;
padding: 12px 14px;
background-color:#efefef;
color:#000;
}

#footer_area {
display: none;
}

@media screen and (max-width: 780px) {
#content_area {
  margin: 0 16px;
}
}
#content_area {
padding-bottom: 150px;
}
#content_area .store_content {
margin: 0 20px;
}
#content_area .store_content:not(:last-child) {
margin-bottom: 60px;
}
#content_area .store_content .store_name {
margin-bottom: 14px;
}
#content_area .store_content .item {
width: 100%;
min-height: 100px;
display: flex;
flex-wrap: wrap;
}
#content_area .store_content .item:not(:last-child) {
margin-bottom: 40px;
}
#content_area .store_content .item .item_info {
display: flex;
flex-wrap: wrap;
flex: 1;
}
#content_area .store_content .item .item_info .item_name {
width: 100%;
font-weight: bold;
font-size: 18px;
}
#content_area .store_content .item .item_control {
display: flex;
justify-content: space-between;
align-items: flex-end;
width: 100%;
}
#content_area .store_content .item .item_control .price {
margin-right: 20px;
font-size: 20px;
color: #707070;
}
#content_area .store_content .item .item_control .quantity {
height: 40px;
}
#content_area .store_content .item img {
width: 140px;
margin-right: 30px;
object-fit: cover;
}
</style>