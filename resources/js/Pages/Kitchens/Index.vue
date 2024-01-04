<script setup>
  const props = defineProps({
    kitchens: Array
  });
</script>

<template>
  <div>
    <ul>
      <li v-for="kitchen in kitchens" :key="kitchen.id">
        <h2>{{ kitchen.name }}</h2>
        <p v-if="kitchen.description">{{ kitchen.description }}</p>
        <p v-else>No Description</p>
      </li>
    </ul>
  </div>
</template>