<script setup>
import { reactive, ref } from "vue";
import route from "ziggy-js";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  resourceSemester: Array,
  resources: Array,
  errors: Object,
});

let form = reactive({
  uuid: props.resourceSemester.uuid,
  resource_id: props.resourceSemester.resource_id,
  semester_id: props.resourceSemester.semester_id,
  _method: "put",
});

function submit() {
  Inertia.post(
    route("resourcesSemester.update", {
      resourceSemester: props.resourceSemester.uuid,
    }),
    form,
    {
      forceFormData: true,
    }
  );
}
</script>

<template>
  <Head title="UpdateResourceSemester" />
  <BreezeAuthenticatedLayout>
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <BanerHeading
          heading="Update ResourcesSemester"
          paragraph="A list of all the users in your account including their name, title,
          email and role."
        />
      </div>
    </div>

    <div class="mt-40">
      <div class="mt-10 sm:mt-0">
        <!-- Form -->

        <form @submit.prevent="submit">
          <!-- ResourcesSemester Information -->

          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Resources Semester Information
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
                    :dropdowns="resources"
                    v-model="form.resource_id"
                    selectedOption="Seclet Resource Semester"
                    name="resource_id"
                  >
                    Resources
                  </SelectField>
                  <SelectField
                    :errors="errors.semester_id"
                    :dropdowns="resources"
                    v-model="form.semester_id"
                    selectedOption="Seclet Semester"
                    name="semester_id"
                  >
                    Semester
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
              Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>