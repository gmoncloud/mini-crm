<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Property from '@/Components/Property.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import NumberInput from '@/Components/NumberInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

defineProps(['properties', 'property_types']);

const form = useForm({
  name: '',
  property_type_id: '',
  slug: '',
  bedrooms: 0,
  bathrooms: 0,
  size: 0,
  description: '',
  council_tax_band: '',
  price: 0,
  currency: '',
  tenure: 0,
  addressable_type: '',
  address_line_1: '',
  address_line_2: '',
  city: '',
  country: '',
  postcode: '',
});

</script>

<template>
  <Head title="PropertyTypes" />

  <AuthenticatedLayout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
      <form @submit.prevent="form.post(route('properties.store'), { onSuccess: () => form.reset() })">
        <div>
          <InputLabel for="name" value="Name" />
          <TextInput
              id="name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.name"
          />

          <InputError class="mt-2" :name="form.errors.name" />
        </div>

        <div>
          <InputLabel for="property_type" value="Property Type" />
          <select v-model="form.property_type_id">
            <option>Select Property Type</option>
            <option v-for="property_type in property_types" :value="property_type.id">
              {{ property_type.name }}
            </option>
          </select>
        </div>

        <div>
          <InputLabel for="slug" value="Slug" />
          <TextInput
              id="slug"
              type="text"
              class="mt-1 block w-full"
              v-model="form.slug"
          />

          <InputError class="mt-2" :slug="form.errors.slug" />
        </div>

        <div>
          <InputLabel for="bedrooms" value="Bedrooms" />
          <NumberInput
              id="bedrooms"
              type="number"
              class="mt-1 block w-full"
              v-model.number="form.bedrooms"
          />

          <InputError class="mt-2" :bedrooms="form.errors.bedrooms" />
        </div>

        <div>
          <InputLabel for="bathrooms" value="Bathrooms" />
          <NumberInput
              id="bathrooms"
              type="number"
              class="mt-1 block w-full"
              v-model="form.bathrooms"
          />

          <InputError class="mt-2" :bathrooms="form.errors.bathrooms" />
        </div>

        <div>
          <InputLabel for="size" value="Size" />
          <NumberInput
              id="size"
              type="number"
              class="mt-1 block w-full"
              v-model="form.size"
          />

          <InputError class="mt-2" :size="form.errors.size" />
        </div>

        <div>
          <InputLabel for="description" value="Description" />
          <textarea
              v-model="form.description"
              placeholder="What's on your mind?"
              class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
          ></textarea>

          <InputError class="mt-2" :description="form.errors.description" />
        </div>

        <div>
          <InputLabel for="council_tax_band" value="Council Tax Band" />
          <TextInput
              id="council_tax_band"
              type="text"
              class="mt-1 block w-full"
              v-model="form.council_tax_band"
          />

          <InputError class="mt-2" :council_tax_band="form.errors.council_tax_band" />
        </div>

        <div>
          <InputLabel for="price" value="Price" />
          <NumberInput
              id="price"
              type="number"
              class="mt-1 block w-full"
              v-model="form.price"
          />

          <InputError class="mt-2" :price="form.errors.price" />
        </div>

        <div>
          <InputLabel for="currency" value="Currency" />
          <TextInput
              id="currency"
              type="text"
              class="mt-1 block w-full"
              v-model="form.currency"
          />

          <InputError class="mt-2" :currency="form.errors.currency" />
        </div>

        <div>
          <InputLabel for="tenure" value="Tenure" />
          <NumberInput
              id="tenure"
              type="number"
              class="mt-1 block w-full"
              v-model="form.tenure"
          />

          <InputError class="mt-2" :tenure="form.errors.tenure" />
        </div>

        <div>
          <InputLabel for="addressable_type" value="Addressable Type" />
          <TextInput
              id="tenure"
              type="text"
              class="mt-1 block w-full"
              v-model="form.addressable_type"
          />

          <InputError class="mt-2" :addressable_type="form.errors.addressable_type" />
        </div>

        <div>
          <InputLabel for="address_line_1" value="Address 1" />
          <TextInput
              id="address_line_1"
              type="text"
              class="mt-1 block w-full"
              v-model="form.address_line_1"
          />

          <InputError class="mt-2" :address_line_1="form.errors.address_line_1" />
        </div>

        <div>
          <InputLabel for="address_line_2" value="Address 2" />
          <TextInput
              id="address_line_2"
              type="text"
              class="mt-1 block w-full"
              v-model="form.address_line_2"
          />

          <InputError class="mt-2" :address_line_2="form.errors.address_line_2" />
        </div>

        <div>
          <InputLabel for="city" value="City" />
          <TextInput
              id="city"
              type="text"
              class="mt-1 block w-full"
              v-model="form.city"
          />

          <InputError class="mt-2" :city="form.errors.city" />
        </div>

        <div>
          <InputLabel for="country" value="Country" />
          <TextInput
              id="country"
              type="text"
              class="mt-1 block w-full"
              v-model="form.country"
          />

          <InputError class="mt-2" :country="form.errors.country" />
        </div>

        <div>
          <InputLabel for="postcode" value="Postcode" />
          <TextInput
              id="postcode"
              type="text"
              class="mt-1 block w-full"
              v-model="form.postcode"
          />

          <InputError class="mt-2" :postcode="form.errors.postcode" />
        </div>

        <PrimaryButton class="mt-4">Create</PrimaryButton>
      </form>

      <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        <div class="bg-gray-400/50 p-6 flex space-x-2 justify-between rounded-t-lg">
          <div><span class="w-1/6 font-semibold text-gray-800">Name</span></div>
          <div><span class="w-1/6 font-semibold text-gray-800">Bedrooms</span></div>
          <div><span class="w-1/6 font-semibold text-gray-800">Size</span></div>
          <div><span class="w-1/6 font-semibold text-gray-800">Price</span></div>
          <div><span class="w-1/6 font-semibold text-gray-800">Currency</span></div>
          <div><span class="w-1/6 font-semibold text-gray-800">Action</span></div>
        </div>
        <Property
            v-for="property in properties.data"
            :key="property.id"
            :property="property"
        />
      </div>

    </div>
  </AuthenticatedLayout>
</template>