<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import type { IQuestion, IPoll, IChoice } from '@/types/index';

type QuestionType = IQuestion & { choices: IChoice[] };

const props = defineProps<{
    poll: IPoll;
}>();

const questions = ref<QuestionType[]>([]);

const form = ref({});

const setForm = () => {
    const obj = questions.value.reduce((acc, question) => {
        acc[`question_${question.id}`] = '';
        return acc;
    }, {});

    form.value = obj;
};

const fetchQuestions = async () => {
    const { data } = await axios.get(`/polls/${props.poll.id}/votes/create`);
    questions.value = data;
    setForm();
}

const handleSubmit = async () => {
    const response = await axios.post(`/polls/${props.poll.id}/votes`, form.value)
    if (response.status === 201) {
        router.get(`/polls`);
    }
};

onMounted(async () => {
    await fetchQuestions();
});
</script>

<template>
    <Head title="Create New Question" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ poll.title }}'s vote</h2>
        </template>
        <div class="w-full p-4">
            <div class="dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg py-6 px-4">
                <div v-if="!questions.length">
                    <p class="flex justify-center text-red-500">Please first create questions and choices</p>
                </div>
                <form v-else @submit.prevent="handleSubmit">
                    <div class="grid">
                        <div v-for="(question, index) in questions" :key="question.id" class="flex flex-col mb-8">
                            <label for="content" class="mb-2 text-white/80 capitalize">{{ index + 1 }}) {{ question.content }}</label>
                            <div v-for="choice in question.choices" :key="choice.id" class="flex flex-row gap-2 ms-6">
                                <input :id="'content_' + choice.id" type="radio" v-model="form[`question_${question.id}`]"  :value="choice.id" class="bg-white/80 cursor-pointer" />
                                <label :id="'content_' + choice.id" class="mb-2 text-white/80 -mt-1 capitalize">{{ choice.content }}</label>
                            </div>
                        </div>

                        <div class="flex mt-6">
                            <button
                                type="submit"
                                class="px-3 py-1 rounded bg-blue-500 opacity-80 hover:opacity-100 text-white disabled:cursor-not-allowed disabled:bg-success disabled:opacity-50"
                            >
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
