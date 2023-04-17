<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';

defineProps(['title','message'])

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
                        <Link :href="route('message')" class="font-medium px-5 py-1 bg-yellow-400 rounded inline-block mb-2 hover:bg-yellow-300 cursor-pointer">Back</Link>
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        From
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ message.name }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        Email
                                    </th>
                                    <td class="px-6 py-4">
                                        {{message.email}}
                                    </td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        Message
                                    </th>
                                    <td class="px-6 py-4">
                                        {{message.message}}
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
