<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import axios from 'axios';
import type { IPoll } from '@/types';
import { ref } from 'vue';

const props = defineProps<{
    poll: IPoll;
}>();

const form = ref<Pick<IPoll, 'title'>>({
    title: props.poll.title,
});

const updatePoll = async (id: number) => {
    const storeData = await axios.put(`/polls/${id}`, form.value);

    if (storeData.status === 204) {
        router.get('/polls');
    }
};
</script>

<template>
    <Head title="Edit Poll" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Polls</h2>
        </template>
        <div class="w-full p-4">
            <div class="flex justify-end mb-4">
                <Link :href="route('polls.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Poll</Link>
            </div>
            <div class="dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg py-6 px-4">
                <form @submit.prevent="updatePoll(poll.id)">
                    <div class="grid">
                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium mb-2 text-white"> Title </label>
                            <input id="name" v-model="form.title" type="text" class="bg-gray-100 rounded-lg" placeholder="Enter title" />
                        </div>

                        <div class="flex mt-6">
                            <button
                                type="submit"
                                class="px-3 py-1 rounded bg-blue-500 opacity-80 hover:opacity-100 text-white disabled:cursor-not-allowed disabled:bg-success disabled:opacity-50"
                                :disabled="!form.title"
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
