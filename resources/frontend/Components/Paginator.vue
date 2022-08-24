<template>
  <nav v-if="paginate.last_page > 1">
    <ul>
      <li>
        <Link :href="paginate.first_page_url" v-if="paginate.prev_page_url"
          >&laquo;</Link
        >
      </li>
      <li>
        <Link :href="paginate.prev_page_url" v-if="paginate.prev_page_url"
          >&lsaquo;</Link
        >
      </li>
      <li>
        <span>{{ paginate.current_page }}/{{ paginate.last_page }}</span>
      </li>
      <li>
        <Link :href="paginate.next_page_url" v-if="paginate.next_page_url"
          >&rsaquo;</Link
        >
      </li>
      <li>
        <Link :href="paginate.last_page_url" v-if="paginate.next_page_url"
          >&raquo;</Link
        >
      </li>
    </ul>
  </nav>
</template>

<script setup>
const prop = defineProps({
  paginate: Object,
});
</script>

<style lang='scss' scoped>
nav {
  @apply tw-text-xl;

  ul {
    @apply tw-flex tw-justify-center;

    li {
      @apply tw-border;

      a {
        @apply tw-p-2;
      }

      span {
        @apply tw-mx-2;
      }
    }
  }
}
</style>