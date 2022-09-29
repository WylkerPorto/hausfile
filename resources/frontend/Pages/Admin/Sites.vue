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
          <Link :href="route('editar.site', site.uid)" class="q-btn">
            <i-mdi-edit />
          </Link>
          <q-btn @click="show(site.uid)">
            <i-mdi-image />
          </q-btn>
          <q-btn @click="showConfirm(site)">
            <i-mdi-delete />
          </q-btn>
        </div>
      </li>
    </ul>
  </section>
  <Paginator :paginate="sites" />
  <ImageModal :show="showImage" :uid="site" @onClose="showImage = false" />
  <DeleteModal :show="showDelete" :info="site" @onClose="removeSite" />
</template>

<script setup>
const props = defineProps({
  title: String,
  sites: Object,
});
// import { Inertia } from "@inertiajs/inertia";
import moment from "moment";
let showImage = ref(false);
let showDelete = ref(false);
let site = ref();

function show(site) {
  this.site = site;
  this.showImage = true;
}

function showConfirm(site) {
  this.site = site;
  this.showDelete = true;
}

function removeSite(confirmation) {
  try {
    if (confirmation) {
      Inertia.delete(`/site/${site.value.uid}`);
    }
  } catch (error) {
    console.log("erro =>", error);
  } finally {
    showDelete.value = false;
  }
}
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
  @apply tw-flex tw-flex-nowrap tw-p-2 tw-justify-between hover:tw-bg-neutral-100;

  div:first-child {
    p {
      @apply tw-text-2xl tw-font-thin tw-text-blue-900 tw-mb-0;
    }

    span {
      @apply tw-text-gray-500 tw-text-xs;
    }

    a {
      @apply tw-text-lime-800 tw-block;

      svg {
        @apply tw-inline;
      }
    }
  }

  .buttongroup {
    @apply tw-whitespace-nowrap tw-space-x-0.5;

    a,
    button {
      @apply tw-px-3 tw-rounded;

      svg {
        @apply tw-inline tw-text-white;
      }
    }

    a {
      @apply tw-bg-blue-500 hover:tw-bg-blue-600 tw-inline-block;
    }

    button {
      @apply tw-bg-yellow-400 hover:tw-bg-yellow-500;

      &:last-child {
        @apply tw-bg-red-500 hover:tw-bg-red-600;
      }
    }
  }
}
</style>