<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import WorkForm from './Partials/WorkForm.vue';

const props = defineProps({
    work: Object,
    portfolios: Object,
    skills: Object,
    errors: Object
});
</script>

<template>
    <Head title="Work" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit work</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <WorkForm
                        class="max-w-xl"
                        :work="work"
                        :portfolios="portfolios"
                        :skills="skills"
                        :errors="errors"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
