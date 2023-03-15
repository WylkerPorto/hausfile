<template layout="Default">
  <Head title="Login" />

  <img src="imgs/property.jpg" alt="banner" />

  <div class="tw-mx-auto tw-max-w-md tw-my-6">
    <form
      class="tw-flex tw-border-black tw-border-2 tw-p-6 tw-space-x-5"
      @submit.prevent="form.post(route('login'))"
    >
      <div>
        <p class="tw-mt-4">Login</p>
        <p class="tw-mt-14">Password</p>
      </div>
      <div class="tw-w-full">
        <q-input
          rounded
          id="email"
          v-model="form.email"
          :error-message="errors.email"
          :error="!!errors.email"
          type="email"
          autofocus
          autocomplete="username"
          required
          outlined
        />

        <q-input
          rounded
          id="password"
          v-model="form.password"
          :error-message="errors.password"
          :error="!!errors.password"
          type="password"
          autocomplete="current-password"
          required
          outlined
        />

        <q-btn
          rounded
          :disabled="form.processing"
          type="submit"
          class="bg-green-9 full-width text-white"
        >
          Login
        </q-btn>

        <Link
          v-if="canResetPassword"
          :href="route('password.request')"
          class="tw-text-center tw-my-3 tw-block tw-text-blue-800"
        >
          Forgot password
        </Link>

        <q-btn
          rounded
          :disabled="form.processing"
          type="submit"
          class="backblue full-width text-white"
        >
          New User
        </q-btn>
      </div>
    </form>
  </div>

  <footer class="tw-p-2 backblue tw-text-white tw-text-center">
    <div class="tw-flex tw-justify-around">
      <li class="tw-text-left tw-list-none">
        <ul>
          Pictoryweb
        </ul>
        <ul>
          About
        </ul>
        <ul>
          Help
        </ul>
        <ul>
          Terms
        </ul>
        <ul>
          Locations
        </ul>
      </li>

      <li class="tw-list-none">
        <ul>
          Kasewa&trade;
        </ul>
        <ul>
          CCCC&trade;
        </ul>
        <ul>
          Gemmfiles&trade;
        </ul>
        <ul>
          Openbook&trade;
        </ul>
        <ul>
          Chinawest&trade;
        </ul>
        <ul>
          CD/CS&trade;
        </ul>
        <ul>
          PRS&trade;
        </ul>
        <ul>
          Psicologia
        </ul>
        <ul>
          Popular&trade;
        </ul>
      </li>
    </div>

    <span>Hausfile&trade; - 2023</span>
  </footer>
</template>

<script setup>
const props = defineProps({
  canResetPassword: Boolean,
  status: String,
  form: Object,
  errors: Object,
});

const form = useForm(props.form);
</script>

<style lang="scss" scoped>
.backblue {
  background: #4a7895;
}
</style>