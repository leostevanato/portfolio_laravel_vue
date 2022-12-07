<script setup>
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    works: Array,
});

function workImage(img) {
    return !img
        ? '<div class="flex"><svg class="m-auto fill-gray-400" width="32px" height="32px" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title>no-image</title><path d="M30,3.4141,28.5859,2,2,28.5859,3.4141,30l2-2H26a2.0027,2.0027,0,0,0,2-2V5.4141ZM26,26H7.4141l7.7929-7.793,2.3788,2.3787a2,2,0,0,0,2.8284,0L22,19l4,3.9973Zm0-5.8318-2.5858-2.5859a2,2,0,0,0-2.8284,0L19,19.1682l-2.377-2.3771L26,7.4141Z"/><path d="M6,22V19l5-4.9966,1.3733,1.3733,1.4159-1.416-1.375-1.375a2,2,0,0,0-2.8284,0L6,16.1716V6H22V4H6A2.002,2.002,0,0,0,4,6V22Z"/><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/></svg></div>'
        : '<img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="" class="h-full w-full object-cover object-center group-hover:opacity-75">';
}
</script>

<template>

    <Head title="Works" />

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="max-w-7xl mt-6 mx-12 p-12 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Work portfolio</h2>
            <p>Some work I've done over the years. In works with complex layouts or designs, usually I receive an static version of the layout (Photoshop, Figma, Adobe XD, JPG or PNG images, etc) from the designer and do my best to faithfully reproduce it using HTML and CSS. It's also commom that I work with the designers to be sure that the layout will be functional and easy for the end user.</p>

            <div v-if="works.length > 0">
                <div class="bg-white">
                    <div class="mx-auto max-w-2xl py-6 px-4 lg:max-w-7xl">
                        <h2 class="sr-only">Work portfolio</h2>

                        <div
                            class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                            <a v-for="work in works" :key="work.id" href="#" class="group border border-gray-300 rounded-md pb-4 px-4">
                                <div v-if="work.image" class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8"
                                    v-html="workImage(work.image)">
                                </div>
                                <h3 class="mt-4 text-md text-gray-700 font-bold">{{ work.title }}</h3>
                                <p v-if="work.url" class="mt-1 text-md text-gray-700">{{ work.url }}</p>
                                <p v-if="work.description" class="mt-4 text-lg font-medium text-gray-900">{{
                                        work.description
                                }}</p>

                                <div v-if="work.skills.length > 0"
                                    class="mt-4 border border-gray-300 rounded-md bg-gray-50 p-2">
                                    <p class="text-md font-medium text-gray-900">
                                        Skills
                                    </p>
                                    <div v-if="work.skills.length > 0" class="flex flex-wrap content-start gap-2 mt-1">
                                        <div v-for="skill in work.skills" :key="skill.id"
                                            class="px-2 py-1 border border-gray-300 rounded-md bg-white">
                                            {{ skill.title }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>No works found.</div>
        </div>
    </div>
</template>