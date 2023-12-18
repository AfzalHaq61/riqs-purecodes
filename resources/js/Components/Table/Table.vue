<template>
  <table
    class="min-w-full border-separate bg-white rounded-lg"
    style="border-spacing: -1"
  >
    <slot name="thead"></slot>
    <slot name="tbody"></slot>
    <slot name="tfoot"></slot>
  </table>
</template>
