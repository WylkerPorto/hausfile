<template>
  <Head title="Bem vindo" />
  <header class="tw-flex tw-justify-between">
    <img src="imgs/logo.png" alt="logo" class="tw-w-24 tw-h-auto" />

    <nav class="tw-pr-5 tw-pt-8 tw-flex tw-space-x-4 tw-text-lg">
      <Link
        v-if="$page.props.auth.user"
        :href="route('dashboard')"
        class="tw-text-gray-200 tw-font-thin tw-font-sans"
      >
        Dashboard
      </Link>

      <template v-else>
        <Link
          :href="route('register')"
          class="tw-text-gray-200 tw-font-thin tw-font-sans"
        >
          Cadastrar
        </Link>

        <Link
          :href="route('login')"
          class="tw-text-gray-200 tw-font-thin tw-font-sans"
        >
          Logar
        </Link>
      </template>
    </nav>
  </header>

  <hr class="tw-mb-5 tw-border-cyan-200" />

  <main class="tw-text-gray-200 tw-font-thin tw-font-sans tw-bg-zinc-800">
    <section>
      <article class="tw-text-justify">
        <img src="imgs/barber1.png" alt="barber1" />
        <p>
          <span class="tw-font-serif tw-text-5xl">S</span>eja bem-vindo à nossa
          barbearia, onde oferecemos cortes personalizados e serviços de
          barbearia de alta qualidade. Com anos de experiência e um time de
          barbeiros altamente treinados, garantimos a satisfação dos nossos
          clientes em cada visita. Deixe-nos cuidar da sua aparência e
          proporcionar um momento de relaxamento e conforto.
        </p>
      </article>

      <hr class="tw-mb-5 tw-border-cyan-200 md:tw-hidden tw-block" />

      <article class="tw-text-justify">
        <img src="imgs/barber2.png" alt="barber2" />
        <p>
          <span class="tw-font-serif tw-text-5xl">A</span>qui garantimos que
          cada visita seja uma experiência única e satisfatória. Nós ouvimos
          suas necessidades e desejos para criar o visual perfeito, combinando
          habilidade técnica e arte para alcançar resultados incríveis.
        </p>
      </article>

      <hr class="tw-mb-5 tw-border-cyan-200 md:tw-hidden tw-block" />
    </section>

    <hr class="tw-mb-5 tw-border-cyan-200 tw-hidden md:tw-block" />

    <section class="tw-text-center">
      <h4>Agende hoje seu horário</h4>
      <p>e venha experiência essa mudança com a gente.</p>
    </section>
  </main>
</template>

<script setup>
defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
});
</script>

<style lang="scss" scoped>
</style>
