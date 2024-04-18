<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';


const Sidebar = defineAsyncComponent(
  () => import("@/Components/Sidebar.vue")
);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-10 justify-center">
                        <a :href="route('polls.index')" class="py-10 px-10 hover:bg-gray-500 bg-blue-500 text-2xl">Polls</a>
                        <a :href="route('votes.index')" class="py-10 px-10 hover:bg-gray-500 bg-green-500 text-2xl">Votes</a>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
