<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import PortfolioForm from './Partials/PortfolioForm.vue';

const props = defineProps({
    portfolio: Object,
    skills: Object,
    errors: Object
});
</script>

<template>
    <Head title="Portfolio" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit portfolio</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <PortfolioForm
                        class="max-w-xl"
                        :portfolio="portfolio"
                        :skills="skills"
                        :errors="errors"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
