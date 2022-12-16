<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import IntetiaLinkButton from '@/Components/IntetiaLinkButton.vue';
import { ref } from 'vue';
import { useFetch } from '@/Functions/fetch';

defineProps({
    portfolios: Array,
});

// const LANGUAGES_API_URL = "/api/languages";
// const languagesJSON = ref(useFetch(LANGUAGES_API_URL));
</script>

<template>

    <Head title="Portfolios" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Portfolios</h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <IntetiaLinkButton class="mb-4" :href="route('portfolios.create')">Add new portfolio</IntetiaLinkButton>

                    <table v-if="portfolios.length > 0" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Language
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="portfolio in portfolios" :key="portfolio.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ portfolio.id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ portfolio.title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ portfolio.language }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <Link :href="route('portfolios.edit', portfolio.id)"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Edit
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-else>No portfolios found.</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>