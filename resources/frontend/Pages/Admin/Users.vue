<template layout='Dashboard'>
  <Head :title="title" />
  <section>
    <div>
      <Link :href="route('criar.usuario')" class="q-btn">
        <i-mdi-user />
        Novo usuário
      </Link>
    </div>
    <ul>
      <li
        v-for="usuario in usuarios.data"
        :key="usuario.uid"
        v-bind:class="{ admin: usuario.is_admin }"
      >
        <div>
          <p>Nome: {{ usuario.name }}</p>
          <p>Email: {{ usuario.email }}</p>
          <span>Criado: {{ moment(usuario.created_at).format("L") }}</span>
        </div>
        <div class="buttongroup">
          <Link :href="route('editar.usuario', usuario.uid)">
            <i-mdi-edit />
          </Link>
          <Link :href="route('remover.usuario', usuario.uid)">
            <i-mdi-delete />
          </Link>
        </div>
      </li>
    </ul>
  </section>
  <Paginator :paginate="usuarios" />
</template>

<script setup>
const props = defineProps({
  title: String,
  usuarios: Object,
});
import moment from "moment";
</script>

<style lang="scss" scoped>
section > div {
  @apply tw-mb-3 tw-text-white tw-text-right;

  a {
    @apply tw-bg-green-500 hover:tw-bg-green-600 tw-inline-block hover:tw-text-white;

    svg {
      @apply tw-inline;
    }
  }
}
li {
  @apply tw-flex tw-flex-nowrap tw-p-2 tw-mb-2 tw-justify-between hover:tw-bg-neutral-100;

  &.admin {
    @apply tw-border-yellow-400 tw-border;
  }

  div:first-child {
    p {
      @apply tw-text-2xl tw-font-thin tw-text-blue-900 tw-mb-0;

      &:nth-child(2) {
        @apply tw-text-gray-600 tw-text-sm;
      }
    }

    span {
      @apply tw-text-gray-500 tw-text-xs;
    }
  }

  .buttongroup {
    @apply tw-whitespace-nowrap;

    a {
      @apply tw-px-2 tw-py-1 tw-border;

      svg {
        @apply tw-inline tw-text-white;
      }
    }

    a {
      @apply tw-bg-blue-500 hover:tw-bg-blue-600 tw-inline-block;

      &:last-child {
        @apply tw-bg-red-500 hover:tw-bg-red-600;
      }
    }
  }
}
</style>