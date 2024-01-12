<script setup>
  import { Link } from '@inertiajs/vue3'
  import Header_Component from '@/Layouts/Header.vue';

  const props = defineProps({
    kitchens: Array
  });
</script>

<template>
  <Header_Component />

  <div id="content_area">
    <div id="step">
      <h2>キッチンカーを選ぶ</h2>
    </div>
    <div id="main_content">
      <div v-for="kitchen in kitchens" :key="kitchen.id" class="item">
        <Link :href="`/kitchens/${kitchen.id}/menus`">
          <img :src="kitchen.image_data" alt="">
        </Link>
      </div>
    </div>
  </div>
</template>

<style>
html,
body {
  height: 100%;
}

#content_area {
  margin: 0 auto;
  max-width: 780px;
  /*border:1px solid #000;*/
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
}

@media screen and (max-width: 780px) {
  #content_area {
    margin: 0 16px;
  }
}
#content_area #main_content {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  padding-bottom: 140px;
}
#content_area #main_content .item {
  display: flex;
  justify-content: center;
  align-items: center;
  /*width:128px;
  height:128px;*/
  width: 160px;
  height: 160px;
  border-radius: 50%;
  margin: 0 4px;
  margin-bottom: 20px;
  background-color: #fff;
  filter: drop-shadow(0px 3px 5px rgba(100, 100, 100, 0.3));
}
#content_area #main_content .item img {
  border-radius:50%;
}
</style>