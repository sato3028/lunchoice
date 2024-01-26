<script setup>
import { Link, Head } from '@inertiajs/vue3'
import Header_Component from '@/Layouts/Header.vue';
</script>

<template>
  <Head title="受け取り完了" />
  
    <div>
      <Header_Component />
  
      <div id="content_area">
        <h1 id="step">受け取り完了</h1>
        <p class="thanks_message">ご利用ありがとうございました！</p>
        <div class="mt-4">
            <Link
            href="/kitchens"
            class="block w-full max-w-xs mx-auto bg-gray-500 hover:bg-gray-700 focus:bg-gray-700 text-white rounded-lg px-3 py-3 font-semibold text-center">キッチンカーリストに戻る</Link>
        </div>
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
  margin-bottom:20px;
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