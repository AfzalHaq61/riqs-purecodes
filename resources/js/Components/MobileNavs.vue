<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Link,
  },
};
</script>

<template>
  <div class="mt-3 px-2 space-y-1">
    <span
      :class="{ 'bg-gray-100 text-gray-800': $page.component === 'Dashboard' }"
      class="
        block
        rounded-md
        px-3
        py-2
        text-base text-gray-900
        font-medium
        hover:bg-gray-100 hover:text-gray-800
      "
      ><Link href="/dashboard">Home</Link></span
    >
    <span
      :class="{
        'bg-gray-100 text-gray-800': $page.component.startsWith('Kawaif'),
      }"
      class="
        block
        rounded-md
        px-3
        py-2
        text-base text-gray-900
        font-medium
        hover:bg-gray-100 hover:text-gray-800
      "
      ><Link href="/kawaif">Kawaif</Link></span
    >
    <span
      :class="{
        'bg-gray-100 text-gray-800': $page.component.startsWith('Maliyat'),
      }"
      class="
        block
        rounded-md
        px-3
        py-2
        text-base text-gray-900
        font-medium
        hover:bg-gray-100 hover:text-gray-800
      "
      ><Link href="/maliyat">Maliyat</Link></span
    >
    <span
      :class="{
        'bg-gray-100 text-gray-800': $page.component.startsWith('Rahimia'),
      }"
      class="
        block
        rounded-md
        px-3
        py-2
        text-base text-gray-900
        font-medium
        hover:bg-gray-100 hover:text-gray-800
      "
      ><Link href="/rahimia">Rahimia</Link></span
    >
    <span
      :class="{
        'bg-gray-100 text-gray-800': $page.component.startsWith('Center'),
      }"
      class="
        block
        rounded-md
        px-3
        py-2
        text-base text-gray-900
        font-medium
        hover:bg-gray-100 hover:text-gray-800
      "
      ><Link href="/center">Terbiat</Link></span
    >
  </div>
</template>
