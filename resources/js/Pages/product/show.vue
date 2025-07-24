<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
// import SecondaryButton from '@/Components/SecondaryButton.vue';


import { Head, Link, usePage} from '@inertiajs/vue3';

const product = usePage().props.product;
// console.log(product);
</script>

<template>
    <Head title="product.name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ product.name }}</h2>
        </template>

        <div class="py-12 text-gray-800 dark:text-gray-200 leading-tight ">

                 <div class="m-6 p-3">
                    <Link class=" text-blue-800 dark:text-blue-200" :href="route('products.index')">go back</Link>
                    <!-- <p class="px-2 py-2">


                    </p> -->
                    <p class="px-2 py-2">
                        {{ product.detail }}
                    </p>
                 </div>          
        </div>
    </AuthenticatedLayout>
</template>
