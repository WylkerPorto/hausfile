<template layout="Default" >
  <Head title="Edit property" />

  <form
    @submit.prevent="($event) => form.post(route('edit.property', form.uid))"
    class="tw-max-w-md tw-mx-auto"
  >
    <div class="tw-flex tw-items-baseline tw-my-1">
      <label for="name" class="tw-mr-2">Name:</label>
      <q-input
        rounded
        id="name"
        v-model="form.name"
        :error-message="errors.name"
        :error="!!errors.name"
        type="text"
        autofocus
        required
        outlined
        class="tw-w-full"
      />
    </div>
    <div class="tw-flex tw-items-baseline tw-my-1">
      <label for="city" class="tw-mr-2">City:</label>
      <q-input
        rounded
        id="city"
        v-model="form.city"
        :error-message="errors.city"
        :error="!!errors.city"
        type="text"
        required
        outlined
        class="tw-w-full"
      />
    </div>
    <div class="tw-flex tw-items-baseline tw-my-1">
      <label for="country" class="tw-mr-2">Country:</label>
      <q-input
        rounded
        id="country"
        v-model="form.country"
        :error-message="errors.country"
        :error="!!errors.country"
        type="text"
        required
        outlined
        class="tw-w-full"
      />
    </div>
    <div class="tw-flex tw-items-baseline tw-my-1">
      <label for="zipcode" class="tw-mr-2 tw-whitespace-nowrap"
        >Zip Code:</label
      >
      <q-input
        rounded
        id="zipcode"
        v-model="form.zipcode"
        :error-message="errors.zipcode"
        :error="!!errors.zipcode"
        type="text"
        required
        outlined
        class="tw-w-full"
      />
    </div>
    <div class="tw-flex tw-items-baseline tw-my-1">
      <label for="tenant" class="tw-mr-2">Tenant:</label>
      <q-input
        rounded
        id="tenant"
        v-model="form.tenant"
        :error-message="errors.tenant"
        :error="!!errors.tenant"
        type="text"
        outlined
        class="tw-w-full"
      />
    </div>
    <q-btn
      rounded
      :disabled="form.processing"
      type="submit"
      class="bg-green-9 full-width text-white"
    >
      Save
    </q-btn>
  </form>
</template>

<script setup>
const props = defineProps({
  property: Object,
  errors: Object,
});

const form = useForm(props.property);
</script>