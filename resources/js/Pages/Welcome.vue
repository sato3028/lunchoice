<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header_Component from '@/Layouts/Header.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <Header_Component />

    <div class="flex flex-col justify-start items-center h-screen bg-white mt-52 px-4">
        <div class="text-left mb-4">
            <h2 class="text-2xl font-black text-gray-900">予約制ピックアップサービスで、もっと快適なランチタイムを</h2>
            <p class="text-base text-gray-600 leading-relaxed pt-4">時間が限られたお昼の休憩時間、ランチョイスの予約制ピックアップサービスでキッチンカーの料理を並ばずに購入しませんか？日替わりで選べる4つの店舗から、あなたの好みに合ったメニューを選んで予約するだけ！お昼時間を有効活用し、快適なランチタイムをお楽しみください♪</p>
        </div>

        <div v-if="canLogin" class="w-full mt-5">
            <Link
                v-if="$page.props.auth.user"
                href="/kitchens"
                class="block w-full max-w-xs mx-auto bg-blue-btn text-white rounded-lg px-3 py-3 font-semibold text-center">キッチン一覧へ</Link>

            <template v-else>
                <Link
                    :href="route('login')"
                    class="block w-full max-w-xs mx-auto bg-blue-btn text-white rounded-lg px-3 py-3 font-semibold text-center"
                >ログイン</Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="block w-full max-w-xs mx-auto bg-gray-500 hover:bg-gray-700 focus:bg-gray-700 text-white rounded-lg px-3 py-3 font-semibold text-center mt-2"
                >新規登録</Link>
            </template>
        </div>
    </div>
</template>


<style>
.bg-blue-btn{
    background-color: #29A8E1;
  }
  
  .bg-blue-btn:hover{
    background-color: #2387C1;
  }

  .text-blue{
    color: #29A8E1;
  }

  .text-blue:hover{
    color: #2387C1;
  }
</style>
