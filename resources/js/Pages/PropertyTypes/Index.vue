<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PropertyType from '@/Components/PropertyType.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

defineProps(['property_types']);

const form = useForm({
  name: '',
  description: '',
});
</script>

<template>
  <Head title="PropertyTypes" />

  <AuthenticatedLayout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
      <form @submit.prevent="form.post(route('property_types.store'), { onSuccess: () => form.reset() })">
        <div>
          <InputLabel for="email" value="Email" />
          <textarea
              v-model="form.name"
              placeholder="What's on your mind?"
              class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
          ></textarea>
          <InputError :name="form.errors.name" class="mt-2" />
        </div>

        <div>
          <InputLabel for="email" value="Description" />
          <TextInput
              id="description"
              type="text"
              class="mt-1 block w-full"
              v-model="form.description"
          />

          <InputError class="mt-2" :description="form.errors.description" />
        </div>

        <PrimaryButton class="mt-4">Property Type</PrimaryButton>
      </form>

      <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        <PropertyType
            v-for="property_type in property_types "
            :key="property_type.id"
            :property_type="property_type"
        />
      </div>

    </div>
  </AuthenticatedLayout>
</template>