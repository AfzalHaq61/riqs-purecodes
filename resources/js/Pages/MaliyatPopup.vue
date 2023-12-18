<script setup>
import { reactive, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  resource: String,
  errors: Object,
});

const open = ref(true);

let form = reactive({
  maliyat: props.resource.maliyat,
  _method: "put",
});

function submit() {
  Inertia.post(
    route("maliyat-popup.update", { resource: props.resource.uuid }),
    form,
    {
      forceFormData: true,
    }
  );
}

function cancelModel() {
  Inertia.get(route("kawaif.index"));
}
</script>

<template>
<Head title="Edit Maliyat" />
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
                      <h1>Edit Maliyat</h1>
                    </div>
                    <div class="my-5">
                      <TextField
                        :errors="errors.maliyat"
                        v-model="form.maliyat"
                        fieldtype="number"
                        name="maliyat"
                        placeholder="Edit Maliyat"
                      >
                        Maliyat
                      </TextField>
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
                    Update
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