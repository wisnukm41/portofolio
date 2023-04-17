<template>
    <PublicLayout :title="title">
        <section>
          <div class="max-w-5xl mx-auto px-2 my-10 min-h-[75vh]">
            <h2 class="text-center text-4xl font-bold mb-10">My Projects</h2>

            <ProjectCard v-for="project in projects.data" :key="project.id" :project="project"/>
            <div class="text-center">
              <pagination :links="projects.links" />
            </div>
          </div>
        </section>
    </PublicLayout>
</template>

<script setup>
  import PublicLayout from '@/Layouts/PublicLayout.vue';
  import Pagination from '@/Components/Pagination.vue';
  import ProjectCard from '@/Components/ProjectCard.vue';
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