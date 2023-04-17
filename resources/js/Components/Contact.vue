<template>
    <div class="fixed inset-0 bg-black z-10 bg-opacity-50 flex justify-center items-center" @click.self="$emit('toggleContact')">
        <div class="bg-white mx-3 rounded-lg relative p-5 sm:w-[768px]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute right-4 cursor-pointer" @click="$emit('toggleContact')">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <h3 class="text-2xl text-center mb-2">Contact Me</h3>
            <form @submit.prevent="form.post(route('message.create'), {onSuccess: () => { form.reset();  successMessage = 'Message Sent' }})">
            <div class="my-2">
                <label for="name">Name</label>
                <input type="text" class="w-full" placeholder="your name" id="name" v-model="form.name" @change="resetMessage">
                <InputError :message="form.errors.name" />
            </div>
            <div class="my-2">
                <label for="email">Email</label>
                <input type="text" class="w-full" placeholder="your email" id="email" v-model="form.email" @change="resetMessage">
                <InputError :message="form.errors.email" />
            </div>
            <div class="my-2">
                <label for="message" class="block">Message</label>
                <textarea id="message" rows="5" class="resize-none w-full" placeholder="your message" v-model="form.message" @change="resetMessage"></textarea>
                <InputError :message="form.errors.message" />
            </div>
            <button class="bg-teal-300 py-2 px-4 rounded-lg">Send</button> <span class="text-green-400 inline-block ml-2" v-if="successMessage">{{successMessage}}</span>
            </form>
        </div>
    </div>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3';
    import { onMounted, onUnmounted, ref } from 'vue';
    import InputError from '@/Components/InputError.vue';

    onMounted( () => {document.getElementsByTagName('body')[0].style.overflow = 'hidden';})
    onUnmounted( () => {document.getElementsByTagName('body')[0].style.overflow = 'visible';})
    
    const successMessage = ref("");

    const form = useForm({
        name : "",
        email : "",
        message : ""
    });

    function resetMessage(){
        successMessage.value = "";
    }

</script>

<style>

</style>