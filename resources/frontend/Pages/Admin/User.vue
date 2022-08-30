<template layout='Dashboard'>
  <Head :title="title" />
  <form
    @submit.prevent="
      form.uid
        ? form.put(route('editar.usuario', form.uid))
        : form.post(route('criar.usuario'))
    "
  >
    <q-toggle
      v-model="form.is_admin"
      label="Usuário administrador"
      :error-message="errors.url"
      :error="!!errors.url"
    />
    <q-input
      id="name"
      v-model="form.name"
      :error-message="errors.name"
      :error="!!errors.name"
      label="Nome"
      type="text"
      autofocus
      autocomplete="name"
      required
      outlined
    />
    <q-input
      id="email"
      v-model="form.email"
      :error-message="errors.email"
      :error="!!errors.email"
      label="Email"
      type="email"
      autocomplete="email"
      required
      outlined
    />
    <q-input
      v-if="!form.uid"
      id="password"
      v-model="form.password"
      :error-message="errors.password"
      :error="!!errors.password"
      label="Senha"
      type="password"
      autocomplete="password"
      required
      outlined
    />
    <q-select
      id="site_id"
      v-model="form.site_id"
      :options="sites"
      option-value="uid"
      option-label="name"
      :error-message="errors.site_id"
      :error="!!errors.site_id"
      label="Site"
      emit-value
      map-options
      outlined
    />
    <div>
      <Link
        :disabled="form.processing"
        :href="route('usuarios')"
        class="q-btn q-btn--flat"
      >
        Cancelar
      </Link>
      <q-btn :disabled="form.processing" type="submit" color="primary">
        <i-mdi-content-save />
        Salvar
      </q-btn>
    </div>
  </form>
</template>

<script setup>
const props = defineProps({
  title: String,
  form: Object,
  sites: Object,
  errors: Object,
});

const form = useForm(props.form);
form.is_admin = !!form.is_admin;
</script>

<style lang='scss' scoped>
</style>