<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';

defineProps(['title','projects'])

const form = useForm({
    name : "",
    type : "",
    tags : "",
    demo : "",
    git : "",
    short : "",
});

</script>

<template>
    <Head :title="title" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                   
                    <Link :href="route('project.create')" class="font-medium px-5 py-1 bg-green-400 rounded inline-block mb-2 hover:bg-green-300">Add</Link>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Project Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tags
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b" v-for="project in projects" :key="project.id">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{project.name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{project.tags}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <Link :href="route('project.edit',project.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline pr-2">Edit</Link>
                                        <Link :href="route('project.destroy', project.id)" method="delete" class="font-medium text-red-600 dark:text-red-500 hover:underline pr-2">Remove</Link>
                                        <Link :href="route('image', project.id)" class="font-medium text-green-600 dark:text-green-500 hover:underline">Image</Link>
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
