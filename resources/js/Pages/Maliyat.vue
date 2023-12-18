<script setup>
import { ref } from "vue";
import route from "ziggy-js";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";

const props = defineProps({
  maliyat_resources: Object,
  total_received: Number,
  total_concerted: Number,
  total_arrears: Number,
});

const date = ref(getDate());
const search = ref(getSearch());

function getSearch() {
  // get date from URL

  let params = new URL(document.location).searchParams;
  let search = params.get("search");

  return search;
}

function getDate() {
  let d = new Date();
  let year = d.getFullYear();
  let month = ("0" + (d.getMonth() + 1)).slice(-2);

  // get date from URL

  let params = new URL(document.location).searchParams;
  let date = params.get("date");
  if (date) {
    year = date.split("-")[0];
    month = date.split("-")[1];
  }

  return year + "-" + month;
}

function datePicker() {
  Inertia.get(route("maliyat.index", { date: this.date }));
}

function yearPicker() {
  Inertia.get(route("maliyat.index", { year: this.year }));
}

function searchPicker() {
  Inertia.get(route("maliyat.index", { search: this.search }));
}

function downloadExcelFile() {
  axios({
    method: "get",
    url: "/maliyat/export",
  })
    .then((response) => {
      window.location = '/maliyat/download?fileLocation=' + response.data;
    })
    .catch((err) => {
      console.log(err);
    });
}
</script>

<template>
  <!--  Heading -->

  <Head title="Maliyat" />
  <BreezeAuthenticatedLayout>
    <div class="">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <BanerHeading
            heading="Maliyat Resources"
            paragraph="A list of all the users in your account including their name, title,
        email and role."
          />
        </div>

        <!-- Button -->

        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
          <Button>
            <Link href="/maliyat/create">Add New</Link>
          </Button>
        </div>
      </div>

      <!-- Success Messege -->

      <Notifications></Notifications>

      <!--  Stats -->

      <div class="mt-16">
        <div class="mt-5">
          <h3 class="my-5 text-lg leading-6 font-medium text-gray-900">
            Maliyat Resources Stats
          </h3>

          <div class="grid sm:grid-cols-3 gap-6">
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Concerted Maliyat
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ total_concerted }}
              </div>
            </div>
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Received Total Maliyat
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ total_received }}
              </div>
            </div>
            <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden">
              <div class="text-sm font-medium text-gray-500 truncate">
                Total Arrears
              </div>
              <div class="mt-1 text-3xl font-semibold text-gray-900">
                {{ total_arrears }}
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

          <!-- Monthly Filter -->

          <div class="w-32">
            <input
              @change="datePicker()"
              v-model="date"
              type="month"
              class="
                form-control
                per_date_inputs
                mt-1
                focus:ring-indigo-500 focus:border-indigo-500
                block
                w-full
                shadow-sm
                sm:text-sm
                border-gray-300
                rounded-md
              "
              name="datepicker"
              id="datepicker"
            />
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
                    <TH>Fixed Amount</TH>
                    <TH>Received Amount</TH>
                    <TH>Receipt No</TH>
                    <TH>Arrears</TH>
                    <TH>Action</TH>
                  </tr>
                </template>
                <template v-slot:tbody>
                  <tr
                    v-for="resource in maliyat_resources.data"
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
                      {{ resource.fixed_amount }}
                    </TD>
                    <TD>
                      {{ resource.received_amount }}
                    </TD>
                    <TD>
                      {{ resource.receipt_no }}
                    </TD>
                    <TD>
                      {{ resource.arrears }}
                    </TD>
                    <TD>
                     <Link
                        :href="route('maliyat.edit', { maliyat: resource.uuid })"
                      >
                        <span class="text-indigo-600 hover:text-indigo-900 mr-2"
                          >Edit</span
                        >
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
      <Pagination :data="maliyat_resources.meta"> </Pagination>
    </div>
  </BreezeAuthenticatedLayout>
</template>
