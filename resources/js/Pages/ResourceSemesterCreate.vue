<script setup>
import { reactive, ref } from "vue";
import route from "ziggy-js";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";
import VueMultiselect from "vue-multiselect";

const props = defineProps({
  resources: Array,
  semester: Object,
  errors: Object,
});

let form = reactive({
  resources: [],
});

let selectedResouces = reactive({
  values: [],
});

function selectMe(selectedOption, id) {
  form.resources.push(selectedOption.id);
}

function removeSelection(removedOption, id) {
  form.resources.splice(form.resources.indexOf(removedOption.id), 1);
}

function submit() {
  Inertia.post(
    route("resourcesSemester.store", { semester: props.semester.uuid }),
    form,
    {
      forceFormData: true,
    }
  );
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>

<template>
  <Head title="AddResourceSemester" />
  <BreezeAuthenticatedLayout>
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <BanerHeading
          heading="ResourceSemster Creation"
          paragraph="A list of all the users in your account including their name, title,
          email and role."
        />
      </div>
    </div>

    <div class="mt-40">
      <div class="mt-10 sm:mt-0">
        <!-- Form -->

        <form @submit.prevent="submit">
          <!-- Semester Resource Information -->

          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  ResourceSemester Information
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                  Use a permanent address where you can receive mail.
                </p>
              </div>
            </div>
            <div
              class="
                min-w-full
                shadow
                sm:rounded-md
                px-4
                py-5
                bg-white
                sm:p-6
                col-span-2
              "
            >
              <VueMultiselect
                v-model="selectedResouces.values"
                :options="resources"
                :multiple="true"
                :close-on-select="true"
                placeholder="Select Resources"
                label="name"
                track-by="id"
                @select="selectMe"
                @remove="removeSelection"
              />
              <div
                :v-if="props.errors"
                class="text-red-600 pt-1 text-xs"
                role="alert"
              >
                {{ props.errors.resource_id }}
              </div>
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