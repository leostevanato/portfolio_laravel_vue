<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import SettingsForm from './Partials/SettingsForm.vue';

defineProps({
    settings: Array,
});
</script>

<template>

    <Head title="Settings" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Settings</h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <SettingsForm
                        class="max-w-xl"
                        :settings="settings"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>