<template>
  <div>
    <h2>メニュー一覧</h2>
    <div v-for="menu in menus" :key="menu.id">
      {{ menu.name }}
    </div>
  </div>
</template>

<script setup>
  const props = defineProps({
    menus: Array
  });
</script>
