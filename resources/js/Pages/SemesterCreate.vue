<script setup>
import { reactive, ref } from "vue";
import route from "ziggy-js";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";

const semesters = ref();

const props = defineProps({
  centers: Array,
  resources: Array,
  zones: Array,
  regions: Array,
  errors: Object,
});

let form = reactive({
  center_id: "",
  semester_number: "",
  muhazir_id: "",
  mawin_muhazir_id: "",
  start_date: "",
  end_date: "",
  region_id: "",
  zone_id: "",
});

function semesterSelection() {
  axios({
    method: "get",
    url: "/semesters/selection/" + form.center_id,
  })
    .then((response) => {
      this.semesters = response.data;
    })
    .catch((err) => {
      console.log(err);
    });
}

function submit() {
  Inertia.post(route("semesters.store"), form, {
    forceFormData: true,
  });
}
</script>

<template>
  <Head title="AddSemester" />
  <BreezeAuthenticatedLayout>
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <BanerHeading
          heading="Semster Creation"
          paragraph="A list of all the users in your account including their name, title,
          email and role."
        />
      </div>
    </div>

    <div class="mt-40">
      <div class="mt-10 sm:mt-0">
        <!-- Form -->

        <form @submit.prevent="submit">
          <!-- Semester Information -->

          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Semester Information
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                  Use a permanent address where you can receive mail.
                </p>
              </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <Form>
                <template v-slot:textfield>
                  <SelectField
                    @change="semesterSelection()"
                    :errors="errors.center_id"
                    :dropdowns="centers"
                    v-model="form.center_id"
                    selectedOption="Seclet Center"
                    name="center_id"
                  >
                    Center
                  </SelectField>
                  <SelectField
                    :errors="errors.semester_number"
                    :dropdowns="semesters"
                    v-model="form.semester_number"
                    selectedOption="Seclet Semester"
                    name="semester_number"
                  >
                    Semester
                  </SelectField>
                  <SelectField
                    :errors="errors.muhazir_id"
                    :dropdowns="resources"
                    v-model="form.muhazir_id"
                    selectedOption="Seclet Muhazir"
                    name="muhazir_id"
                  >
                    Mahaizr
                  </SelectField>
                  <SelectField
                    :errors="errors.mawin_muhazir_id"
                    :dropdowns="resources"
                    v-model="form.mawin_muhazir_id"
                    selectedOption="Seclet Mawin Muhazir"
                    name="mawin_muhazir_id"
                  >
                    Mawin Mahaizr
                  </SelectField>
                  <TextField
                    :errors="errors.start_date"
                    v-model="form.start_date"
                    fieldtype="date"
                    name="start_date"
                    placeholder="Start Date"
                  >
                    Start Date
                  </TextField>
                  <TextField
                    :errors="errors.end_date"
                    v-model="form.end_date"
                    fieldtype="date"
                    name="end_date"
                    placeholder="End Date"
                  >
                    End Date
                  </TextField>
                  <SelectField
                    :errors="errors.zone_id"
                    :dropdowns="zones"
                    v-model="form.zone_id"
                    selectedOption="Seclet Zone"
                    name="zone_id"
                  >
                    Zone
                  </SelectField>
                  <SelectField
                    :errors="errors.region_id"
                    :dropdowns="regions"
                    v-model="form.region_id"
                    selectedOption="Seclet Region"
                    name="region_id"
                  >
                    Region
                  </SelectField>
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