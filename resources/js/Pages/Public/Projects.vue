<template>
    <PublicLayout :title="title">
        <section>
        <div class="max-w-5xl mx-auto px-2 my-10">
          <h2 class="text-center text-4xl font-bold mb-10">My Projects</h2>
        
          <div
            v-if="projects" v-for="project in projects.data" :key="project.id"
            class="md:min-h-64 rounded bg-teal-300 shadow flex flex-col-reverse md:flex-row mb-10"
          >
            <div class="p-10 w-full">
              <Link :href="route('project.show', project.slug)" class="text-2xl hover:underline cursor-pointer block">{{ project.name }}</Link >
              <div class="rounded-full my-1 px-2 py-1 text-sm bg-teal-300 inline-block capitalize" v-if="project.type === 'personal project'">{{ project.type }}</div>
              <div class="rounded-full my-1 px-2 py-1 text-sm bg-green-300 inline-block capitalize" v-if="project.type === 'client project'">{{ project.type }}</div>
              <div class="rounded-full my-1 px-2 py-1 text-sm bg-red-300 inline-block capitalize" v-if="project.type === 'tutorial project'">{{ project.type }}</div>
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
                  v-if="project.code"
                  :href="project.code"
                  class="mr-3 py-2 px-5 rounded-full border-2 border-black hover:border-teal-600 hover:bg-white ease-in duration-200"
                  target="_blank"
                  >Code</a
                >
                <Link :href="route('project.show', project.slug)" class="hover:underline">Details</Link>
              </div>
            </div>
          <div
            class="rounded overflow-hidden w-full sm:h-auto back-img"
            style="background-image: url('/asset/test.jpg')"
          ></div>
        </div>

        <div class="text-center">
          <pagination :links="projects.links" />
        </div>
      </div>
        </section>
    </PublicLayout>
</template>

<script setup>
  import PublicLayout from '@/Layouts/PublicLayout.vue'
  import Pagination from '@/Components/Pagination.vue';
  import { Link } from '@inertiajs/vue3';

  const props = defineProps(['title','projects']);
</script>

<style scoped>
      .back-img{
    background-size: cover;
    background-repeat: no-repeat;
  }

  @media screen and (max-width:640px) {
    .back-img{
     height: 300px;
    }
  }
</style>