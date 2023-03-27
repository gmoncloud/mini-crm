<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PropertyType from '@/Components/PropertyType.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

import { Head, useForm } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';

defineProps(['property_types']);

const form = useForm({
  name: '',
  description: '',
  is_active: true,
});

const data = {
  id: '',
  name: '',
  description: '',
  is_active: ''
};

const updateTodos = (property) => {
  data.id = property.id
  data.name = property.name
  data.description = property.description
  data.is_active = property.is_active
};
</script>

<template>
  <Head title="PropertyTypes" />

  <AuthenticatedLayout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
      <form enctype="multipart/form-data" @submit.prevent="form.post(route('property_types.store'), { onSuccess: () => form.reset() })">
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
            <input id="helper-checkbox"
                   v-model="form.is_active"
                   :checked="form.is_active"
                   aria-describedby="helper-checkbox-text" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2  dark:border-gray-600">
          </div>
          <div class="ml-2 text-sm">
            <label for="helper-checkbox" class="font-medium">{{ (form.is_active) ? 'true' : 'false' }}</label>
          </div>
        </div>

        <PrimaryButton class="mt-4">Create</PrimaryButton>
      </form>

      <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        <div class="bg-gray-400/50 p-6 flex space-x-2 justify-between rounded-t-lg">
          <div><span class="w-1/4 font-semibold text-gray-800">Name</span></div>
          <div><span class="w-1/4 font-semibold text-gray-800">Description</span></div>
          <div><span class="w-1/4 font-semibold text-gray-800">Is Active</span></div>
          <div><span class="w-1/4 font-semibold text-gray-800">Action</span></div>
        </div>
        <PropertyType
            v-for="property_type in property_types.data"
            :key="property_type.id"
            :property_type="property_type"
        />
        <div class="mx-8">
          <Pagination class="mt-6" :links="property_types.links" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
