<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import type { IQuestion, IPoll, IChoice } from '@/types/index';

type QuestionType = IQuestion & {
    choices: (IChoice &  { votes_count: number })[]
};

const props = defineProps<{
    poll: IPoll;
}>();

const questions = ref<QuestionType[]>([]);

const fetchQuestions = async () => {
    const { data } = await axios.get(`/polls/${props.poll.id}/votes`);
    questions.value = data;
}

onMounted(async () => {
    Echo.private(`polls.${props.poll.id}`)
        .listen('VotesUpdated', async (e: any) => {
            await fetchQuestions();
        });

    await fetchQuestions();
});
</script>

<template>
    <Head title="Show polls total votes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ poll.title }}'s Total Votes</h2>
        </template>
        <div class="w-full p-4">
            <div class="dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg py-6 px-4">
                <div v-for="(question, index) in questions" :key="question.id" class="flex flex-col mb-8">
                    <label for="content" class="mb-2 text-white/80 capitalize">{{ index + 1 }}) {{ question.content }}</label>
                    <div class="flex gap-4 text-white/80 ms-6 mb-1 uppercase text-blue-500 underline">
                        <div>choice</div>
                        <div>:</div>
                        <div>total</div>
                    </div>
                    <div v-for="choice in question.choices" :key="choice.id" class="flex flex-row gap-2 ms-6">
                        <div class="mb-2 text-white/80 -mt-1 capitalize">{{ choice.content }} : {{ choice.votes_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
