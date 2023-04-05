<template>
  <NavLink
    class="tw-sticky tw-top-0 tw-z-50 tw-w-full"
    :isLogged="!!$attrs.auth.user"
    :user="$attrs.auth.user"
  />
  <slot />
  <Toasts />
</template>

<script setup>
defineProps({});
</script>