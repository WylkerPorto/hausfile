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

  <form @submit.prevent="submitImg" class="tw-max-w-md tw-mx-auto tw-my-4">
    <h4>Image upload</h4>
    <input
      type="file"
      @change="previewImage"
      ref="imagem"
      accept="image/png, image/jpeg"
      class="tw-w-full tw-px-4 tw-py-2 tw-mt-2 tw-border tw-rounded-md focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-blue-600"
    />
    <div class="tw-relative">
      <img v-if="image" :src="image" class="tw-w-full tw-mt-4 tw-h-80" />
      <progress
        v-if="imgForm.progress"
        class="tw-w-full tw-absolute tw-bottom-0 tw-h-4"
        :value="imgForm.progress.percentage"
        max="100"
      ></progress>
    </div>
    <div v-if="errors.image" class="tw-font-bold tw-text-red-600">
      {{ errors.image }}
    </div>

    <q-btn
      rounded
      :disabled="imgForm.processing"
      type="submit"
      class="bg-green-9 full-width text-white tw-mt-5"
    >
      Send
    </q-btn>
  </form>

  <section v-if="property.image" class="tw-max-w-md tw-mx-auto">
    <h3 class="tw-text-center">Album</h3>

    <section id="imgs">
      <picture v-for="img in property.image" :key="img.uid">
        <img :src="'/storage/' + img.image" :alt="img.uid" />
        <div></div>
        <Link
          :href="route('delete.image', img.uid)"
          method="delete"
          as="button"
        >
          Remove
        </Link>
      </picture>
    </section>
  </section>
</template>

<script setup>
const props = defineProps({
  property: Object,
  errors: Object,
});

const form = useForm(props.property);

const imgForm = useForm({
  image: null,
  property_id: null,
});

const image = ref(null);

function previewImage(e) {
  const file = e.target.files[0];
  imgForm.image = e.target.files[0];
  imgForm.property_id = form.uid;
  image.value = URL.createObjectURL(file);
}

let imagem = ref();

function submitImg() {
  imgForm.post(route("create.image"), {
    onSuccess: () => {
      imgForm.image = null;
      image.value = null;
      imagem.value.value = null;
    },
  });
}
</script>

<style lang="scss" scoped>
progress[value]::-webkit-progress-value {
  background-image: -webkit-linear-gradient(
      -45deg,
      transparent 33%,
      rgba(0, 0, 0, 0.1) 33%,
      rgba(0, 0, 0, 0.1) 66%,
      transparent 66%
    ),
    -webkit-linear-gradient(top, rgba(255, 255, 255, 0.25), rgba(0, 0, 0, 0.25)),
    -webkit-linear-gradient(left, #09c, #f44);

  border-radius: 2px;
  background-size: 35px 20px, 100% 100%, 100% 100%;
}

#imgs {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-auto-rows: 200px;
  grid-gap: 10px;
  grid-auto-flow: dense;

  picture {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;

    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: 50% 50%;
      cursor: pointer;
      transition: 0.5s ease-in-out;
    }

    div {
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      position: absolute;
      background: black;
      opacity: 0.5;
      display: none;
    }

    button {
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      position: absolute;
      color: white;
      background: #bb0000;
      padding: 8px 15px;
      border-radius: 10px;
      display: none;
    }

    &:hover {
      img {
        transform: scale(1.5);
      }

      div {
        display: block;
      }

      button {
        display: block;

        &:hover {
          background: #880000;
        }
      }
    }
  }
}
</style>