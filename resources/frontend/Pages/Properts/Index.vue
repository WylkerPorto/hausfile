<template layout="Default">
  <Head title="My properties" />

  <main class="tw-max-w-md tw-mx-auto">
    <section class="tw-flex">
      <div class="tw-w-full">
        <p class="tw-mb-2">{{ user.name }} properties</p>
        <hr class="tw-border-gray-400" />
        <span
          class="backgreen tw-text-white tw-mt-2 tw-px-4 tw-text-center tw-mb-2 hover:tw-text-white tw-block tw-w-max"
        >
          Last update: <br />
          {{ moment().format("L", user.updated_at) }}
        </span>
      </div>
      <picture class="tw-w-28 tw-ml-8 tw-overflow-hidden tw-rounded-full">
        <img
          :src="user.avatar"
          :alt="user.name"
          v-if="user.avatar"
          class="tw-h-auto tw-w-full"
        />
      </picture>
    </section>

    <section v-for="property in properties.data" :key="property">
      <PropertyCard :property="property" />
    </section>

    <Paginator :paginate="properties" class="tw-my-2" />
  </main>
</template>

<script setup>
import moment from "moment";

defineProps({
  properties: Object,
});

const user = useAttrs().auth.user;
</script>