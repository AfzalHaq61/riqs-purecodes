<script setup>
import { reactive, ref } from "vue";
import route from "ziggy-js";
import { Inertia } from "@inertiajs/inertia";
import { ExclamationIcon } from "@heroicons/vue/outline";
import Multiselect from "vue-multiselect";

const props = defineProps({
  resource: String,
  roles: Array,
  errors: Object,
});

const open = ref(true);

let form = reactive({
  email: props.resource.email,
  password: "",
  confirm_password: "",
  roles: [],
});

let selectedRoles = reactive({
  values: [],
});

function selectMe(selectedOption, id) {
  form.roles.push(selectedOption.id);
}

function removeSelection(removedOption, id) {
  form.roles.splice(form.roles.indexOf(removedOption.id), 1);
}

function submit() {
  Inertia.post(route("user.store", { resource: props.resource.uuid }), form, {
    forceFormData: true,
  });
}

function cancelModel() {
  Inertia.get(route("kawaif.index"));
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>

<template>
  <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="relative z-10" @close="open = false">
      <TransitionChild
        as="template"
        enter="ease-out duration-300"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="ease-in duration-200"
        leave-from="opacity-100"
        leave-to="opacity-0"
      >
        <div
          class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
        />
      </TransitionChild>

      <div class="fixed z-10 inset-0 overflow-y-auto">
        <div
          class="
            flex
            items-end
            sm:items-center
            justify-center
            min-h-full
            p-4
            text-center
            sm:p-0
          "
        >
          <TransitionChild
            as="template"
            enter="ease-out duration-300"
            enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            enter-to="opacity-100 translate-y-0 sm:scale-100"
            leave="ease-in duration-200"
            leave-from="opacity-100 translate-y-0 sm:scale-100"
            leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          >
            <DialogPanel
              class="
                relative
                bg-white
                rounded-lg
                text-left
                overflow-hidden
                shadow-xl
                transform
                transition-all
                sm:my-8 sm:max-w-lg sm:w-full
              "
            >
              <form @submit.prevent="submit">
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-24 py-10">
                    <div class="text-center font-bold text-lg mb-8">
                      <h1>Create Account</h1>
                    </div>
                    <form action=""></form>
                    <div>
                      <div class="mb-5">
                        <TextField
                          :errors="errors.email"
                          v-model="form.email"
                          fieldtype="email"
                          name="email"
                          placeholder="Email"
                        >
                          Email
                        </TextField>
                      </div>
                      <div>
                        <label class="block text-sm font-medium text-gray-700"
                          >Roles
                          <multiselect
                            v-model="selectedRoles.values"
                            :options="roles"
                            :multiple="true"
                            :close-on-select="true"
                            placeholder="Select Roles"
                            label="name"
                            track-by="id"
                            @select="selectMe"
                            @remove="removeSelection"
                          ></multiselect>
                        </label>
                      </div>
                      <div class="my-5">
                        <TextField
                          :errors="errors.password"
                          v-model="form.password"
                          fieldtype="password"
                          name="password"
                          placeholder="Password"
                        >
                          Password
                        </TextField>
                      </div>
                      <div class="mb-5">
                        <TextField
                          :errors="errors.confirm_password"
                          v-model="form.confirm_password"
                          fieldtype="password"
                          name="confirm_password"
                          placeholder="Confirm Password"
                        >
                          Confirm Password
                        </TextField>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="
                    bg-gray-50
                    px-4
                    py-3
                    sm:px-6 sm:flex sm:flex-row-reverse
                  "
                >
                  <button
                    type="submit"
                    :disabled="form.processing"
                    class="
                      inline-flex
                      justify-center
                      py-2
                      px-4
                      ml-2
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
                  <button
                    type="button"
                    class="
                      mt-3
                      w-full
                      inline-flex
                      justify-center
                      rounded-md
                      border border-gray-300
                      shadow-sm
                      px-4
                      py-2
                      bg-white
                      text-base
                      font-medium
                      text-gray-700
                      hover:bg-gray-50
                      focus:outline-none
                      focus:ring-2
                      focus:ring-offset-2
                      focus:ring-indigo-500
                      sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm
                    "
                    @click="(open = false), cancelModel()"
                    ref="cancelButtonRef"
                  >
                    Cancel
                  </button>
                </div>
              </form>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>