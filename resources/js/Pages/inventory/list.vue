
<script setup>
import { ref } from 'vue'
import ProductTable from '@/Componets/tables/ProductTable.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const searchQuery = ref('')
const selectedCategory = ref('all')
const currentPage = ref(1)

const categories = [
  { value: 'all', label: 'All Categories' },
  { value: 'electronics', label: 'Electronics' },
  { value: 'clothing', label: 'Clothing' },
  { value: 'home', label: 'Home & Kitchen' }
]
</script>

<template>
  <AuthenticatedLayout>
    
  <div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
      <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Products</h2>
      <router-link 
        to="/products/add"
        class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors"
      >
        <i data-feather="plus" class="mr-2 w-4 h-4"></i>
        Add Product
      </router-link>
    </div>
    
    <div class="bg-white dark:bg-dark-800 rounded-lg shadow overflow-hidden">
      <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex flex-col md:flex-row md:items-center gap-4">
        <div class="relative flex-1">
          <input 
            v-model="searchQuery"
            type="text" 
            placeholder="Search products..." 
            class="pl-10 pr-4 py-2 w-full border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-700 dark:text-white"
          >
          <i data-feather="search" class="absolute left-3 top-2.5 text-gray-400"></i>
        </div>
        
        <select 
          v-model="selectedCategory"
          class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-700 dark:text-white"
        >
          <option v-for="category in categories" :key="category.value" :value="category.value">
            {{ category.label }}
          </option>
        </select>
      </div>
      
      <ProductTable />
      
      <div class="p-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
        <div class="text-sm text-gray-500 dark:text-gray-400">
          Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">124</span> results
        </div>
        
        <div class="flex space-x-2">
          <button 
            @click="currentPage > 1 ? currentPage-- : null"
            :disabled="currentPage === 1"
            class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded-lg disabled:opacity-50"
          >
            Previous
          </button>
          <button 
            @click="currentPage++"
            class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded-lg"
          >
            Next
          </button>
        </div>
      </div>
    </div>
  </div>
  
  </AuthenticatedLayout>
</template>