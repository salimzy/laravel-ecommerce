<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
// import ref from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import {ref}   from 'vue';
// import  from '@inertiajs/vue3';
defineProps({
   
   products: {
       type: Array,
   },
});
const form = useForm({});
const showConfirmDeleteModal = ref(false);

const confirmDeleteProduct = () => {
  showConfirmDeleteModal.value = true; 
}
const closeModal = () => {
  showConfirmDeleteModal.value = false; 
}
const DeleteProduct = (id) => {

  form.delete(route('products.destroy',id),{
    onSuccess:() => closeModal()
  });
  // showConfirmDeleteModal.value = true; 
}
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Poducts</h2>
        </template>

        <div class="py-12"><Link :href="route('products.create')" >
          <SecondaryButton type="button"> create</SecondaryButton> </Link>
          <main>
    <div class="">
        <h2 class=' text-gray-800 dark:text-gray-200 leading-tight'>Products List</h2>
            <table class="border-collapse border-2 border-gray-500 text-gray-800 dark:text-gray-200 leading-tight">
  <thead class="text-gray-800 dark:text-gray-200 leading-tight">
    <tr>
      <th class="border border-gray-400 px-4 py-2 text-gray-800 dark:text-gray-200 leading-tight">Name</th>
      <th class="border border-gray-400 px-4 py-2 text-gray-800 dark:text-gray-200 leading-tight">Details</th>
      <th class="border border-gray-400 px-4 py-2 text-gray-800 dark:text-gray-200 leading-tight" col="2"></th>
      <!-- <th class="border border-gray-400 px-4 py-2 text-gray-800 dark:text-gray-200 leading-tight">
        
      </th> -->
    </tr>
  </thead>
  <tbody>
    <tr v-for="product in products" :key="product.id">
      <td class="border border-gray-400 px-4 py-2">{{ product.name }}</td>
      <td class="border border-gray-400 px-4 py-2">{{ product.detail }}</td>
      
      <td class="border border-blue-400 px-4   py-2"> <Link :href="`/products/${product.id}/edit`" class="">edit</Link></td>
      <td class="border border-red-400 px-4 py-2 "> <button class=""  @click="confirmDeleteProduct" >Delete </button></td>
    <!-- @click="confirmDeleteProduct"
   
    -->
      <Modal  :show="showConfirmDeleteModal" @close="closeModal"> <div class="p-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Are you sure you want to delete this product? </h2>
        <div class="mt-6 flex space-x-4">
          <DangerButton @click="DeleteProduct(product.id)"  :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        >delete</DangerButton> 
          <SecondaryButton @click="closeModal">cancel</SecondaryButton>
        </div>
      </div></Modal>
    </tr>
    <!-- <Link  :href="route('products.destroy',product.id)" method="delete" as="button"  class="">delete</Link>   -->
  </tbody>
</table>
       
    </div>
</main>
                           
        </div>
    </AuthenticatedLayout>
</template>
