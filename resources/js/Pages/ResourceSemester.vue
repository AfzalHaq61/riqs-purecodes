<script setup>
import { createApp, h, ref, reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import route from "ziggy-js";
import axios from "axios";

const props = defineProps({
  resourceSemester: Object,
  total_resourceSemester: Number,
  semester: Object,
});

const search = ref(getSearch());

function getSearch() {
  // get date from URL

  let params = new URL(document.location).searchParams;
  let search = params.get("search");

  return search;
}

function searchPicker() {
  Inertia.get(
    route("resourcesSemester.index", {
      semester: props.semester.uuid,
      search: this.search,
    })
  );
}

function downloadExcelFile() {
  axios({
    method: "get",
    url: "/resourcesSemester/export",
  })
    .then((response) => {
      window.location =
        "resourcesSemester/download?fileLocation=" + response.data;
    })
    .catch((err) => {
      console.log(err);
    });
}
</script>

<template>
  <!--  Heading -->

  <Head title="ResourceSemester" />
  <BreezeAuthenticatedLayout>
    <div class="">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <BanerHeading
            heading="Semester Resources"
            paragraph="A list of all the users in your account including their name, title,
        email and role."
          />
        </div>

        <!-- Button -->

        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
          <Button>
            <Link
              :href="
                route('resourcesSemester.create', {
                  semester: semester.uuid,
                })
              "
            >
              <span> Add New </span>
            </Link>
          </Button>
        </div>
      </div>

      <!-- Success Messege -->

      <Notifications></Notifications>

      <!--  Stats -->

      <div class="mt-16">
        <div class="mt-5">
          <h3 class="my-5 text-lg leading-6 font-medium text-gray-900">
            Semester Resources Stats
          </h3>

          <div class="grid sm:grid-cols-3 gap-6">
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Semester Resources
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ total_resourceSemester }}
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
                    v-for="resource in resourceSemester.data"
                    :key="resource.uuid"
                    class="hover:bg-gray-100"
                  >
                    <TD>
                      {{ resource.name }}
                    </TD>
                    <TD>
                      <Link>
                        <span
                          class="text-indigo-600 hover:text-indigo-900 mr-2"
                        >
                          Edit
                        </span>
                      </Link>
                      <span
                        @click="openModel(resource.uuid)"
                        class="
                          text-indigo-600
                          hover:text-indigo-900
                          cursor-pointer
                        "
                        >Delete</span
                      >
                    </TD>

                    <!--  Confirmation Messege Dailog -->

                    <ConfirModel :ref="resource.uuid"></ConfirModel>
                  </tr>
                </template>
              </Table>
            </div>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <Pagination :data="resourceSemester.meta"> </Pagination>
    </div>
  </BreezeAuthenticatedLayout>
</template>
