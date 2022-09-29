<template>
  <q-dialog
    v-model="show"
    persistent
    full-width
    full-height
    transition-show="scale"
    transition-hide="scale"
  >
    <q-card>
      <q-card-section class="row items-center q-pb-none">
        <div class="text-h6">Close icon</div>
        <q-space />
        <q-btn
          icon="close"
          flat
          round
          dense
          v-close-popup
          @click="emit('onClose')"
        />
      </q-card-section>

      <q-card-section>
        <picture>
          <q-img
            v-for="img in imgs"
            :src="img.src"
            :alt="img.name"
            :key="img.name"
            :ratio="4 / 3"
          />
        </picture>
      </q-card-section>
    </q-card>
  </q-dialog>
</template>

<script setup>
const prop = defineProps({
  show: {
    type: Boolean,
    default: false,
  },
  uid: String,
});

let imgs = ref();
const emit = defineEmits(["onClose"]);

onUpdated(async () => {
  if (prop.show) {
    let data = await axios.get(route("site.imagens", prop.uid));
    imgs.value = data.data;
    console.log(imgs);
  }
});
</script>

<style lang="scss" scoped>
picture {
  @apply sm:tw-flex tw-flex-wrap;

  div {
    max-width: 250px;
    @apply sm:tw-mx-2 tw-my-2;
  }
}
</style>