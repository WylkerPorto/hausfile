<template layout='Dashboard'>
  <Head :title="title" />
  <form
    @submit.prevent="
      form.post(form.uid ? route('editar.site', form.uid) : route('criar.site'))
    "
  >
    <q-toggle
      v-model="form.active"
      label="Site ativo"
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
      id="url"
      v-model="form.url"
      :error-message="errors.url"
      :error="!!errors.url"
      label="Url"
      type="url"
      autocomplete="url"
      required
      outlined
    />

    <q-input
      id="tags"
      v-model="form.tags"
      :error-message="errors.tags"
      :error="!!errors.tags"
      label="Meta Tags"
      type="textarea"
      autocomplete="current-tags"
      outlined
    />

    <q-input
      id="description"
      v-model="form.description"
      :error-message="errors.description"
      :error="!!errors.description"
      label="Descrição"
      type="textarea"
      autocomplete="current-description"
      outlined
    />
    <div>
      <Link
        :disabled="form.processing"
        :href="route('sites')"
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
  site: Object,
  errors: Object,
});

const form = useForm(props.site);
form.active = !!form.active;
</script>

<style lang='scss' scoped>
</style>