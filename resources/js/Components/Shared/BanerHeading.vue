<script setup>
const props = defineProps(["heading", "paragraph"]);
</script>

<template>
    <h1 class="text-xl font-semibold text-white">{{ props.heading }}</h1>
    <p class="mt-2 text-sm text-white">{{ props.paragraph }}</p>
</template>
