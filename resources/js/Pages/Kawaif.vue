<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  can: Object,
  resources: Object,
  errors: Object,
  muhazir_e_dawat: {
    required: true,
    default: 0,
    type: Number,
  },
  daee: {
    required: true,
    default: 0,
    type: Number,
  },
  muawin_daee: {
    required: true,
    default: 0,
    type: Number,
  },
  maduu: {
    required: true,
    default: 0,
    type: Number,
  },
  madni_hall: {
    required: true,
    default: 0,
    type: Number,
  },
  course_1: {
    required: true,
    default: 0,
    type: Number,
  },
  course_2: {
    required: true,
    default: 0,
    type: Number,
  },
  course_3: {
    required: true,
    default: 0,
    type: Number,
  },
  mohazir_course_1: {
    required: true,
    default: 0,
    type: Number,
  },
  mohazir_course_2: {
    required: true,
    default: 0,
    type: Number,
  },
  mohazir_course_3: {
    required: true,
    default: 0,
    type: Number,
  },
  totalResources: {
    required: true,
    default: 0,
    type: Number,
  },
});

const search = ref(getSearch());

function submitrole(resource_uuid) {
  Inertia.post(route("role.store", { resource: resource_uuid }), form, {
    forceFormData: true,
  });
}

function searchPicker() {
  Inertia.get(route("kawaif.index", { search: this.search }));
}

function downloadExcelFile() {
  axios({
    method: "get",
    url: "/kawaif/export",
  })
    .then((response) => {
      window.location = "/kawaif/download?fileLocation=" + response.data;
    })
    .catch((err) => {
      console.log(err);
    });
}

function getSearch() {
  // get date from URL

  let params = new URL(document.location).searchParams;
  let search = params.get("search");

  return search;
}
</script>

<template>
  <!--  Heading -->

  <Head title="Kawaif" />
  <BreezeAuthenticatedLayout>
    <div class="">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <BanerHeading
            heading="Resources"
            paragraph="A list of all the users in your account including their name, title,
        email and role."
          />
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none" v-if="can.create">
          <Button>
            <Link href="/kawaif/create">Add New</Link>
          </Button>
        </div>
      </div>

      <!-- Success Messege -->

      <Notifications></Notifications>

      <!--  Stats -->

      <div class="mt-16">
        <div class="mt-5">
          <h3 class="my-5 text-lg leading-6 font-medium text-gray-900">
            Resources
          </h3>

          <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
            <div class="text-sm font-medium text-gray-500 truncate">
              Total Resources
            </div>
            <div class="mt-1 text-3xl font-semibold text-gray-900">
              {{ totalResources }}
            </div>
          </div>

          <!--  Dawati Resources -->

          <h3 class="my-5 text-lg leading-6 font-medium text-gray-900">
            Dawati Resources
          </h3>

          <div class="grid grid-cols-1 gap-5 sm:grid-cols-5">
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Mahazir e dawat
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ muhazir_e_dawat }}
              </div>
            </div>
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Dayeen
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ daee }}
              </div>
            </div>
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Muawin Daeen
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ muawin_daee }}
              </div>
            </div>
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Madueen
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ maduu }}
              </div>
            </div>
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Toal Madni Hall
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ madni_hall }}
              </div>
            </div>
          </div>

          <!--  Terbiyyati Resources -->

          <h3 class="my-5 text-lg leading-6 font-medium text-gray-900">
            Terbiyyati Resources
          </h3>

          <div class="grid grid-cols-1 gap-5 sm:grid-cols-6">
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Course 1
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ course_1 }}
              </div>
            </div>
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Course 2
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ course_2 }}
              </div>
            </div>
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Course 3
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ course_3 }}
              </div>
            </div>
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Mahazir Course 1
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ mohazir_course_1 }}
              </div>
            </div>
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Mahazir Course 2
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ mohazir_course_2 }}
              </div>
            </div>
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Mahazir Course 3
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ mohazir_course_3 }}
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--  Filters -->

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

        <div class="flex">
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

          <!-- Pagination Filter -->

          <div class="w-32 mr-2">
            <select
              class="
                form-control
                mt-1
                focus:ring-indigo-500 focus:border-indigo-500
                block
                w-full
                shadow-sm
                sm:text-sm
                border-gray-300
                rounded-md
              "
              @change="yearPicker()"
              v-model="per_page_data"
              name="per_page_data"
              id="per_page_data"
            >
              <option value="10" selected>10 per page</option>
              <option value="20">20 per page</option>
              <option value="30">30 per page</option>
              <option value="40">40 per page</option>
              <option value="50">50 per page</option>
              <option value="50">Show All</option>
            </select>
          </div>
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
                    <TH>Zone</TH>
                    <TH>Region</TH>
                    <TH>Maliyat</TH>
                    <TH>Action</TH>
                  </tr>
                </template>
                <template v-slot:tbody>
                  <tr
                    v-for="resource in resources.data"
                    :key="resource.uuid"
                    class="hover:bg-gray-100"
                  >
                    <TD>
                      <h1 class="font-bold text-gray-900">
                        {{ resource.firstname + " " + resource.secondname }}
                      </h1>
                      <div class="text-xs">
                        <h1>{{ resource.dawati_status }}</h1>
                        <h1>{{ resource.terbiati_status }}</h1>
                        <h1>{{ resource.intizami_status }}</h1>
                      </div>
                    </TD>
                    <TD>
                      {{ resource.zone }}
                    </TD>
                    <TD>
                      {{ resource.region }}
                    </TD>
                    <TD>
                      {{ resource.maliyat }}
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
                                      route('user.create', {
                                        resource: resource.uuid,
                                      })
                                    "
                                    v-if="can.create"
                                    v-show="!resource.user_id"
                                    :class="[
                                      active
                                        ? 'bg-gray-100 text-gray-900'
                                        : 'text-gray-700',
                                      'block px-4 py-2 text-sm',
                                    ]"
                                    >Create Account</Link
                                  >
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                  <Link
                                    :href="
                                      route('maliyat-popup.edit', {
                                        resource: resource.uuid,
                                      })
                                    "
                                    v-if="can.create"
                                    :class="[
                                      active
                                        ? 'bg-gray-100 text-gray-900'
                                        : 'text-gray-700',
                                      'block px-4 py-2 text-sm',
                                    ]"
                                    >Maliyat</Link
                                  >
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                  <Link
                                    :href="
                                      route('kawaif.edit', {
                                        resource: resource.uuid,
                                      })
                                    "
                                    v-if="can.update"
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
                                      route('kawaif.deleteConfirm', {
                                        resource: resource.uuid,
                                      })
                                    "
                                    v-if="can.delete"
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
      <Pagination :data="resources.meta"> </Pagination>
    </div>
  </BreezeAuthenticatedLayout>
</template>
