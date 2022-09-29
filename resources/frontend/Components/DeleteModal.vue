<template>
  <q-dialog
    v-model="show"
    persistent
    transition-show="scale"
    transition-hide="scale"
  >
    <q-card>
      <q-card-section>
        <h5>Confirmação</h5>
        <p>
          Deseja realmente remover o Site
          <b>{{ info.name }}</b> ?
        </p>
      </q-card-section>
      <q-card-actions align="right">
        <q-btn
          color="primary"
          label="OK"
          v-close-popup
          @click="emit('onClose', true)"
        />
        <q-btn
          color="primary"
          label="Cancel"
          v-close-popup
          @click="emit('onClose', false)"
        />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script setup>
// const { Inertia } = require("@inertiajs/inertia");

const prop = defineProps({
  show: {
    type: Boolean,
    default: false,
  },
  info: Object,
});

const emit = defineEmits(["onClose"]);
</script>

<style>
</style>