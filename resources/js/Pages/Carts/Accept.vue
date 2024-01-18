<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3'
import Header_Component from '@/Layouts/Header.vue';

const confirmAcceptance = () => {
  if (confirm('注文を受け取りますか？')) {
    router.post('/accept-order');
  }
};
</script>

<template>
    <div>
      <Header_Component />
  
      <h1>注文の受け取り</h1>
      <p>注文が正常に完了しました。</p>
      <button @click="confirmAcceptance">受け取る</button>
    </div>
</template>