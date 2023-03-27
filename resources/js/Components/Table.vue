<script>
import {defineComponent, nextTick, ref} from "vue";
import Pagination from "@/Components/Pagination.vue";
import TextInput from '@/Components/TextInput.vue';
import Modal from '@/Components/Modal.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {useForm} from "@inertiajs/vue3";

export default defineComponent({
  components: {
    Pagination,
    Dropdown,
    DropdownLink,
    InputError,
    PrimaryButton,
    Modal,
    TextInput
  },
  props: {
    data: Array,
    labels: Array,
    action: String
  },
});

const form = useForm({
  name: '',
  description: '',
  is_active: '',
});

const editing = ref(false);

const confirmUserDeletion = () => {
  alert("test")
};

// Data and labels parent usage
// const labels = [
//   { text: "Name", field: "name" },
//   { text: "Description", field: "description" },
//   { text: "Is Active", field: "is_active" },
// ];

</script>

<template>
  <div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <table class="table-fixed w-full">
            <thead>
            <tr class="bg-gray-100">
              <th v-for="(label, labelIndex) in labels" :key="labelIndex"
                  class="px-4 py-2"
              >{{ label.text }}</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, itemIndex) in data" :key="itemIndex">
              <td
                  class="border px-4 py-2"
                  v-for="(label, labelIndex) in labels" :key="labelIndex"
              >

                {{ (item[label.field] && label.field !== 'is_active') ? item[label.field] : (item[label.field] && label.field === 'is_active') ? 'Active' : 'In Active' }}

              </td>
              <td class="border px-4 py-2">
                <div class="flex">
                  <Dropdown>
                    <template #trigger>
                      <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                      </button>
                    </template>

                    <template #content>
                      <button class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out" @click="$emit('completeTodo', item)" >
                        Edit
                      </button>
                      <DropdownLink as="button" :href="route('property_types.destroy', item.id)" method="delete">
                        Delete
                      </DropdownLink>
                    </template>
                  </Dropdown>
                </div>
              </td>
            </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</template>
