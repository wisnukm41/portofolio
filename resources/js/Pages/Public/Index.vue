<template>
    <PublicLayout :title="title">
        <section class="grid sm:grid-cols-2 grid-cols-1 gap-2">
      <div class="mask bg-teal-300 m-auto"></div>
      <div class="grid grid-rows-3">
        <div></div>
        <div class="port">
          <h1 class="font-bold text-4xl">Hello, my name is Wisnu</h1>
          <p class="text-xl">Junior Web Developer from Indonesia</p>
        </div>
      </div>
    </section>
    <section class="wavy py-32 mt-5 sm:mt-10">
      <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-center text-3xl font-bold mb-10">Skill</h2>
        <div class="md:flex grid grid-cols-4 gap-8">
          <div>
            <img
              src="/asset/html.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>HTML</p>
          </div>
          <div>
            <img
              src="/asset/css.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>CSS</p>
          </div>
          <div>
            <img
              src="/asset/javascript.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>Javascript</p>
          </div>
          <div>
            <img
              src="/asset/laravel.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>Laravel</p>
          </div>
          <div>
            <img
              src="/asset/vue.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>Vue JS</p>
          </div>
          <div>
            <img
              src="/asset/boostrap.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>Bootstrap</p>
          </div>
          <div>
            <img
              src="/asset/tailwindcss.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>Tailwindcss</p>
          </div>
          <div>
            <img
              src="/asset/mysql.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>MySQL</p>
          </div>
          <div>
            <img
              src="/asset/git.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>GIT</p>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="max-w-5xl mx-auto px-2 my-10">
        <h2 class="text-center text-3xl font-bold mb-10">Project</h2>
        <ProjectCard v-for="project in projects" :key="project.id" :project="project"/>
      
        <div class="text-center">
          <Link
            :href="route('projects')"
            class="py-2 px-5 rounded-full border-2 border-black hover:border-teal-600 hover:bg-teal-300 bg-white ease-in duration-200"
            >Load More</Link
          >
        </div>
      </div>
    </section>
    </PublicLayout>
</template>

<script setup>
    import PublicLayout from '@/Layouts/PublicLayout.vue'
    import ProjectCard from '@/Components/ProjectCard.vue'
    import { Link } from '@inertiajs/vue3';

    defineProps(['title','projects'])
</script>

<style scoped>
.mask {
    background-image: url("/asset/picture.png");
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;

    -webkit-mask-image: url("/asset/blob.svg");
    mask-image: url("/asset/blob.svg");
    -webkit-mask-repeat: no-repeat;
    mask-repeat: no-repeat;

    mask-size: 30rem;
    mask-repeat: no-repeat;
    mask-position: center;

    width: 20rem;
    height: 20rem;
    padding: 1rem;
  }

  img{
    padding: 2px;
  }

  .grid p {
    text-align: center;
  }

  .grid > div{
    margin-inline: auto;
  }

  .wavy {
    /* mask created with 
    https://css-generators.com/wavy-shapes/ */
    
    background: rgb(94 234 212);
  
    --mask:
        radial-gradient(85.88px at 50% 116.00px,#000 99%,#0000 101%) calc(50% - 80px) 0/160px 51% repeat-x,
        radial-gradient(85.88px at 50% -76px,#0000 99%,#000 101%) 50% 40px/160px calc(51% - 40px) repeat-x,
        radial-gradient(85.88px at 50% calc(100% - 116.00px),#000 99%,#0000 101%) calc(50% - 80px) 100%/160px 51% repeat-x,
        radial-gradient(85.88px at 50% calc(100% + 76.00px),#0000 99%,#000 101%) 50% calc(100% - 40px)/160px calc(51% - 40px) repeat-x;
      -webkit-mask: var(--mask);
              mask: var(--mask);
  }


  @media screen and (max-width:640px) {
    .port{
      text-align: center;
      margin-top: 20px;
      margin-bottom: -20px;
    }
  }
</style>