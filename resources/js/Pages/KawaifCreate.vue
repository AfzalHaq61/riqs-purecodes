<script setup>
import { reactive, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

const madooStatus = ref(false);
const zones = ref();
const shehars = ref();
const halqas = ref();
const units = ref();

const props = defineProps({
  dawati_statuses: Array,
  terbiati_statuses: Array,
  intizami_statuses: Array,
  regions: Array,
  errors: Object,
});

let form = reactive({
  first_name: "",
  second_name: "",
  father_name: "",
  email: "",
  phone_number: "",
  cnic: "",
  education: "",
  permanent_address: "",
  present_address: "",
  dawati_status_id: "",
  tarbiati_status_id: "",
  intizami_status_id: "",
  region_id: "",
  zone_id: "",
  shehar_id: "",
  halqa_id: "",
  unit_id: "",
  maliyat: "",
});

function zoneSelection() {
  axios({
    method: "get",
    url: "/zone/selection/" + form.region_id,
  })
    .then((response) => {
      this.zones = response.data;
    })
    .catch((err) => {
      console.log(err);
    });
}

function sheherHalqaUnitSelection() {
  axios({
    method: "get",
    url: "/shehar/halqa/unit/selection/" + form.zone_id,
  })
    .then((response) => {
      this.shehars = response.data.shehars;
      this.halqas = response.data.halqas;
      this.units = response.data.units;
    })
    .catch((err) => {
      console.log(err);
    });
}

function halqaUnitSelection() {
  axios({
    method: "get",
    url: "/halqa/unit/selection/" + form.shehar_id,
  })
    .then((response) => {
      this.halqas = response.data.halqas;
      this.units = response.data.units;
    })
    .catch((err) => {
      console.log(err);
    });
}

function unitSelection() {
  axios({
    method: "get",
    url: "/unit/selection/" + form.halqa_id,
  })
    .then((response) => {
      this.units = response.data;
    })
    .catch((err) => {
      console.log(err);
    });
}

function submit() {
  Inertia.post(route("kawaif.store"), form, {
    forceFormData: true,
  });
}
</script>

<template>
  <Head title="AddKawaif" />
  <BreezeAuthenticatedLayout>
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <BanerHeading
          heading="Resources Creation"
          paragraph="A list of all the users in your account including their name, title,
          email and role."
        />
      </div>
    </div>

    <div class="mt-40">
      <div class="mt-10 sm:mt-0">
        <!-- Form -->

        <form @submit.prevent="submit">
          <!-- Personal Information -->

          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Personal Information
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                  Use a permanent address where you can receive mail.
                </p>
              </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <Form>
                <template v-slot:textfield>
                  <TextField
                    :errors="errors.first_name"
                    v-model="form.first_name"
                    fieldtype="text"
                    name="first_name"
                    placeholder="First Name"
                  >
                    First Name
                  </TextField>
                  <TextField
                    :errors="errors.second_name"
                    v-model="form.second_name"
                    fieldtype="text"
                    name="second_name"
                    placeholder="Second Name"
                  >
                    Second Name
                  </TextField>
                  <TextField
                    :errors="errors.father_name"
                    v-model="form.father_name"
                    fieldtype="text"
                    name="father_name"
                    placeholder="Father Name"
                  >
                    Father Name
                  </TextField>
                  <TextField
                    :errors="errors.email"
                    v-model="form.email"
                    fieldtype="email"
                    name="email"
                    placeholder="Email"
                  >
                    Email
                  </TextField>
                  <TextField
                    :errors="errors.phone_number"
                    v-model="form.phone_number"
                    fieldtype="number"
                    name="phone_number"
                    placeholder="Phone Number"
                  >
                    Phone Number
                  </TextField>
                  <TextField
                    :errors="errors.cnic"
                    v-model="form.cnic"
                    fieldtype="number"
                    name="cnic"
                    placeholder="Cnic Number"
                  >
                    Cnic Number
                  </TextField>
                  <TextField
                    :errors="errors.education"
                    v-model="form.education"
                    fieldtype="text"
                    name="education"
                    placeholder="Education"
                  >
                    Education
                  </TextField>
                  <TextField
                    :errors="errors.permanent_address"
                    v-model="form.permanent_address"
                    fieldtype="text"
                    name="permanent_address"
                    placeholder="Parmanent Address"
                  >
                    Parmanent Address
                  </TextField>
                  <TextField
                    :errors="errors.present_address"
                    v-model="form.present_address"
                    fieldtype="text"
                    name="present_address"
                    placeholder="Present Address"
                  >
                    Present Address
                  </TextField>
                </template>
              </Form>
            </div>
          </div>

          <div class="" aria-hidden="true">
            <div class="py-5">
              <div class="border-t border-gray-200" />
            </div>
          </div>

          <!-- Terbiyati Status Information -->

          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Terbiyati Information
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                  Use a permanent address where you can receive mail.
                </p>
              </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <Form>
                <template v-slot:selectfield>
                  <SelectField
                    :errors="errors.dawati_status_id"
                    :dropdowns="dawati_statuses"
                    v-model="form.dawati_status_id"
                    selectedOption="Select Dawati Status"
                    name="dawati_status_id"
                  >
                    Dawati Status
                  </SelectField>
                  <SelectField
                    :errors="errors.tarbiati_status_id"
                    :dropdowns="terbiati_statuses"
                    v-model="form.tarbiati_status_id"
                    selectedOption="Select Terbiati Status"
                    name="tarbiati_status_id"
                  >
                    Terbiati Status
                  </SelectField>
                  <SelectField
                    :errors="errors.intizami_status_id"
                    :dropdowns="intizami_statuses"
                    v-model="form.intizami_status_id"
                    selectedOption="Select Initizami Status"
                    name="intizami_status_id"
                  >
                    Intizami Status
                  </SelectField>
                </template>
              </Form>
            </div>
          </div>

          <div class="" aria-hidden="true">
            <div class="py-5">
              <div class="border-t border-gray-200" />
            </div>
          </div>

          <!-- Intizami Information -->

          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Intizami Information
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                  Use a permanent address where you can receive mail.
                </p>
              </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <Form>
                <template v-slot:selectfield>
                  <SelectField
                    @change="zoneSelection()"
                    :errors="errors.region_id"
                    :dropdowns="regions"
                    v-model="form.region_id"
                    selectedOption="Select Region"
                    name="region_id"
                  >
                    Region
                  </SelectField>
                  <SelectField
                    @change="sheherHalqaUnitSelection()"
                    :errors="errors.zone_id"
                    :dropdowns="zones"
                    v-model="form.zone_id"
                    selectedOption="Select Zone"
                    name="zone_id"
                  >
                    Zone
                  </SelectField>
                  <SelectField
                    @change="halqaUnitSelection()"
                    :errors="errors.shehar_id"
                    :dropdowns="shehars"
                    v-model="form.shehar_id"
                    selectedOption="Select Shehar"
                    name="shehar_id"
                  >
                    Shehar
                  </SelectField>
                  <SelectField
                    @change="unitSelection()"
                    :errors="errors.halqa_id"
                    :dropdowns="halqas"
                    v-model="form.halqa_id"
                    selectedOption="Select Halqa"
                    name="halqa_id"
                  >
                    Halqa
                  </SelectField>
                  <SelectField
                    :errors="errors.unit_id"
                    :dropdowns="units"
                    v-model="form.unit_id"
                    selectedOption="Select unit"
                    name="unit_id"
                    error="error.unit_id"
                  >
                    Unit
                  </SelectField>
                </template>
              </Form>
            </div>
          </div>

          <div class="" aria-hidden="true">
            <div class="py-5">
              <div class="border-t border-gray-200" />
            </div>
          </div>

          <!-- Maliyati Information -->

          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Malyati Information
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                  Use a permanent address where you can receive mail.
                </p>
              </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <Form>
                <template v-slot:textfield>
                  <TextField
                    :errors="errors.maliyat"
                    v-model="form.maliyat"
                    fieldtype="number"
                    name="maliyat"
                    placeholder="Maliyat"
                  >
                    Maliyat
                  </TextField>
                </template>
              </Form>
            </div>
          </div>

          <!-- Button -->

          <div class="flex justify-end mt-8">
            <button
              type="submit"
              :disabled="form.processing"
              class="
                inline-flex
                justify-center
                py-2
                px-4
                border border-transparent
                shadow-sm
                text-sm
                font-medium
                rounded-md
                text-white
                bg-indigo-600
                hover:bg-indigo-700
                focus:outline-none
                focus:ring-2
                focus:ring-offset-2
                focus:ring-indigo-500
              "
            >
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>