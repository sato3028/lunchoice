<script setup>
import { ref } from 'vue';
import { Link, router, Head } from '@inertiajs/vue3'
import Header_Component from '@/Layouts/Header.vue';

const props = defineProps({
  reservationId: Number
});

const confirmAcceptance = () => {
  if (confirm('注文を受け取りますか？')) {
    router.post('/accept-order');
  }
};
</script>

<template>
  <Head title="注文の受け取り" />
    <div>
      <Header_Component />
  
      <div id="content_area">
        <h1 id="step">注文の受け取り</h1>
        <p class="text_center">注文が正常に完了しました。</p>
        <p class="display_order_id">注文ID: {{ reservationId }}</p>
        <div>
            <button @click="confirmAcceptance" class="block w-full max-w-xs mx-auto text-white bg-blue-btn rounded-lg px-3 py-3 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> 受け取る</button>
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

#content_area #step h2 {
  font-family: 'Noto Sans JP', sans-serif;
  font-weight:500;
}

#content_area .text_center {
  text-align:center;
}

#content_area .display_order_id {
  text-align:center;
  margin:50px 0;
  font-size:46px;
}

#content_area .confirm_button {
  margin-top:40px;

  display:block;
  padding:14px 20px;
  width:100%;
  background-color:#29A8E1;
  color:#fff;
  border-radius:14px;
}
</style>