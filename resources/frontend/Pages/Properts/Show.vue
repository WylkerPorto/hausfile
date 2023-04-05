<template layout="Default" >
  <Head :title="property.name" />
  <main class="tw-max-w-md tw-mx-auto">
    <h3>{{ property.name }}</h3>
    <section class="tw-flex tw-justify-between">
      <div>
        <p>City: {{ property.city }}</p>
        <p>Country: {{ property.country }}</p>
        <p>Tenant: {{ property.tenant }}</p>
      </div>
      <div>
        <p>Zip Code: {{ property.zipcode }}</p>
        <span class="backgreen tw-text-white tw-px-4 tw-text-center tw-block">
          Last update:<br />
          {{ moment().format("L", property.updated_at) }}
        </span>
      </div>
    </section>
    <picture></picture>
    <div>
      <p>Alert:</p>
      <p>Next alert:</p>
    </div>
    <a
      class="backgreen tw-text-white tw-py-2 tw-px-4 tw-text-center hover:tw-text-white"
    >
      share
    </a>
  </main>
</template>

<script setup>
import moment from "moment";

defineProps({
  property: Object,
});
</script>