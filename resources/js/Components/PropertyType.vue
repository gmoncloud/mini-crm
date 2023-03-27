<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

dayjs.extend(relativeTime);

const props = defineProps(['property_type']);

const form = useForm({
  name: props.property_type.name,
  description: props.property_type.description,
  is_active: props.property_type.is_active
});

const editing = ref(false);


</script>

<template>
  <div class="p-6 flex space-x-2 justify-between">
    <div class="w-1/4"><span class="text-gray-800">{{ property_type.name }}</span></div>
    <div class="w-1/4"><span class="text-gray-800">{{ property_type.description }}</span></div>
    <div class="w-1/4"><span class="text-gray-800">{{ (property_type.is_active) ? 'true' : 'false' }}</span></div>
    <div class="w-4/4">
      <Dropdown>
        <template #trigger>
          <button>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
              <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
            </svg>
          </button>
        </template>

        <template #content>
          <button class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out" @click="editing = true">
            Edit
          </button>
          <DropdownLink as="button" :href="route('property_types.destroy', property_type.id)" method="delete">
            Delete
          </DropdownLink>
        </template>
      </Dropdown>
    </div>

    <Modal :show="editing">
      <div class="p-6">
        <h1 class="text-lg font-medium text-gray-900">
          Edit Property Type
        </h1>

        <div class="mt-6">
          <form @submit.prevent="form.put(route('property_types.update', property_type.id), { onSuccess: () => editing = false })">
            <div>
              <InputLabel for="name" value="Name" />
              <TextInput
                  id="name"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.name"
              />

              <InputError class="mt-2" :description="form.errors.name" />
            </div>

            <div>
              <InputLabel for="description" value="Description" />
              <textarea
                  id="description"
                  v-model="form.description"
                  class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
              ></textarea>
              <InputError :name="form.errors.description" class="mt-2" />
            </div>

            <div class="flex my-4">
              <div class="flex items-center h-5">
                <input id="helper-checkbox"  v-model="form.is_active" aria-describedby="helper-checkbox-text" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
              </div>
              <div class="ml-2 text-sm">
                <label for="helper-checkbox" class="font-medium">{{ (form.is_active) ? 'Active' : 'Not Active' }}</label>
              </div>
            </div>

            <div class="space-x-2 flex justify-end">
              <PrimaryButton class="mt-4">Save</PrimaryButton>
              <button class="mt-4" @click="editing = false; form.reset(); form.clearErrors()">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </Modal>
  </div>
</template>