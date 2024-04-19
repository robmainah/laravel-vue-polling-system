<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import axios from 'axios';
import type {IPoll} from '@/types';
import { ref, onMounted } from 'vue';
import { Link, Head } from '@inertiajs/vue3';

type PollType = IPoll & { questions_count: number };

const polls = ref<PollType[]>([]);

const fetchPolls = async () => {
    const { data } = await axios.get('/polls');
    polls.value = data;
}

const deletePoll = async (id: number) => {
    const response = await axios.post(`/polls/${id}`, {
        _method: 'DELETE',
    });

    if (response.status === 204) {
        fetchPolls();
    }
}

onMounted(async () => {
    await fetchPolls();
});
</script>

<template>
    <Head title="All Polls" />

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
                            Total Questions
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
                    <tr v-if="!polls.length">
                        <td class="px-6 py-4 whitespace-nowrap" colspan="4">
                            <div class="text-sm font-medium text-gray-900 dark:text-gray-200 text-center">No polls found</div>
                        </td>
                    </tr>
                    <tr v-else v-for="(poll, index) in polls" :key="poll.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900 dark:text-gray-200">{{ index + 1 }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500 dark:text-gray-400 capitalize">{{ poll.title }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500 dark:text-gray-400 capitalize">{{ poll.questions_count }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500 dark:text-gray-400 capitalize">{{ poll.created_at }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-2.5">
                            <Link :href="route('polls.votes.create', poll.id)" class="bg-green-500 hover:bg-gray-500/80 px-2 py-1 rounded-sm text-white hover:text-white/80">Vote</Link>
                            <Link :href="route('polls.questions.index', poll.id)" class="bg-gray-500 hover:bg-gray-500/80 px-2 py-1 rounded-sm text-white hover:text-white/80">Qustions</Link>
                            <Link :href="route('polls.edit', poll.id)" class="bg-blue-500 hover:bg-blue-500/80 px-2 py-1 rounded-sm text-white hover:text-white/80">Edit</Link>
                            <a :href="route('polls.destroy', poll.id)" @click.prevent="deletePoll(poll.id)" class="bg-red-500 hover:bg-red-500/80 px-2 py-1 rounded-sm text-white hover:text-white/80">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
