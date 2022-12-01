<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import CreateWorkForm from './Partials/CreateWorkForm.vue';

defineProps({

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
                    <CreateWorkForm
                        class="max-w-xl"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
