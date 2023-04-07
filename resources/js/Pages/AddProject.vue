
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';
import CKEditor from '@/Components/CKEditor.vue'
import InputError from '@/Components/InputError.vue'

const form = useForm({
    name : "",
    type : "personal project",
    tags : "",
    demo : "",
    git : "",
    short : "",
    content : "",
    priority : "",
});

const updateContent = (content) => {
    form.content = content;
}

defineProps(['title']);

</script>

<template>
    <Head :title="title" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Projects</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <Link :href="route('dashboard')" class="font-medium px-5 py-1 bg-yellow-400 rounded inline-block mb-2 hover:bg-yellow-300 float-right cursor-pointer">Back</Link>
                    <div class="text-gray-900 text-xl mb-2">New Project</div>
                    <form @submit.prevent="form.post(route('project.store'))">
                        <div>
                            <label for="project_name" class="block mb-2 text-sm font-medium text-gray-900 ">Project Name</label>
                            <input v-model="form.name" type="text" id="project_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="project name">
                        </div>
                        <InputError :message="form.errors.name" class="mb-2" />

                        <div>
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Type</label>
                            <select v-model="form.type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="personal project">Personal Project</option>
                                <option value="client project">Client Project</option>
                                <option value="tutorial project">Tutorial Project</option>
                            </select>
                        </div>

                        <div>
                            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 ">Project Tags</label>
                            <input v-model="form.tags" type="text" id="tags" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="project tags">
                        </div>
                        <InputError :message="form.errors.tags" class="mb-2" />
                        <div>
                            <label for="demo" class="block mb-2 text-sm font-medium text-gray-900 ">Demo Link (Optional)</label>
                            <input v-model="form.demo" type="text" id="demo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="demo link">
                        </div>
                        <InputError :message="form.errors.demo" class="mb-2" />
                        <div>
                            <label for="git" class="block mb-2 text-sm font-medium text-gray-900 ">Git Link (Optional)</label>
                            <input v-model="form.git" type="text" id="git" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="git link">
                        </div>
                        <InputError :message="form.errors.git" class="mb-2" />
                        <div>
                            <label for="short" class="block mb-2 text-sm font-medium text-gray-900">Short Desc (200 char)</label>
                            <textarea v-model="form.short" id="short" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your short desc" maxlength="200"></textarea>
                        </div>
                        <InputError :message="form.errors.short" class="mb-2" />
                        <div>
                            <label for="order" class="block mb-2 text-sm font-medium text-gray-900 ">Project Priority (Optional)</label>
                            <input v-model="form.priority" type="number" id="order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="order number">
                        </div>
                        <InputError :message="form.errors.priority" class="mb-2" />
                        <div>
                            <label class="block mb-2 mt-2 text-sm font-medium text-gray-900">Project Description</label>
                            <CKEditor @change="updateContent"/>
                        </div>
                        <InputError :message="form.errors.content" class="mb-2" />

                        <button class="py-2 px-3 bg-cyan-500 rounded text-white hover:bg-cyan-600">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
    form > div{
        margin: 0.75rem 0;
    }
</style>
