<script setup>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import route from "ziggy-js";

const props = defineProps({
  errors: Object,
});

let form = reactive({
  name: "",
});

function submit() {
  Inertia.post(route("structures.store"), form, {
    forceFormData: true,
  });
}
</script>

<template>
  <!--  Heading -->
  <Head title="AddStructureResources" />
  <BreezeAuthenticatedLayout>
    <div class="">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <BanerHeading
            heading="Structure Resources Creation"
            paragraph="A list of all the users in your account including their name, title,
        email and role."
          />
        </div>
      </div>
    </div>
    <!-- Form -->
    <div class="mt-40">
      <div class="mt-10 sm:mt-0">
        <form @submit.prevent="submit">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                  Structure Resource Information
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                  Use a permanent address where you can receive mail.
                </p>
              </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <div
                class="
                  shadow
                  overflow-hidden
                  sm:rounded-md
                  px-4
                  py-5
                  bg-white
                  sm:p-6
                "
              >
                <TextField
                  :errors="errors.name"
                  v-model="form.name"
                  fieldtype="text"
                  name="name"
                  placeholder="Structure Resource Name"
                >
                  Name
                </TextField>
              </div>
            </div>
          </div>
          <!-- Button -->
          <div class="flex justify-end mt-8">
            <button
              type="submit"
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
