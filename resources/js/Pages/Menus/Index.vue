<script setup>
import { ref } from 'vue';
import { router, Link, Head } from '@inertiajs/vue3';
import Total from '@/Components/Total.vue';
import Header_Component from '@/Layouts/Header.vue';

const props = defineProps({
  menus: Array,
  cartItems: Array
});

const localCartItems = ref(props.cartItems || []);
const quantity = ref({});

function formatPrice(price) {
  const numericPrice = parseFloat(price);
  if (!isNaN(numericPrice)) {
    if (Number.isInteger(numericPrice)) {
      return numericPrice.toString();
    } else {
      return numericPrice.toFixed(2);
    }
  }
}

function addToCart(menuId) {
  const menu = props.menus.find(m => m.id === menuId);

  if (menu) {
    const menuQuantity = quantity.value[menuId] || 1;
    const itemId = Date.now();

    localCartItems.value.push({
      id: itemId,
      image: menu.image, 
      kitchenId: menu.kitchenId, 
      name: menu.name,
      menuId: menu.id,
      quantity: menuQuantity,
      price: menu.price
    });

    router.post('/cart/add', { cartItems: localCartItems.value });
  }
}
</script>

<template>
  <Head title="メニュー一覧" />
  <Header_Component />

  <div id="content_area">
    <div id="step">
      <h2>メニュー一覧</h2>
    </div>
    <div class="store_content">
      <div v-for="menu in menus" :key="menu.id" class="item">
        <img :src="menu.image || 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973920/NO_IMAGE_vwtrfx.png'" alt="メニュー画像">
        <div class="item_info">
          <div class="item_name">{{ menu.name }}</div>
          <div class="item_control">
            <div class="item_order_control">
              <p>¥{{ formatPrice(menu.price) }}</p>
              <select class="quantity" v-model="quantity[menu.id]">
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
            <button class="cart-button" @click="addToCart(menu.id)"><i class="fa-solid fa-cart-shopping"></i></button>
          </div>
        </div>
      </div>
      
      <div>
        <Link
          href="/kitchens"
          class="block w-full max-w-xs mx-auto bg-gray-500 hover:bg-gray-700 focus:bg-gray-700 text-white rounded-lg px-3 py-3 font-semibold text-center">キッチンカーリストに戻る</Link>
      </div>

      <div id="order_info">
        <Total :cartItems="localCartItems" />
      </div>
    </div>
  </div>
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

#content_area #step h2 {
  font-family: 'Noto Sans JP', sans-serif;
  font-weight:500;
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

.page_control_button {
  text-align:center;
}
.page_control_button a {
  display:block;
  padding:14px 20px;
  width:100%;
  background-color:#29A8E1;
  color:#fff;
  border-radius:14px;
}

.page_control_button_buck a {
  text-align: center;
  display:block;
  padding:14px 20px;
  width:100%;
  background-color: #727171;
  color:#fff;
  border-radius:14px;
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
#content_area .store_content .item .item_control .item_order_control {
display:flex;
align-items:center;
}
#content_area .store_content .item .item_control .cart-button {
margin-right:4px;
font-size:24px;
}
#content_area .store_content .item .item_control .price {
margin-right: 20px;
font-size: 20px;
color: #707070;
}
#content_area .store_content .item .item_control .quantity {
margin-left:10px;
height: 40px;
}
#content_area .store_content .item img {
width: 140px;
margin-right: 20px;
object-fit: cover;
}
@media screen and (max-width: 390px) {
  #content_area #step {
    margin: 40px 0;
  }
  #content_area .store_content {
    margin:0;
  }
}
</style>