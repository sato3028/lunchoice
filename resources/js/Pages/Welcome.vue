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

    <div class="flex flex-col justify-start items-center h-screen bg-white mt-60">
        <div class="text-center mb-4">
            <h1 class="text-lg font-semibold text-gray-800">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro, qui voluptatibus itaque quisquam possimus</h1>
            <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ex mollitia, numquam culpa dicta nesciunt, adipisci doloremque modi, possimus incidunt asperiores? Possimus natus ducimus libero delectus amet maxime voluptate fuga.</p>
        </div>

        <div v-if="canLogin" class="w-full px-4">
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
