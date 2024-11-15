<script lang="ts" setup>
import { onMounted } from 'vue';

  withDefaults(defineProps<{
    name: string
  }>(), { name : "Dash-Board"})

  onMounted(() => {
    console.log('I got mounted')
  });
</script>

<template>
  <div>
     {{ name }}
  </div>
</template>
