<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['title','project','images','errors'])

const form = useForm({
    image : "",
    priority : "",
});

console.log(props.images)

const url = ref(null)
const photo = ref(null)

const previewImage = (e) => {
    const file = e.target.files[0];
    url.value = URL.createObjectURL(file);
}

const submit = () => {
    if (photo.value) {
        form.image = photo.value.files[0];
    }

    form.post(route("image.store", props.project.id),{ onSuccess: () => { photo.value = null; url.value = null ; form.reset() }});
}

</script>

<template>
    <Head :title="title" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Project Images for {{ project.name }}</h2>
        </template>
        
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <Link :href="route('dashboard')" class="font-medium px-5 py-1 bg-yellow-400 rounded inline-block mb-2 hover:bg-yellow-300 cursor-pointer">Back</Link>
                        <form @submit.prevent="submit">
                            <div>
                                <div class="flex sm:flex-row gap-2">
                                    <div class="flex-auto">
                                        <label for="File">Image Upload</label>
                                        <input
                                        type="file"
                                        @change="previewImage"
                                        ref="photo"
                                        class="
                                            w-full
                                            px-4
                                            py-2
                                            mt-2
                                            border
                                            rounded-md
                                            focus:outline-none
                                            focus:ring-1
                                            focus:ring-blue-600
                                        "
                                        />
                                        <div
                                            v-if="errors.image"
                                            class="font-bold text-red-600"
                                        >
                                            {{ errors.image }}
                                        </div>
                                    </div>
                                    <div class="flex-none">
                                        <label for="order">Order</label>
                                        <input type="number" v-model="form.priority" class="  
                                            w-full       
                                            px-4
                                            py-2
                                            mt-2
                                            border
                                            border-gray-200
                                            rounded-md
                                            focus:outline-none
                                            focus:ring-1
                                            focus:ring-blue-600
                                        ">
                                        <div
                                            v-if="errors.priority"
                                            class="font-bold text-red-600"
                                        >
                                            {{ errors.priority }}
                                        </div>
                                    </div>
                                </div>
              
                                <img
                                    v-show="url"
                                    :src="url"
                                    class="w-full mt-4 h-80"
                                />
                            </div>

                            <div class="flex flex-row-reverse mt-4">
                                <button
                                    class="
                                    font-medium px-5 py-1 bg-green-400 rounded inline-block mb-2 hover:bg-green-300
                                    "
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <!-- <Link :href="route('image.create', project.id)" class="font-medium px-5 py-1 bg-green-400 rounded inline-block mb-2 hover:bg-green-300">Add</Link> -->
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Priority
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b" v-for="image in images" :key="image.id">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        <img :src="'/storage/' + image.image" class="max-w-xl max-h-96">
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ image.priority ? image.priority : 'No Priority'}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <!-- <Link :href="route('project.edit',project.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline pr-2">Edit</Link> -->
                                        <Link :href="route('image.destroy', [project.id, image.id])" method="delete" class="font-medium text-red-600 dark:text-red-500 hover:underline pr-2">Remove</Link> 
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
