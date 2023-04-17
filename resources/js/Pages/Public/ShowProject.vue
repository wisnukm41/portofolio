<template>
    <PublicLayout :title="title">
        <section>
        <div class="max-w-5xl mx-auto px-2 my-10 min-h-[75vh]">
            <h2 class="text-4xl font-bold mb-10">{{ project.name }}</h2>
            <div class="sm:flex" v-if="previewImg">
                <div 
                  class="preview-img w-full h-96 sm:mr-1 mb-1"
                  :style="{ backgroundImage: 'url(' + previewImg + ')' }" 
                >
                  
                </div>
                <div class="flex sm:flex-col overflow-scroll w-full sm:w-auto sm:h-96 mb-2">
                  <img 
                    :src="baseUrl() + image.image" v-for="(image, index) in images" :key="image.key"
                    :class=" index === 0 ? 'w-40 h-40 object-fill p-1 rounded cursor-pointer active': 'w-40 h-40 object-fill p-1 rounded cursor-pointer'"
                    :data-image="image.image"
                    @click="changeUrl"
                  >
                </div>
            </div>
            <div>
              <div class="rounded-full my-1 px-2 py-1 sm:float-right bg-teal-300 inline-block capitalize" v-if="project.type === 'personal project'">{{ project.type }}</div>
              <div class="rounded-full my-1 px-2 py-1 sm:float-right bg-green-300 inline-block capitalize" v-if="project.type === 'client project'">{{ project.type }}</div>
              <div class="rounded-full my-1 px-2 py-1 sm:float-right bg-red-300 inline-block capitalize" v-if="project.type === 'tutorial project'">{{ project.type }}</div>
              <p class="text-xl mb-1">Tech : {{ project.tags }}</p>
              <div v-html="project.content" class="prose"></div>
            </div>

        </div>
        </section>
    </PublicLayout>
</template>

<script setup>
    import PublicLayout from '@/Layouts/PublicLayout.vue'
    import { computed, ref } from 'vue';

    const props = defineProps(['title','project','images'])
    
    
    function baseUrl(){
      return window.location.origin + '/storage/';
    }
    
    const imgUrl = ref(null);


    if(props.images[0] !== undefined){
       imgUrl.value = props.images[0].image;
    } 

    const previewImg = computed({
      get(){
        
        return imgUrl.value ? baseUrl() + imgUrl.value : null;
      }
    })

    function changeUrl(e){
      imgUrl.value = e.target.dataset.image

      const images = document.querySelectorAll('img.w-40');

      images.forEach((e)=>{
        if( e.dataset.image === imgUrl.value){
          e.classList.add('active');
        } else {
          e.classList.remove('active');
        }
      });
    }

    


</script>

<style scoped>
  .preview-img{
    background-size:100% 100%;
    background-repeat: no-repeat;
  }

  .active{
    border: 1px solid rgb(94 234 212);
  }
</style>