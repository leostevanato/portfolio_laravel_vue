<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import IntetiaLinkButton from '@/Components/IntetiaLinkButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextArea from '@/Components/TextArea.vue';
import TextInput from '@/Components/TextInput.vue';
import { useFetch } from '@/Functions/fetch';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { computed } from '@vue/reactivity';
import { ref } from 'vue';

// If not editing then is creating
const editing = (route().current('portfolios.edit')) ? true : false;

const props = defineProps({
    portfolio: Object,
    errors: Object
});

const user = usePage().props.value.auth.user;

const LANGUAGES_API_URL = "/api/languages";
const languagesJSON = ref(useFetch(LANGUAGES_API_URL));

const form = useForm((editing)
    ? props.portfolio
    : {
        user_id: user.id,
        title: '',
        language: '',
        description: null
    }
);

const buttonCancelBackText = computed(() => {
    return form.wasSuccessful ? "Back" : "Cancel"
});

const submit = () => {
    if (editing) {
        form.patch(route('portfolios.update', form));
    } else {
        form.post(route('portfolios.store'));
    }
};

function isNull(value) {
    return typeof value !== "undefined" && (typeof value !== "object" || !value);
}
</script>

<template>
    <section>
        <form @submit.prevent="submit" class="space-y-6">
            <input type="hidden" id="user_id" name="user_id" v-model="form.user_id">

            <div class="!mt-0">
                <InputLabel for="title" value="Title" />

                <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div>
                <InputLabel for="language" value="Language" />

                <p v-if="languagesJSON.loading">Loading...</p>
                <InputError v-else-if="languagesJSON.error" class="mt-2" :message="languagesJSON.error" />
                <select v-else-if="languagesJSON.data && languagesJSON.data.length > 0" id="language"
                    class="mt-1 block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    v-model="form.language">
                    <option v-for="option in languagesJSON.data" :value="option.value">
                        {{ option.text }}
                    </option>
                </select>
                <p v-else>No language found.</p>

                <InputError class="mt-2" :message="form.errors.language" />
            </div>

            <div>
                <InputLabel for="description" value="Description" />

                <TextArea id="description" class="mt-1 block w-full" v-model="form.description" />

                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <IntetiaLinkButton :href="route('portfolios.index')" :disabled="form.processing">{{ buttonCancelBackText
                }}
                </IntetiaLinkButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
