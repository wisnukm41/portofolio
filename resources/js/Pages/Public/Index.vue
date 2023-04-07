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
    <section class="wavy py-32 mt-20 sm:mt-10">
      <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-center text-3xl font-bold mb-10">Skill</h2>
        <div class="md:flex md:justify-around grid grid-cols-4 gap-8">
          <div class="text-center mx-auto">
            <img
              src="/asset/html.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>HTML</p>
          </div>
          <div class="text-center mx-auto">
            <img
              src="/asset/css.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>CSS</p>
          </div>
          <div class="text-center mx-auto">
            <img
              src="/asset/javascript.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50"
            />
            <p>Javascript</p>
          </div>
          <div class="text-center mx-auto">
            <img
              src="/asset/laravel.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50 p-1"
            />
            <p>Laravel</p>
          </div>
          <div class="text-center mx-auto">
            <img
              src="/asset/boostrap.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50 p-1"
            />
            <p>Bootstrap</p>
          </div>
          <div class="text-center mx-auto">
            <img
              src="/asset/tailwindcss.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50 p-1"
            />
            <p>Tailwindcss</p>
          </div>
          <div class="text-center mx-auto">
            <img
              src="/asset/mysql.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50 p-1"
            />
            <p>MySQL</p>
          </div>
          <div class="text-center mx-auto">
            <img
              src="/asset/git.svg"
              alt=""
              srcset=""
              class="rounded-lg w-20 h-20 bg-slate-50 p-1"
            />
            <p>GIT</p>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="max-w-5xl mx-auto px-2 my-10">
        <h2 class="text-center text-3xl font-bold mb-10">Project</h2>

        <div
          v-for="project in projects" :key="project.id"
          class="md:min-h-64 rounded bg-teal-300 shadow flex flex-col-reverse md:flex-row mb-10"
        >
          <div class="p-10 w-full">
            <Link :href="route('project.show',project.slug)" class="text-2xl hover:underline cursor-pointer block">Lorem ipsum dolor sit amet.</Link >
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
              <Link :href="route('project.show',project.slug)" class="hover:underline">Details</Link>
            </div>
          </div>
          <div
            class="rounded overflow-hidden w-full sm:h-auto back-img"
            style="background-image: url('/asset/test.jpg')"
          ></div>
        </div>
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

  .back-img{
    background-size: cover;
    background-repeat: no-repeat;
  }

  @media screen and (max-width:640px) {
    .port{
      text-align: center;
      margin-top: 20px;
      margin-bottom: -20px;
    }

    .back-img{
     height: 300px;
    }

  }
</style>