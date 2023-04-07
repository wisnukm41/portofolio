<template>
    <Link :href="href" class="text-xl hover:opacity-75" :class="class">
        <slot/>
    </Link>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';

    defineProps(['href','class']);
</script>
