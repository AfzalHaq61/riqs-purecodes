<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import route from "ziggy-js";
import axios from "axios";

const props = defineProps({
  structures_resources: Object,
  total_resources: Number,
});

const search = ref(getSearch());

function searchPicker() {
  Inertia.get(route("structures.index", { search: this.search }));
}

function getSearch() {
  // get date from URL

  let params = new URL(document.location).searchParams;
  let search = params.get("search");

  return search;
}

function downloadExcelFile() {
  alert("hello");
  axios({
    method: "get",
    url: "/structures/export",
  })
    .then((response) => {
      alert("hello");
      window.location = "/structures/download?fileLocation=" + response.data;
    })
    .catch((err) => {
      console.log(err);
    });
}
</script>

<template>
  <!--  Heading -->

  <Head title="Structures" />
  <BreezeAuthenticatedLayout>
    <div class="">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <BanerHeading
            heading="Structure Resources"
            paragraph="A list of all the users in your account including their name, title,
        email and role."
          />
        </div>

        <!-- Button -->

        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
          <Button>
            <Link href="/structures/create">Add New</Link>
          </Button>
        </div>
      </div>

      <!-- Success Messege -->

      <Notifications></Notifications>

      <!--  Stats -->

      <div class="mt-16">
        <div class="mt-5">
          <h3 class="my-5 text-lg leading-6 font-medium text-gray-900">
            Structure Stats
          </h3>

          <div class="grid sm:grid-cols-3 gap-6">
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Resources
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ total_resources }}
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Filters -->

      <div class="flex justify-between mt-10">
        <!-- Search Filter -->
        <div>
          <input
            class="
              mt-1
              focus:ring-indigo-500 focus:border-indigo-500
              block
              w-full
              shadow-sm
              sm:text-sm
              border-gray-300
              rounded-md
            "
            placeholder="Search by Name"
            @change="searchPicker()"
            v-model="search"
            type="text"
          />
        </div>

        <!-- Excel Button -->

        <div class="mr-2">
          <button
            @click="downloadExcelFile()"
            class="
              form-control
              py-2
              px-4
              mt-1
              focus:ring-indigo-500 focus:border-indigo-500
              block
              w-full
              shadow-sm
              sm:text-sm
              border-gray-300
              rounded-md
              bg-white
            "
          >
            Export
          </button>
        </div>
      </div>

      <!--  Table -->

      <div class="px-4 sm:px-6 lg:px-8 mt-8 flex flex-col">
        <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle">
            <div class="rounded-lg shadow-sm ring-1 ring-black ring-opacity-5">
              <Table>
                <template v-slot:thead>
                  <tr>
                    <TH>Name</TH>
                    <TH>Action</TH>
                  </tr>
                </template>
                <template v-slot:tbody>
                  <tr
                    v-for="resource in structures_resources.data"
                    :key="resource.uuid"
                    class="hover:bg-gray-100"
                  >
                    <TD>
                      {{ resource.name }}
                    </TD>
                    <TD>
                      <div>
                        <Menu as="div" class="relative inline-block text-left">
                          <div>
                            <MenuButton
                              class="
                                inline-flex
                                justify-center
                                w-full
                                rounded-md
                                border border-gray-300
                                shadow-sm
                                pr-1
                                pl-2
                                py-1
                                bg-white
                                text-[12px]
                                font-medium
                                text-gray-700
                                hover:bg-gray-50
                                focus:outline-none
                                focus:ring-2
                                focus:ring-offset-2
                                focus:ring-offset-gray-100
                                focus:ring-indigo-500
                              "
                            >
                              Settings
                              <ChevronDownIcon
                                class="h-5 w-5"
                                aria-hidden="true"
                              />
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
                                z-10
                                right-0
                                mt-2
                                w-56
                                rounded-md
                                shadow-md
                                bg-white
                                ring-1 ring-black ring-opacity-5
                                focus:outline-none
                              "
                            >
                              <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                  <Link
                                    :href="
                                      route('structures.edit', {
                                        resource: resource.uuid,
                                      })
                                    "
                                    :class="[
                                      active
                                        ? 'bg-gray-100 text-gray-900'
                                        : 'text-gray-700',
                                      'block px-4 py-2 text-sm',
                                    ]"
                                    >Edit</Link
                                  >
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                  <Link
                                    :href="
                                      route('structures.delete', {
                                        resource: resource.uuid,
                                      })
                                    "
                                    :class="[
                                      active
                                        ? 'bg-gray-100 text-gray-900'
                                        : 'text-gray-700',
                                      'block px-4 py-2 text-sm',
                                    ]"
                                    >Delete</Link
                                  >
                                </MenuItem>
                              </div>
                            </MenuItems>
                          </transition>
                        </Menu>
                      </div>
                    </TD>
                  </tr>
                </template>
              </Table>
            </div>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <!-- <Pagination :data="structures_resources.meta"> </Pagination> -->
    </div>
  </BreezeAuthenticatedLayout>
</template>
