<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';

defineProps(['title','messages'])

</script>

<template>
    <Head :title="title" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Messages</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                   
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        From
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="message in messages" :key="message.id" :class="message.read ? 'bg-white border-b' : 'bg-gray-50 border-b'">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{message.name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{message.email}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <Link :href="route('message.show', message.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline pr-2">Details</Link>
                                        <Link :href="route('message.delete', message.id)" method="delete" class="font-medium text-red-600 dark:text-red-500 hover:underline pr-2">Remove</Link>
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
