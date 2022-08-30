<template>
  <q-layout view="hHh Lpr lFf">
    <q-header class="tw-bg-primary-500 text-white">
      <q-toolbar>
        <q-btn dense flat round @click="toggleLeftDrawer">
          <i-mdi-menu class="tw-text-lg" />
        </q-btn>
        <q-toolbar-title class="tw-flex tw-items-center">
          <Link :href="route('dashboard')">
            <ApplicationLogo class="tw-block tw-h-9 tw-w-auto tw-fill-white" />
          </Link>
          <span class="tw-font-extralight tw-ml-5">{{
            $page.props.title
          }}</span>
        </q-toolbar-title>
        <q-space class="tw-hidden sm:tw-flex" />
        <q-btn-dropdown stretch flat>
          <template #label>
            <div class="row items-center no-wrap">
              <q-avatar size="26px" class="sm:tw-mr-4">
                <img :src="$page.props.auth.user.avatar" />
              </q-avatar>
              <div class="tw-hidden sm:tw-block text-center">
                {{ $page.props.auth.user.name }}
              </div>
            </div>
          </template>

          <q-list>
            <NavLink :href="route('perfil')" class="tw-w-full tw-text-left">
              <template #icon="icon">
                <i-mdi-account-circle-outline v-bind="icon" />
              </template>
              My Account
            </NavLink>
            <q-separator inset spaced />
            <NavLink
              :href="route('logout')"
              method="post"
              as="button"
              class="tw-w-full tw-text-left"
            >
              <template #icon="icon">
                <i-mdi-power-standby v-bind="icon" />
              </template>
              Logout
            </NavLink>
          </q-list>
        </q-btn-dropdown>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      side="left"
      bordered
      :width="240"
    >
      <q-scroll-area class="fit">
        <q-list>
          <NavLink
            :href="route('dashboard')"
            :active="route().current('dashboard')"
          >
            <template #icon="icon">
              <i-mdi-home v-bind="icon" />
            </template>
            Dashboard
          </NavLink>
          <NavLink :href="route('sites')" :active="route().current('sites')">
            <template #icon="icon">
              <i-mdi-web v-bind="icon" />
            </template>
            Sites
          </NavLink>
          <NavLink
            :href="route('usuarios')"
            :active="route().current('usuarios')"
          >
            <template #icon="icon">
              <i-mdi-users v-bind="icon" />
            </template>
            Usuarios
          </NavLink>
        </q-list>
      </q-scroll-area>
    </q-drawer>

    <q-page-container>
      <div class="tw-p-6">
        <slot />
      </div>
    </q-page-container>
  </q-layout>
  <Toasts />
  <q-ajax-bar
    ref="loadingIndicator"
    position="top"
    color="info"
    size="15px"
    skip-hijack
  />
  <div class="tw-w-full" v-show="load">
    <q-circular-progress
      indeterminate
      size="75px"
      :thickness="0.6"
      color="light-blue"
      center-color="grey-8"
      class="tw-fixed tw-top-1/2 tw-left-1/2"
    />
  </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";

const loadingIndicator = ref(null);
let load = ref(false);

Inertia.on("start", () => loadingIndicator.value.start());
Inertia.on("start", () => (load = true));

Inertia.on("finish", () => loadingIndicator.value.stop());
Inertia.on("finish", () => (load = false));

const leftDrawerOpen = ref(false);

const toggleLeftDrawer = () => {
  leftDrawerOpen.value = !leftDrawerOpen.value;
};
</script>

<style scoped>
div.tw-w-full {
  @apply tw-h-full tw-fixed tw-top-0 tw-left-0 tw-bg-white tw-opacity-90;
  z-index: 2000;
}
</style>