<script setup>
defineProps({
  name: {
    type: String,
  },
  description: {
    type: String,
  },
  slug: {
    type: String,
  },
  bedrooms: {
    type: Number,
  },
  bathrooms: {
    type: Number,
  },
  size: {
    type: Number,
  },
  council_tax_band: {
    type: String,
  },
  price: {
    type: Number,
  },
  currency: {
    type: String,
  },
  tenure: {
    type: Number,
  },
  addressable_type: {
    type: String,
  },
  address_line_1: {
    type: String,
  },
  address_line_2: {
    type: String,
  },
  city: {
    type: String,
  },
  country: {
    type: String,
  },
  postcode: {
    type: String,
  },
});
</script>

<template>
  <div>
    <div v-show="name">
      <p class="text-sm text-red-600">
        {{ name }}
      </p>
    </div>

    <div v-show="description">
      <p class="text-sm text-red-600">
        {{ description }}
      </p>
    </div>

    <div v-show="slug">
      <p class="text-sm text-red-600">
        {{ slug }}
      </p>
    </div>

    <div v-show="bedrooms">
      <p class="text-sm text-red-600">
        {{ bedrooms }}
      </p>
    </div>

    <div v-show="bathrooms">
      <p class="text-sm text-red-600">
        {{ bathrooms }}
      </p>
    </div>

    <div v-show="size">
      <p class="text-sm text-red-600">
        {{ size }}
      </p>
    </div>

    <div v-show="council_tax_band">
      <p class="text-sm text-red-600">
        {{ council_tax_band }}
      </p>
    </div>

    <div v-show="price">
      <p class="text-sm text-red-600">
        {{ price }}
      </p>
    </div>

    <div v-show="currency">
      <p class="text-sm text-red-600">
        {{ currency }}
      </p>
    </div>

    <div v-show="tenure">
      <p class="text-sm text-red-600">
        {{ tenure }}
      </p>
    </div>

    <div v-show="addressable_type">
      <p class="text-sm text-red-600">
        {{ addressable_type }}
      </p>
    </div>

    <div v-show="address_line_1">
      <p class="text-sm text-red-600">
        {{ address_line_1 }}
      </p>
    </div>

    <div v-show="address_line_2">
      <p class="text-sm text-red-600">
        {{ address_line_2 }}
      </p>
    </div>

    <div v-show="city">
      <p class="text-sm text-red-600">
        {{ city }}
      </p>
    </div>

    <div v-show="country">
      <p class="text-sm text-red-600">
        {{ country }}
      </p>
    </div>

    <div v-show="postcode">
      <p class="text-sm text-red-600">
        {{ postcode }}
      </p>
    </div>

  </div>
</template>
