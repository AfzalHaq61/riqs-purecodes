<script setup>
import { reactive, ref } from "vue";
import route from "ziggy-js";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";

const responce = ref([]);

const props = defineProps({
  resource: Array,
  errors: Object,
});

let form = reactive({
  resource_id: "",
  date: "",
  fixed_amount: "",
  received_amount: "",
  recieved_by: "",
  receipt_no: "",
  arrears: "",
});

function submit() {
  Inertia.post(route("maliyat.store"), form, {
    forceFormData: true,
  });
}

function arrears() {
  this.form.arrears = this.form.fixed_amount - this.form.received_amount;
}

function fixedField() {
  (this.form.fixed_amount = ""),
    axios({
      method: "get",
      url: "/kawaif/fix-amount/" + form.resource_id,
    })
      .then((response) => {
        this.form.fixed_amount = response.data;
      })
      .catch((err) => {
        console.log(err);
      });
}
</script>

<template>
  <Head title="AddMaliyat" />
  <BreezeAuthenticatedLayout>
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <BanerHeading
          heading="Maliyat Resource Creation"
          paragraph="A list of all the users in your account including their name, title,
          email and role."
        />
      </div>
    </div>

    <div class="mt-40">
      <div class="mt-10 sm:mt-0">
        <!-- Form -->

        <form @submit.prevent="submit">
          <!-- Maliyat Information -->

          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Maliyat Information
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
                    @change="fixedField()"
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
                    :errors="errors.fixed_amount"
                    v-model="form.fixed_amount"
                    fieldtype="number"
                    name="fixed_amount"
                    placeholder="Fixed Amount"
                    readonly="true"
                  >
                    Fixed Amount
                  </TextField>
                  <TextField
                    @change="arrears()"
                    :errors="errors.received_amount"
                    v-model="form.received_amount"
                    fieldtype="number"
                    name="received_amount"
                    placeholder="Received Amount"
                  >
                    Received Amount
                  </TextField>
                  <SelectField
                    :errors="errors.recieved_by"
                    :dropdowns="resource"
                    v-model="form.recieved_by"
                    selectedOption="Received By"
                    name="recieved_by"
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
                  <TextField
                    :errors="errors.arrears"
                    v-model="form.arrears"
                    fieldtype="number"
                    name="arrears"
                    placeholder="Arrears"
                    readonly="true"
                  >
                    Arrears
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
              Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>