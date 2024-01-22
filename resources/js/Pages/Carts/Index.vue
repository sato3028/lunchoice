<script setup>
import { ref,computed, onMounted } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import Header_Component from '@/Layouts/Header.vue';

const props = defineProps({
  cartItems: Array
});

const groupedCartItems = computed(() => {
  const grouped = {};
  props.cartItems.forEach(item => {
    if (!grouped[item.kitchenId]) {
      grouped[item.kitchenId] = {
        kitchenName: item.kitchenName,
        items: []
      };
    }
    grouped[item.kitchenId].items.push(item);
  });
  return grouped;
});

function kitchenName(kitchenId) {
  const id = parseInt(kitchenId, 10);
  switch (id) {
    case 1:
      return '笑がNICE';
    case 2:
      return 'SMAPPY CAFÉ';
    case 3:
      return 'CHERIE';
    case 4:
      return 'BONNIE&FRIED.tokyo';
    default:
      return '不明なキッチン';
  }
}

function removeItem(itemId) {
  const updatedCartItems = props.cartItems.filter(item => item.id !== itemId);
  router.post('/update-cart', { cartItems: updatedCartItems });
}

onMounted(() => {
  console.log('カートアイテム:', props.cartItems);
  if (props.cartItems.length > 0) {
    console.log('カートアイテムの型:');
    props.cartItems.forEach((item, index) => {
      console.log(`アイテム ${index}:`, {
        kitchenId: typeof item.kitchenId,
        menuId: typeof item.menuId,
        name: typeof item.name,
        price: typeof item.price,
        quantity: typeof item.quantity
      });
    });
  }
});

function formatPrice(price) {
  const numericPrice = parseFloat(price);
  if (!isNaN(numericPrice)) {
    if (Number.isInteger(numericPrice)) {
      return numericPrice.toString();
    } else {
      return numericPrice.toFixed(2);
    }
  } else {
    console.error('価格データが無効です:', price);
    return '0';
  }
}
</script>

<template>
  <Header_Component />

  <div id="content_area">
      <div id="step">
          <h2>カートを確認する</h2>
      </div>
      <div v-if="cartItems.length === 0">
        カートには何も入っていません。
        <div class="page_control_button">
          <Link href="/kitchens" class="btn">キッチンカーリストに戻る</Link>
        </div>
      </div>
      <div v-else class="store_content">
        <div v-for="(group, kitchenId) in groupedCartItems" :key="kitchenId">
          <h3 class="store_name">{{ kitchenName(kitchenId) }}</h3>
          <div v-for="(item, index) in group.items" :key="index" class="item">
            <img src="https://placehold.jp/100x100.png" alt="">
            <div class="item_info">
              <div class="item_name">{{ item.name }}</div>
              <div class="item_control">
                <p class="price">¥{{ formatPrice(item.price) }}</p>
                <p class="quantity only_display">数量: {{ item.quantity }}</p>
                <button class="delete_button" @click="removeItem(item.id)">削除</button>
              </div>
            </div>
          </div>
        </div>
        <div class="page_control_button_back">
          <Link href="/kitchens" class="btn">キッチンカーリストに戻る</Link>
        </div>
        <div class="page_control_button buttons_margin">
          <Link href="/carts/show" class="btn">購入</Link>
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

.page_control_button_back a {
  text-align: center;
  display:block;
  padding:14px 20px;
  width:100%;
  background-color: #727171;
  color:#fff;
  border-radius:14px;
}

.page_control_button.buttons_margin {
  margin-top:14px;
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

#content_area .store_content .item {
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

#content_area .store_content .item .item_control .quantity.only_display {
  height:auto;
}

#content_area .store_content .item .item_control .delete_button {
  color:#9e1c1c;
}

#content_area .store_content .item img {
  width: 140px;
  margin-right: 30px;
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