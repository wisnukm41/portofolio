<template>
    <div
          class="md:min-h-64 rounded bg-teal-300 border border-teal-300 flex flex-col-reverse md:flex-row mb-10"
        >
          <div class="p-10 w-full">
            <Link :href="route('project.show',project.slug)" class="text-2xl hover:underline cursor-pointer block">{{ project.name }}</Link >
            <div class="rounded-full my-1 px-2 py-1 text-sm bg-teal-300 border-white border-2 inline-block capitalize" v-if="project.type === 'personal project'">{{ project.type }}</div>
            <div class="rounded-full my-1 px-2 py-1 text-sm bg-green-300 inline-block capitalize border-white border-2" v-if="project.type === 'client project'">{{ project.type }}</div>
            <div class="rounded-full my-1 px-2 py-1 text-sm bg-red-300 inline-block capitalize border-white border-2" v-if="project.type === 'tutorial project'">{{ project.type }}</div>
            <p class="text-sm text-justify h-40">
              {{ project.short }}
            </p>
            <p>{{ project.tags }}</p>
            <div class="mt-5">
              <a v-if="project.demo"
                :href="project.demo"
                class="mr-3 py-2 px-5 rounded-full border-2 border-black hover:border-teal-600 hover:bg-white ease-in duration-200"
                target="_blank"
                >Demo</a
              >
              <a
                v-if="project.git"
                :href="project.git"
                class="mr-3 py-2 px-5 rounded-full border-2 border-black hover:border-teal-600 hover:bg-white ease-in duration-200"
                target="_blank"
                >Code</a
              >
              <Link :href="route('project.show',project.slug)" class="hover:underline">Details</Link>
            </div>
          </div>
          <div
            class="rounded overflow-hidden w-full sm:h-auto back-img bg-cover bg-no-repeat bg-center"
            :style="project.images[0] === undefined ? `background-image: url('/asset/logo.jpg')` : `background-image: url(${ baseUrl() + project.images[0].image}`"
          ></div>
        </div>
</template>

<script setup>
    const props = defineProps(['project']);

    import { Link } from "@inertiajs/vue3";

     function baseUrl(){
      return window.location.origin + '/storage/';
    }
</script>

<style scoped>

  @media screen and (max-width:640px) {

    .back-img{
     height: 300px;
    }
  }
</style>