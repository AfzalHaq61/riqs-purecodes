<script setup>

</script>

<template>
  <nav class="flex space-x-4">
    <span
      class="
        text-indigo-100 text-sm
        font-medium
        rounded-md
        px-3
        py-2
        hover:bg-opacity-10 hover:bg-white
      "
      :class="{
        'text-white bg-white bg-opacity-10':
          $page.component.startsWith('Dashboard'),
      }"
      aria-current="page"
      ><Link href="/dashboard">Home</Link></span
    >
    <span
      class="
        text-indigo-100 text-sm
        font-medium
        rounded-md
        px-3
        py-2
        hover:bg-opacity-10 hover:bg-white
      "
      :class="{
        'text-white bg-white bg-opacity-10':
          $page.component.startsWith('Kawaif'),
      }"
      ><Link href="/kawaif">Kawaif</Link></span
    >
    <span
      class="
        text-indigo-100 text-sm
        font-medium
        rounded-md
        px-3
        py-2
        hover:bg-opacity-10 hover:bg-white
      "
      :class="{
        'text-white bg-white bg-opacity-10':
          $page.component.startsWith('Maliyat'),
      }"
      ><Link href="/maliyat">Maliyat</Link></span
    >
    <span
      class="
        text-indigo-100 text-sm
        font-medium
        rounded-md
        px-3
        py-2
        hover:bg-opacity-10 hover:bg-white
      "
      :class="{
        'text-white bg-white bg-opacity-10':
          $page.component.startsWith('Rahimia'),
      }"
      ><Link href="/rahimia">Rahimia</Link></span
    >
    <Menu as="div" class="relative inline-block text-left">
      <div>
        <MenuButton
          class="
            inline-flex
            text-indigo-100 text-sm
            font-medium
            rounded-md
            px-3
            py-2
            hover:bg-opacity-10 hover:bg-white
          "
          :class="{
            'text-white bg-white bg-opacity-10':
              $page.component.startsWith('Center') ||
              $page.component.startsWith('Semester') ||
              $page.component.startsWith('ResourceSemester'),
          }"
        >
          <Link href="/centers">Tarbiat</Link>
          <ChevronDownIcon class="-mr-1 ml-2 h-5 w-5" aria-hidden="true" />
        </MenuButton>
      </div>
      <transition
        enter-active-class="transition ease-out duration-100"
        enter-from-class="transform opacity-0 scale-95"
        enter-to-class="transform opacity-100 scale-100"
        leave-active-class="transition ease-in duration-75"
        leave-from-class="transform opacity-100 scale-100"
        leave-to-class="transform opacity-0 scale-95"
      >
        <MenuItems
          class="
            origin-top-right
            absolute
            right-0
            mt-2
            w-56
            rounded-md
            shadow-lg
            bg-white
            ring-1 ring-black ring-opacity-5
            focus:outline-none
          "
        >
          <div class="py-1">
            <MenuItem v-slot="{ active }">
              <Link
                href="/semesters"
                :class="[
                  active
                    ? 'bg-gray-100 text-gray-900 font-medium '
                    : 'text-gray-700',
                  'block px-4 py-2 text-sm',
                ]"
                >Semesters</Link
              >
            </MenuItem>
          </div>
        </MenuItems>
      </transition>
    </Menu>

    <Menu as="div" class="relative inline-block text-left">
      <div>
        <MenuButton
          class="
            inline-flex
            text-indigo-100 text-sm
            font-medium
            rounded-md
            px-3
            py-2
            hover:bg-opacity-10 hover:bg-white
          "
          :class="{
            'text-white bg-white bg-opacity-10':
              $page.component.startsWith('Structure')
          }"
        >
          <h1>Structures</h1>
          <ChevronDownIcon class="-mr-1 ml-2 h-5 w-5" aria-hidden="true" />
        </MenuButton>
      </div>
      <transition
        enter-active-class="transition ease-out duration-100"
        enter-from-class="transform opacity-0 scale-95"
        enter-to-class="transform opacity-100 scale-100"
        leave-active-class="transition ease-in duration-75"
        leave-from-class="transform opacity-100 scale-100"
        leave-to-class="transform opacity-0 scale-95"
      >
        <MenuItems
          class="
            origin-top-right
            absolute
            right-0
            mt-2
            w-56
            rounded-md
            shadow-lg
            bg-white
            ring-1 ring-black ring-opacity-5
            focus:outline-none
          "
        >
          <div class="py-1">
            <MenuItem v-slot="{ active }">
              <Link
                href="/structures"
                :class="[
                  active
                    ? 'bg-gray-100 text-gray-900 font-medium '
                    : 'text-gray-700',
                  'block px-4 py-2 text-sm',
                ]"
                >{{ $page.props.user }}</Link
              >
            </MenuItem>
          </div>
        </MenuItems>
      </transition>
    </Menu>
  </nav>
</template>

<style scoped>
.active {
  @apply text-white bg-white bg-opacity-10;
}
</style>


