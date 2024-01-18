<script setup>
import { router, Link } from '@inertiajs/vue3';
import Header_Component from '@/Layouts/Header.vue';

const submitOrder = () => {
  router.post('/create-order');
};
</script>

<template>
    <div>
      <Header_Component />
  
      <h1>購入確認</h1>
  
      <div class="credit-card-info">
        <h2>クレジットカード情報</h2>
        <div class="form-group">
          <label for="card-number">カード番号</label>
          <input type="text" id="card-number" disabled placeholder="1234 5678 9012 3456" />
        </div>
        <div class="form-group">
          <label for="expiry-date">有効期限</label>
          <input type="text" id="expiry-date" disabled placeholder="MM/YY" />
        </div>
        <div class="form-group">
          <label for="cvc">CVC</label>
          <input type="text" id="cvc" disabled placeholder="123" />
        </div>
      </div>
  
      <button @click="submitOrder">購入</button>
    </div>
  </template>
  
  <style>
  .credit-card-info {
    margin-bottom: 20px;
  }
  
  .form-group {
    margin-bottom: 10px;
  }
  
  .form-group label {
    display: block;
  }
  
  .form-group input {
    width: 100%;
    padding: 8px;
  }
  </style>
  