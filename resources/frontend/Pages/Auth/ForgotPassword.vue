<template layout="Default">
  <Head title="Forgot Password" />

  <div class="tw-mb-6 tw-text-gray-600">
    Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail
    e nós lhe enviaremos um link de redefinição de senha que permitirá que você
    escolha uma nova.
  </div>

  <form
    class="tw-flex-col tw-space-y-2"
    @submit.prevent="form.post(route('password.email'))"
  >
    <q-input
      id="email"
      v-model="form.email"
      :error-message="errors.email"
      :error="!!errors.email"
      label="Email"
      type="email"
      required
      autofocus
      autocomplete="username"
      outlined
    />

    <div class="tw-flex tw-items-center tw-justify-end">
      <q-btn :disabled="form.processing" type="submit" color="primary">
        Link de redefinição de senha de email
      </q-btn>
    </div>
  </form>
</template>

<script setup>
const props = defineProps({
  form: Object,
  errors: Object,
});

const form = useForm(props.form);
</script>
