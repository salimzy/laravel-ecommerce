<script setup>
// import Checkbox from '@/Components/Checkbox.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
   
    status: {
        type: String,
    },
});


const form = useForm({
    name: '',
     detail: '',
    
});

const submit = () => {
    form.post(route('products.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
       
    });
};
</script>

<template>
     <Head title="create Products" />
<AuthenticatedLayout>
    <div class="mt-4 mr-4 ml-4"><Link :href="route('products.index')">
   <SecondaryButton class="dark:text-white"> Go back</SecondaryButton></Link>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="name"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="Details" value="detail" />

                <TextInput
                    id="detail"
                    type="detail"
                    class="mt-1 block w-full border-white:200"
                    v-model="form.detail"
                    required
                   
                />

                <InputError class="mt-2" :message="form.errors.detail" />
            </div>

          


<div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" 
                :disabled="form.processing">
create                </PrimaryButton>
            </div>
        </form></div>
        </AuthenticatedLayout>
</template>