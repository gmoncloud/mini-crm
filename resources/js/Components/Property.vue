<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import TextInput from '@/Components/TextInput.vue';
import NumberInput from '@/Components/NumberInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

dayjs.extend(relativeTime);

const props = defineProps(
    [
      'addressable_types',
      'property',
      'property_types'
    ]
);

console.log("addressable edit: ", props.addressable_types);

const form = useForm({
  name: props.property.name,
  property_type_id: props.property.property_type_id,
  slug: props.property.slug,
  bedrooms: props.property.bedrooms,
  bathrooms: props.property.bathrooms,
  size: props.property.size,
  description: props.property.description,
  council_tax_band: props.property.council_tax_band,
  price: props.property.price,
  currency: props.property.currency,
  tenure: props.property.tenure,
  addressable_type: props.property.addressable_type,
  address_line_1: props.property.address_line_1,
  address_line_2: props.property.address_line_2,
  city: props.property.city,
  country: props.property.country,
  postcode: props.property.postcode,
});

const submit = () => {
  alert("clicked");
}

const editing = ref(false);
</script>

<template>
  <div class="p-6 flex justify-between">
    <div class="w-1/6"><span class="text-gray-800">{{ property.name }}</span></div>
    <div class="w-1/6"><span class="text-gray-800">{{ property.bedrooms }}</span></div>
    <div class="w-1/6"><span class="text-gray-800">{{ property.size}}</span></div>
    <div class="w-1/6"><span class="text-gray-800">{{ property.price}}</span></div>
    <div class="w-1/6"><span class="text-gray-800">{{ property.currency}}</span></div>
    <div class="w-1/6">
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
          <DropdownLink as="button" :href="route('properties.destroy', property.id)" method="delete">
            Delete
          </DropdownLink>
        </template>
      </Dropdown>
    </div>

      <Modal :show="editing">
        <div class="p-6">
          <h1 class="text-lg font-medium text-gray-900">
            Edit Property
          </h1>

          <div class="mt-6">
            <form @submit.prevent="form.put(route('properties.update', property.id), { onSuccess: () => editing = false })">
              <div>
                <textarea v-model="form.name" class="mt-4 w-full text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                <InputError :name="form.errors.name" class="mt-2" />
              </div>

              <div>
                <InputLabel for="property_type" value="Property Type" />
                <select v-model="form.property_type_id">
                  <option value="">Select Property Type</option>
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
                <select v-model="form.addressable_type">
                  <option disabled value="">Please select one</option>
                  <option v-for="addressable_type in addressable_types" :value="addressable_type.value">
                    {{ addressable_type.name }}
                  </option>
                </select>

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

              <div>
                <InputLabel for="image" value="Select Image" />
                <input
                    type="file"
                    @change="onFileSelected"
                    class="mt-1 block w-full"
                    multiple
                >
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