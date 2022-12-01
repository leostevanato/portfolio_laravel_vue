<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import IntetiaLinkButton from '@/Components/IntetiaLinkButton.vue';

defineProps({
    works: Array,
});
</script>

<template>

    <Head title="Works" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Works</h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <IntetiaLinkButton class="mb-4" :href="route('works.create')">Add new work</IntetiaLinkButton>

                    <table v-if="works.length > 0" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="work in works" :key="work.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ work.id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ work.title }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <Link :href="route('works.edit', work.id)"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Editar
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-else>No works found.</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>