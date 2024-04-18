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
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Polls</h2>
        </template>
        <div class="w-full p-4">
            <div class="flex justify-end mb-4">
                <Link :href="route('polls.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Poll</Link>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Date Created
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <tr v-for="(poll, index) in polls" :key="poll.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900 dark:text-gray-200">{{ index + 1 }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500 dark:text-gray-400 capitalize">{{ poll.title }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500 dark:text-gray-400 capitalize">{{ poll.created_at }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <Link :href="route('polls.show', 1)" class="bg-blue-500 px-2 py-1 rounded-sm text-white hover:text-indigo-900">View</Link>
                            <Link :href="route('polls.edit', 1)" class="bg-red-500 px-2 py-1 rounded-sm text-white hover:text-indigo-900 ms-2">Delete</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
