<script setup>
defineProps({
  name: {
    type: String,
  },
  description: {
    type: String,
  },
});
</script>

<template>
<div>
  <div v-show="name">
    <p class="text-sm text-red-600">
      {{ name }}
    </p>
  </div>
  <div v-show="description">
    <p class="text-sm text-red-600">
      {{ description }}
    </p>
  </div>
</div>
</template>
