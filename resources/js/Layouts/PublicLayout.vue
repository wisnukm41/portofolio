<template>
    <Head :title="title" />
    <div>
        <MenuIcon class="sm:hidden flex m-8 scale-150 hover:cursor-pointer" @click="toggleMenu"/>
        <div class="hidden sm:hidden">
            <PublicNavLink class="p-5 border block" :href="route('home')">
                Home
            </PublicNavLink>
            <PublicNavLink class="p-5 border block" :href="route('projects')">
                Projects
            </PublicNavLink>
            <a href="contanct" @click.prevent="contact = !contact" class="block p-5 border text-xl hover:opacity-75">Contact Me</a>
        </div>
        <nav class="sm:flex hidden py-4 justify-between max-w-6xl m-auto px-2">
        <div class="m-6">
            <PublicNavLink class="mr-6" :href="route('home')">
                Home
            </PublicNavLink>
            <PublicNavLink :href="route('projects')">
                Projects
            </PublicNavLink>
        </div>
        <a href="contact" @click.prevent="contact = !contact" class="m-6 text-xl hover:opacity-75">Contact Me</a>
        </nav>
        <slot />
        <Contact v-if="contact" @toggleContact="contact = !contact"/>
        <section class="wavy-footer flex justify-between">
        <div>
            <a href="https://www.linkedin.com/in/wisnukm41/" class="inline-block mr-3" target="_blank">
            <img :src="baseUrl() + '/asset/linkedin-icon-2.svg'" alt="" class="w-10" />
            </a>
            <a href="https://github.com/wisnukm41" class="inline-block mr-3" target="_blank">
            <img :src="baseUrl() + '/asset/github.svg'" alt="" class="w-10" />
            </a>
            <a href="mailto:wisnu.murfa@gmail.com" class="inline-block">
            <img :src="baseUrl() + '/asset/gmail.svg'" alt="" class="w-10" />
            </a>
        </div>
        <div>&#169; 2023 by wisdev.site</div>
        </section>
    </div>
</template>

<script setup>
    import { Head } from '@inertiajs/vue3';
    import PublicNavLink from '@/Components/PublicNavLink.vue';
    import MenuIcon from '@/Components/MenuIcon.vue';
    import Contact from '@/Components/Contact.vue';
    import { ref } from 'vue';

    let contact = ref(false);

    function toggleMenu(e){
        const menuList = e.target.nextSibling.classList

        if(menuList.contains('hidden')){
            menuList.remove('hidden')
            menuList.add('mb-10')
        } else {
            menuList.add('hidden')
            menuList.remove('mb-10')
        }
    }

    function baseUrl(){
        return window.location.origin;
    }

    defineProps(['title'])
</script>

<style scoped>
    .wavy-footer {
    background: rgb(94 234 212);
    --mask-footer:
    radial-gradient(67.08px at 50% 90.00px,#000 99%,#0000 101%) calc(50% - 60px) 0/120px 100%,
    radial-gradient(67.08px at 50% -60px,#0000 99%,#000 101%) 50% 30px/120px 100% repeat-x;
    -webkit-mask: var(--mask-footer);
          mask: var(--mask-footer);
    padding: 5rem calc(2 * 4vw) 2rem;
    font-size: 1.2rem;
  }
</style>
