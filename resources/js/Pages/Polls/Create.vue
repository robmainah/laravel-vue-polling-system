<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import axios from 'axios';
import type {IPoll} from '@/types';
import { ref } from 'vue';

const polls = ref<IPoll[]>([]);

axios.get('/polls')
    .then(({data}) => {
        console.log(data);
        polls.value = data;
    });
</script>

<template>
    <Head title="Polls" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Polls</h2>
        </template>
        <div class="w-full p-4">
            <div class="flex justify-end mb-4">
                <Link :href="route('polls.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Poll</Link>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">

            </div>
        </div>
    </AuthenticatedLayout>
</template>
