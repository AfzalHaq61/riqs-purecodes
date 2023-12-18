<script setup>
defineProps({
  type: {
    type: String,
    default: "submit",
  },
});
</script>

<template>
  <button
    :type="type"
    class="
      inline-flex
      items-center
      justify-center
      rounded-md
      border border-transparent
      bg-white
      px-4
      py-2
      text-sm
      font-bold
      text-indigo-900
      shadow-sm
      hover:bg-indigo-500 hover:text-white
      focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
      sm:w-auto
    "
  >
    <slot />
  </button>
</template>
