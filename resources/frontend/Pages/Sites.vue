<template layout='Dashboard'>
  <Head :title="title" />
  <section>
    <div>
      <Link :href="route('criar.site')" class="q-btn">
        <i-mdi-web />
        Novo site
      </Link>
    </div>
    <ul>
      <li v-for="site in sites.data" :key="site.uid">
        <div>
          <p>Nome: {{ site.name }}</p>
          <span>Criado: {{ moment(site.created_at).format("L") }}</span>
          <a :href="site.url" target="_blank">Ver <i-mdi-open-in-new /></a>
        </div>
        <div class="buttongroup">
          <Link :href="route('editar.site', site.uid)"><i-mdi-edit /></Link>
          <Link :href="route('remover.site', site.uid)"><i-mdi-delete /></Link>
        </div>
      </li>
    </ul>
  </section>
  <Paginator :paginate="sites" />
</template>

<script setup>
const props = defineProps({
  title: String,
  sites: Object,
});
import moment from "moment";
</script>

<style lang="scss" scoped>
section > div {
  @apply tw-mb-3 tw-text-white tw-text-right;

  a {
    @apply tw-bg-green-500 hover:tw-bg-green-600 tw-inline-block;

    svg {
      @apply tw-inline;
    }
  }
}
li {
  @apply tw-flex tw-flex-nowrap tw-p-2 tw-justify-between hover:tw-bg-neutral-100;

  div:first-child {
    p {
      @apply tw-text-2xl tw-font-thin tw-text-blue-900 tw-mb-0;
    }

    span {
      @apply tw-text-gray-500 tw-text-sm;
    }

    a {
      @apply tw-text-lime-800 tw-block;

      svg {
        @apply tw-inline;
      }
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