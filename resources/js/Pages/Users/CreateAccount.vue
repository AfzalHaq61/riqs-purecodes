<script setup>
import { reactive, ref } from "vue";
import route from "ziggy-js";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";
import { Modal } from "momentum-modal";

const isOpen = ref(true);
const completeButtonRef = ref(null);

function setIsOpen(value) {
  isOpen.value = value;
}
</script>

<template>
  <div>
    <Modal>
      <TransitionRoot :show="isOpen" as="template">
        <Dialog
          :initialFocus="completeButtonRef"
          @close="setIsOpen"
          class="relative z-50"
        >
          <TransitionChild
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0"
          >
            <div class="fixed inset-0 bg-black/30" />
          </TransitionChild>
          <div class="fixed inset-0 overflow-y-auto p-4">
            <div class="flex min-h-full items-center justify-center">
              <TransitionChild
                enter="duration-300 ease-out"
                enter-from="opacity-0 scale-95"
                enter-to="opacity-100 scale-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100 scale-100"
                leave-to="opacity-0 scale-95"
              >
                <DialogPanel class="w-min-80 rounded-md bg-white p-7">
                  <DialogTitle
                    class="text-lg leading-6 font-bold text-gray-900 mb-7"
                    >Role Selection</DialogTitle
                  >
                  <div class="mt-5 w-full inline-flex justify-end">
                    <button
                      type="submit"
                      :disabled="form.processing"
                      class="
                        w-full
                        inline-flex
                        justify-center
                        rounded-md
                        border border-transparent
                        shadow-sm
                        px-4
                        py-2
                        bg-indigo-600
                        text-base
                        font-medium
                        text-white
                        hover:bg-indigo-700
                        focus:outline-none
                        focus:ring-2
                        focus:ring-offset-2
                        focus:ring-indigo-500
                        sm:w-auto sm:text-sm
                      "
                      ref="completeButtonRef"
                      @click="setIsOpen(false)"
                    >
                      Confirm
                    </button>
                    <button
                      class="
                        w-full
                        inline-flex
                        justify-center
                        rounded-md
                        border border-transparent
                        shadow-sm
                        px-4
                        py-2
                        bg-indigo-600
                        text-base
                        font-medium
                        text-white
                        hover:bg-indigo-700
                        focus:outline-none
                        focus:ring-2
                        focus:ring-offset-2
                        focus:ring-indigo-500
                        sm:ml-3 sm:w-auto sm:text-sm
                      "
                      @click="setIsOpen(false)"
                    >
                      Cancel
                    </button>
                  </div>
                </DialogPanel>
              </TransitionChild>
            </div>
          </div>
        </Dialog>
      </TransitionRoot>
    </Modal>
  </div>
</template>