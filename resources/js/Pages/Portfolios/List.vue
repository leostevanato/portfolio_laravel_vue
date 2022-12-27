<script setup>
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    portfolios: Array,
});
</script>

<template>

    <Head title="Portfolios" />

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="max-w-7xl mt-6 mx-12 p-12 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Portfolios</h2>

            <div v-if="portfolios.length > 0">
                <div class="bg-white">
                    <div class="mx-auto max-w-2xl py-6 px-4 lg:max-w-7xl">
                        <div class="grid grid-cols-1 gap-y-4">
                            <a v-for="portfolio in portfolios" :key="portfolio.id" :href="route('portfolio.show', portfolio.id)" class="group border border-gray-300 rounded-md pb-4 px-4">
                                <h3 class="mt-4 text-md text-gray-700 font-bold">{{ portfolio.title }} <span v-if="portfolio.language">({{ portfolio.language }})</span></h3>
                                <p v-if="portfolio.url" class="mt-1 text-md text-gray-700">{{ portfolio.url }}</p>
                                <p v-if="portfolio.description" class="mt-4 text-lg font-medium text-gray-900">{{ portfolio.description }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>No portfolios found.</div>
        </div>
    </div>
</template>