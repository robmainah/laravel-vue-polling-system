<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import axios from 'axios';
import { ref, onMounted, defineProps } from 'vue';
import { Link, Head } from '@inertiajs/vue3';
import type { IQuestion, IPoll } from '@/types/index';

const props = defineProps<{
    poll: IPoll;
}>();

const questions = ref<IQuestion[]>([]);

const fetchQuestions = async () => {
    const { data } = await axios.get(`/polls/${props.poll.id}/questions`);
    questions.value = data;
}

const deleteQuestion = async (id: number) => {
    const response = await axios.post(`/polls/${props.poll.id}/questions/${id}`, {
        _method: 'DELETE',
    });

    if (response.status === 204) {
        fetchQuestions();
    }
}

onMounted(async () => {
    await fetchQuestions();
});
</script>

<template>
    <Head title="Poll Questions" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight capitalize">{{ poll.title }}'s Qustions</h2>
        </template>
        <div class="w-full p-4">
            <div class="flex justify-end mb-4">
                <Link :href="route('polls.questions.create', poll.id)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Qustion</Link>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Content
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
                    <tr v-if="!questions.length">
                        <td class="px-6 py-4 whitespace-nowrap" colspan="4">
                            <div class="text-sm font-medium text-gray-900 dark:text-gray-200 text-center">No questions found</div>
                        </td>
                    </tr>
                    <tr v-else v-for="(question, index) in questions" :key="question.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900 dark:text-gray-200">{{ index + 1 }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500 dark:text-gray-400 capitalize">{{ question.content }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500 dark:text-gray-400 capitalize">{{ question.created_at }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <Link :href="route('questions.choices.index', question.id)" class="bg-gray-500 hover:bg-gray-500/80 px-2 py-1 rounded-sm text-white hover:text-white/80">Choices</Link>
                            <Link :href="route('polls.questions.edit', [poll.id, question.id])" class="bg-blue-500 hover:bg-blue-500/80 px-2 py-1 rounded-sm text-white hover:text-white/80 ms-2">Edit</Link>
                            <a :href="route('polls.questions.destroy', [poll.id, question.id])" @click.prevent="deleteQuestion(question.id)" class="bg-red-500 hover:bg-red-500/80 px-2 py-1 rounded-sm text-white hover:text-white/80 ms-2">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
