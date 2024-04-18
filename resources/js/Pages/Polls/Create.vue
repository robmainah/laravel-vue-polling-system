<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import axios from 'axios';
import type { IPoll } from '@/types/index';
import { ref } from 'vue';

const form = ref<Pick<IPoll, 'title'>>({
    title: '',
});

const createPoll = async () => {
    const storeData = await axios.post('/polls', form.value)
    if (storeData.status === 201) {
        router.get('/polls');
    }
};
</script>

<template>
    <Head title="Create New Poll" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create New Poll</h2>
        </template>
        <div class="w-full p-4">
            <div class="dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg py-6 px-4">
                <form @submit.prevent="createPoll">
                    <div class="grid">
                        <div class="flex flex-col">
                            <label for="title" class="text-sm font-medium mb-2 text-white"> Title </label>
                            <input id="title" v-model="form.title" type="text" class="bg-gray-100 rounded-lg" placeholder="Enter title" />
                        </div>

                        <div class="flex mt-6">
                            <button
                                type="submit"
                                class="px-3 py-1 rounded bg-blue-500 opacity-80 hover:opacity-100 text-white disabled:cursor-not-allowed disabled:bg-success disabled:opacity-50"
                                :disabled="!form.title"
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
