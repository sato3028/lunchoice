<script setup>
import { Link } from '@inertiajs/vue3'
import Header_Component from '@/Layouts/Header.vue';
</script>

<template>
    <div>
      <Header_Component />
  
      <div id="content_area">
        <h1 id="step">注文が完了しました</h1>
        <p class="thanks_message">ご購入ありがとうございました！</p>
        <Link href="/kitchens" class="move_button">キッチンカーリストに戻る</Link>
      </div>
    </div>
</template>

<style>
#content_area {
margin: 0 auto;
max-width: 780px;

padding:20px;
}
#content_area #step {
font-size: 24px;
text-align: center;
margin: 30px 0;
}

#content_area #step h1 {
  font-family: 'Noto Sans JP', sans-serif;
  font-weight:500;
}

#content_area .thanks_message {
  text-align:center;
}

#content_area .move_button {
  margin-top:40px;
  text-align:center;

  display:block;
  padding:14px 20px;
  width:100%;
  background-color:#29A8E1;
  color:#fff;
  border-radius:14px;
}
</style>