<template>
  <nav
    class="tw-flex tw-p-2 tw-justify-between tw-items-center backblue tw-text-white"
  >
    <img src="imgs/logo.png" alt="logo" class="tw-h-14 tw-w-auto" />

    <div v-if="isLogged">
      <q-btn padding="0" unelevated size="35px">
        <i-mdi-menu />

        <q-menu class="bg-blue-grey-1">
          <q-list style="min-width: 100px">
            <q-item clickable v-close-popup>
              <q-item-section>New Property</q-item-section>
            </q-item>
            <q-item clickable v-close-popup>
              <q-item-section>Edit Property</q-item-section>
            </q-item>
            <q-item clickable v-close-popup>
              <q-item-section>New Appliance</q-item-section>
            </q-item>
            <q-item clickable v-close-popup>
              <q-item-section>New Decoration</q-item-section>
            </q-item>
            <q-separator />
            <q-item clickable v-close-popup>
              <q-item-section>Settings</q-item-section>
            </q-item>
            <q-item clickable v-close-popup>
              <q-item-section>User Edit</q-item-section>
            </q-item>
            <q-item clickable v-close-popup>
              <q-item-section>Log Out</q-item-section>
            </q-item>
          </q-list>
        </q-menu>
      </q-btn>
    </div>
  </nav>
</template>

<script setup>
const props = defineProps({
  active: Boolean,
  isLogged: Boolean,
});
</script>
