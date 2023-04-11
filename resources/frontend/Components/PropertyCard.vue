<template>
  <hr class="tw-mt-3 tw-border-gray-400" />
  <h5 class="tw-text-center tw-font-bold tw-my-2">{{ property.name }}</h5>
  <div class="tw-flex tw-justify-between">
    <picture>
      <img v-if="property.photo" :alt="property.name + ' card photo'" />
    </picture>
    <div>
      <p class="tw-mb-0">City: {{ property.city }}</p>
      <p class="tw-mb-0">Country: {{ property.country }}</p>
      <p class="tw-mb-0">Zip Code: {{ property.zipcode }}</p>
    </div>
  </div>
  <div class="tw-flex tw-justify-between tw-mt-2">
    <section>
      <p>Alert:</p>
      <p>Next alert:</p>
      <span class="backgreen tw-text-white tw-px-4 tw-text-center tw-block">
        Properties update: <br />
        {{ moment().format("L", property.updated_at) }}
      </span>
    </section>
    <section class="tw-flex tw-flex-col">
      <Link
        :href="route('delete.property', property.uid)"
        as="button"
        method="delete"
        class="backorange tw-text-white tw-py-2 tw-px-4 tw-text-center tw-mb-2 hover:tw-text-white"
        >Delete</Link
      >
      <Link
        :href="route('edit.property', property.uid)"
        class="backgreen tw-text-white tw-py-2 tw-px-4 tw-text-center tw-mb-2 hover:tw-text-white"
        >Edit</Link
      >
      <Link
        :href="route('show.property', property.uid)"
        class="backgreen tw-text-white tw-py-2 tw-px-4 tw-text-center tw-mb-2 hover:tw-text-white"
        >Show more</Link
      >
    </section>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import moment from "moment";
defineProps({
  property: Object,
});
</script>