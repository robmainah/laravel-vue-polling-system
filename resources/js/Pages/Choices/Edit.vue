<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import axios from 'axios';
import { ref, defineProps } from 'vue';
import type { IChoice, IQuestion } from '@/types/index';

const props = defineProps<{
    choice: IChoice & {question: IQuestion};
}>();

const form = ref<Pick<IChoice, 'content'>>({
    content: props.choice.content,
});

const updateChoice = async (id: number) => {
    const response = await axios.put(`/questions/${props.choice.question.id}/choices/${id}`, form.value)
    if (response.status === 200) {
        router.get(`/questions/${props.choice.question.id}/choices`);
    }
};
</script>

<template>
    <Head title="Update Choice" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Update Choice</h2>
        </template>
        <div class="w-full p-4">
            <div class="dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg py-6 px-4">
                <form @submit.prevent="updateChoice(choice.id)">
                    <div class="grid">
                        <div class="flex flex-col">
                            <label for="content" class="text-sm font-medium mb-2 text-white">Content</label>
                            <input id="content" v-model="form.content" type="text" class="bg-gray-100 rounded-lg" placeholder="Enter content" />
                        </div>

                        <div class="flex mt-6">
                            <button
                                type="submit"
                                class="px-3 py-1 rounded bg-blue-500 opacity-80 hover:opacity-100 text-white disabled:cursor-not-allowed disabled:bg-success disabled:opacity-50"
                                :disabled="!form.content"
                            >
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
