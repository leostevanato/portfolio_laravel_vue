<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import IntetiaLinkButton from '@/Components/IntetiaLinkButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    settings: Object
});

const form = useForm(props.settings);

const submit = () => {
    (editing)
        ? form.patch(route('settings.update', form))
        : form.post(route('settings.store'))
};
</script>

<template>
    <section>
        <form @submit.prevent="submit" class="space-y-6">
            <div class="!mt-0">
                <InputLabel for="title" value="Title" />

                <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                
                <IntetiaLinkButton :href="route('settings.index')" :disabled="form.processing">Cancel</IntetiaLinkButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
