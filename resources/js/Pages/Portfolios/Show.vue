<script setup>
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    portfolio: Array,
});

function portfolioImage(img) {
    return !img
        ? '<div class="flex"><svg class="m-auto fill-gray-400" width="32px" height="32px" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title>no-image</title><path d="M30,3.4141,28.5859,2,2,28.5859,3.4141,30l2-2H26a2.0027,2.0027,0,0,0,2-2V5.4141ZM26,26H7.4141l7.7929-7.793,2.3788,2.3787a2,2,0,0,0,2.8284,0L22,19l4,3.9973Zm0-5.8318-2.5858-2.5859a2,2,0,0,0-2.8284,0L19,19.1682l-2.377-2.3771L26,7.4141Z"/><path d="M6,22V19l5-4.9966,1.3733,1.3733,1.4159-1.416-1.375-1.375a2,2,0,0,0-2.8284,0L6,16.1716V6H22V4H6A2.002,2.002,0,0,0,4,6V22Z"/><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/></svg></div>'
        : '<img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="" class="h-full w-full object-cover object-center group-hover:opacity-75">';
}
</script>

<template>

    <Head title="Portfolio" />

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="max-w-7xl mt-6 mx-12 p-12 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div v-if="portfolio">
                <!-- {{ portfolio }} -->
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ portfolio.title }} <span
                        v-if="portfolio.language">({{ portfolio.language }})</span></h2>

                <div class="bg-white">
                    <div class="mx-auto max-w-2xl py-2 lg:max-w-7xl">
                        <p v-if="portfolio.description" class="mt-2 text-lg font-medium text-gray-900">
                            {{ portfolio.description }}
                        </p>

                        <div v-if="portfolio.works && portfolio.works.length > 0"
                            class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                            <div v-for="work in portfolio.works" :key="work.id"
                                class="mt-4 border border-gray-300 rounded-md bg-gray-50 p-2">

                                <div class="flex flex-wrap content-start gap-2">
                                    <div
                                        class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8"
                                        v-html="portfolioImage(work.image)">
                                    </div>
                                    <div class="w-full px-2 py-1 border border-gray-300 rounded-md bg-white">
                                        <h4 class="text-lg text-gray-700 font-bold">
                                            {{ work.title }}
                                        </h4>
                                        <p v-if="work.url" class="mt-1 text-base text-gray-700">
                                            <a :href=work.url class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600" target="_blank">{{ work.url }}</a>
                                        </p>
                                        <p v-if="work.description" class="mt-3 text-lg font-medium text-gray-900">
                                            {{ work.description }}
                                        </p>
                                    </div>
                                    <div v-if="work.skills.length > 0" class="flex flex-wrap content-start gap-3 mt-1 p-2 border border-gray-300 rounded-md bg-white w-full">
                                        <p class="w-full text-base text-gray-700 font-bold">Skills</p>
                                        <div v-for="skill in work.skills" :key="skill.id" class="px-2 py-1 bg-gray-200 text-center rounded text-sm">
                                            {{ skill.title }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>Portfolio not found.</div>
        </div>
    </div>
</template>