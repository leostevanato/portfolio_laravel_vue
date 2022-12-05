<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import WorkForm from './Partials/WorkForm.vue';

const props = defineProps({
    skills: Object
});
</script>

<template>
    <Head title="Work" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">New work</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <WorkForm
                        class="max-w-xl"
                        :skills="skills"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
