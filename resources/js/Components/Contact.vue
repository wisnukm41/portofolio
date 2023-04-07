<template>
    <div class="fixed inset-0 bg-black z-10 bg-opacity-50 flex justify-center items-center" @click.self="$emit('toggleContact')">
        <div class="bg-white mx-3 rounded-lg relative max-w-screen-md p-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute right-4 cursor-pointer" @click="$emit('toggleContact')">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <h3 class="text-2xl text-center mb-2">Contact Me</h3>
            <div class="my-2">
                <label for="name">Name</label>
                <input type="text" class="w-full" placeholder="your name" id="name">
            </div>
            <div class="my-2">
                <label for="email">Email</label>
                <input type="email" class="w-full" placeholder="your email" id="email">
            </div>
            <div class="my-2">
                <label for="message" class="block">Message</label>
                <textarea id="message" cols="40" rows="5" class="resize-none" placeholder="your message"></textarea>
            </div>
            <button class="bg-teal-300 py-2 px-4 rounded-lg">Send</button>
        </div>
    </div>
</template>

<script setup>
    import { onMounted, onUnmounted } from 'vue';
  
    onMounted( () => {document.getElementsByTagName('body')[0].style.overflow = 'hidden';})
    onUnmounted( () => {document.getElementsByTagName('body')[0].style.overflow = 'visible';})
  
</script>

<style>

</style>