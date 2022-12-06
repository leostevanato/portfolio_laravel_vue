<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    works: Array,
});
</script>

<template>

    <Head title="Works" />

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="max-w-7xl mt-6 mx-12 p-12 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Works</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque qui laboriosam esse velit ut animi,
                quaerat voluptatem quam totam reprehenderit iusto! Culpa voluptates dolor atque nihil ullam rerum,
                doloribus possimus?</p>

            <div v-if="works.length > 0">
                <div class="bg-white">
                    <div class="mx-auto max-w-2xl py-6 px-4 lg:max-w-7xl">
                        <h2 class="sr-only">Works</h2>

                        <div
                            class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                            <a v-for="work in works" :key="work.id" href="#" class="group">
                                <div
                                    class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                    <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg"
                                        alt=""
                                        class="h-full w-full object-cover object-center group-hover:opacity-75">
                                </div>
                                <h3 class="mt-4 text-md text-gray-700 font-bold">{{ work.title }}</h3>
                                <p v-if="work.url" class="mt-1 text-md text-gray-700">{{ work.url }}</p>
                                <p v-if="work.description" class="mt-4 text-lg font-medium text-gray-900">{{
                                        work.description
                                }}</p>
                                <!-- <p v-if="work.skills">{{ work.skills }}</p> -->
                                <div v-if="(work.skills.length > 0)"
                                    class="grid grid-cols-3 gap-2 mt-2 px-1 py-2">
                                    <div v-for="skill in work.skills" :key="skill.id" class="px-2 py-1 border border-gray-300 rounded-md">
                                        {{skill.title}}
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