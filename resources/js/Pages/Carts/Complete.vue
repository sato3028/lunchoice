<script setup>
import { Link } from '@inertiajs/vue3'
import Header_Component from '@/Layouts/Header.vue';
</script>

<template>
    <div>
      <Header_Component />
  
      <h1>注文が完了しました</h1>
      <p>ありがとうございました！</p>
      <Link href="/kitchens" class="btn">キッチンカーリストに戻る</Link>
    </div>
</template>