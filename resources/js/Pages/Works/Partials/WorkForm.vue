<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import IntetiaLinkButton from '@/Components/IntetiaLinkButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextArea from '@/Components/TextArea.vue';
import TextInput from '@/Components/TextInput.vue';
import slugify from '@/Functions/slugify';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

// If not editing then is creating
const editing = (route().current('works.edit')) ? true : false;

const props = defineProps({
    work: Object,
    skills: Object,
    errors: Object
});

const checkedSkills = ref([]);

const user = usePage().props.value.auth.user;

const form = useForm((editing)
    ? props.work
    : {
        user_id: user.id,
        title: '',
        slug: '',
        description: null,
        url: null,
        image: null,
        skills: checkedSkills
    }
);

const slugifyTitle = () => {
    // TODO: implement check if slug exists add number
    form.slug = slugify(form.title);
};

const submit = () => {
    (editing)
        ? form.patch(route('works.update', form))
        : form.post(route('works.store'))
};
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
                <InputLabel for="slug" value="Slug" />

                <TextInput id="slug" type="text" class="mt-1 block w-full" v-model="form.slug" required />

                <SecondaryButton class="mt-2" @click="slugifyTitle">Create slug from title</SecondaryButton>

                <InputError class="mt-2" :message="form.errors.slug" />
            </div>

            <div>
                <InputLabel for="description" value="Description" />

                <TextArea id="description" class="mt-1 block w-full" v-model="form.description" />

                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <div>
                <InputLabel for="url" value="URL" />

                <TextInput id="url" type="text" class="mt-1 block w-full" v-model="form.url" />

                <InputError class="mt-2" :message="form.errors.url" />
            </div>

            <div>
                <InputLabel for="image" value="Image" />

                <TextInput id="image" type="text" class="mt-1 block w-full" v-model="form.image" />

                <InputError class="mt-2" :message="form.errors.image" />
            </div>

            <div>
                <InputLabel value="Skills" />

                <div class="grid grid-cols-2 gap-4 mt-1">
                    <div v-for="skill in skills" :key="skill.id" class="flex items-center mb-4">
                        <input type="checkbox" :id="'skill-'+skill.id" :value="skill.id" v-model="checkedSkills" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 mr-2" />

                        <InputLabel :for="`skill-${skill.id}`" :value="skill.title" />
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <IntetiaLinkButton :href="route('works.index')" :disabled="form.processing">Cancel</IntetiaLinkButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
