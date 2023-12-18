<script setup>
import { reactive, ref } from "vue";
import route from "ziggy-js";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  resource: Array,
  errors: Object,
});

let form = reactive({
  resource_id: "",
  date: "",
  received_amount: "",
  received_by: "",
  receipt_no: "",
});

function submit() {
  Inertia.post(route("rahimia.store"), form, {
    forceFormData: true,
  });
}
</script>

<template>
  <Head title="AddRahimia" />
  <BreezeAuthenticatedLayout>
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <BanerHeading
          heading="Rahimia Resource Creation"
          paragraph="A list of all the users in your account including their name, title,
          email and role."
        />
      </div>
    </div>

    <div class="mt-40">
      <div class="mt-10 sm:mt-0">
        <!-- Form -->

        <form @submit.prevent="submit">
          <!-- Rahimia Information -->

          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Rahimia Information
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
                    :errors="errors.resource_id"
                    :dropdowns="resource"
                    v-model="form.resource_id"
                    selectedOption="Select Resource"
                    name="resource_id"
                  >
                    Resource
                  </SelectField>
                  <TextField
                    :errors="errors.date"
                    v-model="form.date"
                    fieldtype="date"
                    name="date"
                    placeholder="Second Name"
                  >
                    Date
                  </TextField>
                  <TextField
                    :errors="errors.received_amount"
                    v-model="form.received_amount"
                    fieldtype="number"
                    name="received_amount"
                    placeholder="Received Amount"
                  >
                    Received Amount
                  </TextField>
                  <SelectField
                    :errors="errors.received_by"
                    :dropdowns="resource"
                    v-model="form.received_by"
                    selectedOption="Received By"
                    name="received_by"
                  >
                    Received By
                  </SelectField>
                  <TextField
                    :errors="errors.receipt_no"
                    v-model="form.receipt_no"
                    fieldtype="number"
                    name="receipt_no"
                    placeholder="Receipt Number"
                  >
                    Receipt Number
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